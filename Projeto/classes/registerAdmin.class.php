<?php 

require_once(__DIR__ . '/../interfaces/register.interface.php');
require_once(__DIR__ . '/../interfaces/registerAdmin.interface.php');
require_once(__DIR__ .  './checkRegisterConsistency.class.php');

class Register extends CheckRegisterConsistency implements iRegister, iRegisterAdmin {

    protected $name;
    protected $email;
    protected $passwordForm;
    protected $passwordConf;

    public function __construct() {
        parent::__construct();
    }

    public function setRegister(): bool {

    }
    
    // Consistência de dados retirada, pois fera o 1° princípio do SOLID

    public function registerAdmin(): bool {
        
    }
}