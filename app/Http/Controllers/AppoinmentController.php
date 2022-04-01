<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment;

use App\Models\Time_slot;

class AppoinmentController extends Controller
{
    public function index()
    {
        
        $myAppoinments = Appoinment::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.appoinments.index', compact('myAppoinments'));
    }


    public function check(Request $request)
    {
        $appoinment_date = $request->date;
        $appoinment = Appoinment::where('appoinment_date', $appoinment_date)->where('user_id', $user->id)->first();
        if (!$appointment) {
            return redirect()->to('/appoinment')->with('errMessage', 'Appointment time is not available for this date');
        };
        $appoinmentId = $appoinment->id;
        $times = Time_slot::where('appoinment_id', $appoinmentId)->get();
        return view('admin.appoinments.index', compact('times', 'appoinmentId', 'appoinment_date'));
    }
    // Update app time
    // delete the old time array and create a new time array
    public function updateTime(Request $request)
    {
        $appoinmentId = $request->appoinmentId;
        $date = Appoinment::where('id', $appoinmentId)->get('date')->first()->date;
        Time_slot::where('appoinment_id', $appoinmentId)->delete();
        foreach ($request->time as $time) {
            Time_slot::create([
                'time' => $time,
                'appoinment_id' => $appoinmentId,
                'status' => 0,

            ]);
        }
        return redirect()->route('appoinment.index')->with('message', 'Appointment time for ' . $date . ' is updated successfully!');
}
}