<?php include $_SERVER['DOCUMENT_ROOT'] . "/SENAC-TSI-POO/Projeto/public/html/partials/indexHead.php"; ?>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row">
      <div class="col-12 mx-auto text-center bg-white mt-5" id="box-border">
        <form id="box-form-login" method="post" action="./sistemaLogin.php">
          <img class="logo" src="./public/img/logo-mega-triunfo.svg">
          <?php

            $msg = $_GET['msg'] ?? NULL;
            if (isset($msg)) {
              echo "$msg";
            } 

          ?>
          <!-- <h1 class="text-uppercase"> Login </h1> -->
          <label class="mb-0" for="userLoginIndex"> Usuário </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible" type="text" id="userLoginIndex" name="userLoginIndex">
            <img class="icon-style" src="./public/img/icons/user.svg" alt="Ícone user">
          </div>
          <label class="mt-2 mb-0" for="passwordLoginIndex"> Senha </label>
          <div class="input-border mt-0">
            <input class="input-style input-invisible password-type" type="password" id="passwordLoginIndex" name="passwordLoginIndex">
            <img class="icon-style icon-eye-style" src="./public/img/icons/eye.svg" alt="Ícone senha" onclick="changePasswordIndex()">
          </div>
          <button href="#" class="btn-submit mx-auto mt-2" type="submit" name="startLogin">
            <span class="btn-border"></span>
            <img class="icon-style icon-arrow-style" src="./public/img/icons/arrow.svg" alt="Ícone senha">
          </button>

          <a class="mt-5 text-dark" href="./public/html/change-password.php"> Esqueci minha senha </a>
          <a class="text-dark" href="./public/html/create-user.php"> Criar uma conta </a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>