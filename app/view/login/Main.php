<body>
  <div class="container">
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>

    <div class="content ">
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login" class="bg-white rounded shadow-lg px-0 pb-0">
        <form method="POST" action="<?= DIRPAGE . 'login/logar/'; ?>" class="px-2">
          <a href="<?= DIRPAGE . 'home/'; ?>"><img src="<?= DIRIMG . 'icons/voltar.svg'; ?>" style="height: 30px; width: 30px;"></a>
          <h1 class="mb-0">Login</h1>

          <p class="my-1">
            <label class="mb-0" for="nome_login">Seu email</label>
            <input id="nome_login" class="p-1 m-0 w-100 bg-transparent border-none" name="email" required="required" type="email" placeholder="user@lapechincha.com" />
          </p>

          <p class="my-1">
            <label class="mb-0" for="email_login">Sua senha</label>
            <input id="email_login" class="p-1 m-0 w-100" name="pswd" required="required" type="password" placeholder="Digite sua senha" />
          </p>


          <p class="my-3">
            <input type="checkbox" name="manterlogado" id="manterlogado" value="permanent_login" />
            <label for="manterlogado">Manter-me logado</label>
          </p>

          <p class="w-50 mx-auto py-1 mt-4 mb-2">
            <input type="submit" class="p-1" value="Logar" name="logar" />
          </p>

        </form>
        <div class="bg-warning py-2 row border-top rounded-bottom w-100 mx-auto">
          <div class="col-6 py-0 my-auto">
          Ainda não tem conta?
          </div>
          <div class="col-6 py-0 my-auto text-end">
            <a href="#paracadastro" class="btn btn-primary text-white text-decoration-none py-1"> Cadastre-se </a>
          </div>
        </div>
      </div>

      <!--FORMULÁRIO DE CADASTRO-->
      <div id="cadastro" class="bg-white rounded shadow-lg px-0 pb-0">
        <form method="post" action="<?= DIRPAGE . 'login/register/'; ?>" class="px-2">
          <a href="<?= DIRPAGE . 'home/'; ?>"><img src="<?= DIRIMG . 'icons/voltar.svg'; ?>" style="height: 30px; width: 30px;"></a>
          <h1 class="mb-0">Cadastro</h1>
          <p class="my-1">
            <label class="mb-0" for="name_cad">Seu nome</label>
            <input id="name_cad" class="p-1 m-0 w-100 bg-transparent border-none" name="name_cad" required="required" type="text" placeholder="Ex: João Miguel Santana" style="height: 30px;" />
          </p>
          <p class="my-1">
            <label class="mb-0" for="nome_cad">Seu CPF</label>
            <input id="cpf_cad" class="p-1 m-0 w-100" name="cpf_cad" required="required" type="text" placeholder="cpf" />
          </p>

          <p class="my-1">
            <label class="mb-0" for="email_cad">Seu e-mail</label>
            <input id="email_cad" class="p-1 m-0 w-100" name="email_cad" required="required" type="email" placeholder="user@lapechincha.com" />
          </p>

          <p class="my-1">
            <label class="mb-0" for="pswd_cad">Sua senha</label>
            <input id="pswd_cad" class="p-1 m-0 w-100" name="pswd_cad" required="required" type="password" placeholder="ex. 1234" />
          </p>

          <p class="w-50 mx-auto py-1 mt-4 mb-2">
            <input type="submit" class="p-1" value="Cadastrar" name="Enviar" />
          </p>

        </form>
        <div class="bg-warning py-2 row border-top rounded-bottom w-100 mx-auto">
          <div class="col-6 py-0 my-auto">
            Já tem conta?
          </div>
          <div class="col-6 py-0 my-auto text-end">
            <a href="#paralogin" class="btn btn-primary text-white text-decoration-none py-1"> Ir para Login </a>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <script src="<?= DIRJS . 'layout.js'; ?>"></script>
  <?php echo $this->addFooter(); ?>
</body>