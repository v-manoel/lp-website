<div class="accordion col-5 mt-5 ml-4 mr-3" id="accordionExample">
  <?php foreach ($this->customer->getAddresses() as $addr) { ?>
  <div class="accordion-item p-0">
    <form action="<?= DIRPAGE.'account/page/newAddress'?>" method="post">
      <h2 class="accordion-header" id="<?= 'heading'.$addr->getName(); ?>">
        <div class="accordion-button collapsed pl-1 py-1" type="button" data-bs-toggle="collapse" data-bs-target="<?= '#collapse'.$addr->getId(); ?>" aria-expanded="false" aria-controls="<?= 'collapse'.$addr->getId(); ?>">
          <div class="address-icon col-1">
            <i class="bi bi-house-fill h2"></i>
          </div>
          <input readonly type="text" class=" h6 my-auto col-9 ml-3 text-left bg-transparent border-0" name="addr-name" value="<?= $addr->getName(); ?>">
          <button type="submit" class="btn btn-default bg-transparent border-0">
            <i class="bi bi-pencil-fill h6"></i>
          </button>
        </div>
      </h2>
      <div id="<?= 'collapse'.$addr->getId(); ?>" class="accordion-collapse collapse" aria-labelledby="<?= 'heading'.$addr->getId(); ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <input type='hidden' readonly name="addr-id" value="<?= $addr->getId(); ?>"> 
          <div class="input-group mb-3">
            <span class="input-group-text h-100" id="basic-addon1">Destinatário </span>
            <input type="text" class="form-control bg-white " name="addr-destinatary" readonly aria-label="Username" aria-describedby="basic-addon1" value="<?= $addr->getDestinatary(); ?>">
          </div>
          <div class="col-12 row p-0 w-100 mx-0">
            <div class="input-group mb-3 col-9 pl-0">
              <span class="input-group-text h-100" id="basic-addon1">Rua </span>
              <input type="text" class="form-control bg-white" readonly aria-label="Username" name="addr-street" aria-describedby="basic-addon1" value="<?= $addr->getStreet(); ?>">
            </div>
            <div class="input-group mb-3 col-3 p-0 ">
              <span class="input-group-text h-100" id="basic-addon1">Nº </span>
              <input type="text" class="form-control bg-white text-right" name="addr-number" readonly aria-label="Username" aria-describedby="basic-addon1" value="<?= $addr->getNumber(); ?>">
            </div>
          </div>
          <div class="col-12 row p-0 w-100 mx-0">
            <div class="input-group mb-3 col-3 pl-0 ">
              <span class="input-group-text h-100" id="basic-addon1">UF </span>
              <input type="text" class="form-control bg-white text-right" name="addr-uf" readonly aria-label="Username" aria-describedby="basic-addon1" value="<?= $addr->getState()->getUf(); ?>">
            </div>
            <div class="input-group mb-3 col-9 p-0">
              <span class="input-group-text h-100" id="basic-addon1">CEP</span>
              <input type="text" class="form-control bg-white" name="addr-cep" readonly aria-label="Username" aria-describedby="basic-addon1" value="<?= $addr->getCep(); ?>">
            </div>
          </div>

          <div class="input-group mb-3 pl-0 ">
            <span class="input-group-text h-100" id="basic-addon1">Bairro </span>
            <input type="text" class="form-control bg-white" name="addr-district" readonly aria-label="Username" aria-describedby="basic-addon1" value="<?= $addr->getDistrict(); ?>">
          </div>
          <div class="input-group mb-3 p-0">
            <span class="input-group-text h-100" id="basic-addon1">Cidade</span>
            <input type="text" class="form-control bg-white" name="addr-city" readonly aria-label="Username" aria-describedby="basic-addon1" value="<?= $addr->getCity()->getName(); ?>">
          </div>

          <div class="my-bg-light-gray input-label text-center rounded-top">Descrição</div>
          <textarea class="form-control border-top-0 rounded-0 rounded-bottom bg-white" name="addr-desc" readonly aria-label="With textarea"><?= $addr->getDescription(); ?></textarea>

        </div>
      </div>
    </form>
  </div>
  <?php } ?>
</div>
<div class="row container-fluid p-0 m-0 col-2">
  <div class="col-12 mt-5 mx-2 pt-0 pb-4 text-left container-fluid">
    <img class="mt-2 mb-2" width="86px" id="header_logo_left" alt="logo" src="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>" />
    <h5 class="fw-normal mt-auto text-secondary">Bem vindo <?= $this->customer->getCustomer()->NamePieces()[0]; ?>  !!</h5>
    <h6 class="fw-normal text-dark">Atualize ou cadastre endereços no @LaPechincha</h6>
  </div>
  <div class="col-10 mt-2 mx-2 pt-0 pb-4 text-left  container-fluid">
    <p class="bi bi-geo-fill text-dark h4 my-0"></p>
    <a href="<?= DIRPAGE.'account/page/newAddress'?>" class="fw-normal text-primary text-decoration-none war">Cadastre novos pontos de entrega.</a>
  </div>

</div>