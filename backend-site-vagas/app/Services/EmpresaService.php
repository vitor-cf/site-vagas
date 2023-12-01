<?php
namespace App\Services;

use App\Models\Empresa;
use App\Models\DadosEmpresa;
use App\Models\Usuario;
use App\Models\Vaga;
use Illuminate\Http\Request;

class EmpresaService
{
    protected $empresa;

    public function __construct(Usuario $usuario, Empresa $empresa)
    {
        $this->usuario = $usuario;
        $this->candidato = $empresa;
    }
    
    public function criaEmpresa($id, Request $request)
    {
        $empresa = Empresa::where('id', $id)->first();
        DadosEmpresa::create([
            'empresa_id' => $empresa->id,
            'nome_responsavel' => $request['nome_responsavel'],
            'cargo_area' => $request['cargo_area'],
            'numero_celular' => $request['numero_celular'],
            'website' => $request['website'],
            'nome_empresa' => $request['nome_empresa'],
            'cnpj' => $request['cnpj'],
            'possui_cnpj' => $request['possui_cnpj'],
            'tipo_empresa' => $request['tipo_empresa'],
            'descricao_empresa' => $request['descricao_empresa']
        ]);

        return "Perfil Empresa cadastrado com sucesso!";
    }

    public function cadastraVaga($id, Request $request)
    {
        Vaga::create([
            'empresa_id' => $id,
            'descricao_vaga' => $request['descricao_vaga'],
            'tecnologia_vaga' => $request['tecnologia_vaga'],
            'data_limite' => $request['data_limite']
        ]);

        return 'Vaga Adicionada com Sucesso!';
    }
    
    public function pegaEmpresa($id)
    {
        $empresa = DadosEmpresa::where('id', $id)->first();
        return $empresa;
    }

    public function editaEmpresa($id, Request $request)
    {
        $dados = [
            'nome_responsavel' => $request['nome_responsavel'],
            'cargo_area' => $request['cargo_area'],
            'numero_celular' => $request['numero_celular'],
            'website' => $request['website'],
            'nome_empresa' => $request['nome_empresa'],
            'cnpj' => $request['cnpj'],
            'possui_cnpj' => $request['possui_cnpj'],
            'tipo_empresa' => $request['tipo_empresa'],
            'descricao_empresa' => $request['descricao_empresa']
        ];
        
        $empresa = DadosEmpresa::where("id", $id)->first();
        $empresa->update($dados);

        return $empresa;
    }

    public function deletaUsuario($id)
    {
        $empresa = DadosEmpresa::where("id", $id)->first();
        $empresa->delete();
        return "Empresa deletada com sucesso!";
    }

    public function editaVaga($id, Request $request)
    {
        $dados = [
            'descricao_vaga' => $request['descricao_vaga'],
            'tecnologias_vaga' => $request['tecnologias_vaga'],
            'data_limite' => $request['data_limite']
        ];
        
        $vaga = Vaga::where("id", $id)->first();
        $vaga->update($dados);

        return $vaga;
    }

    public function DeletaVaga($id)
    {
        $vaga = Vaga::where("id", $id)->first();
        $vaga->delete();
        return $vaga;
    }
}