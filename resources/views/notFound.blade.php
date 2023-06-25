@extends('base')
<!-- Se você estiver usando um layout personalizado, ajuste o nome aqui -->

@section('content')
<div class=" justify-center h-screen">
    <div class="text-center">
        <img src="{{ asset('notFound.svg') }}" alt="Imagem de Página não encontrada" class="w-60 h-60 text-gray-100 mt-8 mx-auto">
        <p class="text-2xl text-gray-600">Página não encontrada</p>
        <a href="{{ route('documents.all') }}" class="mt-4 inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg">Voltar para a página inicial</a>
    </div>
</div>
@endsection
