<?php

require('classes/register.class.php');

class FactoryRegister {

    static public function register() {

        return new Register;

    }

}