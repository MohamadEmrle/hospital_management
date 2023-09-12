<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Detection;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'file',
        'file_type',
        'detection_id',
        'user_id',
    ];
    public function users(){
        return $this->belongsTo(related:User::class,foreignKey:'user_id');
    }
    public function detections(){
        return $this->belongsTo(related:Detection::class,foreignKey:'detection_id');
    }
}
