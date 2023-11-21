<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdmController extends Controller
{
    public function listaUsuarios()
    {
        $users = User::all();
        return view('lista_usuarios', compact('users'));
    }

    public function excluirUsuario($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('lista.usuarios')->with('success', 'Usuário excluído com sucesso!');
    }
}
