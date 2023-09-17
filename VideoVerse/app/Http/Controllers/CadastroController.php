<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function mostrar(){
        return view('cadastro');
    }

    public function cadastro(Request $request){
        // Verifique se algum dos campos está vazio
        if (empty($request->input('nome')) || empty($request->input('email')) || empty($request->input('senha')) || empty($request->input('data_nascimento'))) {
            //return response()->json(['error' => 'Email inválido.']);
            return view('cadastro_erro');
        }
    
        if ($request->input('email') == 'teste@email.com') {
            return response()->json(['error' => 'Email inválido']);
        }
        

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|string|min:6',
            'data_nascimento' => 'required|date',
        ]);
    
        try {
            // Crie uma instância do modelo de usuário e preencha com os dados do formulário
            $user = new User();
            $user->nome = $request->input('nome');
            $user->email = $request->input('email');
            $user->senha = Hash::make($request->input('senha'));
            $user->data_nascimento = $request->input('data_nascimento');
    
            // Salve o usuário no banco de dados
            $user->save();
    
            // Redirecione para uma página de sucesso ou faça algo mais
            return redirect()->route('pagina_de_sucesso');
        } catch (\Exception $e) {
            // Em caso de erro, você pode redirecionar de volta para o formulário de cadastro com uma mensagem de erro
            return redirect()->route('cadastro')->with('error', 'Ocorreu um erro durante o cadastro. Tente novamente.');
        }
    }
    
    
}