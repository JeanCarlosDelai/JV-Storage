<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function createSave(Request $data)
    {
        //Converte os dados para array, pois o create() só recebe array
        $data = $data->toArray();

        //Criptografia de Senha
        $data['password'] = Hash::make($data['password']);

        //$user =
        User::create($data);

        //event(new Registered($user));

        // Mail::raw('Este é um email teste', function($msg) {
        //     $msg->to('destinatario@email.com')->subject('Usuário criado com sucesso');
        // });

        return redirect()->route('user');
    }

    public function login(Request $data)
    {
        //Esse tipo de validação inline
        if (request()->isMethod('POST')) {
            $login = $data->validate([
                'name' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($login)) {
                return redirect()->route('documents');
            } else {
                return redirect()->route('user.login')->with('erro', 'Usuário ou senha inválidos');
            }
        }

        //Se não é post mostra a view normalmente

        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
