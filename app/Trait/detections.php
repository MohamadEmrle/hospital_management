<?php

namespace App\trait;

use App\Models\Detection;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PhpParser\Builder\Trait_;
Trait detections
{
    function statusDetection($detectionStatus)
    {
        $detections = DB::table('users')
                    ->join('detections','users.id','=','detections.user_id')
                    ->join('doctors','doctors.id','=','detections.doctor_id')
                    ->join('dates','dates.id','=','detections.date_id')
                    ->join('pricess','pricess.id','=','detections.price_id')
                    ->where('status',$detectionStatus)
                    ->get();
        return $detections;
    }
}
