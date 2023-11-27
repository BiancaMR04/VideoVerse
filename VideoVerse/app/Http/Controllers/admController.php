<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;

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

    public function tornarAdm($id)
    {
        $user = User::findOrFail($id);
        $user->adm = 'True';
        $user->save();
        return redirect()->route('lista.usuarios')->with('success', 'Usuário promovido a administrador com sucesso!');
    }

    public function removerAdm($id)
    {
        $user = User::findOrFail($id);
        $user->adm = 'False';
        $user->save();
        return redirect()->route('lista.usuarios')->with('success', 'Administrador removido com sucesso!');
    }

    public function listaVideos()
    {
        $videos = Video::all();
        return view('lista_videos', compact('videos'));
    }
    
    public function excluirVideo($id)
{
    $video = Video::findOrFail($id);
    $video->delete();
    return redirect()->route('lista.videos')->with('success', 'Vídeo excluído com sucesso!');
}

}
