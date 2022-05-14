<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Specialtie;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $specialties = Specialtie::all();

        if($request->search){
            $services = Service::where('name','=',$request->search)->latest()->paginate(5);
            }else{
            $services = Service::OrderBy('created_at','desc')->paginate(5);
    
            }

        return view('admin.services.index',compact('specialties','services'));
    }
    public function create()
    {
        $specialties = Specialtie::all();
        return view('admin.services.create',compact('specialties'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'service' => 'required',
            'specialty_id' => 'required'
        ]);
        $services = Service::create(['name'=>$request->service,'specialties_id'=>$request->specialty_id]);
        session()->flash('success', 'New Service Added Successfully.');
        
        return redirect(route('services.index'));
        
    }
    public function edit(Service $service)
    {
        $specialties = Specialtie::all();
        return view('admin.services.edit',compact('service','specialties'));
    }
    public function update(Request $request, $id)
    {
       $validate =  $request->validate([
            'service' => 'required',
            'specialty_id'=> 'required'
        ]);
        $service = Service::find($id);

        // this name from db            this $request->service from input
        $service->name = $request->service;
        $service->specialties_id=$request->specialty_id;
        $service->save();
        session()->flash('success', ' Service updated Successfully.');
        // redirect user
        return redirect(route('services.index'));
    }
    
    

    
}
