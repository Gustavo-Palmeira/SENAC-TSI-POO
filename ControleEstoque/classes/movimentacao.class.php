<?php

require( __DIR__ .  '/../interfaces/movimentacao.interface.php');

class Movimentacao implements iMovimentacao {
    public function getDados( int $id_usuario, string $tipo, string $datahora ):array{

    }
    public function setDados( array $dados ):bool{
        
    }
}