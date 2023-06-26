@extends('base')

@section('content')

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<h2 class="mb-4">Editar Documento</h2>

@if ($errors->any())
<div class="bg-red-50 text-red-500 p-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('documents.editar', $documento->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $documento->id }}">
    <label for="nomedata">Nome do Documento</label>
    <input type="text" name="nome" value="{{ $documento->nome }}                                                                                                                                                                                                                                                                                                                                                                                                                                        " class="border border-gray-300 rounded-md p-2 mb-10">
    <div>
        <textarea id="editordata" name="editordata">{{ $documento->conteudo }}</textarea>
    </div>
    <script>
        CKEDITOR.replace('editordata');

    </script>
    <input type="submit" value="Gravar" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
</form>

@endsection
