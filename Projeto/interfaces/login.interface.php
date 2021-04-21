<?php

Interface iLogin {
    public function userLogin():void;
    public function setDados( array $dados ):bool;
}