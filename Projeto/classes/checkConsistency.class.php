<?php 

require_once(__DIR__ . '/../interfaces/check.interface.php');
require_once( __DIR__ .  './abstratas/database.class.php');

class CheckConsistency extends Database {

    public function check($object) {
        $erros = $object->checkConsistency();
        return $erros;
    }
}