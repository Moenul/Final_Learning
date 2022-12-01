@extends('layouts.blog-post')

@section('content')

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>
<hr>
<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
<hr>
<!-- Preview Image -->
<img class="img-responsive" src="{{ $post->photo ? $post->photo->file : '/images/DummyProfile.png' }}" alt="">
<hr>
<!-- Post Content -->
<p class="lead">{{$post->body}}<hr>

<!-- Blog Comments -->

@if (Session::has('comment_message'))
    {{ session('comment_message') }}
@endif


@if (Auth::check())


<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="form-group">
        {!! Form::label('body',' ') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

</div>

@endif


<hr>


<!-- Posted Comments -->


@if (count($comments) > 0)

@foreach ($comments as $comment)

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img height="60px" class="media-object" src="{{ Auth::user()->gravatar }}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->author }}
            <small>{{$comment->created_at->diffForHumans()}}</small>
        </h4>
        {{ $comment->body }}



        @if (count($comment->comment_replies) > 0)
            @foreach ($comment->comment_replies as $reply)

            @if ($reply->is_active == 1)
        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64px" class="media-object" src="{{ $reply->photo }}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $reply->author }}
                    <small>{{$reply->created_at->diffForHumans()}}</small>
                </h4>
                {{ $reply->body }}
            </div>
        </div>
        <!-- End Nested Comment -->
            @endif

            @endforeach

        @endif

        <div class="comment-reply-container">

        <button class="toggle-reply btn btn-primary pull-right">Reply</button>

        <div class="comment-reply col-sm-8">
            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

            <input type="hidden" name="comment_id" value="{{$comment->id}}">
            <div class="form-group">
                {!! Form::label('body',' ') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>

@section('script')

<script>
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle('slow');
    });

</script>

@endsection






    </div>
</div>

@endforeach

@endif


@endsection
