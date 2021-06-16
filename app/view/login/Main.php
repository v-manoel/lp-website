<body>
  <div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>
     
    <div class="content">      
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="POST" action="<?= DIRPAGE.'login/logar/';?>">
          <a href="<?= DIRPAGE.'home/';?>"><img src="<?= DIRIMG . 'icons/voltar.svg'; ?>" style="height: 30px; width: 30px;"></a>
          <h1>Login</h1>

          <p> 
            <label for="nome_login">Seu email</label>
            <input id="nome_login" name="email" required="required" type="email" placeholder="user@lapechincha.com"/>
          </p>
           
          <p> 
            <label for="email_login">Sua senha</label>
            <input id="email_login" name="pswd" required="required" type="password" placeholder="Digite sua senha" /> 
          </p>

           
          <p> 
            <input type="checkbox" name="manterlogado" id="manterlogado" value="permanent_login" /> 
            <label for="manterlogado">Manter-me logado</label>
          </p>
           
          <p> 
            <input type="submit" value="Logar" name="logar"/> 
          </p>
           
          <p class="link">
            Ainda não tem conta?
            <a href="#paracadastro">Cadastre-se</a>
          </p>
        </form>
      </div>
 
      <!--FORMULÁRIO DE CADASTRO-->
      <div id="cadastro">
        <form method="post" action="<?= DIRPAGE.'login/register/';?>">
          <a href="<?= DIRPAGE.'home/';?>"><img src="<?= DIRIMG . 'icons/voltar.svg'; ?>" style="height: 30px; width: 30px;"></a>
          <h1>Cadastro</h1> 
           
          <p> 
            <label for="name_cad">Seu nome</label>
            <input id="name_cad" name="name_cad" required="required" type="text" placeholder="nome" />
          </p>
          <p> 
            <label for="nome_cad">Seu CPF</label>
            <input id="cpf_cad" name="cpf_cad" required="required" type="text" placeholder="cpf" />
          </p>
           
          <p> 
            <label for="email_cad">Seu e-mail</label>
            <input id="email_cad" name="email_cad" required="required" type="email" placeholder="user@lapechincha.com"/> 
          </p>
           
          <p> 
            <label for="pswd_cad">Sua senha</label>
            <input id="pswd_cad" name="pswd_cad" required="required" type="password" placeholder="ex. 1234"/>
          </p>
           
          <p> 
            <input type="submit" value="Cadastrar" name="Enviar"/> 
          </p>
           
          <p class="link">  
            Já tem conta?
            <a href="#paralogin"> Ir para Login </a>
          </p>
        </form>
      </div>
    </div>
  </div>  
</body>