<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\Canal;
use App\Models\Denuncia;

class AdmController extends Controller
{
    public function index(){
        $users = User::all();
        $videos = Video::all();
        $canais = Canal::all();
        $denuncias = Denuncia::all();
        return view('gerenciar', compact('users', 'videos', 'canais', 'denuncias'));
    }

    public function excluirUsuario($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('gerenciar')->with('success', 'Usuário excluído com sucesso!');
    }
    
    public function excluirVideo($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('gerenciar')->with('success', 'Vídeo excluído com sucesso!');
    }

    public function excluirDenuncia($id)
    {
        $denuncia = Denuncia::findOrFail($id);
        $denuncia->delete();
        return redirect()->route('gerenciar')->with('success', 'Denúncia excluída com sucesso!');
    }

    public function tornarAdm($id)
    {
        $user = User::findOrFail($id);
        $user->adm = true;
        $user->save();
        return redirect()->route('gerenciar')->with('success', 'Usuário promovido a administrador com sucesso!');
    }

    public function removerAdm($id)
    {
        $user = User::find($id);
        $user->adm = false;
        $user->save();
        return redirect()->route('gerenciar')->with('success', 'Administrador removido com sucesso!');
    }

}
