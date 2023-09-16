<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Supabase\Client; // Importe a classe Client do Supabase

class Cadastro extends Controller
{
    private $supabase;

    public function __construct()
    {
        $this->supabase = new Client([
            'url' => env('SUPABASE_URL'),
            'key' => env('SUPABASE_KEY'),
        ]);
    }

    public function index()
    {
        return view('tela_cadastro');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:6',
            'senha2' => 'required|same:senha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $nome = $request->input('nome');
        $email = $request->input('email');
        $senha = $request->input('senha');

        $user = $this->supabase->auth->signUp([
            'email' => $email,
            'password' => $senha,
            'data' => ['nome' => $nome],
        ]);

        if ($user->error) {
            return "Erro ao criar usuário: " . $user->error->message;
        } else {
            return "Usuário criado com sucesso!";
        }
    }
}
