@extends('base')

{{-- @section('title', 'Documentos') --}}

@section('content')
@if ($lista->isEmpty())
<h1>Sem documentos, adicione algum documento para começar!</h1>
<a href="{{ route('upload')}}" class="inline-block right-0 align-baseline font-bold text-sm text-green-600 hover:text-green-900">Adicionar Documento</a>
@else
<div class="mb-5">
    <h1 class="mt-2 mb-2 inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-purple-700">Meus Documentos</h1>
    <table class="min-w-full divide-y divide-purple-300 bg-purple-200 text-center border border-purple-300">
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">ID</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Nome do Documento</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Editar</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Excluir</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Compartilhar</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Data de Upload/Criação</th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Data de Atualização</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($lista as $item)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300 ">{{$item['id']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">{{$item['nome']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">
                    @if ($item['is_rich_text'])
                    @php
                    $permissaoUsuario = $item->users()->where('user_id', Auth::id())->value('permissao');
                    $eCriador = ($item['createby'] === Auth::id());
                    @endphp
                    <a href="{{ route('documents.editar', $item['id']) }}" class="inline-block right-0 align-baseline font-bold text-sm text-green-700 hover:text-purple-700">Editar</a></td>
                @endif
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300"><a href="{{ route('documents.apagar', $item['id']) }}" class="inline-block right-0 align-baseline font-bold text-sm text-red-700 hover:text-purple-700">Excluir</a></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300"><a href="{{ route('documents.compartilhar', $item['id']) }}" class="inline-block right-0 align-baseline font-bold text-sm text-yellow-700 hover:text-purple-700">Compartilhar</a></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">{{$item['created_at']}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">{{$item['updated_at']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
