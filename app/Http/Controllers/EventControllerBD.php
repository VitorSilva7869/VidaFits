<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\audios;
//use 

class EventControllerBD extends Controller
{
    public function avaliacao(Request $request,$id_audio){
        $comentario = new comentarios;
        $id_user = auth::id();//pegar o comentario do usuario

        $comentario->users_id = $id_user;
        $comentario->audios_id = $id_audio;
        $comentario->comentario = $request->comentario;
        $comentario->estrela = $request->radio_estrela;

        $comentario->save();


        return redirect("/eventos/meditar/{$id_audio}");//"" duplas interpreta variaveis

    }
}
