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
        <th scope="col">Post Link</th>
        <th scope="col">Comments</th>
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
                <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                <td><a href="{{ route('posts.edit', $post->id) }}">{{ Str::limit($post->title, 25 )}}</a></td>
                <td><a href="{{ route('home.post', $post->slug) }}">View Post</a></td>
                <td><a href="{{ url('/admin/comments', $post->id) }}">View Comments</a></td>
                {{-- <td>{{$user->is_active == 1 ? 'Active' : 'Not Activate'}}</td> --}}
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach
      @endif
    </tbody>
  </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $posts->render()}}
        </div>
    </div>





@endsection
