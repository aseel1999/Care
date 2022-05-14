<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialtie;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $specialties = Specialtie::where('specialty','=',$request->search)->latest()->paginate(5);
            }else{
            $specialties = Specialtie::OrderBy('created_at','desc')->paginate(5);
    
            }
        return view('admin.specialties.index',compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'specialty' => 'required',
            'image' => 'required'
        ]);
        $specialties = Specialtie::create(['specialty'=>$request->specialty,'image_path'=>$request->image]);
        session()->flash('success', 'New Specialty Added Successfully.');
        
        return redirect(route('specialties.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialty =Specialtie::find($id);
        return view('admin.specialties.edit', compact('specialty'));
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
        $validate=$request->validate([
            'specialty' => 'required',
            'image'=> 'required'
        ]);
        $specialty = Specialtie::find($id);
        $specialty->specialty = $request->specialty;
        $specialty->image_path=$request->image;
        $specialty->save();
        session()->flash('success', ' Specialty updated Successfully.');
        // redirect user
        return redirect(route('specialties.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialty = Specialtie::find($id);
        $specialty->delete();
        session()->flash('success', ' Specialty Deleted Successfully.');
        // redirect user
        return redirect(route('specialties.index'));
        
    }
}
