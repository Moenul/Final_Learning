@extends('layouts.admin')

@section('content')

<h1>Posts</h1>



<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Photo</th>
        <th scope="col">Owner</th>
        <th scope="col">Category</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        {{-- <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th> --}}
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
      </tr>
    </thead>
    <tbody>
        @if ($posts)
            @foreach ($posts as $post)

            <tr>
                <th scope="row">{{$post->id}}</th>
                <td><img height="50px" src="{{ $post->photo ? $post->photo->file : '/images/DummyProfile.png' }}" alt="Empty"></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category_id}}</td>
                {{-- <td><a href="{{ route('users.edit', $user->id) }}">{{$user->name}}</a></td> --}}
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                {{-- <td>{{$user->is_active == 1 ? 'Active' : 'Not Activate'}}</td> --}}
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach
      @endif
    </tbody>
  </table>









@endsection
