<?php

class CriarCurso
{
    private $integracao;

    public function __construct($integracao)
    {
        $this->integracao = $integracao;
    }

    public function executar($curso)
    {
        // Lógica para criar o curso
        $this->integracao->criar($curso);
    }
}