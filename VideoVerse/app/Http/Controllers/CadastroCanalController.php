<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Canal;

class CadastroCanalController extends Controller
{
    public function view()
    {
        return view('criar_canal');
    }
    public function cadastrarCanal(Request $request)
{
    // Verifica se o formulário foi enviado
    if ($request->hasFile('perfil') && $request->hasFile('foto_fundo')) {
        // Verifica se não ocorreram erros durante o upload das imagens de perfil e de fundo
        if ($request->file('perfil')->isValid() && $request->file('foto_fundo')->isValid()) {
            // Obtém os nomes dos arquivos das imagens de perfil e de fundo
            $nomeArquivoPerfil = $request->file('perfil')->getClientOriginalName();
            $nomeArquivoFundo = $request->file('foto_fundo')->getClientOriginalName();

            // Move as imagens para a pasta de uploads
            $caminhoDestinoPerfil = public_path('uploads') . '/' . $nomeArquivoPerfil;
            $caminhoDestinoFundo = public_path('uploads') . '/' . $nomeArquivoFundo;

            if (
                $request->file('perfil')->move(public_path('uploads'), $nomeArquivoPerfil) &&
                $request->file('foto_fundo')->move(public_path('uploads'), $nomeArquivoFundo)
            ) {
                // Verificar se os arquivos estão sendo enviados corretamente
                echo 'Arquivo de perfil enviado!';
                echo 'Arquivo de fundo enviado!';

                $imagemPerfil = Image::make($caminhoDestinoPerfil);
                $imagemPerfil->resize(100, 100);
                $imagemPerfil->save($caminhoDestinoPerfil);

                $nomeCanal = $request->input('nome_canal');
                $descricao = $request->input('descricao');
                $dataCadastro = now();

                $msg = '';

                if (empty($nomeCanal) || empty($descricao)) {
                    $msg = 'Todos os campos devem ser preenchidos!';
                    return view('criar_canal', ['msg' => $msg]);
                }

                try {
                    // criando uma instância de canal e preenchendo com os dados do formulário
                    $canal = new Canal();
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

                    // redirecionando para a home
                    return redirect()->route('home');
                } catch (\Exception $e) {
                    // Em caso de erro, volta para o formulário de cadastro com uma mensagem de erro
                    $msg = 'Erro ao processar cadastro do canal: ' . $e->getMessage();
                    return view('criar_canal', ['msg' => $msg]);
                }
            } else {
                $msg = "Ocorreu um erro ao fazer o upload das imagens.";
            }
        } else {
            $msg = "Erro no upload das imagens.";
        }
    } else {
        $msg = "Nenhum arquivo de imagem enviado.";
    }

    return view('criar_canal', ['msg' => $msg]);
}

}
