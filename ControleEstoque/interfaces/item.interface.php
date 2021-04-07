<?php

Interface iItem {
    public function getDados( int $id_item ):array;
    public function setDados( array $dados ):bool;
}