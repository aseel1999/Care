<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Doctor;
use App\Models\Booking;

class PatientListController extends Controller
{
    public function index(Request $request){
        date_default_timezone_set('America/New_York');
        if ($request->date) {
            $date = $request->date;
            $bookings = Booking::latest()->where('date', $date)->get();
            return view('admin.patientlist.index', compact('bookings', 'date'));
        };
        $bookings = Booking::latest()->where('date', date('m-d-yy'))->get();
        return view('admin.patientlist.index', compact('bookings'));
} 
public function show($id)
    {

        $doctor = Doctor::query()->with(['users'])->find($id);
        dd($doctor);
        return response()->view('admin.patientlist.show', ['doctor' => $doctor]);
    }
    public function toggleStatus($id)
    {
        $booking = Booking::find($id);
        $booking->status = !$booking->status;
        $booking->save();
        return redirect()->back();
    }
    public function allTimeAppointment()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('admin.patientlist.all', compact('bookings'));
    }
}