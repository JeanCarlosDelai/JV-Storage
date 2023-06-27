@extends('base')

{{-- @section('title', 'Documentos') --}}

@section('content')
<!-- Search Input -->
<div>
    <form action="{{ route('documents.busca')}}" method="POST">
        @csrf

        <div class="flex justify-center mt-2 mr-4">
            <div class="relative flex w-full flex-wrap items-stretch mb-3">
                <label class="mt-2 inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-purple-700">Busca por documentos cadastrados no sistema</label>
                <input type="search" name="busca" placeholder="Digite aqui sua busca" class="mt-2 form-input px-3 py-2 placeholder-gray-400 text-black-700 relative bg-white rounded-lg text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                <label class="mt-2 inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-purple-700" for="busca">Filtros</label>
                <select name="filtro" class="mt-2 form-select px-3 py-2 placeholder-gray-400 text-gray-700 relative bg-white rounded-lg text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full">
                    <option value="nome">Nome</option>
                    <option value="created_at">Data de Criação</option>
                    <option value="users">Proprietário</option>
                </select>
                <button type="submit" class="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Pesquisar</button>

                <a href="{{ route('documents.todos') }}" class="mt-4 mx-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Limpar Busca</a>
            </div>
        </div>

    </form>
</div>
<!-- Listar os documentos -->
<div class="mb-5">

    <table class="min-w-full divide-y divide-purple-300 bg-purple-200 text-center border border-purple-300">
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">ID</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Nome do Documento</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Proprietário</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Data de Upload/Criação</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Data de Atualização</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($lista as $item)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300 ">{{$item['id']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">{{$item['nome']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">{{$item->createByUser->name}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">{{$item['created_at']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">{{$item['updated_at']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
