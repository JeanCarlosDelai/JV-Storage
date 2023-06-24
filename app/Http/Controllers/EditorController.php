<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Auth;

class EditorController extends Controller
{
    public function index()
    {
        return view('documents.editor');
    }

    public function save(Request $form)
    {
        //dd($form);
        $arquivo = $form->input('editordata');
        $nome = $form->input('nomedata');
        $documento = new Document();
        $documento->nome = $nome . ".rtf";
        $documento->conteudo = $arquivo;
        $documento->path = 'Somente conteúdo';
        $documento->createBy = Auth::id();
        $documento->save();

        return redirect('documents')->with('sucesso', 'Documento adicionado com sucesso 👍');
    }

    public function update(Request $request, Document $documento)
    {
        $documento->nome = $request->input('nomedata');
        $documento->conteudo = $request->input('editordata');
        $documento->save();

        return redirect('documents')->with('sucesso', 'Documento atualizado com sucesso 👍');
    }

    public function editarGravar(DocumentRequest $form, $documentoId)
    {
        $dados = $form->validated();
        $documento = Document::findOrFail($documentoId);
        $documento->nome = $dados['nome'];
        $documento->conteudo = $dados['editordata'];
        $documento->save();
        return redirect('documents')->with('sucesso', 'Documento alterado com sucesso 👍');
    }

    public function editar(Document $documento)
    {
        return view('documents.editar', ['documento' => $documento]);
    }
}
