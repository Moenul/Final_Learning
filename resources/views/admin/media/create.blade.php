@extends('layouts.admin')

@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

@endsection


@section('content')

<h1>Upload Media</h1>

<div class="col-sm-6">

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}


    {!! Form::close() !!}

</div>
<div class="col-sm-6"></div>


@endsection


@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

@endsection
