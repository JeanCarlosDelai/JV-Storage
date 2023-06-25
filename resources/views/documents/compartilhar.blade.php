@extends('base')

@section('title', 'Compartilhar Documento')

@section('content')
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
    <h3>Permissões:</h3>
    <br>
    <div class="form-group">
        <select name="permissao" id="permissao" class="form-control">
            <option value="visualizar">Visualizar</option>
            <option value="editar">Visualizar e Editar</option>
            <option value="editarExcluir">Visualizar e Editar e Excluir</option>
        </select>
    </div>
    <br>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Compartilhar</button>
</form>
@endsection
