@extends('layouts.dashboard')

@section('content')

<div class="container">
    <a href="{{ route('post.create') }}">create new post</a>

</div>

<table class="table container">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">USER ID</th>
      <th scope="col">CREATED AT</th>
      <th scope="col">UPDATED AT</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->user->name }}</td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        <td><button type="button" class="btn btn-info"><a href="{{route('post.show',$post->id)}}">view</a></button></td>
        <td><button type="button" class="btn btn-warning"><a href="{{route('post.edit',$post->id)}}">edit</a></button></td>
        <td><form action="{{route('post.destroy', $post->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="sumbit" class="btn btn-danger">delete</button>
          </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection