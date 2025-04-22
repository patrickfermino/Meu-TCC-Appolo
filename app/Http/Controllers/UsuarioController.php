<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = \App\Models\Usuario::with('tipo')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoUsuario::all();
        return view('usuarios.create', compact('tipos'));
    }

    public function createArtista() {
        return view('usuarios.cadastro_artista');
    }
    
    public function createContratante() {
        return view('usuarios.cadastro_contratante');
    }
    

    public function storeArtista(Request $request)
    {
        return $this->storeWithTipo($request, 2); // 2 = artista
    }
    
    public function storeContratante(Request $request)
    {
        return $this->storeWithTipo($request, 3); // 3 = contratante
    }
    
    private function storeWithTipo(Request $request, $tipoUsuario)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:200',
            'documento' => 'required|string|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required|min:6',
            'data_nasc' => 'required|date',
            'sexo_usuario' => 'required|integer',
        ]);
    
        $usuario = new Usuario();
        $usuario->fill($request->except('senha'));
        $usuario->senha = Hash::make($request->senha);
        $usuario->tipo_usuario = $tipoUsuario; 
        $usuario->save();
    
        $token = $usuario->createToken('token')->plainTextToken;
    
        return redirect()->route('login')->with('success', 'Usuário criado com sucesso!');
    }
    


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
