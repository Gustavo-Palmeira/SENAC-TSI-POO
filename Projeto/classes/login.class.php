<?php 

require_once(__DIR__ . '/../interfaces/login.interface.php');
require_once( __DIR__ .  '/abstratas/database.class.php');

class Login extends Database implements iLogin {

    protected $login;
    protected $password;

    public function __construct() {
        parent::__construct();
    }

    public function setLogin(): bool {
        $this->login = filter_var($_POST['userLoginIndex'], FILTER_SANITIZE_EMAIL);
        $this->password = $_POST['passwordLoginIndex'];
        return true;
    }

    public function userLogin() {
        $bdquery = $this->query("SELECT userPassword FROM userLogin WHERE userEmail = '$this->login' ");
        $record = $bdquery->fetch(PDO::FETCH_ASSOC);
        $hash = $record['userPassword'];

        if (password_verify($this->password, $hash)) {
            include $_SERVER['DOCUMENT_ROOT'] . '/SENAC-TSI-POO/Projeto/public/html/start-game.php';
        } else {
            header('Location: ./index.php?msg=Credenciais inválidas');
        }
    }
}