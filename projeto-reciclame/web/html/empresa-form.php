<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>

  <!-- Principal CSS do Bootstrap -->
  <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">


  <!-- Estilos customizados para esse template -->
  <link href="https://getbootstrap.com.br/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">


  <script type="text/javascript">
    function validaCampo() {
      if (document.login.usuario.value == "") {
        function emailMask(email) {
          var maskedEmail = email.replace(/([^@\.])/g, "*").split('');
          var previous = "";
          for (i = 0; i < maskedEmail.length; i++) {
            if (i <= 1 || previous == "." || previous == "@") {
              maskedEmail[i] = email[i];
            }
            previous = email[i];
          }
          return maskedEmail.join('');
        }
        alert("O campo usuário é obrigatório!");
        return false;
      }
      if (document.login.senha.value == "") {
        var password = document.getElementById("senha")
          , ;

        function validatePassword() {
          if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Senhas diferentes!");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        alert("O campo senha é obrigatório!");
        return false;
      } else
        return true;
    }
  </script>
  <link rel="stylesheet" href="../style/style-form.css">
</head>

<body class="text-center flex-column">
  <h1 class="font-weight-bold text-dark"></h1>

  <form action="empresa-login.php" method="post" class="form-signin" name="login"
    onsubmit="return validaCampo(); return false;">
    <img src="../img/Free_Sample_By_Wix__3_-removebg-preview.png" alt="logo">
    <h1 class="">Login</h1>
    <label for="usuario" class="sr-only">email</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail">
    <label for="senha" class="sr-only">Senha</label>
    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
    <div class="checkbox mb-3">

      <button class="btn btn-lg  btn-block" type="submit">Login</button>
      <span>ainda não possue uma conta para sua Empresa? <a href="cadastro-empresa.php">Clique aqui</a> para se
        cadastrar.</span>
  </form>
</body>

</html>