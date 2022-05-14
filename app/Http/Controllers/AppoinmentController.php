<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Time_slot;

class AppoinmentController extends Controller
{
    public function index(Request $request)
    {
        $doctors=Doctor::all();

        // $myAppoinments = Appoinment::pluck('appoinment_date');
    //   dd($request->docotr_id);

       
        if($request->search){
        $myAppoinments = Appoinment::where('appoinment_date','=',$request->search)->where('doctor_id','=',$request->specialty_id)->latest()->paginate(5);
        }else{
        $myAppoinments = Appoinment::OrderBy('created_at','desc')->paginate(5);

        }
        return view('admin.appoinments.index', compact('doctors','myAppoinments'));
    }

    public function check(Request $request)
    {
        $appoinment_date = $request->appoinment_date;
        $appoinment = Appoinment::where('appoinment_date', '=',$appoinment_date)->get();
        
        if (!$appoinment) {
            return redirect()->back()->with('error', 'Appointment date is not available');
        }
        else{
        
        return redirect()->back()->with('success','Appointment date is available');
        }
    }
   
public function edit(Appoinment $appoinments){
       
       return view('admin.appoinments.edit',compact('appoinments'));

}
public function update(Request $request, Appoinment $appoinment)
    {
        $request->validate([
            'appoinment_status' => 'required'
        ]);
        $appoinment->update($request->all());
        $appoinment->save();
        session()->flash('success', ' Appoinment updated Successfully.');
        // redirect user
        return redirect(route('appoinment.index'));
        
}

	



}