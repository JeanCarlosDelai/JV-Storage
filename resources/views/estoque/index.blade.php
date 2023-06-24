{{-- resources/views/estoque/index.blade.php --}}
@extends('base')

@section('title', 'Estoque')

@section('content')
<div class="mb-5">Index do estoque</div>



<!-- Listar os produtos em estoque -->
<div class="mb-5">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($lista as $item)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{$item['id']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5"><a href="{{route('estoque.editar', $item['id'])}}">{{$item['nome']}}</a></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{$item['quantidade']}}</td>
                <td><a href="{{route('estoque.apagar', $item['id'])}}" class="inline-flex items-center gap-1.5 rounded-lg border border-red-500 bg-red-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-red-700 hover:bg-red-700 focus:ring focus:ring-red-200 disabled:cursor-not-allowed disabled:border-red-300 disabled:bg-red-300">EXCLUIR</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div><a href="{{ route('estoque.adicionar')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Adicionar item</a></div>

@endsection