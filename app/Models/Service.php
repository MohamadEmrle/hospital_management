<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'services_provider',
        'name',
        'description',
        'value',
        'payment',
        'user_id'
    ];
    public function users(){
        return $this->belongsTo(related:User::class,foreignKey:'user_id');
    }
}
