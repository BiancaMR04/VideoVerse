<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Canal;
use App\Models\Video;
use Illuminate\Support\Facades\File;

class CadastroCanalController extends Controller
{
    public function view()
    {
        return view('criar_canal');
    }

    public function viewEditar($id){
        $canal = Canal::where('id', $id)->first();
        return view('criar_canal', compact('canal'));
    }

    public function editarCanal(Request $request, $id){
        $canal = Canal::where('id', $id)->first();

        if (!$canal) {
            $msg = 'Canal não encontrado.';
            return view('criar_canal', ['msg' => $msg]);
        }

    if ($request->hasFile('foto_perfil')) {
        if ($request->file('foto_perfil')->isValid()) {
            $nomeArquivoPerfil = $request->file('foto_perfil')->getClientOriginalName();
            $caminhoImagemAntigaPerfil = public_path('uploads') . '/' . $canal->imagem_perfil;
            $caminhoDestinoPerfil = public_path('uploads') . '/' . $nomeArquivoPerfil;

            if ($request->file('foto_perfil')->move(public_path('uploads'), $nomeArquivoPerfil)) {
                $imagemPerfil = Image::make($caminhoDestinoPerfil);
                $imagemPerfil->resize(100, 100);
                $imagemPerfil->save($caminhoDestinoPerfil);

                if (File::exists($caminhoImagemAntigaPerfil)) {
                    File::delete($caminhoImagemAntigaPerfil);
                }

                $canal->imagem_perfil = $nomeArquivoPerfil;
            } else {
                $msg = "Ocorreu um erro ao fazer o upload da nova imagem de perfil.";
                return view('criar_canal', ['msg' => $msg, 'canal' => $canal]);
            }
        } else {
            $msg = "Arquivo de imagem inválido.";
            return view('criar_canal', ['msg' => $msg, 'canal' => $canal]);
        }
    }
    if ($request->hasFile('foto_fundo')) {
        if ($request->file('foto_fundo')->isValid()) {
            $nomeArquivoFundo = $request->file('foto_fundo')->getClientOriginalName();
            $caminhoImagemAntigaFundo = public_path('uploads') . '/' . $canal->imagem_fundo;
            $caminhoDestinoFundo = public_path('uploads') . '/' . $nomeArquivoFundo;

            if ($request->file('foto_fundo')->move(public_path('uploads'), $nomeArquivoFundo)) {
                $imagemFundo = Image::make($caminhoDestinoFundo);
                $imagemFundo->resize(700, 150);
                $imagemFundo->save($caminhoDestinoFundo);

                // Atualiza o caminho da nova imagem de fundo no canal
                if (File::exists($caminhoImagemAntigaFundo)) {
                    File::delete($caminhoImagemAntigaFundo);
                }

                $canal->imagem_fundo = $nomeArquivoFundo;
            } else {
                $msg = "Ocorreu um erro ao fazer o upload da nova imagem de fundo.";
                return view('criar_canal', ['msg' => $msg, 'canal' => $canal]);
            }
        } else {
            $msg = "Arquivo de imagem de fundo inválido.";
            return view('criar_canal', ['msg' => $msg, 'canal' => $canal]);
        }
    }

    $nomeCanal = $request->input('nome_canal');
    $descricao = $request->input('descricao');

    if (!empty($nomeCanal)) {
        $canal->nome = $nomeCanal;
    }
    if (!empty($descricao)) {
        $canal->descricao = $descricao;
    }
    if(empty($nomeCanal) && empty($descricao) && !$request->hasFile('foto_perfil') && !$request->hasFile('foto_fundo')){
        $msg = 'Você não preencheu nenhum campo!';
        return view('criar_canal', ['msg' => $msg, 'canal' => $canal]);
    }
        
    try {
        $canal->save();

        $canal = Canal::find($id);
        $videos = Video::where('canal_id', $canal->id)->get();
        return view('meu_canal', compact('canal', 'videos'));
    } catch (\Exception $e) {
        $msg = 'Erro ao processar edição do canal: ' . $e->getMessage();
        return view('editar_canal', ['msg' => $msg, 'canal' => $canal]);
    }

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

                    $publicVideos = Video::where('estado_video', 'publico')->get(); // Adicione essa linha
                    $videos = Video::all();
                    return view('home', compact('publicVideos', 'videos'));
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
