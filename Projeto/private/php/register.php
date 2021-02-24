<?php

if (isset($_POST['register'])) {

  require 'dataConsistency.php';
}

if (isset($erros) && count($erros) > 0) {
?>

  <body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="row">
        <div class="col-12 mx-auto text-center bg-white" id="box-border">
          <form id="box-form" method="post" action="../../private/php/register.php">
            <h1 class=" text-uppercase h2"> Criar Conta </h1>
            <?php
            if (count($erros) > 0) {

              foreach ($erros as $erro) {
                echo $erro . '<br>';
              }
            }
            ?>
            <label class="mt-3 mb-0" for=""> Usuário </label>
            <div class="input-border mt-0">
              <input class="input-style input-invisible" type="text" name="userForm" id="userForm" required>
              <img class="icon-style ml-4" src="../../public/img/icons/user.svg" alt="Ícone usuário">
            </div>
            <label class="mb-0" for=""> E-mail </label>
            <div class="input-border mt-0">
              <input class="input-style input-invisible" type="text" name="emailForm" id="emailForm" required>
              <img class="icon-style ml-4" src="../../public/img/icons/email.svg" alt="Ícone e-mail">
            </div>
            <label class="mb-0" for=""> Senha </label>
            <div class="input-border mt-0">
              <input class="input-style input-invisible password-type" type="password" name="passwordForm" id="passwordForm" required>
              <img class="icon-style icon-eye-style ml-4" src="../../public/img/icons/eye.svg" alt="Ícone senha" onclick="changePasswordPrivate()">
            </div>
            <label class="mb-0" for=""> Confirmar Senha </label>
            <div class="input-border mt-0">
              <input class="input-style input-invisible" type="password" name="passwordConfForm" id="passwordConfForm" onpaste="return false" ondrop="return false" required>
              <img class="icon-style ml-4" src="../../public/img/icons/key.svg" alt="Ícone senha">
            </div>
            <button href="#" class="btn-submit mx-auto mt-2" style="background-color: #0c0027;">
              <input type="hidden" name="register" id="register" value="register">
              <span class="btn-border"></span>
              <img class="icon-style icon-arrow-style" src="../../public/img/icons/arrow.svg" alt="Ícone senha">
            </button>
            <a class="mt-5 text-dark" href="../../index.php"> Voltar </a>
          </form>
        </div>
      </div>
    </div>
  </body>

<?php } else {
  require 'database/db.php';

  if (isset($_POST['register'])) {

    function registerUser(string $name, string $email, string $password): ?int
    {
      global $database;

      $password = password_hash($password, PASSWORD_DEFAULT);

      $stmt = $database->prepare("	INSERT INTO userLogin 
                                      ( userName, userEmail, userPassword ) 
                                    VALUES 
                                      ( :namePrep, :emailPrep, :passwordPrep )");

      $stmt->bindParam(':namePrep', $name);
      $stmt->bindParam(':emailPrep', $email);
      $stmt->bindParam(':passwordPrep', $password);
      $stmt->execute();

      return $database->lastInsertId();
    }

    $id = registerUser($_POST['userForm'], $_POST['emailForm'], $_POST['passwordForm']);

    if ($id) {
      echo "Criou";

      session_start();
  
      $_SESSION['login'] = $_POST['emailForm'];
  
      header('Location: login.php');
    }
  }
}
