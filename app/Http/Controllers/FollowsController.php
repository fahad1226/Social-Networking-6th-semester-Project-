<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class FollowsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


    public function store(User $user)
    {
    	return auth()->user()->following()->toggle($user->profile);
    }
    

    public function logout()
    {
    	Session::flush();
    	return redirect('login');
    }

}
