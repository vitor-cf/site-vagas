<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmpresaService;

class EmpresaController extends Controller
{
    protected $empresaService;
    public function __construct(EmpresaService $empresaService)
    {
        $this->empresaService = $empresaService;
    }
    public function criarVaga($id, Request $request)
    {
        return $this->empresaService->cadastraVaga($id, $request);
    } 
}
