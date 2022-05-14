<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Mail\DoctorMail;
use App\Http\Requests\Doctor\CreateDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Models\Specialtie;
use Illuminate\Support\Facades\Storage;
use Mail;


class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $specialties = Specialtie::all();
        if($request->search){
            $doctors = Doctor::where('doctor_name','=',$request->search)->where('specialty_id','=',$request->specialty_id)->latest()->paginate(5);
            }else{
            $doctors = Doctor::OrderBy('created_at','desc')->paginate(5);
    
            }
        
       return view('admin.doctors.index', compact('doctors','specialties'));
      
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDoctorRequest $request)
    {
        $doctor = Doctor::create([
            'doctor_name' => $request->doctor_name,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'doctor_password' => $request->doctor_password,
            'specialty_id'=>$request->specialty_id,
            'doctor_gender' => $request->doctor_gender,
            'doctor_experience' => $request->doctor_experience,
            'doctor_qualifications' => $request->doctor_qualifications,
            'doctor_certificates'=>$request->doctor_certificates,
            'clinic_location'=>$request->clinic_location,
            'clinic_phone'=>$request->clinic_phone,
            'clinic_name'=>$request->clinic_name,
            'booking_price'=> $request->booking_price,
            
        ]);
        if($request->image_path){
            $pic = $request->image_path->store('doctors_pictures');
            $doctor->image_path = $pic;
            $doctor->save();
        }
        session()->flash('success', 'New Doctor Added Successfully.');
        
        return redirect(route('doctors.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctors.delete', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
       // $doctor = Doctor::findOrFail($id);
       
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validate =  $request->validate([
            'specialty_id' => 'required',
            'status'=> 'required'
        ]);
        $doctor = Doctor::find($id);

        // this name from db            this $request->service from input
        $doctor->specialty_id = $request->specialty_id;
        $doctor->status=$request->status;
        $doctor->save();
        // flash message
        session()->flash('success', 'Doctor Info Updated Successfully.');
        // redirect user
        return redirect(route('doctors.index'));
        
    }
    public function sendEmailtoDoctor(Request $request){
        $send=[
            'doctor_name'=>$request->doctor_name,
            'doctor_email' => $request->doctor_email,
            'doctor_phone'=>$request->doctor_phone,
            'specialty_id'=>$request->specialty_id,
            'clinic_location'=>$request->clinic_location,
            'clinic_phone'=>$request->clinic_phone,
            'clinic_name'=>$request->clinic_name,
            'booking_price'=> $request->booking_price,

            
        ];
        $doc=$request->doctor_email;
        \Mail::to($request->doctor_email)->send(new DoctorMail($send));
        return back()->with('message_sent','Your Message has been sent successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
}
