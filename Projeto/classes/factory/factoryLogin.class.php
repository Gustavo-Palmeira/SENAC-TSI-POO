<?php

require('classes/login.class.php');

class FactoryLogin {

    static public function login() {

        return new Login;

    }

}