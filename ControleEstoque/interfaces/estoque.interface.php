<?php

Interface iEstoque {
    public function getDados( int $id_estoque ):array;
    public function setDados( array $dados ):bool;
}