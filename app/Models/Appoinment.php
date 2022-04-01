<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;

    
    public function User1(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function Doctors()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
}
