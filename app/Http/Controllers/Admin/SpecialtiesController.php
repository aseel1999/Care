<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialtie;
use App\Models\Service;
class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties =Specialtie::get();
        $services=Service::get();
        return view('admin.specialties.index',compact('specialties','services'));
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
            'specialty' => 'required'
        ]);
        $specialties = Specialtie::create($request->all());
        return  redirect()->back()->with('message', 'Specialtie ' . $specialty->specialty . ' was created!');
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
        $this->validate($request, [
            'specialty' => 'required'
        ]);
        $specialty = Specialtie::find($id);
        $specialty->specialty = $request->specialty;
        $specialty->save();
        return redirect()->route('specialty.index')->with('message', 'Specialty was updated');
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
        return redirect()->back()->with('message', 'specialty ' . $specialty->specialty . ' was deleted!');
        
    }
}
