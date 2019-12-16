<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Post;
use Auth;
//use Carbon\Carbon;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class PostController extends Controller
{
    
    public function index(Request $request)
    {
        if (Auth::check()) {
            $users = auth()->user()->following()->pluck('profiles.user_id');
            $posts = Post::with('user')->latest()->get();
            //$posts = Post::with('user')->latest()->paginate($this->posts_per_page);
            $posts = Post::whereIn('user_id',$users)->latest()->get();
            //$followusers = User::all();
            //$followusers=Profile::whereIn('id',$users)->with('user')->get();
            $followusers = Profile::whereNotIn('id',$users)->with('user')->get();
            return view('pages.posts.show',compact('posts','followusers'));
        }
        else {

            $posts = Post::with('user')->latest()->get();
            return view('pages.posts.show',compact('posts'));
        }
        

    }

    public function store(Request $request)
    {
    
        $data = $request->validate([

            'caption' => 'required',
            'image' => 'image'
        ]);

        //auth()->user()->posts()->create($data);

        $originalImage=request('image');
        $name=$originalImage->getClientOriginalName();
        $extension=$originalImage->getClientOriginalExtension();
       
        $name=time(); 
     
        $fullname=$name.'.'.$extension;
        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path().'/uploads/thumbnail/';
       
        $thumbnailImage->save($originalPath.$fullname);
        $thumbnailImage->resize(400,400);
        auth()->user()->posts()->create([
          'caption'=> $data['caption'],
          'img'=> $fullname
        ]);

        return redirect('posts');
    }


    public function edit($id)
    {
    	$post = Post::find($id);
    	return view('pages.posts.edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
    	$obj = Post::find($id);
    	$obj->caption = $request->caption;
    	$obj->save();
    	return redirect('posts');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('posts');
    }


    public function detail($id)
    {
        $post = Post::find($id);
        return view('pages.posts.post_detail',compact('post'));
    }

   
}
