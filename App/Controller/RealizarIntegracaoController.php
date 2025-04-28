<?php

class RealizarIntegracaoController extends AppController
{

    // integrador.franciscanos.br/controller/acao/dominio
    // integrador.franciscanos.br/realizarIntegracao/criar/curso
    
    private $realizarIntegracao;

    public function __construct() {
        $this->realizarIntegracao = new RealizarIntegracao();
    }

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->RequestHandler->addInputType('json', ['json_decode' => true]);
    }

    public function criar($dominio = null)
    {
        $this->realizarIntegracao->executar('Criar', $dominio, $this->request);
    }

    public function atualizar($dominio = null)
    {
        $this->realizarIntegracao->executar('Atualizar', $dominio, $this->request);
    }

    public function arquivar($dominio = null)
    {
        $this->realizarIntegracao->executar('Arquivar', $dominio, $this->request);
    }

    public function deletar($dominio = null)
    {
        $this->realizarIntegracao->executar('Deletar', $dominio, $this->request);
    }

}
