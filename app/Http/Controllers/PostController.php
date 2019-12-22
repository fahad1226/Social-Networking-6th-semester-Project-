<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Post;
use Auth;
use App\Comment;
//use Carbon\Carbon;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class PostController extends Controller
{
    
    public function index(Request $request)
    {
        if (Auth::check()) {
            $users = auth()->user()->following()->pluck('profiles.user_id');
            //$posts = Post::with('user')->latest()->paginate(10);
            //$posts = Post::with('user')->latest()->paginate($this->posts_per_page);
            $posts = Post::whereIn('user_id',$users)->latest()->paginate(10);
            //$followusers = User::all();
            //$friends = Profile::whereIn('id',$users)->with('user')->get();
            $followusers = Profile::whereNotIn('id',$users)->with('user')->get()->except(auth()->user()->id);
            return view('pages.posts.show',compact('posts','followusers'));
        }
        else {

            $posts = Post::with('user')->latest()->paginate(7);
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

        return redirect('posts')->with('msg','Post Uploaded Successfully');
    }


    public function edit($id)
    {
    	$post = Post::find($id);
        $this->authorize('update',$post);
    	return view('pages.posts.edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
    	$obj = Post::find($id);
    	$obj->caption = $request->caption;
    	$obj->save();
    	return redirect('user/'.auth()->user()->id.'/timeline')->with('msg','Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('delete',$post);
        $post->delete();
        return redirect('user/'.auth()->user()->id.'/timeline');
    }


    public function detail($id)
    {
        $post = Post::find($id);
        return view('pages.posts.post_detail',compact('post'));
    }


    public function storeComment(Request $request,$id)
    {
        Comment::create([

            'body' => request('body'),
            'post_id' => $id,
            'user_id' => auth()->user()->id

        ]);

        return back();
    }

    public function friends($id)
    {
        $user = User::find($id);
        $users = $user->following()->pluck('profiles.user_id');
        $friends = Profile::whereIn('id',$users)->with('user')->get();
        return view('pages.profile.layouts.friends',compact('friends'));
    }

   
}
