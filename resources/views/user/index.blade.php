@extends('base')

@section('title', 'Usuários')

@section('content')
<p>Página de usuários</p>

<a href="{{ route('user.create')}}">Adicionar Usuário</a>
@endsection