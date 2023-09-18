<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\User;



class LoginController extends Controller{

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

        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            //Encontra o usuário com o e-mail inserido
            $user = User::where('email', $email)->first();

            if (!$user) {
                $msg = 'E-mail não cadastrado!';
                return view('login_erro', ['msg' => $msg]);
            }

            $senhaCorreta = $user->senha;

            if($senhaCorreta != $senha){
                $msg = 'Senha incorreta!';
                return view('login_erro', ['msg' => $msg]);
            }else{
                return view('index');
            }
        } catch(\Exception $e){
            if($e->getMessage() == 'The email field must be a valid email address.'){
                $msg = 'E-mail inválido!';
                return view('login_erro', ['msg' => $msg]);
            }
            $msg = 'Erro ao processar login: ' . $e->getMessage();
            return view('login_erro', ['msg' => $msg]);
        }
    }
}