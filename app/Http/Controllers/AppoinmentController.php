<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment;
use App\Models\User;
use App\Models\Time_slot;

class AppoinmentController extends Controller
{
    public function index()
    {
        $user=User::all();
        $myAppoinments = Appoinment::latest()->get();
        return view('admin.appoinments.index', compact('user','myAppoinments'));
    }

    public function check(Request $request)
    {
        $appoinment_date = $request->date;
        $appoinment = Appoinment::where('appoinment_date', $appoinment_date)->first();
        
        if (!$appoinment) {
            return redirect()->to('/appoinment')->with('errMessage', 'Appointment time is not available for this date');
        }
        $appoinmentId = $appoinment->id;
        $times = Time_slot::where('appoinment_id', $appoinmentId)->get();
        return view('admin.appoinments.index', compact('times', 'appoinmentId', 'appoinment_date'));
    }
    // Update app time
    // delete the old time array and create a new time array
    public function updateTime(Request $request)
    {
        $appoinmentId = $request->appoinmentId;
        $date = Appoinment::where('id', $appoinmentId)->get('appoinment_date')->first();
        Time_slot::where('appoinment_id', $appoinmentId)->delete();
        
        return redirect()->route('appoinment.index')->with('message', 'Appointment time for ' . $date . ' is updated successfully!');
}
}