<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function editarGravar(DocumentRequest $form, $documentoId)
    {
        $dados = $form->validated();
        $documento = Document::findOrFail($documentoId);

        // Verifica se o usuário autenticado é o criador do documento ou tem permissão de edição
        $usuarioAutenticado = Auth::user();
        $permissaoUsuario = $documento->users()->where('user_id', $usuarioAutenticado->id)->value('permissao');

        if ($documento->createby !== $usuarioAutenticado->id && $permissaoUsuario !== 'editar' && $permissaoUsuario !== 'editarExcluir') {
            return redirect('documents')->with('erro', 'Você não tem permissão para editar este documento.');
        }

        $documento->nome = $dados['nome'];
        $documento->conteudo = $dados['editordata'];
        $documento->save();

        return redirect('documents')->with('sucesso', 'Documento alterado com sucesso 👍');
    }

    public function editar(Document $documento)
    {
        // Verifica se o usuário autenticado é o criador do documento ou tem permissão de edição
        $usuarioAutenticado = Auth::user();
        $permissaoUsuario = $documento->users()->where('user_id', $usuarioAutenticado->id)->value('permissao');

        if ($documento->createby !== $usuarioAutenticado->id && $permissaoUsuario !== 'editar' && $permissaoUsuario !== 'editarExcluir') {
            return redirect('documents')->with('erro', 'Você não tem permissão para editar este documento.');
        }

        return view('documents.editar', ['documento' => $documento]);
    }
}
