<?php

class RealizarIntegracao 
{

    // integrador.franciscanos.br/controller/acao/dominio
    // integrador.franciscanos.br/realizarIntegracao/criar/curso
    public function executar($acao, $dominio, $request)
    {
        if (empty($dominio)) {
            throw new BadRequestException("Domínio não especificado.");
        }

        $dados = $request->input('json_decode', true);

        // Monta o nome da classe dinamicamente
        $classe = '\\App\\UseCases\\RealizarIntegracao\\Integrar' . ucfirst(strtolower($dominio)) . '\\' . $acao . ucfirst(strtolower($dominio));

        if (!class_exists($classe)) {
            throw new NotFoundException("Caso de uso {$classe} não encontrado.");
        }

        // Instancia o caso de uso dinamicamente
        $casoDeUso = new $classe();

        // Executa o caso de uso
        $resultado = $casoDeUso->executar($dados);

        // Retorna a resposta
        $this->set('resultado', $resultado);
        $this->set('_serialize', ['resultado']);
    }
}