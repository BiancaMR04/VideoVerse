<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class LoginController{
    public function view(){
        return view('login');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $senha = $request->input('senha');

        $msg = '';

        if(empty($email) || empty($senha)){
            $msg = 'Todos os campos devem ser preenchidos!';
            return view('login_erro', ['msg' => $msg]);
        }

        $emailInserido = $request->input('email');
        $senhaInserida = $request->input('senha');
        $resultado = DB::select('SELECT * FROM usuarios WHERE email = ? AND senha = ?', [$emailInserido, $senhaInserida]);

        if (empty($resultado)) {
            $msg = 'E-mail ou senha incorretos!';
            return view('login_erro', ['msg' => $msg]);
        }

        return redirect()->route('home');
    }
}