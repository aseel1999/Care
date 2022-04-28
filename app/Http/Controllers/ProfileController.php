<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user=User::findOrFail($id);
  
        return view('admin.profiles.index',compact('user'));
    }
    //update
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'social_status' => 'required',
            'blood_type'=>'required'
        ]);
        User::where('id', auth()->user->id)
            ->update($request->except('_token'));
        return redirect()->back()->with('message', 'Your profile was updated!');
    }
    // Update photo
    public function profilePic(Request $request)
    {
        $this->validate($request, ['file' => 'required|image|mimes:jpeg,jpg,png']);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/profile');
            $image->move($destination, $name);

            $user = User::where('id',auth()->user->id)->update(['image' => $name]);

            return redirect()->back()->with('message', 'profile updated');
        }
    }
}
