<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cadastrar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//Request para pegar as informaçoes do form
    {
        // Validando o email
        $rules = [
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            // Add more rules as needed
        ];

        // Customizando o error
        $messages = [
            'name.max' => 'O nome tem q ter pelo menos 30 caracteres',
            'email.unique' => 'O email já é existente.',
            'password.min' => 'A senha tem q ter pelo menos 8 caracteres.',
            // Add more messages as needed
        ];

        //Validando
        $validator = Validator::make($request->all(), $rules, $messages);

        //Se tiver um error ele vai redirecionar de volta
        if ($validator->fails()) {
            return redirect('cadastrar')->withErrors($validator)->withInput();
        }

        //Mandando para o bando de Dados
        $user = $request->all();
        $user['password'] = bcrypt($request->password);//Cripytografando a senha
        $user = User::create($user);

        return view('login', ['sucesso' => 'Mensagem de sucesso']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
