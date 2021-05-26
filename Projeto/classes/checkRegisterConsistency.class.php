<?php 

require_once(__DIR__ . '/../interfaces/check.interface.php');
require_once( __DIR__ .  './abstratas/database.class.php');
require_once( __DIR__ .  './CheckConsistency.class.php');

class CheckRegisterConsistency extends CheckConsistency implements iCheck {

    // Consistência de dados utilizando Strategy.

    public function checkConsistency(): array {
        $erros = [];

        if (strlen($this->name) < 2) {
            $erros[] = $this->name;
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
