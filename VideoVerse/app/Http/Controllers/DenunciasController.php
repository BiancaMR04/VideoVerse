<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Video;
use App\Models\Denuncia;


class DenunciasController extends Controller
{
    public function view($id)
    {
        // Retorne a view correspondente para o formulário de denúncia
        $video = Video::find($id);
        return view('denunciar', compact('video'));
    }

    public function denunciar(Request $request)
    {
        // Obtenha os dados do formulário
        $id_video = $request->input('id_video');
        $descricao = $request->input('descricao');
        $status = "pendente"; 
        $denuncias = $request->input('reason');

       
            $denuncia = new Denuncia();
            $denuncia->video_id = $id_video;
            $denuncia->user_id = auth()->user()->id;
            $denuncia->descricao = $descricao;
            $denuncia->data_denuncia = now();
            $denuncia->denuncia = $denuncias;    
            $denuncia->status = $status;

            $denuncia->save(); // Salvar a denúncia

            return redirect()->route('home')->with('success', 'Denúncia enviada com sucesso!');

    
    }
    public function listarDenuncias()
    {
        $denuncias = Denuncia::all(); // Ou qualquer outra lógica para buscar denúncias
        return view('gerenciar', ['denuncias' => $denuncias]); 
    }
}
