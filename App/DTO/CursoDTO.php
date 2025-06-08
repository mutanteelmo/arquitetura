<?php

namespace App\DTO;

use App\Model\Curso;

class CursoDTO {

    private $cursoDTO;
    public function __construct(
        $cursoDTO
    ) {
        $this->cursoDTO = $cursoDTO;
    }

    public function toModel(): Curso
    {
        return new Curso (
            id: $this->cursoDTO->id,
            nome: $this->cursoDTO->nome,
            descricao: $this->cursoDTO->descricao,
            dataInicio: $this->cursoDTO->dataInicio,
            dataFim: $this->cursoDTO->dataFim,
            status: $this->cursoDTO->status
        );
    }
}