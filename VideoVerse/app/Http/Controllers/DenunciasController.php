<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DenunciasController extends Controller
{
    public function view()
    {
        // Retorne a view correspondente para o formulário de denúncia
        return view('denunciar');
    }

    public function denunciar(Request $request)
    {
        // Obtenha os dados do formulário
        $id_video = $request->input('id_video');
        $outro = $request->input('outro');
        $data = Carbon::now()->toDateString();
        $hora = Carbon::now()->toTimeString();
        $status = false; 

        $request->validate([
            'id_video' => 'required|numeric',
            'outro' => 'nullable|string|max:255',
        ]);

        try {
            // Insira os dados no banco de dados
            $id_denuncia = DB::table('denuncias')->insertGetId([
                'id_video' => $id_video,
                'outro' => $outro,
                'data' => $data,
                'hora' => $hora,
                'status' => $status,
            ]);

            return redirect()->route('pagina_de_denuncia')->with('success', 'Denúncia enviada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('pagina_de_denuncia')->with('error', 'Erro ao processar denúncia: ' . $e->getMessage());
        }
    }
}
