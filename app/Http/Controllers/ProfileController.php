<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timeline()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        $user = User::find($id);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id):false;
        return view('pages.profile.user_profile',compact('profile','follows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $profile = Profile::find($id);
        $this->authorize('update',$profile);
        return view('pages.profile.edit_profile',compact('profile'));
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

       $profile = Profile::find($id);
       $data = $request->validate([

            'title'         => '',
            'description'   => '',
            'image'         => '',
            'fname'         => 'required',
            'lname'         => 'required',
            'address'       => '',
            'city'          => '',
            'country'       => '',
            'info'          => ''
        ]);
      
       
       auth()->user()->profile->update($data);

       if (request('image')){
          
            $originalImage = request('image');
            $name=$originalImage->getClientOriginalName();
            $extension=$originalImage->getClientOriginalExtension();
           
            $name=time(); 
         
            $fullname=$name.'.'.$extension;
            $thumbnailImage = Image::make($originalImage);
            $originalPath = public_path().'/uploads/';
            $image=Image::make($originalImage)->fit(1000,1000);
            $image->save($originalPath.$fullname);
            auth()->user()->profile->update(['image'=>$fullname]);
          } 

        return redirect('user/'.auth()->user()->id);

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
}
