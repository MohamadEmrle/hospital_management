<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\file\StoreFileRequest;
use App\Http\Requests\Admin\file\UpdateFileRequest;
use App\Models\Detection;
use App\Models\File;
use App\Models\User;
use App\trait\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    use imageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::whereHas('users')->whereHas('detections')->get();
        $detections = Detection::where('status',1)->get();
        $users = User::where('type_id',3)->get();
        return view('admin.files.index',compact('files','detections','users'));
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
    public function store(StoreFileRequest $request)
    {
        $fileName = $this->saveImage($request->file,'images/files');
        $save = File::create([
            'name' => $request->name,
            'description' => $request->description,
            'file' => $fileName,
            'file_type' => $request->file_type,
            'detection_id' => $request->detection_id,
            'user_id' => $request->user_id,
        ]);
        if($save)
        {
            alert()->success('تم إنشاء الملف بنجاح');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(UpdateFileRequest $request , File $file)
    {
        $file->update($request->validated());
        alert()->success('تم تحرير الملف بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        alert()->success('تم حذف الملف بنجاح');
        return back();
    }
}
