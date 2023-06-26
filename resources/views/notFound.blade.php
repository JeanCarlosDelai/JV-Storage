@extends('base')
<!-- Se você estiver usando um layout personalizado, ajuste o nome aqui -->

@section('content')
<div class=" justify-center h-screen">
    <div class="text-center">
        <img src="{{ asset('notFound.svg') }}" alt="Imagem de Página não encontrada" class="w-60 h-60 text-gray-100 mt-8 mx-auto">
        <p class="mb-4 text-2xl text-gray-600">Página não encontrada</p>
        <a href="{{ route('documents.todos') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Voltar para a página inicial</a>
    </div>
</div>
@endsection
