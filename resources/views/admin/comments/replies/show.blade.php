@extends('layouts.admin')

@section('content')

<h1>Comment Replies</h1>

@if ($replies)
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Author</th>
        <th scope="col">Email</th>
        <th scope="col">Body</th>
        <th scope="col">Post Link</th>
        <th scope="col">Status</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

            @foreach ($replies as $reply)
            <tr>
                <td scope="row">{{$reply->id}}</td>
                <td scope="row">{{$reply->author}}</td>
                <td scope="row">{{$reply->email}}</td>
                <td scope="row">{{$reply->body}}</td>
                {{-- <th scope="row"><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></th> --}}
                <td scope="row">
                @if ($reply->is_active == 1)

                    {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                    <input type="hidden" name="is_active" value="0">
                    <div class='form-group'>
                    {!! Form::submit('Un-approve', ['class'=>'btn btn-warning']) !!}
                    </div>
                    {!! Form::close() !!}

                @else

                    {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                    <input type="hidden" name="is_active" value="1">
                    <div class='form-group'>
                    {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}


                @endif
                </td>

                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                    <div class='form-group'>
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach
    </tbody>
</table>
@else

<h1 class="text-center">No Replies Here</h1>

@endif

@endsection
