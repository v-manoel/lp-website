<form class="container-fluid col-4 mt-5 row ml-4 mr-3 account-login-form" onsubmit="return checkLoginUpdateFields()"   action="<?php echo DIRPAGE . 'account/loginUpdate'; ?>" method="POST">
      <div class="col-md-12">
        <label for="email" class="form-label my-0 text-secondary ">Insira um novo Email</label>
        <input type="email" class="form-control" name="email" id="email"  value="<?= $this->customer->getCustomer()->getEmail(); ?>">
      </div>
      
      <div class="col-md-12 mt-3">
        <hr>
      </div>

      <div class="col-md-12">
        
        <label for="lpswd" class="form-label text-secondary my-0">Senha Antiga</label>
        
        <span class="row col-12 px-0 mx-0">
          <div class="col-md-10 p-0 ">
            <input type="password" class="form-control pswd" id="lpswd" name="lpswd" required>
            <i class="hide-pass bi bi-eye-slash h6 text-secondary" onmousedown="HidePassword(this,'lpswd')" onmouseup="showPassword(this,'lpswd')"></i>
          </div>
          <div class="col-md-2 p-0 text-right">
            <i onclick="launch_toast()" class="bi bi-info-square-fill text-primary  h4"></i>
            <div id="toast">
              <div id="img">
              <img width="46px" alt="logo" src="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>"/>
              </div>
              <div class="mt-2" id="desc">Insira a sua senha mais recente</div>
            </div>
          </div>
         
        </span>
      </div>
      

      <div class="col-md-12 mt-2">
        <label for="npswd" class="form-label text-secondary my-0">Criar Senha</label>
        <input type="password" class="form-control pswd" id="npswd" name="npswd" required>
        <i class="hide-pass bi bi-eye-slash h6 text-secondary" onmousedown="HidePassword(this,'npswd')" onmouseup="showPassword(this,'npswd')"></i>
      </div>

      <div class="col-md-12 mt-2">
        <label for="npswd_check" class="form-label text-secondary my-0">Repita a Senha</label>
        <input type="password" class="form-control pswd" id="npswd_check" name="npswd_check" required>
        <i class="hide-pass bi bi-eye-slash h6 text-secondary" onmousedown="HidePassword(this,'npswd_check')" onmouseup="showPassword(this,'npswd_check')"></i>
      </div>

      <div class="col-12 mt-4">
        <div class="form-check text-right">
          <input class="form-check-input" type="checkbox" value="" id="conditions_term" checked required>
          <label class="form-check-label" for="conditions_term">
            Aceito os termos e condições
          </label>
        </div>
      </div>
      <div class="col-12 text-end mt-4 mb-5">
        <button class="btn btn-primary" type="submit">Atualizar</button>
      </div>
 
  </form>

  <div class="col-2 mt-5 mx-2 py-0 text-left container-fluid">
    <img class="mt-2 mb-2" width="86px" id="header_logo_left" alt="logo" src="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>"/>
    <h5 class="fw-normal mt-auto text-secondary">Bem vindo <?= $this->customer->getCustomer()->NamePieces()[0]; ?>  !!</h5>
    <h6 class="fw-normal text-dark">Altere os dados da sua conta @LaPechincha</h6>
  </div>



