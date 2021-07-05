<div class="col-6 row">
<?php foreach ($this->customer->getCards() as $card) { ?>
  <div class="col-md-6 mt-5 ">
    <div class="iterativeCard delcard" onmouseover="cardOption(this)" onmouseout="cardOption(this)" id="">
      <div class="flagCard bi bi-layers-half h2 text-center text-white"> </div>

      <div class="h4 text-light text-center mt-5 mb-2 number">
        <span class="me-2"><?= $card->getNumber()[0].''.$card->getNumber()[1].''.$card->getNumber()[2].''.$card->getNumber()[3] ?></span>
        <span class="me-2"><?= $card->getNumber()[4].''.$card->getNumber()[5].''.$card->getNumber()[6].''.$card->getNumber()[7] ?></span>
        <span class="me-2"><?= $card->getNumber()[8].''.$card->getNumber()[9].''.$card->getNumber()[10].''.$card->getNumber()[11] ?></span>
        <span class="me-2"><?= $card->getNumber()[12].''.$card->getNumber()[13].''.$card->getNumber()[14].''.$card->getNumber()[15] ?></span>
      </div>
      <form action="<?= DIRPAGE.'account/page/delCard'?>" method="POST" class="edittype my-auto text-center h5 text-white" hidden>
          <input type="hidden" name="card-id" value="<?= $card->getNumber() ?>">
          <button  type="submit" class=" border-0 bg-transparent h5 text-white mt-3">Deletar</button>
      </form>
      <div class="text-light text-center text-monospace data">
        <span class="float-left ml-3"><?= $card->getHolder() ?></span>
        <span class="float-right me-3"><?= substr($card->getExpiration(),5,2).'/'.substr($card->getExpiration(),2,2);?></span>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="col-md-6 mt-5 ">
    <div class="iterativeCard newcard" onmouseover="cardOption(this)" onmouseout="cardOption(this)" id="">
      <div class="flagCard bi bi-layers-half h2 text-center text-white"> </div>

      <div class="h4 text-light text-center mt-5 mb-2 number">
        <span class="me-2">* * * *</span>
        <span class="me-2">* * * *</span>
        <span class="me-2">* * * *</span>
        <span class="">* * * *</span>
      </div>
      <div class="edittype text-center mt-4 h4 text-white" hidden>
        <a class="text-decoration-none text-white" href="<?= DIRPAGE.'account/page/newCard'?>"> Cadastrar </a>
      </div>
      <div class="text-light text-center text-monospace data">
        <span class="float-left ml-3">NOME E SOBRENOME</span>
        <span class="float-right me-3">MM/AA</span>
      </div>
    </div>
  </div>
</div>

  <div class="row container-fluid p-0 m-0 col-2">
    <div class="col-12 mt-5 mx-2 pt-0 pb-3 text-left container-fluid">
      <img class="mt-2 mb-2" width="86px" id="header_logo_left" alt="logo" src="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>" />
      <h5 class="fw-normal mt-auto text-secondary">Bem vindo <?= $this->customer->getCustomer()->NamePieces()[0]; ?> !!</h5>
      <h6 class="fw-normal text-dark">Cadastre ou remova seus cartões no @LaPechincha</h6>
    </div>
    <div class="col-12 mt-0 pt-0 pb-4 container-fluid">
      <div class="card payment-card my-4 bg-transparent text-center">
        <div class="card-body p-2">
          <h6 class="mb-4 pt-2 ">Meios de pagamento</h6>
          <div class="btn btn-success w-100"><i class="bi bi-credit-card-2-front me-2"></i> Pague em até <b>12</b>x sem juros!</div>

          <div class="mt-4">
            <p class="my-1">Cartões de crédito</p>
            <i class="bi bi-credit-card-2-front h2 m-auto"></i>
            <i class="bi bi-credit-card-2-front h2 m-auto"></i>
            <i class="bi bi-credit-card-2-front h2 m-auto"></i>
            <i class="bi bi-credit-card-2-front h2 m-auto"></i>
          </div>

          <div class="mt-4">
            <p class="my-1">Transferencia PIX</p>
            <i class="bi bi-x-diamond-fill h3 "></i>
          </div>
        </div><!-- card body -->
      </div><!-- card -->
    </div>
  </div>