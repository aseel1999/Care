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

        $services = Service::when($request->search, function ($q) use ($request) {

            return $q->where('name', '%' . $request->search . '%');

        })->when($request->specialties_id, function ($q) use ($request) {

            return $q->where('specialties_id', $request->specialties_id);

        })->latest()->paginate(5);

        return view('admin.services.index',compact('specialties','services'));
    }
    public function create()
    {
        $specialties = Specialtie::all();
        return view('admin.services.create',compact('specialties'));
    }
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new Specialtie)->userAvatar($request);
        $data['image'] = $name;
        Service::create($data);
        return redirect()->back()->with('message', 'Service added successfully');
    }
    public function edit(Service $service)
    {
        $specialties = Specialtie::all();
        return view('admin.services.edit',compact('service','specialties'));
    }
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $service = Service::findOrFail($id);
        $serviceName = $service->name;
        $service->update($data);
        return redirect()->route('services.index')->with('message', 'Service ' . $service->name. ' information updated successfully');
    }
    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'specialties_id'=>'required'

        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'specialties_id'=>'required'

        ]);
    }

    
}
