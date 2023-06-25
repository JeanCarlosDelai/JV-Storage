<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DocumentsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $lista = Document::where('createby', $userId)->get();

        foreach ($lista as $documento) {
            $documento->is_rich_text = $this->isRichText($documento->nome);
        }

        return view('documents.index', [
            'lista' => $lista,
        ]);
    }

    public function indexAll()
    {
        $lista = Document::all();

        foreach ($lista as $documento) {
            $documento->is_rich_text = $this->isRichText($documento->nome);
        }

        return view('documents.index', [
            'lista' => $lista,
        ]);
    }

    public function indexShared()
    {
        $userId = Auth::id();

        $lista = Document::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->get();

        foreach ($lista as $documento) {
            $documento->is_rich_text = $this->isRichText($documento->nome);
        }

        return view('documents.index', [
            'lista' => $lista,
        ]);
    }




    public function compartilhar(Document $document)
    {
        $usuarios = User::where('id', '!=', Auth::id())->get();

        return view('documents.compartilhar', [
            'document' => $document,
            'usuarios' => $usuarios,
        ]);
    }

    public function compartilharGravar(Request $request, Document $document)
    {
        // Verifica se o usuário autenticado é o criador do documento
        if ($document->createby !== Auth::id()) {
            return redirect('documents')->with('erro', 'Você não tem permissão para compartilhar este documento.');
        }

        $usuarios = $request->input('usuarios'); // Obtém os usuários selecionados no formulário de compartilhamento
        $permissao = $request->input('permissao'); // Obtém a permissão selecionada no formulário (exemplo: 'visualizar', 'editar', etc.)

        // Verifica se o usuário autenticado está incluído na lista de usuários selecionados
        if (in_array(Auth::id(), $usuarios)) {
            // Remove o ID do usuário autenticado da lista de usuários selecionados
            $usuarios = array_diff($usuarios, [Auth::id()]);
        }

        // Salva as permissões de compartilhamento para cada usuário selecionado
        foreach ($usuarios as $usuario) {
            $document->users()->syncWithoutDetaching([$usuario => ['permissao' => $permissao]]);
        }

        return redirect('documents')->with('sucesso', 'Documento compartilhado com sucesso 👍');
    }


    private function isRichText($fileName)
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        return strtolower($extension) === 'rtf';
    }

    public function busca(Request $form)
    {
        $busca = $form->busca;
        $lista = Document::where('nome', 'LIKE', "%{$busca}%")->get();

        return view('documents.index', ['lista' => $lista]);
    }

    public function adicionar()
    {
        return view('documents.adicionar');
    }

    public function adicionarGravar(DocumentRequest $form)
    {
        $dados = $form->validated();

        if ($this->isRichText($dados['nome'])) {
            $this->saveRichTextFile($dados['nome'], $dados['conteudo']);
        }

        $documento = new Document();
        $documento->nome = $dados['nome'];
        $documento->path = $this->generateFilePath($dados['nome']);
        $documento->createBy = Auth::id();
        $documento->save();

        return redirect('documents')->with('sucesso', 'Documento adicionado com sucesso 👍');
    }

    private function generateFilePath($fileName)
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $randomName = Str::random(10);
        $filePath = 'documentos/' . $randomName . '.' . $extension;

        return $filePath;
    }

    private function saveRichTextFile($fileName, $content)
    {
        $filePath = public_path($this->generateFilePath($fileName));
        File::put($filePath, $content);
    }

    public function editar(Document $document)
    {
        $filePath = public_path($document->path);
        $content = file_get_contents($filePath);

        return view('documents.editar', [
            'documento' => $document,
            'conteudo' => $content,
        ]);
    }

    private function deleteRichTextFile($fileName)
    {
        $filePath = public_path('documentos/' . $fileName);
        File::delete($filePath);
    }

    public function apagar(Document $document)
    {
        if (request()->isMethod('DELETE')) {
            if ($this->isRichText($document->nome)) {
                $this->deleteRichTextFile($document->nome);
            }

            // Obter o caminho completo do arquivo
            $caminhoArquivo = public_path($document->path);

            // Verificar se o arquivo existe e excluí-lo
            if (file_exists($caminhoArquivo)) {
                unlink($caminhoArquivo);
            }

            $document->delete();
            return redirect('documents')->with('sucesso', 'Documento apagado com sucesso 👍');
        }

        return view('documents.apagar', [
            'document' => $document,
        ]);
    }
}
