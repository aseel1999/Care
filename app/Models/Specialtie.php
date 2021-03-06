<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Specialtie extends Model
{
    use HasFactory;
    protected $guarded=[];
    const CREATED_AT = 'created_at';
    const UPDATED_AT='updated_at';
    
    protected $table='specialties';
    public function services(){
        return $this->hasMany(Service::class);
    }
    public function doctors(){
        return $this->belongsToMany(Doctor::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    

}
