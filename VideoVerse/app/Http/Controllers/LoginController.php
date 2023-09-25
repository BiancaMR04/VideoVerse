<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Adicione esta linha
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function view()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'senha');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redirecione para a página apropriada
            if (Auth::user()->canal) {
                return redirect()->route('inicio_logado');
            } else {
                return redirect()->route('inicio_logado_SC');
            }
        }

        // Autenticação falhou, redirecione de volta com uma mensagem de erro
        return redirect()->route('login')->with('error', 'Credenciais inválidas.');
    }
}
