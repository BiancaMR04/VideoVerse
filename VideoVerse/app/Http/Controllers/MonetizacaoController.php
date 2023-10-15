<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\DB;

class MonetizacaoController extends Controller
{


    public function view(){
        return view('cadastro');
    }

    public function cadastro(Request $request){
        $banco = $request->input('banco');
        $agencia = $request->input('agencia');
        $conta = $request->input('conta');
        $data_de_cadastro = Carbon::now();
        $email = $request->input('email');
      

        $msg = '';

        if(empty($banco) || empty($agencia) || empty($conta) || empty($data_nascimento)){
            $msg = 'Todos os campos devem ser preenchidos!';
            return view('cadastro', ['msg' => $msg]);
        }
    
        $agenciaInserido = $request->input('agencia');
        $resultado = DB::select('SELECT * FROM usuarios WHERE agencia = ?', [$agenciaInserido]);

        try {

            $request->validate([
                'banco'            => 'required|string|max:255',
                'agencia'           => 'required|integer|min:1',
                'conta'           => 'required|integer|min:6',
                'data_nascimento' => 'required|date',
            ]);

            // Crie uma instância do modelo de usuário e preencha com os dados do formulário
            $user = User::where('email', $email)->first();
            $user->banco_de_usuario = $request->input('banco');
            $user->agencia = $request->input('agencia');
            $user->conta = $request->input('conta'); 
            $user->data_de_cadastro = $data_de_cadastro;
    
            $user->save();
            
            // Sucesso!
            return redirect()->route('inicio');

        } catch (\Exception $e) {
            $msg = 'Erro ao processar cadastro de dados bancários: ' . $e->getMessage();
            return view('monetizacao', ['msg' => $msg]);
        }
    }
}
