@extends('layouts.app')

@section('title','pagina dei contatti')

@section('content')
<div class="container">
    <!-- controllo invio email -->
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @else
        {{session('sth is wrong')}}
    @endif
    <!-- /controllo invio email -->


    <h1>reach out to us!</h1>
    <form action="{{route('guest.contact.sent')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="form-group">
            <label for="text">type sth down</label>
            <textarea class="form-control" id="text" rows="3" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection