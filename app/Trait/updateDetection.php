<?php

namespace App\trait;

use App\Models\Detection;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PhpParser\Builder\Trait_;
Trait updateDetection
{
    function updatestatusDetection($id,$status)
    {
        $edit = Detection::where('id',$id)->update([
            'status' => $status
        ]);
        return $edit;
    }
}
