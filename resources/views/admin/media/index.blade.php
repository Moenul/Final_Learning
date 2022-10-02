@extends('layouts.admin')

@section('content')
    <h1>Media</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if ($photos)
                @foreach ($photos as $photo)

                <tr>
                    <th scope="row">{{$photo->id}}</th>
                    <td><img height="50px" src="{{$photo->file}}" alt=""></td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date' }}</td>
                    <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                    {!! Form::close() !!}

                    </td>
                </tr>

                @endforeach
          @endif
        </tbody>
    </table>

@endsection
