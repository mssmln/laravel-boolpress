@extends('layouts.dashboard')

@section('content')
<div class="container">
    <form action="{{ route('post.update', $posts->id) }}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
            <div class="input-group input-group-sm mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">new title</span>
                </div>
                <label for="title"></label>
                <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{$posts->title}}">
            </div>
            <!-- vecchia img caricata -->
            @if($posts->cover)
                <p>immagine inserita</p>
                <img src="{{asset('storage/'.$posts->cover)}}" alt="{{$posts->title}}">
            @else
                <p>nessuna immagine</p>
            @endif
            <!-- /vecchia img caricata -->
            <!-- upload an img file  -->
            <div class="form-group">
                <label for="img">edit img</label>
                <input type="file" class="form-control-file" id="img" name="image">
            </div>
            <!-- / upload an img file  -->
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">body new post</span>
                </div>
                <label for="content"></label>
                <textarea name="content" class="form-control" aria-label="With textarea" >{{$posts->content}}</textarea>
            </div>
            <!-- area dei tag  -->
            @foreach($tag as $tag)
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tags[]" value="{{$tag->id}}" {{$posts->tags->contains($tag->id) ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleCheck1">{{$tag->name}}</label>
            </div>
            @endforeach
            <!-- / area dei tag  -->
            <button type="submit" class="btn btn-success">update</button>
    </form>
</div>
@endsection