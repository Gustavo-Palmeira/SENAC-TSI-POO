<?php

require('classes/changePassword.class.php');

class FactoryChangePassword {

    static public function changePassword() {

        return new ChangePassword;

    }

}