<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\bill\StoreBillRequest;
use App\Http\Requests\Admin\date\UpdateDateRequest;
use App\Http\Requests\Admin\detection\StoreDetectionRequest;
use App\Http\Requests\Admin\detection\UpdateDetectionRequest;
use App\Models\Bill;
use App\Models\Comment;
use App\Models\Date;
use App\Models\Detection;
use App\Models\Doctor;
use App\Models\File;
use App\Models\Price;
use App\Models\Reward;
use App\Models\Specialty;
use App\Models\User;
use App\trait\detections;
use App\trait\updateDetection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetectionController extends Controller
{
    use detections;
    use updateDetection;
    public function detection_open()
    {
            $detections = Detection::whereHas('user')->whereHas('date')->whereHas('doctors')->where('status','1')->get();
            $specialtys = Specialty::all();
            $doctors = Doctor::all();
            $users = User::where('type_id',3)->get();
            return view('admin.detections.detection_open',compact('detections','specialtys','doctors','users'));
    }
    public function detection_pending()
    {
        $detections = Detection::whereHas('user')->whereHas('date')->whereHas('doctors')->where('status','2')->get();
        
        $doctors = Doctor::all();
        $users = User::where('type_id',3)->get();
        return view('admin.detections.detection_pending',compact('detections','doctors','users'));
    }
    public function detection_inprogress()
    {
        $detections = Detection::whereHas('user')->whereHas('date')->whereHas('doctors')->where('status','3')->get();
            $doctors = Doctor::all();
            $users = User::where('type_id',3)->get();
            return view('admin.detections.detection_inprogress',compact('detections','doctors','users'));
    }
    public function detection_complete()
    {
        $detections = Detection::whereHas('user')->whereHas('date')->whereHas('doctors')->where('status','5')->get();
            $doctors = Doctor::all();
            $users = User::where('type_id',3)->get();
            return view('admin.detections.detection_complete',compact('detections','doctors','users'));
    }
    public function detection_cancelled()
    {
            $detections = Detection::whereHas('user')->whereHas('date')->whereHas('doctors')->where('status','6')->get();
            $doctors = Doctor::all();
            $users = User::where('type_id',3)->get();
            return view('admin.detections.detection_cancelled',compact('detections','doctors','users'));
    }
    public function detection_pendingEd($id)
    {
        $edit = $this->updatestatusDetection($id,2);
        return redirect()->route('detection_pending');
    }
    public function detection_inprogressEd($id)
    {
        $edit = $this->updatestatusDetection($id,3);
        return redirect()->route('detection_inprogress');
    }
    public function detection_completeEd($id)
    {
        $edit = $this->updatestatusDetection($id,5);
        return redirect()->route('detection_complete');
    }
    public function detection_cancelledEd($id)
    {
        $edit = $this->updatestatusDetection($id,6);
        return redirect()->route('detection_cancelled');
    }
    public function doctor_ajax($id)
    {
        $newDoctor = DB::table('doctors')
                ->where('specoalty_id',$id)->get();
        return response()->json([
            'newDoctor' => $newDoctor
        ]);
    }
    public function date_ajax($id)
    {
        $newDate = DB::table('dates')
                ->where('doctor_id',$id)->get();
        return response()->json([
            'newDate' => $newDate
        ]);
    }
    public function price_ajax($id)
    {   
        $newPrice = DB::table('pricess')
                ->where('doctor_id',$id)->get();
        return response()->json([
            'newPrice' => $newPrice
        ]);
    }
    public function detection_ajax($id)
    {
        $newDetection = DB::table('detections')
                ->where('user_id',$id)
                ->where('status',1)
                ->get();
        return response()->json([
            'newDetection' => $newDetection
        ]);
    }
    public function store(StoreDetectionRequest $request , StoreBillRequest $requestBill )
    {
        $price = Price::select('total_value')->get();
        $detection = Detection::create([
            'user_id' => $request->user_id,
            'specialty_id' => $request->specialty_id,
            'doctor_id' => $request->doctor_id,
            'date_id' => $request->date_id,
            'price_id' => $request->price_id,
        ]);
        $bill = Bill::create([
            'discount' => $requestBill->discount,
            'total_value' => (int)$request->price_id - (int)$requestBill->discount,
            'payment' => $requestBill->payment,
            'user_id' => $request->user_id,
            'doctor_id' => $request->doctor_id,
        ]);
        alert()->success('تم إنشاء الزيارة بنجاح');
        return back();
    }
    public function detection_update(UpdateDetectionRequest $request , $id)
    {
        $update = Detection::where('id',$id)->update([$request->all()]);
        alert()->success('تم تحرير الزيارة بنجاح');
        return back();
    }
    public function destroy($id)
    {
        $delete = Detection::where('id',$id)->delete();
        if($delete)
        {
            alert()->success('تم حذف الزيارة بنجاح');
            return back();
        }
        
    }
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $show = Detection::where('id',$id)->get();
        $users = Detection::whereHas('user')
                ->where('id',$id)->get(); 
        $files = File::whereHas('users')->whereHas('detections')
                ->whereRelation('detections','id',$id)->get();
        $comments = Comment::whereHas('users')->whereHas('detection')
                ->whereRelation('detection','id',$id)->get();
        $rewards = Reward::whereHas('users')->whereHas('detections')
                ->whereRelation('detections','id',$id)->get();
        return view('admin.detections.show',compact('user_id','show','users','files','comments','rewards'));
    }
    public function fileDownload($fileName)
    {
        $file = File::where('file',$fileName)->get();
        $download = public_path('images\files',$file);
        return response()->download($download);
    }
}
