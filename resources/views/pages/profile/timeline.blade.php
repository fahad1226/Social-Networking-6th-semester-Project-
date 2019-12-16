@extends('layouts.app')

@section('content')

<div class="container-fluid gedf-wrapper">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="h5">@LeeCross</div>
          <div class="h7 text-muted">Fullname : Miracles Lee Cross</div>
          <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
            etc.
          </div>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="h6 text-muted">Followers</div>
            <div class="h5">5.2342</div>
          </li>
          <li class="list-group-item">
            <div class="h6 text-muted">Following</div>
            <div class="h5">6758</div>
          </li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div>
    <div class="col-md-6">      



      @foreach ($timeline->posts as $post)

      <div class="card gedf-card">
        <div class="card-header">

          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">

              <div class="mr-2">
                <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
              </div>
              <div class="ml-2">

                <div class="h5 m-0 "> <a href=" {{ url('user/'.$post->user->id) }} ">
                 {{ $post->user->name }}
               </a> </div>
               <small class="d-inline justify-content-start"> {{ $post->created_at }} </small>
             </div>

           </div>
           <div>
            <div class="dropdown">
              <button class="btn btn-default btn-small dropdown-toggle" type="button" data-toggle="dropdown">
                ...
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                <a class="dropdown-item" href=" {{ url('posts/edit/'.$post->id) }} ">Edit</a>
                <a class="dropdown-item" type="button" onclick="return confirm('are you sure?')" href="{{ url('post/delete/'.$post->id) }} ">Delete</a>
              </div>
            </div>      

          </div> 
        </div>

      </div>
      <div class="card-body">


        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>  </div>
        <p class="card-text">
         {{ $post->caption  }}
       </p>


     </div>
     <div class="card-footer">
      <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
      <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
      <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
    </div>


  </div>
  @endforeach 

</div>
</div>
</div>


@endsection
