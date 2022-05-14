<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doctors= Doctor::all();
        if($request->search){
            $users = User::where('name','=',$request->search)->latest()->paginate(5);
            }else{
            $users = User::OrderBy('created_at','desc')->paginate(5);
    
            }
        
        return view('admin.patients.index',[
            'doctors'=>$doctors,
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= User::all();
        $doctors=Doctor::all();
        return view('admin.patients.create',compact('user','doctors'));
        
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
        $name = (new User)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);
        session()->flash('success', 'New Patient Added Successfully.');
        
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.patients.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $doctors=Doctor::all();
        return view('admin.patients.edit', compact('user','doctors'));

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
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            unlink(public_path('assets/images/' . $user->image));
        }
        $data['image'] = $imageName;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }
        $user->update($data);
        session()->flash('success', 'New Patient Updated Successfully.');
        
        return redirect(route('users.index'));
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
            'email' => 'required|unique',
            'phone' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            
            'date_of_birth' => 'required',
            'blood_type'=>'required',
            'patient-diseases'=>'required',
            'patient_medicines'=>'required',

        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'phone' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            
            'date_of_birth' => 'required',
            'blood_type'=>'required',
            'patient-diseases'=>'required',
            'patient_medicines'=>'required',

            
        ]);
    }
}
