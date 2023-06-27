@extends('base')

@section('content')


<h3 class="mt-2 mb-2 right-0 align-baseline font-bold text-sm text-500 ">Compartilhar Documentos para Usuários:</h3>
<form action="{{ route('documents.compartilhar.gravar', $document) }}" method="POST">
    @csrf
    <div class="mb-5">
        <table class="min-w-full divide-y divide-purple-300 bg-purple-200 text-center border border-purple-300">
            <thead>
                <tr>
                    <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Selecionar Usuário ou Usuários</th>
                    <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Selecionar Permissão</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>

                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300 ">
                        @foreach ($usuarios as $usuario)
                        <div>
                            <label for="usuario_{{ $usuario->id }}">{{ $usuario->name }}</label>
                            <input type="checkbox" name="usuarios[]" id="usuario_{{ $usuario->id }}" value="{{ $usuario->id }}">
                        </div>
                        @endforeach
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">
                        <select name="permissao" id="permissao" class="form-select bg-gray-200 border-gray-300">
                            <option value="visualizar">Visualizar</option>
                            <option value="editar">Visualizar e Editar</option>
                            <option value="editarExcluir">Visualizar, Editar e Excluir</option>
                        </select>
                        <button class="bg-yellow-700 hover:bg-yellow-900 text-white font-bold py-2 px-4 rounded" type="submit">Compartilhar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <h3 class="mt-4 mb-2 right-0 align-baseline font-bold text-sm text-500">Usuários que já tem permissão sobre este documento</h3>


    <table class="min-w-full divide-y divide-purple-300 bg-purple-200 text-center border border-purple-300">
        <thead>
            <tr>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 tracking-wider text-center border border-purple-300">Usuários</strong></th>
                <th class="px-6 py-3  text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Permissõeos</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($document->users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">
                    <h3 class="mb-2 right-0 align-baseline font-bold text-sm text-500">{{ $user->name }}</h3>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">
                    <h3 class="mb-2 right-0 align-baseline font-bold text-sm text-500">
                        @if ($user->pivot->permissao === 'visualizar')
                        Visualizar
                        @elseif ($user->pivot->permissao === 'editar')
                        Visualizar e Editar
                        @elseif ($user->pivot->permissao === 'editarExcluir')
                        Visualizar, Editar e Excluir
                        @else
                        Sem permissão
                        @endif
                    </h3>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300">
                    <a href="{{ route('documents.removerPermissao', [$document, $user]) }}" class="inline-block right-0 align-baseline font-bold text-sm text-red-700 hover:text-purple-700">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>
@endsection
