<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Price;
use App\Models\Date;
use App\Models\File;
use App\Models\Comment;
use App\Models\Reward;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detection extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'detections';
    protected $fillable = [
        'status',
        'specialty_id',
        'doctor_id',
        'price_id',
        'date_id',
        'user_id'
    ];
    public function doctors(){
        return $this->belongsTo(related:Doctor::class,foreignKey:'doctor_id');
    }
    public function user(){
        return $this->belongsTo(related:User::class,foreignKey:'user_id');
    }
    public function prices(){
        return $this->belongsTo(related:Price::class,foreignKey:'price_id');
    }
    public function date(){
        return $this->belongsTo(related:Date::class,foreignKey:'date_id');
    }
    public function files(){
        return $this->hasMany(related:File::class,foreignKey:'detection_id',localKey:'id');
    }
    public function comments(){
        return $this->hasMany(related:Comment::class,foreignKey:'detection_id',localKey:'id');
    }
    public function rewards(){
        return $this->hasMany(related:Reward::class,foreignKey:'user_id',localKey:'id');
    }
}
