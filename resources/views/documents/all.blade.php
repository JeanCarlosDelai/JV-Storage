@extends('base')

{{-- @section('title', 'Documentos') --}}

@section('content')
<!-- Search Input -->
<div>
    <form action="{{ route('documents.busca')}}" method="POST">
        @csrf

        <div class="flex justify-center  mt-2 mr-4">
            <div class="relative flex w-full flex-wrap items-stretch mb-3">
                <input type="search" name="busca" placeholder="Busca" class="form-input px-3 py-2 placeholder-gray-400 text-gray-700 relative bg-white rounded-lg text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                <span class="z-10 h-full leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <a href="{{ route('documents.all') }}" class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Limpar Busca</a>
            </div>
        </div>

    </form>
</div>
<!-- Listar os documentos -->
<div class="mb-5">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome do Documento</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Proprietário</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($lista as $item)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{$item['id']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{$item['nome']}}</td>
                <td>
                    <p class="font-bold text-base text-gray-400 pt-2 text-center w-24">{{$item->createByUser->name}}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
