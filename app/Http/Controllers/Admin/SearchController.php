<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detection;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SearchController extends Controller
{
    public function autocomplete(Request $request){
        $search = $request->search;
        if($search == '')
        {
            $users = User::orderBy('name_en', 'asc')->select('id','name')->list(5)->get();
        }else {
            $users = User::orderBy('name_en', 'asc')->select('id','name')->where('name','like','%'.$search.'%')->list(5)->get();
        }
        $response = array();
        foreach($users as $user)
        {
            $response[]=array("value"=>$user->id,"label"=>$user->name_en);
        }
        return response()->json($response);
        
    }
}
