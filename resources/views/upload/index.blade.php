@extends('base')

@section('title', 'Adicionar novo Documento')

@section('content')

<form action="{{ route('upload.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <br>
    <br>
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" value="Adicionar Documento">

</form>
<br>
<br>
<div>
    <a href="{{ route('editor')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Adicionar Texto</a>
</div>
@endsection
