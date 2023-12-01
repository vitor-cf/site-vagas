<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function criaUsuario(Request $request)
    {
        return $this->usuarioService->criaUsuario($request);
    }

    public function pegaUsuario($id)
    {
        $usuario = $this->usuarioService->pegaUsuario($id);
        return ([
            'usuario' => $usuario,
            'mensagem' => 'Dados do usuario'
        ]);
    }

    public function editaUsuario($id, Request $request)
    {
        $usuario = $this->usuarioService->editaUsuario($id, $request);
        return $usuario;
    }
    public function deletaUsuario($id)
    {
        return $this->usuarioService->deletaUsuario($id);
    }

    public function cadastraFormulario($id, Request $request)
    {
        return $this->usuarioService->cadastraFormulario($id, $request);
    } 
}
