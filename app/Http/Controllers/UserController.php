<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function createSave(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.unique' => 'Este nome de usuário já está em uso.',
            'email.required' => 'O email é obrigatório.',
            'email.unique' => 'Este email já está em uso.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        $data = $validatedData;
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('user.login');
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
