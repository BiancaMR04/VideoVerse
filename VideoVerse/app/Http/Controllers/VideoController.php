<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function view(){
        return view('video');
    }

    public function getRandomVideoWithImage()
    {
        try {
            $randomVideo = DB::table('videos')
                ->select('caminho', 'caminho_imagem', 'nome', 'data')
                ->inRandomOrder()
                ->limit(1)
                ->first();
    
            if ($randomVideo) {
                // Pegue as informações do vídeo do resultado da consulta
                $caminhoVideo = $randomVideo->caminho;
                $caminhoImagem = $randomVideo->caminho_imagem;
                $nomeVideo = $randomVideo->nome;
                $dataVideo = $randomVideo->data;
    
                return view('video_visualizacao', [
                    'caminhoVideo' => $caminhoVideo,
                    'caminhoImagem' => $caminhoImagem,
                    'nomeVideo' => $nomeVideo,
                    'dataVideo' => $dataVideo
                ]);
            } else {
                return 'Nenhum vídeo encontrado.';
            }
        } catch (\Exception $e) {
            return 'Erro ao buscar vídeo: ' . $e->getMessage();
        }
    }
    

    public function getVideoInfo($videoId)
{
    try {
        $videoInfo = Video::with('canal:id,nome,inscritos')
            ->find($videoId);

        if ($videoInfo) {
            return view('video_info', [
                'videoInfo' => $videoInfo,
            ]);
        } else {
            return 'Vídeo não encontrado.';
        }
    } catch (\Exception $e) {
        return 'Erro ao buscar informações do vídeo: ' . $e->getMessage();
    }
}
}
