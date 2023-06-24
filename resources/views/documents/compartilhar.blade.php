@extends('base')

@section('title', 'Compartilhar Documento')

@section('content')
<h1>Compartilhar Documento</h1>
<br>
<h3>Usuários:</h3>
<br>
<form action="{{ route('documents.compartilhar.gravar', $document) }}" method="POST">
    @csrf

    <div>
        <select name="usuarios[]" id="usuarios" multiple>
            @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Compartilhar</button>
</form>
@endsection
