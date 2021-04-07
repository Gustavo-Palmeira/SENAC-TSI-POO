<?php

require( __DIR__ .  '/../interfaces/usuario.interface.php');
require_once( __DIR__ .  '/abstratas/tipopessoa.class.php');

class Usuario extends TipoPessoa implements iUsuario {

    public function getDados( int $id_usuario ):array {

    }
    public function setDados( array $dados ):bool {

    }

}