<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function specialtiess(){
        return $this->belongsTo(Specialtie::class,'specialties_id');
    }
}
