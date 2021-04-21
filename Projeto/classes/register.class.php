<?php 

require_once(__DIR__ . '/../interfaces/register.interface.php');
require_once( __DIR__ .  '/abstratas/database.class.php');

class Register extends Database implements iRegister {

    protected $name;
    protected $email;
    protected $passwordForm;
    protected $passwordConf;

    public function __construct() {
        parent::__construct();
    }

    public function setRegister(): bool {
        $this->name = $_POST['userForm'] ?? null;
        $this->email = strToLower($_POST['emailForm']) ?? null;
        $this->passwordForm = trim($_POST['passwordForm']) ?? null;
        $this->passwordConf = $_POST['passwordConfForm'] ?? null;
        return true;
    }

    public function checkRegisterConsistency(): array {
        $erros = [];

        if (strlen($this->name) < 2) {
            $erros[] = "O nome deve contém pelo menos 2 caracteres";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'E-mail inválido';
        }

        if (strlen($this->passwordForm) < 8) {
            $erros[] = "A senha deve conter 8 caracteres ou mais";
        } else if ($this->passwordForm != $this->passwordConf) {
            $erros[] = "As senhas não são iguais";
        }
        
        return $erros;
    }

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