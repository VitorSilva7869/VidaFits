<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

use App\Models\audios;
use App\Models\comentarios;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index(){
        return view('home');
    }

    public function eventos(){
        $evento = audios::all();//Vai pegar tudo da tabela
        return view('eventos', ['evento' => $evento]);
    }

    public function show($id){
        $userId = auth::id();//pegar o comentario do usuario

        $comentarios = comentarios::where('users_id', $userId)->get();
        $evento = audios::with('comentarios')->find($id);
        return view('eventoMeditarr', ['evento' => $evento, 'ComentarioUser' => $comentarios, 'userId' => $userId]);
    }
    
    
    public function cadastrar(){
        return view('cadastrar');
    }

}
