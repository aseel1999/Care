<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialtie;


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
        $doctors = Doctor::when($request->search, function ($q) use ($request) {
           
            return $q->where('doctor_name', '%' . $request->search . '%');

        })->when($request->specialty_id, function ($q) use ($request) {

            return $q->where('specialty_id', $request->specialty_id);

        })->latest()->paginate(5);
        
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
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new Doctor)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        Doctor::create($data);
        return redirect()->back()->with('message', 'Doctor added successfully');
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
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $doctor = Doctor::find($id);
        $imageName = $doctor->image;
        $doctorPassword = $doctor->password;
        if ($request->hasFile('image')) {
            $imageName = (new Doctor)->userAvatar($request);
            unlink(public_path('assets/' . $doctor->image));
        }
        $data['image'] = $imageName;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $doctorPassword;
        }
        $doctor->update($data);
        return redirect()->route('doctors.index')->with('message', 'Doctor ' . $doctor->name . ' information updated successfully');
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
    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            
            'description' => 'required'

        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,

            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            
            'description' => 'required'

        ]);
    }
    
}
