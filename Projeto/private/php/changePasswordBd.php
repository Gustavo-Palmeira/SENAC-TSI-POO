<?php

if (isset($_POST['changePasswordForm'])) {

  require 'dataConsistency.php';
}

if (isset($erros) && count($erros) > 0) {
?>

  <body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="row">
        <div class="col-12 mx-auto text-center bg-white" id="box-border">
          <form method="post" id="box-form" action="../../private/php/changePasswordBd.php">
            <h1 class="text-uppercase h2">Trocar Senha</h1>
            <?php

            if (isset($erros)) {
              foreach ($erros as $erro) {
                echo $erro . '<br>';
              }
            }

            ?>
            <label class="mt-3 mb-0" for=""> E-mail </label>
            <div class="input-border mt-0">
              <input class="input-style input-invisible" type="text" name="emailForm" id="emailForm" required>
              <img class="icon-style ml-2" src="../../public/img/icons/email.svg" alt="Ícone e-mail">
            </div>
            <label class="mt-3 mb-0" for=""> Confirmar E-mail </label>
            <div class="input-border mt-0">
              <input class="input-style input-invisible" type="text" name="confEmailForm" id="confEmailForm" required>
              <img class="icon-style ml-2" src="../../public/img/icons/email.svg" alt="Ícone e-mail">
            </div>
            <button href="#" class="btn-submit mx-auto mt-2">
              <input type="hidden" name="changePasswordForm" id="changePasswordForm" value="changePasswordForm">
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
  echo "Deu certo";

  //Envio de e-mail para troca de senha 
  // $to = $_POST['emailForm'];
  $to = 'arthur@brindesdeluxo.com.br';
  $subject = "Troca de senha - Mega-Triunfo";
  $message = "Olá, tudo certo? Acesse o link abaixo para alterar a senha de acesso ao sistema Mega-Triunfo: ";
  $headers =  "From: admin@localhost.com" . "\r\n" .
              "Reply-To: admin@localhost.com" . "\r\n";

  if (mail($to, $subject, $message, $headers)) {
    echo "E-mail de confirmação enviado!";
  } else {
    echo "Erro ao enviar o e-mail";
  }
}
