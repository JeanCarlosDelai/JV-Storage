@extends('base')

@section('title', 'Usuários')

@section('content')

    <form action="{{ route('user.create')}}"
    method="post">
    
    @csrf

    <input type="text" name="name" placeholder="Username" class="mb-2">

    <br>

    <input type="password" name="password" placeholder="Password" class="mb-2">

    <br>

    <input type="email" name="email" placeholder="E-mail" class="mb-2">

    <br>

    <input type="submit" value="Gravar" class="mb-2 bg-green-500 p-2 rounded-lg cursor-pointer">
    </form>
@endsection