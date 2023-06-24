@extends('base')

@section('title', 'Login')

@section('content')

    <form action="{{ route('user.login')}}"
    method="post">
    
    @csrf

    <input type="text" name="name" placeholder="Username" class="mb-2">

    <br>

    <input type="password" name="password" placeholder="Password" class="mb-2">

    <br>

  

    <input type="submit" value="Acessar" class="mb-2 bg-green-500 p-2 rounded-lg cursor-pointer">
    </form>
@endsection