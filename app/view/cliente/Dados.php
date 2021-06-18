<form class="col-6 mt-5 row"  action="<?php echo DIRPAGE . 'account/dataUpdate'; ?>" method="GET">
    <div class="col-md-2 mb-3">
      <img id="header_logo_left" width="86px" alt="logo" src="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>"/>
    </div>
    <div class="col-md-10 mb-3 text-left my-auto">
      <h5 class="fw-normal mt-auto text-secondary">Bem vindo <?= $this->customer->getCustomer()->NamePieces()[0]; ?>  !!</h5>
      <h6 class="fw-normal text-dark">Valide ou Atualize suas informações pessoais</h6>
    </div>
    <div class="col-md-6 mt-2">
      <label for="fname" class="form-label text-secondary my-0">Primeiro Nome</label>
      <input type="text" class="form-control" id="fname" name="fname" value="<?= $this->customer->getCustomer()->NamePieces()[0]; ?>" required>
    </div>
    <div class="col-md-6 mt-2">
      <label for="lname" class="form-label text-secondary my-0">Último Nome</label>
      <input type="text" class="form-control" id="lname" name="lname" value="<?= $this->customer->getCustomer()->NamePieces()[1]; ?>" required>
    </div>
    <div class="col-md-8 mt-2">
      <label for="email" class="form-label my-0 text-secondary ">Email Cadastrado</label>
      <input type="email" class="form-control" name="email" id="email"  value="<?= $this->customer->getCustomer()->getEmail(); ?>">
    </div>
    <div class="col-md-4 mt-2">
      <label for="genre" class="form-label text-secondary my-0">Genêro</label>
      <select class="form-select py-0 pb-1" id="genre" name="genre" required>
      <option value="" selected disabled hidden><?= $this->customer->getCustomer()->getGenre(); ?></option>
        <option value="F">Feminino</option>
        <option value="M">Masculino</option>
      </select>
    </div>
    <div class="col-md-6 mt-2">
      <label for="phone" class="form-label text-secondary my-0">Celular</label>
      <input type="text" class="form-control" id="phone" name="phone" value="<?= $this->customer->getCustomer()->getPhone(); ?>" required>
    </div>
    <div class="col-md-6 mt-2">
      <label for="birthday" class="form-label text-secondary my-0">Data de Nascimento</label>
      <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $this->customer->getCustomer()->getBirthday(); ?>" required>
    </div>

    <div class="col-12 mt-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="conditions_term" checked required>
        <label class="form-check-label" for="conditions_term">
          Aceito os termos e condições
        </label>
      </div>
    </div>
    <div class="col-12 text-end mt-4">
      <button class="btn btn-primary" type="submit">Atualizar</button>
    </div>
  </form>