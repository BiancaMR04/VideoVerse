<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CadastroCanalController extends Controller
{
    public function view()
    {
        return view('criar_canal');
    }

    public function cadastrarFotoPerfil(Request $request){
    // Verifica se o formulário foi enviado
    if ($request->hasFile('perfil')) {
        // Verifica se não ocorreram erros durante o upload
        if ($request->file('perfil')->isValid()) {
            $nomeArquivo = $request->file('perfil')->getClientOriginalName();
            $caminhoDestino = public_path('uploads') . '/' . $nomeArquivo; // O diretório onde a foto será armazenada

            // Move o arquivo para o diretório de destino
            if ($request->file('perfil')->move(public_path('uploads'), $nomeArquivo)) {
                // Redimensiona a imagem
                $imagem = Image::make($caminhoDestino);
                $imagem->resize(100, 100); // Redimensiona para 100x100 pixels (ou o tamanho desejado)
                $imagem->save($caminhoDestino);

                echo "Upload da foto de perfil bem-sucedido!";
            } else {
                echo "Ocorreu um erro ao fazer o upload da foto de perfil.";
            }
        } else {
            echo "Erro no upload da foto de perfil.";
        }
    } else {
        echo "Nenhum arquivo de perfil enviado.";
    }
}
}