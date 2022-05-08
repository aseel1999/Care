<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    const STATUS_MALE='male';
    const STATUS_FEMALE='female';
/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
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
