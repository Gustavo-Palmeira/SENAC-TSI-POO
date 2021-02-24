<?php include $_SERVER['DOCUMENT_ROOT'] . "/SENAC-TSI-POO/Projeto/public/html/partials/head.php"; ?>

<body class='d-flex vh-100 align-items-center justify-content-center flex-wrap overflow-start'>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . "/SENAC-TSI-POO/Projeto/public/html/partials/header.php";

  ?>


  <main class='d-flex justify-content-center align-items-center row bg-white container-size container-shadow col-6'>

    <h1 class="w-100 text-center mx-auto">Perfil</h1>
    <div class='mx-auto '>
      <div class="my-5">
        <span class='h5 mt-3'>Nome</span>
        <h3><?php echo $data['userName']; ?></h3>
      </div>

      <div class="my-5">
        <span class='h5 mt-3'>Usuário</span>
        <h3><?php echo $data['userEmail']; ?></h3>
      </div>
    </div>
    <div class='mx-auto '>
      <div class="my-5">
        <span class='h5 mt-3'>Nível de Usuário</span>
        <h3><?php echo $userLevel; ?></h3>
      </div>
    </div>



    <div class='container d-flex flex-row justify-content-center align-items-center'>
      <div class='container d-flex flex-wrap justify-content-center'>
        <a class='manage-card-buttons btn-std mx-auto d-flex justify-content-center align-items-center' href="../../public/html/change-password.php">
          Alterar Senha
          <span class='manage-card-buttons-border'></span>
        </a>
        <?php
        if ($data['userLevel'] == '1' || $data['userLevel'] == NULL) {
          echo '';
        } else {
          echo "           
               <a class='manage-card-buttons btn-std mx-auto d-flex justify-content-center align-items-center' href='mailto:webmaster@megatriunfo.com.br?subject=Requisição%20de%20conta%20Administradora&body=Tornar%20o%20usuário%20{$data['userEmail']}%20Administrador.'>
              Se Tornar Admin
              <span class='manage-card-buttons-border'></span>
            </a>";
        }
        ?>
      </div>
    </div>

    </div>
  </main>
</body>
<!-- Fazer uma query no BD, virar admin será um mailto para um admin e alterar senha será uma alteração no bd-->

</html>