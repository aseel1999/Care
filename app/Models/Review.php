<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function uses()
    {
        return $this->belongsTo(User::class);
    }

    public function docts()
    {
        return $this->belongsTo(Doctor::class);
    }
    
}
