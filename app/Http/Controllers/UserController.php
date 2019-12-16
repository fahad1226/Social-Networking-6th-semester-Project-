<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function timeline($id)
    {
        $timeline = User::find($id);
        return view('pages.profile.timeline',compact('timeline'));
    }

   
}
