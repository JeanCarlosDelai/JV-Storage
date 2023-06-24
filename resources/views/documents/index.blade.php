@extends('base')

@section('title', 'Documentos')

@section('content')
<div class="mb-5">Documentos</div>

<!-- Listar os documentos -->
<div class="mb-5">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Documento</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ação</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">CRIADOR</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Vinculado</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($lista as $item)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{$item['id']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{$item['nome']}}</td>
                <td>
                    <form action="{{ route('documents.apagar', $item['id']) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Excluir</button>
                    </form>
                    <a href="{{ route('documents.compartilhar', $item['id']) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Compartilhar</a>
                    @if ($item['is_rich_text'])
                    <a href="{{ route('documents.editar', $item['id']) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                    @endif

                </td>
                <td>
                    <p class="font-bold text-base text-gray-400 pt-2 text-center w-24">{{$item->createByUser->name}}</p>
                    </p>
                    {{-- <p class="font-bold text-base text-gray-400 pt-2 text-center w-24">{{$user['nome']}}</p> --}}
                </td>
                <td>
                    @foreach ($item->users as $user)
                    <p class="font-bold text-base text-gray-400 pt-2 text-center w-24">{{ $user->name }}</p>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div>
    <a href="{{ route('editor')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Adicionar Texto</a>
</div>
@endsection
