<?php

require( __DIR__ .  '/../interfaces/fabricante.interface.php');
require_once( __DIR__ .  '/abstratas/tipopessoa.class.php');

class Fabricante extends TipoPessoa implements iFabricante {

    public function getDados( int $id_fabricante ):array{

    }
    public function setDados( array $dados ):bool{
        
    }

}