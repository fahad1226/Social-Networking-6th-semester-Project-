
{{-- @foreach ($users->posts as $post)  --}}

@foreach ($posts as $post)

<div class="card gedf-card">
    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">

                <div class="mr-2">
                    <img class="rounded-circle" width="45" src="{{ url('uploads/'.$post->user->profile->image) }} "  alt="">
                </div>
                <div class="ml-2">

                    <div class="h5 m-0"> <a style="text-decoration:none;" href=" {{ url('user/'.$post->user->id) }} ">

                     {{ $post->user->name }}
                 </a> 

                 
             </div> 
             <small class="d-inline justify-content-start"> {{ $post->created_at->diffForHumans() }} </small>
         </div>

     </div>
            
        </div>

    </div>
    <div class="card-body">


        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>  </div>

        <div>
        <a style="text-decoration:none;" class="text-secondary" href="{{ url('post/'.$post->id.'/detail') }}">
           <p class="card-text">
           {{ $post->caption  }}
        </p>

        @if($post->img == true)

        <img class="polaroid" height="400" width="550" src="{{ url('uploads/thumbnail/'.$post->img) }} ">

        @endif 
        </a>
        

   </div>


</div>
<div class="card-footer">
    <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
    <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment {{ $post->comments->count() }} </a>
    <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
</div>


</div>

@endforeach 

<div >
   {{ $posts->links() }}
</div>

