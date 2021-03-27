@extends('layouts.dashboard')

@section('content')
<div class="container">
    <form action="{{ route('post.store') }}" method="post">
    @csrf 
    @method('POST')
        <div class="input-group input-group-sm mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">new title</span>
            </div>
            <label for="title"></label>
            <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">body new post</span>
            </div>
            <label for="content"></label>
            <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button type="submit" class="btn btn-success">create</button>
    </form>
</div>
@endsection