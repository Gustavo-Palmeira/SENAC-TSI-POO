<?php

require('classes/factory/factoryLogin.class.php');
require('classes/factory/factoryRegister.class.php');
require('classes/factory/factoryChangePassword.class.php');
require('classes/factory/factoryCheckConsistency.class.php');

class Main {

    private $objLogin;
    private $objRegister;
    private $objChangePassword;

    public function __construct() {
        $this->objLogin = FactoryLogin::login();
        $this->objRegister = FactoryRegister::register();
        $this->objChangePassword = FactoryChangePassword::changePassword();
  
        $this->checkOperation();
    }

    public function checkOperation() {
        if (key($_POST)) {
            $functionName = array_key_last($_POST);
            $this->$functionName();
        }
    }

    private function startLogin() {
        if ($this->objLogin->setLogin()) {
            $this->objLogin->userLogin();
        };
    }

    private function register() {
        if ($this->objRegister->setRegister()) {
            $erros = $this->consistencyCheck($this->objRegister);
            if (count($erros) > 0) {
                header("Location: ./public/html/create-user.php?msg=" . urlencode(serialize($erros)));
            } else {
                $this->objRegister->registerUser();
                header("Location: ./index.php");
            }
        };
    }

    private function changePasswordForm() {
        if ($this->objChangePassword->setPassword()) {
            $erros = $this->consistencyCheck($this->objChangePassword);
            if (count($erros) > 0) {
                header("Location: ./public/html/change-password.php?msg=" . urlencode(serialize($erros)));
            } else {
                $this->objChangePassword->changePassword();
                header("Location: ./index.php");
            }
        };
    }

    public function consistencyCheck(object $object) {
        $consistencyTest = FactoryCheckConsistency::check($object);

        $erros = $consistencyTest->check($object);

        return $erros;
    }
}

new Main;