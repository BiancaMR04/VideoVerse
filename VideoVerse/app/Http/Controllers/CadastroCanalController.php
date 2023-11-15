<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Canal;
use App\Models\Video;

class CadastroCanalController extends Controller
{
    public function view()
    {
        $temCanal = Canal::where('user_id', auth()->id())->exists();
        $publicVideos = Video::where('estado_video', 'publico')->get();
        return view('criar_canal', compact('temCanal', 'publicVideos'));
    }
    
    public function cadastrarCanal(Request $request)
    {
    // Verifica se o formulário foi enviado
    if ($request->hasFile('foto_perfil') && $request->hasFile('foto_fundo')) {
        // Verifica se os arquivos são válidos
        if ($request->file('foto_perfil')->isValid() && $request->file('foto_fundo')->isValid()) {
            // Obtém os nomes dos arquivos das imagens de perfil e de fundo
            $nomeArquivoPerfil = $request->file('foto_perfil')->getClientOriginalName();
            $nomeArquivoFundo = $request->file('foto_fundo')->getClientOriginalName();

            // Move as imagens para a pasta de uploads
            $caminhoDestinoPerfil = public_path('uploads') . '/' . $nomeArquivoPerfil;
            $caminhoDestinoFundo = public_path('uploads') . '/' . $nomeArquivoFundo;

            if (
                $request->file('foto_perfil')->move(public_path('uploads'), $nomeArquivoPerfil) &&
                $request->file('foto_fundo')->move(public_path('uploads'), $nomeArquivoFundo)
            ) {
                // Redimensiona a imagem de perfil
                $imagemPerfil = Image::make($caminhoDestinoPerfil);
                $imagemPerfil->resize(100, 100);
                $imagemPerfil->save($caminhoDestinoPerfil);

                    // Redimensiona a imagem de fundo
                    $imagemFundo = Image::make($caminhoDestinoFundo);
                    $imagemFundo->resize(700, 150);
                    $imagemFundo->save($caminhoDestinoFundo);

                $nomeCanal = $request->input('nome_canal');
                $descricao = $request->input('descricao');

                $dataCadastro = now();

                if (empty($nomeCanal) || empty($descricao)) {
                    $msg = 'Todos os campos devem ser preenchidos!';
                    return view('criar_canal', ['msg' => $msg]);
                }

                try {
                    // Criando uma instância de canal e preenchendo com os dados do formulário
                    $canal = new Canal();
                    $canal->user_id = auth()->id();
                    $canal->nome = $nomeCanal;
                    $canal->descricao = $descricao;
                    $canal->imagem_perfil = $nomeArquivoPerfil;
                    $canal->imagem_fundo = $nomeArquivoFundo;
                    $canal->data_de_cadastro = $dataCadastro;
                    $canal->ativo = true;
                    $canal->categorias = '[]';
                    $canal->inscritos = 0;

                    // Salva o canal no banco de dados
                    $canal->save();

                    $temCanal = Canal::where('user_id', auth()->id())->exists();
                    $publicVideos = Video::where('estado_video', 'publico')->get(); // Adicione essa linha
                    $videos = Video::all();
                    return view('home', compact('temCanal', 'publicVideos', 'videos'));
                } catch (\Exception $e) {
                    // Em caso de erro, volta para o formulário de cadastro com uma mensagem de erro
                    $msg = 'Erro ao processar cadastro do canal: ' . $e->getMessage();
                    return view('criar_canal', ['msg' => $msg]);
                }
            } else {
                $msg = "Ocorreu um erro ao fazer o upload das imagens.";
            }
        } else {
            $msg = "Arquivos de imagem inválidos.";
        }
    } else {
        $msg = "Nenhum arquivo de imagem enviado.";
    }

    return view('criar_canal', ['msg' => $msg]);
}
}
