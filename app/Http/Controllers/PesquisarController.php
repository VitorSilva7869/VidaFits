<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\audios;
use App\Models\comentarios;
use Illuminate\Support\Facades\Auth;

class PesquisarController extends Controller
{
    public function index(){
        $search = [];
        $event = [];
        return view('pesquisar', ['event' => $event, 'search' => $search]);
    }
    
    public function pesquisar(Request $request){

        $search = $request->input('search');
        $event = audios::where([
            ['titulo','like','%' .$search. '%']
        ])->get();
        
        return view('pesquisar', compact('event', 'search'));
    }
}
