<?php

require('classes/login.class.php');
require('classes/register.class.php');

class Main {

    private $objLogin;
    private $objRegister;

    public function __construct() {
        $this->objLogin = new Login;
        $this->objRegister = new Register;

        $this->checkOperation();
    }

    public function checkOperation() {
        if (isset($_POST['startLogin'])) {
            if ($this->objLogin->setLogin()) {
                $this->objLogin->userLogin();
            };
        }
        if (isset($_POST['register'])) {
            if ($this->objRegister->setRegister()) {
                $erros = $this->objRegister->checkRegisterConsistency();
                if (count($erros) > 0) {
                    header("Location: ./public/html/create-user.php?msg=" . urlencode(serialize($erros)));
                } else {
                    $this->objRegister->registerUser();
                    header("Location: ./index.php");
                }
            };
        }
    }
}

new Main;