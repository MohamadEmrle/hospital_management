<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\Bill;
use App\Models\Date;
use App\Models\Detection;
use App\Models\File;
use App\Models\Service;
use App\Models\serviceUser;
use App\Models\User;
use App\trait\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UserController extends Controller
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
        $users = User::Users()->latest()->get();
        return view('admin.users.index',compact('users'));
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
    public function store(StoreUserRequest $request)
    {
        $fileName = $this->saveImage($request->profile,'images/users');
        $store = User::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'phone' => $request->phone,
            'profile' => $fileName,
            'type_id' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthDate' => $request->birthDate,
            'address' => $request->address,
            'question' => $request->question,
        ]);
        alert()->success('تم إنشاء المستخدم بنجاح');
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
        $show = User::where('id',$id)->select(
            'id',
            'name_' .LaravelLocalization::getCurrentLocale(). ' as name',
            'phone',
            'profile',
            'email',
            'birthDate',
            'address'
        )->get();
        $detections = Detection::where('user_id',$id)->count();
        $bills = Bill::where('user_id',$id)->count();
        $services = Service::whereHas('users')
                    ->whereRelation('users','id',$id)->count();
        $files = File::where('user_id',$id)->count();
        $userServices = Service::whereHas('users')
                    ->whereRelation('users','id',$id)->get();
        $userFile = File::whereHas('users')
                    ->whereRelation('users','id',$id)->get();
        $userDetections = Detection::whereHas('user')->whereHas('doctors')->whereHas('date')
                    ->whereRelation('user','id',$id)->get();
        $userBills = Bill::whereHas('users')->whereHas('doctors')
                    ->whereRelation('users','id',$id)->get();
        $total = Bill::whereHas('users')
                ->whereRelation('users','id',$id)
                ->sum('total_value');
        return view('admin.users.show',compact('show','detections','bills','services','files','userServices','userFile','userDetections','userBills','total'));
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
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        if ($request->hasFile('image'))
        {
            $image = $user->image;
            $image = upload_file($request->file('image'),'/profiles',$user->id);
            $user->update([
                'profile' => $image
            ]);
        }
        alert()->success('تم تحرير المستخدم بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        alert()->success('تم حذف المستخدم بنجاح');
        return back();
    }
}
