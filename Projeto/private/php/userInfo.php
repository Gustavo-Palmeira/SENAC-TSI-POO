<?php
//chdir(__DIR__);
// require_once 'sessionStart.php';
session_start();
require_once './database/db.php';

$emailLogin = $_SESSION['login'];

$queryUser = $database->query("SELECT userName, userEmail, userLevel FROM userLogin WHERE userEmail = '$emailLogin'");

$data = $queryUser->fetch(PDO::FETCH_ASSOC);

$userLevel = $data['userLevel'] == "1" || $data['userLevel'] == NULL ? 'Administrador' : 'Usuário';

$queryUser->execute();

include $_SERVER['DOCUMENT_ROOT'] . "/SENAC-TSI-POO/Projeto/public/html/profile.php";
