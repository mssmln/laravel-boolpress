@extends('layouts.dashboard')

@section('content')
<table class="table container">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">USER ID</th>
      <th scope="col">BODY</th>
      <th scope="col">CREATED AT</th>
      <th scope="col">UPDATED AT</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">{{ $posts->id }}</th>
        <td>{{ $posts->title }}</td>
        <td>{{ $posts->user->name }}</td>
        <td>{{ $posts->content }}</td>
        <td>{{ $posts->created_at }}</td>
        <td>{{ $posts->updated_at }}</td>
        <td><button type="button" class="btn btn-warning">edit</button></td>
        <td><button type="button" class="btn btn-danger">delete</button></td>
    </tr>
  </tbody>
</table>
@endsection