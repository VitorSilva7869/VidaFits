<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\audios;
use Illuminate\Support\Facades\Validator;

//use 

class EventControllerBD extends Controller
{
    public function avaliacao(Request $request,$id_audio){

        if(Auth::check()){//Verifica se o usuario esta logado
            
            $comentario = new comentarios;//pegar tabela comentaro
            $audio = audios::find($id_audio);//pegar tabela audios
            $id_user = auth::id();//pegar o id do usuario auteticado

            $arquivos = [
                'comentario' => 'required',
                'radio_estrela' => 'required',
            ];
            $messagens = [
                'comentario' => 'Adcione um comentarrio',
                'radio_estrela' => 'Adcione uma estrela',
            ];

            $validator = Validator::make($request->all(), $arquivos, $messagens);

            //Se tiver um error ele vai redirecionar de volta
            if ($validator->fails()) {
                return redirect("/eventos/meditar/{$id_audio}")->withErrors($validator)->withInput();
            }else{

                
                //Enviar os comentarios              
                $comentario->users_id = $id_user;
                $comentario->audios_id = $id_audio;
                $comentario->comentario = $request->comentario;
                $comentario->estrela = $request->radio_estrela;
                
                $comentario->save();

                //Pegas os comentarios do audio e fazer a media
                $comentarioAudio = comentarios::where('audios_id', $id_audio)->get();
                
                $avaliação = 0;
                $numeroAvaliacoes = $comentarioAudio->count();

                foreach($comentarioAudio as $comentarioAudios){
                    //$avaliação = $comentarioAudios->estrela + $avaliação;
                    $avaliação += $comentarioAudios->estrela; //Como pode fazer
                }
                $media = $avaliação / $numeroAvaliacoes;//Fazendo a media
                $mediaEstrela = number_format($media, 1);//Deixando com apenas 2 casas decimais
                
                //Adcionando na tabela
                $audio->update(['avaliacao' => $mediaEstrela]);

                //Redireciona quando tudo tiver pronto
                return redirect("/eventos/meditar/{$id_audio}");//"" duplas interpreta variaveis
            }

    
        }else{
            return redirect()->route('login.login');

        }

    }
}
