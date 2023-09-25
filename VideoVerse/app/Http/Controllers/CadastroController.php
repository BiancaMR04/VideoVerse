<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\User;


require __DIR__ . '/../../../vendor/autoload.php';

class CadastroController extends Controller
{

    public function view(){
        return view('cadastro');
    }

    public function cadastro(Request $request){
        $nome = $request->input('nome');
        $email = $request->input('email');
        $senha = $request->input('senha');
        $data_nascimento = $request->input('data_nascimento');
        $data_de_cadastro = Carbon::now();

      

        $msg = '';

        if(empty($nome) || empty($email) || empty($senha) || empty($data_nascimento)){
            $msg = 'Todos os campos devem ser preenchidos!';
            return view('cadastro_erro', ['msg' => $msg]);
        }
    
        $emailInserido = $request->input('email');
        $resultado = DB::select('SELECT * FROM usuarios WHERE email = ?', [$emailInserido]);

        if (!empty($resultado)) {
            $msg = 'Esse e-mail já está cadastrado!';
            return view('cadastro_erro', ['msg' => $msg]);
        }


        try {

            $request->validate([
                'nome'            => 'required|string|max:255',
                'email'           => 'required|email',
                'senha'           => 'required|string|min:6',
                'data_nascimento' => 'required|date',
            ]);

            // Crie uma instância do modelo de usuário e preencha com os dados do formulário
            $user = new User();
            $user->nome_de_usuario = $request->input('nome');
            $user->email = $request->input('email');
            $user->senha = $request->input('senha'); 
            $user->data_de_nascimento = $request->input('data_nascimento');
            $user->data_de_cadastro = $data_de_cadastro;
    
            $user->save();
            
            // Sucesso!
            return redirect()->route('inicio');

        } catch (\Exception $e) {
            if($e->getMessage() == 'The email field must be a valid email address.'){
                $msg = 'E-mail inválido!';
                return view('cadastro_erro', ['msg' => $msg]);
            }
            if($e->getMessage() == 'The senha field must be at least 6 characters.'){
                $msg = 'A senha deve ter pelo menos 6 caracteres!';
                return view('cadastro_erro', ['msg' => $msg]);
            }
            $msg = 'Erro ao processar cadastro: ' . $e->getMessage();
            return view('cadastro_erro', ['msg' => $msg]);
        }
    }
}
