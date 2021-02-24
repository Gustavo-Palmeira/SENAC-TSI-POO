<?php
echo 'Safety hã?<br>';
//Silence is golden

// TESTE -> REMOVER DEPOIS

require_once 'db.php';

$sql = $database -> query('SELECT * FROM userLogin');

foreach ($sql as $query) {
    echo "Usuário ADM padrão: {$query['userName']} <br>Senha ADM padrão: {$query['userPassword']} ";
}