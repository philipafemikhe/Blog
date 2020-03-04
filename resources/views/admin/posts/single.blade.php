@extends('layouts.app')

@section('content')
    <div class="col-md-12">

        <h1>{{ $post->title}}</h1>
        <h3>Category: {{ $category->name }}</h3>
        <img src="{{ asset($post->featured) }}" alt="img" class="img-responsive" style="width:50%; height:auto">
        <p>
            {{ $post->content }}
        </p>


         <span><img src="{{ asset($profile->avatar) }}" width="30px" height="auto" style="border-radius: 50%"> <b>{{ $user->name }} : {{ $post->created_at->diffForHumans() }}</b> </span>
         <br>
          <!-- Go to www.addthis.com/dashboard to customize your tools --> 
            <div class="addthis_inline_share_toolbox"><b>Share post</b></div>
         <hr>

         <div class="panel default-panel" style="border:thin solid #ededed; background-color: #fafafc; padding: 1em">
            @if($replies)
                <h3 style="margin-bottom: 1em"><u>Comments:</u>( {{ $replies->count() }} )</h3>
                @foreach($replies as $reply)
                    <div class="panel-default" style="border:thin dotted #333; border-radius: 15px; padding: 0.5em"> 
                        <span><img src="{{ asset($reply->user->profile->avatar)}}" width="25px" height="auto" style="border-radius: 50%"><b>{{ $reply->user->name }}</b></span> <br>
                        {{ $reply->content }} <br>
                       
                        @if($reply->is_liked_by_auth_user($reply->id))
                            <a href="{{ route('reply.unlike', ['id'=>$reply->id]) }}" class="btn btn-danger btn-xs">Unlike<span class="badge">{{ $reply->likes->count() }}</span></a>
                        @else
                            <a href="{{ route('reply.like', ['id'=>$reply->id]) }}" class="btn btn-primary btn-xs">Like <span class="badge">{{ $reply->likes->count() }}</span></a>
                        @endif


                    </div>
                    <hr>
                @endforeach
            @endif
         </div>


         <hr>
         <div class="panel panel-default">
            <form action="{{ route('post.reply',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
             <div class="form-group">
                 <label for="content">Leave a Comment</label>
                 <textarea class="form-control" name="content" id="content" rows="5" cols="30"></textarea>
             </div>

             <div class="form-group">
                 <input type="submit" value="Submit">
             </div>
         </form>
         </div>



        <div class="row" style="margin-bottom: 2em">
            @if($previous)
                <div class="col-md-6" style="text-align:left">
                    <a href="{{ route('post.single', ['id'=> $previous->id]) }}" class="btn btn-primary btn-sm"> <--Previous Post</a>
                </div>
            @endif

             @if($next)
                <div class="col-md-6" style="text-align:left">
                    <a href="{{ route('post.single', ['id'=> $next->id]) }}" class="btn btn-primary btn-sm">Next Post--> </a>
                </div>
            @endif
            <a href="{{ route('post.viewPDF') }}">view</a><br>
            <a href="{{ route('post.downloadPDF') }}">Download as PDF</a>
        </div>
    </div>
@stop