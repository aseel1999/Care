<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Doctor;


class ReviewController extends Controller
{
    public function index()
{
    $doctors = Doctor::query()->with('reviews')->get();
    return view('admin.reviews.index', compact('doctors'));
}
   
}
