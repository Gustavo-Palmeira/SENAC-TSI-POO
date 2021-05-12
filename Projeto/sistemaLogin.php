<?php

require('classes/login.class.php');
require('classes/register.class.php');
require('classes/changePassword.class.php');

class Main {

    private $objLogin;
    private $objRegister;
    private $objChangePassword;

    public function __construct() {
        $this->objLogin = new Login;
        $this->objRegister = new Register;
        $this->objChangePassword = new ChangePassword;

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
                $erros = $this->objRegister->checkConsistency();
                if (count($erros) > 0) {
                    header("Location: ./public/html/create-user.php?msg=" . urlencode(serialize($erros)));
                } else {
                    $this->objRegister->registerUser();
                    header("Location: ./index.php");
                }
            };
        }
        if (isset($_POST['changePasswordForm'])) {
            if ($this->objChangePassword->setPassword()) {
                $erros = $this->objChangePassword->checkConsistency();
                if (count($erros) > 0) {
                    header("Location: ./public/html/change-password.php?msg=" . urlencode(serialize($erros)));
                } else {
                    $this->objChangePassword->changePassword();
                    header("Location: ./index.php");
                }
            };
        }
    }
}

new Main;