@extends('base')

@section('title', 'Adicionar novo Documento')

@section('content')


<form action="{{ route('upload.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
        <table class="min-w-full divide-y divide-purple-300 bg-purple-200 text-center border border-purple-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Adicionar novo Upload</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300 "> <input type="file" name="file"></td>
                </tr>
                <tr>
                    <td class="px-6 whitespace-no-wrap text-sm leading-5 border border-purple-300 "><input type="submit" value="Adicionar Upload" class="mt-4 mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"></td>
            </tbody>
        </table>
    </div>
</form>

<div class="mb-5">
    <table class="min-w-full divide-y divide-purple-300 bg-purple-200 text-center border border-purple-300">
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs leading-4 font-medium text-purple-500 uppercase tracking-wider text-center border border-purple-300">Adicionar novo texto</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 border border-purple-300 "><a href="{{ route('editor')}}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Adicionar Texto</a></td>
        </tbody>
    </table>
</div>

@endsection
