@extends('layouts.admin')

@section('content')

<h1>Comments</h1>

@if ($comments)
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

            @foreach ($comments as $comment)
            <tr>
                <td scope="row">{{$comment->id}}</td>
                <td scope="row">{{$comment->author}}</td>
                <td scope="row">{{$comment->email}}</td>
                <td scope="row">{{$comment->body}}</td>
                <th scope="row"><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></th>
                <td scope="row">
                @if ($comment->is_active == 1)

                    {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}
                    <input type="hidden" name="is_active" value="0">
                    <div class='form-group'>
                    {!! Form::submit('Un-approve', ['class'=>'btn btn-warning']) !!}
                    </div>
                    {!! Form::close() !!}

                @else

                    {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}
                    <input type="hidden" name="is_active" value="1">
                    <div class='form-group'>
                    {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}


                @endif
                </td>

                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}
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

<h1 class="text-center">No Comments Here</h1>

@endif


@endsection
