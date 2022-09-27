@extends('layouts.admin')

@section('content')

<h1>Edit Post</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div>
        <img width="80px" src="{{ $post->photo->file }}" alt="">
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Content:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}


    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}



    @include('includes.form_error')








@endsection
