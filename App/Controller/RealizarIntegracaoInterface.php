<?php

interface RealizarIntegracaoInterface {
    
    public function criar(): stdClass;
    public function atualizar(): stdClass;
    public function arquivar(): int;
    public function deletar(): int;

}