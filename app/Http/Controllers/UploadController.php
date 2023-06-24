<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

    public function save(Request $form)
    {
        $arquivo = $form->file('file');

        // Validação do tipo de arquivo
        $validExtensions = ['doc', 'docx', 'pdf'];
        $fileExtension = $arquivo->getClientOriginalExtension();

        if (!in_array($fileExtension, $validExtensions)) {
            return redirect('upload')->with('erro', 'Tipo de documento inválido. Apenas arquivos doc, docx e pdf são permitidos.');
        }

        // Define o diretório de armazenamento personalizado
        $diretorio = 'documentos';

        // Salva o arquivo no armazenamento com o nome original
        $path = $arquivo->storeAs($diretorio, $arquivo->getClientOriginalName());

        // Cria um novo documento
        $documento = new Document();
        $documento->nome = $arquivo->getClientOriginalName();
        $documento->path = $path; // Salva o caminho do arquivo
        $documento->createby = Auth::id();
        $documento->save();

        return redirect('documents')->with('sucesso', 'Documento adicionado com sucesso 👍');
    }
}
