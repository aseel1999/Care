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
    public function index()
    {
        //select doctors.*,parents.name as parent_name from doctors inner join doctors as parents
        //on parents.id=doctors.parent_id where status='active' orderBy created_At DESC,name ASC
        // return a collection of Doctor model object
       /* $entries3=Doctor::join('doctors as parents','parents.id','=','doctors.parent_id')
       ->select([
           'categories.*,
           'parents.name as parent_name's
       ])
        ->where('doctors.status','=','active')
        ->orderBy('doctors.created_At','DESC')
        ->orderBy('doctors.name','ASC')
        ->get(); dd()*/
       $doctors=Doctor::get();
       return view('admin.doctors.index', compact('doctors'));
      /* $entries1=Doctor::whrer('status','=','add')
       ->orderBy('name','ASC')->get();*/
       //$entries2=DB::table('doctors')->where('status','=','active')->orderBy('created_At','DESC')->orderBy('name','ASC')->get();

       
       
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
    public function edit($id)
    {
        $doctor = Doctor::find($id);
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
            $data['password'] = $userPassword;
        }
        $user->update($data);
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
            'role_id' => 'required',
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
            'role_id' => 'required',
            'description' => 'required'

        ]);
    }
    
}
