{{-- resources/views/estoque/adicionar.blade.php --}}
@extends('base')
@section('title', 'Estoque')

@section('content')

<h2>Adicionar item no estoque</h2>

@if ($errors->any())
<div class="bg-red-50 text-red-500 p-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mx-auto max-w-xl">
    <form action="{{ route('estoque.adicionar') }}" method="post" class="space-y-5">

        @if (isset($editar))
        @method('put')
        <input type="hidden" name="id" value="{{ $editar->id }}">
        @endif

        @csrf
        <div>
            <label for="nome" class="mb-1 block text-sm font-medium text-gray-700">Nome do produto</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $editar->nome ?? '') }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Nome do produto" />
        </div>

        <div>
            <label for="quantidade" class="mb-1 block text-sm font-medium text-gray-700">Quantidade do produto</label>
            <input type="number" id="quantidade" value="{{ old('quantidade', $editar->quantidade ?? '') }}" name="quantidade" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Quantidade do produto" />
        </div>

        <button type="submit" class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-primary-700 hover:bg-primary-700 focus:ring focus:ring-primary-200 disabled:cursor-not-allowed disabled:border-primary-300 disabled:bg-primary-300">Gravar item</button>
    </form>
</div>


@endsection
