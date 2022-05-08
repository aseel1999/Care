<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\Time_slot;

class AppoinmentController extends Controller
{
    public function index()
    {
        $doctors=Doctor::all();
        $myAppoinments = Appoinment::latest()->get();
        return view('admin.appoinments.index', compact('doctors','myAppoinments'));
    }

    public function check(Request $request)
    {
        $appoinment_date = $request->date;
        $appoinment = Appoinment::where('appoinment_date', $appoinment_date)->first();
        
        if (!$appoinment) {
            return redirect()->to('/appoinment')->with('errMessage', 'Appointment time is not available for this date');
        }
        $appoinmentId = $appoinment->id;
        return view('admin.appoinments.index', compact( 'appoinmentId', 'appoinment_date'));
    }
   
public function edit(Appoinment $appoinments){
       
       return view('admin.appoinments.edit',compact('appoinments'));

}
public function update(Request $request, $id)
    {
        $this->validate($request, [
            'appoinment_status' => 'required',
        ]);
        $appoinment = Appoinment::find($id);
        $appoinment->save();
        session()->flash('success', ' Appoinment updated Successfully.');
        // redirect user
        return redirect(route('appoinment.index'));
        
}


}