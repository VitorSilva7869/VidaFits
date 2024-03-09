<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\audios;

class EventController extends Controller
{
    public function index(){
        return view('home');
    }

    public function eventos(){
        $evento = audios::all();//Vai pegar tudo da tabela
        return view('eventos', ['evento' => $evento]);
    }

    public function eventosMeditar($id){
        $evento = audios::find($id);//Vai pegar so o do id
        return view('eventoMeditar', ['evento' => $evento]);
    }
}
