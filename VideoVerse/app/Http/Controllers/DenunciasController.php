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
        $outro = $request->input('outro');
        $status = "pendente"; 
        $denuncias = $request->input('reason');

        /*
        $request->validate([
            'id_video' => 'required|numeric',
            'outro' => 'nullable|string|max:255',
            'reason' => 'required|string|max:255',
        ]);*/

       /* try {*/
            // Insira os dados no banco de dados
            $denuncia = new Denuncia();
            $denuncia->video_id = $id_video;
            $denuncia->user_id = auth()->user()->id;
            $denuncia->outro = $outro;
            $denuncia->data_denuncia = now();
            $denuncia->denuncia = $denuncias;    
            $denuncia->status = $status;

            $denuncia->save(); // Salvar a denúncia

            return redirect()->route('home')->with('success', 'Denúncia enviada com sucesso!');

       /* } catch (\Exception $e) {
            return redirect()->route('denuncia.motivo', ['id' => $id_video])->with('error', 'Erro ao processar denúncia: ' . $e->getMessage());
        }*/
    }
}
