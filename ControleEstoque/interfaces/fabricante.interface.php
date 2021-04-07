<?php

Interface iFabricante {
    public function getDados( int $id_fabricante ):array;
    public function setDados( array $dados ):bool;
}