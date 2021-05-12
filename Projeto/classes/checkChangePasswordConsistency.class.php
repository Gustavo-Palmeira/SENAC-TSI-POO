<?php 

require_once(__DIR__ . '/../interfaces/check.interface.php');
require_once( __DIR__ .  './abstratas/database.class.php');

class checkChangePasswordConsistency extends Database implements iCheck {

    // Consistência de dados utilizando Strategy.

    public function checkConsistency(): array {
        $erros = [];

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'E-mail inválido';
        }

        if ($this->email !== $this->emailConf) {
            $erros[] = "Os e-mails não são iguais";
        }
        
        return $erros;
    }
}
