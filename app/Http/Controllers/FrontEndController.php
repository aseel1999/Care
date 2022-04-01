<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment;
use App\Models\Time_slot;
use App\Models\User;

class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('America/New_York');
        // If there is set date, find the doctors
        if (request('date')) {
            $formatDate = date('m-d-yy', strtotime(request('date')));
            $doctors = Appoinment::where('date', $formatDate)->get();
            return view('welcome', compact('doctors', 'formatDate'));
        };
        // Return all doctors avalable for today to the welcome page
        $doctors = Appoinment::where('appoinment_date', date('m-d-yy'))->get();
        return view('welcome', compact('doctors'));
        
    }
    
}
