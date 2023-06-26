@extends('base')

@section('content')

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<div>
    <h2 class="mb-4">Salvar Documento</h2>

    @if ($errors->any())
    <div class="bg-red-50 text-red-500 p-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('editor.save') }}" enctype="multipart/form-data">
        @csrf
        <label for="nomedata">Nome do Documento</label>
        <input type="text" name="nomedata" class="border border-gray-300 rounded-md p-2 mb-10">
        <div>
            <textarea id="summernote" name="editordata"></textarea>
        </div>
        <script>
            CKEDITOR.replace('editordata');

        </script>
        <input type="submit" value="Gravar" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </form>
</div>

@endsection
