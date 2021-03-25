@extends('layouts.app')

@section('content')
<div class="container">
    <h1>detailed post</h1>
    <div class="card">
        <div class="card-header">
            {{ $posts->user->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $posts->title }}</h5>
            <p class="card-text">{{ $posts->content }}</p>
        </div>
    </div>
</div>
@endsection