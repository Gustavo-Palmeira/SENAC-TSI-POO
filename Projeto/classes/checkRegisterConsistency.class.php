<?php 

require_once(__DIR__ . '/abstratas/checkConsisty.class.php');

class CheckRegisterConsistency extends CheckConsistency {
    public function checkConsistency(): array {
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
}
