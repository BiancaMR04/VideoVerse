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
        $data_denuncia = Carbon::now()->toDateString();
        $status = false; 
        $denuncia = $request->input('reason');

        $request->validate([
            'id_video' => 'required|numeric',
            'outro' => 'nullable|string|max:255',
            'reason' => 'required|string|max:255',
        ]);

        try {
            // Insira os dados no banco de dados
            $denuncia = new Denuncia();
            $denuncia->id_video = $id_video;
            $denuncia->outro = $outro;
            $denuncia->data = $data_denuncia;
            $denuncia->denuncia = $denuncia;    
            $denuncia->status = $status;

            $denuncia->save(); // Salvar a denúncia

            return redirect()->route('denuncia_concluida')->with('success', 'Denúncia enviada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('denuncia.motivo', ['id' => $id_video])->with('error', 'Erro ao processar denúncia: ' . $e->getMessage());
        }
    }
}
