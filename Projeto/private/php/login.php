<?php

/* //require './sessionStart.php';

require $_SERVER['DOCUMENT_ROOT'] . "/SENAC-TSI-POO/Projeto/private/php/database/db.php";

// $pass = password_hash('admin', PASSWORD_DEFAULT);  
// $database->query("INSERT INTO userLogin (userEmail, userPassword) VALUES ('arthur@senac.com.br', '$pass')"); 


if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
  session_start();

  include $_SERVER['DOCUMENT_ROOT'] . '/SENAC-TSI-POO/Projeto/public/html/partials/head.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/SENAC-TSI-POO/Projeto/public/html/start-game.php';

  $_SESSION['login'] = false;
} else if (isset($_POST['startLogin'])) {

  $login = filter_var($_POST['userLoginIndex'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['passwordLoginIndex'];

  // Verificar se existe usuário
  $bdquery = $database->query("SELECT userPassword FROM userLogin WHERE userEmail = '$login' ");
  $record = $bdquery->fetch(PDO::FETCH_ASSOC);
  $hash = $record['userPassword'];

  // Comparar
  if (password_verify($password, $hash)) {

    session_start();
    $_SESSION['login'] = $login;

    //include $_SERVER['DOCUMENT_ROOT'] . '/SENAC-TSI-POO/Projeto/public/html/partials/privateHead.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/SENAC-TSI-POO/Projeto/public/html/start-game.php';
  } else {

    $_SESSION['login'] = '';
    header('Location: ../../index.php?msg=Credenciais inválidas');
  }
} else {

  $msg = "Erro";
  header('Location: ../../index.php');
}
 */