<?php

use App\UseCases\RealizarIntegracao\Curso\IntegrarCursoInterface;
use App\UseCases\RealizarIntegracao\Curso as RealizarIntegracao;

use App\Controller\AppController;
use App\DTO\CursoDTO;

class RealizarIntegracaoCursoController extends AppController implements RealizarIntegracaoInterface
{

    public function __construct(
        private RealizarIntegracao\CriarCurso     $criarCurso,
        private RealizarIntegracao\AtualizarCurso $atualizarCurso,
        private RealizarIntegracao\ArquivarCurso  $arquivarCurso,
        private RealizarIntegracao\DeletarCurso   $deletarCurso,
        private Object $request
    ) {
        $criarCurso =     new RealizarIntegracao\CriarCurso();
        $atualizarCurso = new RealizarIntegracao\AtualizarCurso();
        $arquivarCurso =  new RealizarIntegracao\ArquivarCurso();
        $deletarCurso =   new RealizarIntegracao\DeletarCurso();
    }

    // integrador.franciscanos.br/realizarIntegracaoCurso/criar    
    public function criar(): stdClass
    {
        return $this->criarCurso->executar(
            new CursoDTO($this->request->data['Curso'])->toModel()
        );
    }

    // integrador.franciscanos.br/realizarIntegracaoCurso/atualizar
    public function atualizar(): stdClass {
        return $this->atualizarCurso->executar(
            new CursoDTO($this->request->data['Curso'])->toModel()
        );
    }

    // integrador.franciscanos.br/realizarIntegracaoCurso/arquivar
    public function arquivar(): int {
        return $this->arquivarCurso->executar(
            $this->request->data['cursoId']
        );
    }

    // integrador.franciscanos.br/realizarIntegracaoCurso/deletar
    public function deletar(): int {
        return $this->deletarCurso->executar(
            $this->request->data['cursoId']
        );
    }

}
