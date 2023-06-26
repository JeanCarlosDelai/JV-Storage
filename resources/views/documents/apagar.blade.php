{{-- resources/views/estoque/apagar.blade.php --}}
@extends('base')

@section('content')
<p class="mt-2 inline-block right-0 align-baseline text-sm text-500">Tem certexa que deseja apagar</p>
<div>

    <p class="mt-2 inline-block right-0 align-baseline text-sm text-500">Você está prestes a apagar o documento: <strong>{{$document['nome']}}</strong></p>
</div>
<form action="{{route('documents.apagar', $document['id'])}}
" method="post">
    @method('delete')
    @csrf

    <button type='submit' class="mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Apagar</button>
</form>
@endsection
