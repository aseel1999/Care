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
    
}
