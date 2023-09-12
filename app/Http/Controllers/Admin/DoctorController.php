<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\doctor\StoreDoctorRequest;
use App\Http\Requests\Admin\doctor\UpdateDoctorRequest;
use App\Models\Bill;
use App\Models\Date;
use App\Models\Detection;
use App\Models\Doctor;
use App\Models\Price;
use App\Models\Specialty;
use App\trait\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DoctorController extends Controller
{
    use imageTrait;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            if ((Auth::user()->isAdmin() && Auth::user()->can('User')) || Auth::user()->isSuperAdmin())
            {
                return $next($request);
            }else{
                abort(404);
            }
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::whereHas('specialtys')->select(
            'id',
            'name_' .LaravelLocalization::getCurrentLocale(). ' as name',
            'description_' .LaravelLocalization::getCurrentLocale(). ' as description',
            'phone',
            'specoalty_id'
        )->get();
        $specialtys = Specialty::all();
        return view('admin.doctors.index',compact('doctors','specialtys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $fileName = $this->saveImage($request->photo,'images/doctors');
        $store = Doctor::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'phone' => $request->phone,
            'photo' => $fileName,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'specoalty_id' => $request->specoalty_id,
        ]);
        alert()->success('تم إنشاء الطبيب بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $dates = Date::where('doctor_id',$id)->count();
        $detections = Detection::where('doctor_id',$id)->count();
        $bills = Bill::where('doctor_id',$id)->count();
        $show = Doctor::whereHas('specialtys')->where('id',$id)->get();
        $datesDoctor = Date::whereHas('doctors')->whereRelation('doctors','id',$id)->get();
        $pricesDoctor = Price::whereHas('doctors')->whereRelation('doctors','id',$id)->get();
        $detectionDoctor = Detection::whereHas('doctors')->whereHas('user')->whereHas('date')
                            ->whereRelation('doctors','id',$id)->get();
        $billDoctor = Bill::whereHas('doctors')->whereHas('users')->whereRelation('doctors','id',$id)->get();
        $total = Bill::whereHas('doctors')
                ->whereRelation('doctors','id',$id)
                ->sum('total_value');
        return view('admin.doctors.show',compact('show','dates','detections','datesDoctor','pricesDoctor','detectionDoctor','billDoctor','bills','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());
        alert()->success('تم تحرير الطبيب بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        alert()->success('تم حذف الطبيب بنجاح');
        return back();
    }
    
}
