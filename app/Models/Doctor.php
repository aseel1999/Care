<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    const STATUS_MALE='male';
    const STATUS_FEMALE='female';
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function specialti()
    {
        return $this->hasOne(Specialtie::class);
    }
    

}
