<?php

Interface iUsuario {
    public function getDados( int $id_usuario ):array;
    public function setDados( array $dados ):bool;
}