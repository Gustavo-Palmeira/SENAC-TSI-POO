<?php

require('classes/login.class.php');

class Main {

    private $objLogin;

    public function __construct() {
        $this->objLogin = new Login;

        $this->checkOperation();
    }

    public function checkOperation() {
        if (isset($_POST['startLogin'])) {
            if ($this->objLogin->setLogin()) {
                $this->objLogin->userLogin();
            };
        }
    }
}

new Main;