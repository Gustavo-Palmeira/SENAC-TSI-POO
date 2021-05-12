<?php 

require_once(__DIR__ . '/../interfaces/changePassword.interface.php');
require_once(__DIR__ .  './checkChangePasswordConsistency.class.php');

class ChangePassword extends checkChangePasswordConsistency implements iChangePassword {

    protected $email;
    protected $emailConf;

    public function __construct() {
        parent::__construct();
    }

    public function setPassword(): bool {
        $this->email = strToLower($_POST['emailForm']) ?? null;
        $this->emailConf = strToLower($_POST['confEmailForm']) ?? null;
        return true;
    }
    
    // Consistência de dados retirada, pois fera o 1° princípio do SOLID

    public function changePassword(): bool {
        //
        return true;
    }
}