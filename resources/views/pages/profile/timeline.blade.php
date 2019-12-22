@extends('layouts.app')

@section('content')

<div class="container-fluid gedf-wrapper">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> {{ $timeline->name }}
            </li>
            @if($timeline->profile->title)
            <li class="list-group-item"> <strong>{{ $timeline->name  }}</strong> is a {{ $timeline->profile->title ?? 'not available' }} </li>
            @endif
            <li class="list-group-item"><strong>First Name:</strong> {{ $timeline->profile->fname ?? 'not available' }} </li>
            <li class="list-group-item"><strong>Last Name:</strong> {{ $timeline->profile->lname ?? 'not available' }} </li>

            <li class="list-group-item"> <strong>lives in </strong> {{ $timeline->profile->city ?? 'not available' }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $timeline->profile->address ?? 'not available' }} </li>
            <li class="list-group-item"> <strong>you're from</strong> {{ $timeline->profile->country ?? 'not available' }} </li>
            
            <li class="list-group-item"> <strong>My Info: </strong> {{ $timeline->profile->info ?? 'not available' }} </li>

          </ul>
        </div>

      </div>
    </div>
    <div class="col-md-6">      

      @if($timeline->posts->count() <= 0)
      <h3 class="text-center text-warn"> {{ $timeline->name }} has no posts yet</h3>
      @endif
      @if (session()->has('msg'))
      <div class="alert alert-success">
        <strong>{{ session()->get('msg') }}</strong> 
      </div>
      @endif
      @foreach ($timeline->posts as $post)

      <div class="card gedf-card">
        <div class="card-header">

          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">

              <div class="mr-2">
                @if($timeline->profile->image)
                <img class="rounded-circle" width="45" src="{{ url('uploads/'.$timeline->profile->image) }}">
                @else
                <img class="rounded-circle" width="45" src=" {{ url('default/default.jpg') }} ">
                @endif
              </div>
              <div class="ml-2">

                <div class="h5 m-0 "> <a href=" {{ url('user/'.$post->user->id) }} ">
                 {{ $post->user->name }}
               </a> </div>
               <small class="d-inline justify-content-start"> {{ $post->created_at->diffForHumans() }} </small>
             </div>

           </div>
           <div>

            <div class="dropdown">
              <button class="btn btn-default btn-small dropdown-toggle" type="button" data-toggle="dropdown">
                ...
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                @can('update',$post)
                <a class="dropdown-item" href=" {{ url('posts/edit/'.$post->id) }} ">Edit</a>
                @endcan

                @can('delete',$post)
                <a class="dropdown-item" data-toggle="modal" data-target="#delete{{$post->id}}" type="button">Delete</a>
                @endcan

              </div>
            </div>

            <div class="modal fade" id="delete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Are You Sure?</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>it will permanently remove this post</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="{{ url('post/delete/'.$post->id) }}">Yes,Delete</a>
                  </div>
                </div>
              </div>
            </div>

          </div> 
        </div>

      </div>
      <div class="card-body">
        
        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i></div>
        <p class="card-text">
         {{ $post->caption  }}
         @if($post->img == true)
         <img class="polaroid" height="400" width="550" src="{{ url('uploads/thumbnail/'.$post->img) }} ">
         @endif 
       </p>

     </div>
     <div class="card-footer">
      <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
      <a href=" {{ url('post/'.$post->id.'/detail') }} " class="card-link"><i class="fa fa-comment"></i> Comment </a>
      <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
    </div>


  </div>
  @endforeach 

</div>
</div>
</div>


@endsection
