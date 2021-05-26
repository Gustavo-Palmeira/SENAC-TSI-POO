<?php 

require_once(__DIR__ . '/../interfaces/register.interface.php');
require_once(__DIR__ . '/../interfaces/registerUser.interface.php');
require_once(__DIR__ .  './checkRegisterConsistency.class.php');

class Register extends CheckRegisterConsistency implements iRegister, iRegisterUser {

    protected $name;
    protected $email;
    protected $passwordForm;
    protected $passwordConf;

    public function __construct() {
        parent::__construct();
    }

    public function setRegister(): bool {
        $this->name = $_POST['emailForm'] ?? null;
        $this->email = strToLower($_POST['emailForm']) ?? null;
        $this->passwordForm = trim($_POST['passwordForm']) ?? null;
        $this->passwordConf = $_POST['passwordConfForm'] ?? null;
        return true;
    }
    
    // Consistência de dados retirada, pois fera o 1° princípio do SOLID

    public function registerUser(): bool {
        $this->passwordForm = password_hash($this->passwordForm, PASSWORD_DEFAULT);

        $stmt = $this->prepare("	    INSERT INTO userLogin 
                                        ( userName, userEmail, userPassword ) 
                                        VALUES 
                                        ( :namePrep, :emailPrep, :passwordPrep )");

        $stmt->bindParam(':namePrep', $this->name);
        $stmt->bindParam(':emailPrep', $this->email);
        $stmt->bindParam(':passwordPrep', $this->passwordForm);
        $stmt->execute();

        return true;
    }
}