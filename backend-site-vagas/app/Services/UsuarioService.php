<?php
namespace App\Services;

use App\Models\Apresentacao;
use App\Models\Candidato;
use App\Models\Empresa;
use App\Models\Experiencias;
use App\Models\Habilidades;
use App\Models\Pessoa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UsuarioService
{
    protected $usuario;

    public function __construct(Usuario $usuario, Candidato $candidato)
    {
        $this->usuario = $usuario;
        $this->candidato = $candidato;
    }
    public function criaUsuario(Request $request)
    {
        try {
            $request->validate([
                "login" => "required",
                "password" => "required"
            ]);

            // Criando novo usuario
            $novoUsuario = $this->usuario->create([
                'login' => $request['login'],
                'password' => $request['password'],
                'tipo_perfil' => $request['tipo_perfil']
            ]);
            if($request['tipo_perfil'] == 'candidato') {
                Candidato::create([
                    'usuario_id' => $novoUsuario->id
                ]);
            } else if($request['tipo_perfil'] == 'empresa') {
                Empresa::create([
                    'usuario_id' => $novoUsuario->id
                ]);
            }

            return ([
                'mensagem' => 'Usuario criado com Sucesso',
                'success' => true
            ]);
        } catch (\Throwable $th) {
            return ([
                'success' => false,
                'error' => $th
            ]);
        }

    }

    public function pegaUsuario($id)
    {
        $usuario = Usuario::where('id', $id)->first();
        return $usuario;
    }

    public function editaUsuario($id, Request $request)
    {
        $dados = [
            "login" => $request["login"],
            "password" => $request["password"]
        ];

        $usuario = Usuario::where("id", $id)->first();
        $usuario->update($dados);

        return $usuario;
    }

    public function deletaUsuario($id)
    {
        $usuario = Usuario::where("id", $id)->first();
        $usuario->delete();
        return "Usuario deletado com sucesso!";
    }

    public function cadastraFormulario($id, Request $request)
    {

        $candidato = Candidato::where('usuario_id', $id)->first();
        Pessoa::create([
            "candidato_id" => $candidato->id,
            "nome" => $request->pessoa["nome"],
            "sobrenome" => $request->pessoa["sobrenome"],
            "celular" => $request->pessoa["celular"],
            "cidade" => $request->pessoa["cidade"],
        ]);
        Apresentacao::create([
            'candidato_id' => $candidato->id,
            'titulo_perfil' => $request->apresentacao['titulo_perfil'],
            'nivel_ingles' => $request->apresentacao['nivel_ingles'],
            'descricao' => $request->apresentacao['descricao'],
            'link_linkedin' => $request->apresentacao['link_linkedin'],
            'link_github' => $request->apresentacao['link_github']
        ]);

        Habilidades::create([
            'candidato_id' => $candidato->id,
            'foco_carreira' => $request->habilidades['foco_carreira'],
            'nivel_experiencia' => $request->habilidades['nivel_experiencia'],
            'tecnologias' => $request->habilidades['tecnologias']
        ]);

        Experiencias::create([
            'candidato_id' => $candidato->id,
            'nome_empresa' => $request->experiencias['nome_empresa'],
            'cargo' => $request->experiencias['cargo'],
            'data_inicio' => $request->experiencias['data_inicio'],
            'data_fim' => $request->experiencias['data_fim'],
            'trabalho_atual' => $request->experiencias['trabalho_atual'],
            'descricao' => $request->experiencias['descricao']
        ]);

        return "Perfil cadastrado com sucesso!";
    }
}