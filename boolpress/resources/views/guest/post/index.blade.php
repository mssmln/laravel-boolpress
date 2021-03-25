@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    @foreach($posts as $post)
        <div class="card">
        <div class="card-header">
            {{ $post->user->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('guest.post.show' , $post->slug) }}" class="btn btn-primary">detailed post</a>
        </div>
        </div>
    @endforeach
</div>
@endsection