<div class="col-7 mt-5 px-2" id="user-orders">
  <?php foreach ($this->customer->getOrders() as $order) { ?>
    <div class="bg-white row col-12 px-0 mb-4 py-2 m-0 rounded border shadow-sm user-order">
      <div class="col-12 mb-3 row pr-0 user-order-header">
        <h6 class="m-0 mt-auto px-2 col-9">Pedido nº <span class="font-weight-bold"><?= $order->getId(); ?></span></h6>
        <a class="col-3 mt-auto text-right px-0 text-primary text-decoration-none" href="<?= DIRPAGE . 'account/copyToCart/' . $order->getId(); ?>">Enviar ao carrinho<span class="bi bi-reply-fill h5 mx-1"></span></a>
      </div><!-- end user-order-header -->
      <div class="col-6 p-1 px-2">
        <h6 class="mb-1"> <span class="bi bi-box-seam"></span> Dados do pedido</h6>
        <div class="my-bg-light-gray p-2 border">
          <p class="font-weight-bold">Situação do pedido: <span class="font-weight-normal"><?= $order->getStatus()->getStatus(); ?></span></p>
          <p class="font-weight-bold my-1">Data do pedido: <span class="font-weight-normal"><?= date("d/m/Y H:i", strtotime($order->getDate())); ?></span></p>
          <p class="font-weight-bold">Valor do pedido: <span class="font-weight-normal price m-0"><?= 'R$ ' . floor($order->getPrice()) ?><span class="decimals align-top"><?= ($order->getPrice() * 100) % 100; ?></span></span></p>
        </div>
      </div><!-- end col -->

      <div class="col-6 p-1 px-2">
        <div class="col-12 row p-0 ml-0">
          <h6 class="mb-1 col-8 px-0"> <span class="bi bi-geo-alt-fill"></span> Dados da entrega </h6>
          <a class="col-4 text-right px-0 text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="<?= '#order-tracking-modal' . $order->getId(); ?>">Rastrear</a>
        </div>
        <div class="my-bg-light-gray p-2 border">
          <p class="font-weight-bold">Destinatário: <span class="font-weight-normal"><?= $order->getDestination()->getDestinatary(); ?></span></p>
          <p class="font-weight-bold my-1">Endereço: <span class="font-weight-normal"><?= $order->getDestination()->getStreet(); ?></span></p>
          <p class="font-weight-bold">Cep: <span class="font-weight-normal"><?= $order->getDestination()->getCep(); ?></span></p>
        </div>
      </div><!-- end col -->


      <div class="col-12 row p-1 text-end px-2 mt-1 text-decoration-none">
        <div class="col-6 text-start">
        <?php if(ucfirst($order->getStatus()->getStatus()) == "Delivered"){ ?>
          <button class="btn text-primary p-1" data-bs-toggle="modal" data-bs-target="<?= '#order-rate-modal' . $order->getId(); ?>">
            Avaliar Pedido
          </button>
        <?php } ?>
        </div><!-- end col -->
        <div class="col-6 text-end">
          <button class="btn text-primary p-1" data-bs-toggle="modal" data-bs-target="<?= '#order-details-modal' . $order->getId(); ?>">
            Ver pedido completo
          </button>
        </div><!-- end col -->
      </div><!-- end row -->

    </div><!-- end user-order -->

    <div class="modal fade" id="<?= 'order-rate-modal' . $order->getId(); ?>" tabindex="-1" aria-labelledby="<?= 'order-rate-modal-label' . $order->getId(); ?>" aria-hidden="true">
      <div class="modal-dialog">
        <form action="<?php echo DIRPAGE . 'account/EvalOrder'; ?>" method="POST">
          <input type='hidden' name='order-id' id='order-id' value='<?= $order->getId() ?>'>
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="<?= 'order-rate-modal-label' . $order->getId(); ?>"> Avaliação do Pedido <b>#<?= $order->getId(); ?></b></h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <h6>Nível de satisfação:</h6>
                <div class="rating h4">
                  <?php for ($i = 5; $i >= 1; $i--) { ?>
                    <?php if ($i == $order->getRate()) { ?>
                      <input type="radio" checked name="order-rate" value="<?= $order->getRate(); ?>" id="<?= $order->getID(); ?>"><label for="<?= $order->getId(); ?>">☆</label>
                    <?php } else { ?>
                      <input type="radio" name="order-rate" value="<?= $i ?>" id="<?=$order->getId().'order'.$i ?>"><label for="<?=$order->getId().'order'.$i ?>">☆</label>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Messagem:</label>
                <textarea class="form-control" id="message-text" name="order-rate-desc"><?= $order->getRate_description(); ?></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Enviar avaliação</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="<?= 'order-details-modal' . $order->getId(); ?>" tabindex="-1" aria-labelledby="<?= 'order-details-modal-label' . $order->getId(); ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header my-bg-yellow align text-white border-bottom">
            <h6 class="modal-title" id="<?= 'order-details-modal-label' . $order->getId(); ?>"> Detalhes do Pedido <b>#<?= $order->getId(); ?></b></h6>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body my-bg-light-gray">
            <?php foreach ($order->getItems() as $item) { ?>
              <div class="row bg-white border p-2 mb-1 mx-1 rounded">
                <div class="col-md-2 text-center m-0 px-0">
                <form action="<?php echo DIRPAGE . 'product'; ?>" method="post">
                  <input type='hidden' name='product_id' id='product_id' value='<?= $item->getProduct()->getId() ?>'>
                  <button type="submit" class="border-0 bg-transparent p-0">
                    <?php if (count($item->getProduct()->getImgs()) > 0) { ?>
                      <img src="<?= DIRIMG . $item->getProduct()->getImgs()[0]; ?>" width="75%" alt="produto">
                    <?php } else { ?>
                      <img src="<?= DIRIMG . 'examples/produtos.svg'; ?>" width="75%" alt="produto">
                    <?php } ?>
                  </button>
                </form>
                </div><!-- col -->
                <div class="col-md-7 text-secondary m-auto text-start">
                  <p><?= $item->getProduct()->getTitle(); ?></p>
                  <p>quantidade: <span><?= $item->getQnty(); ?></span></p>
                  <p class="price m-auto"><?= 'R$ ' . floor($item->getPrice()) ?><span class="decimals align-top"><?= ($item->getPrice() * 100) % 100; ?></span></p>
                </div><!-- col -->

                <div class="col-md-3 m-auto">
                  <div class="text-center">
                  <?php if(ucfirst($order->getStatus()->getStatus()) == "Delivered"){ ?>
                    <p>Avalie este Item:</p>
                    <form action="" method="POST" id="<?= $order->getId().'-'.$item->getProduct()->getId()?>">
                    <input type='hidden' name='prod-id' id='<?= 'prod'.$item->getProduct()->getId() ?>' value='<?= $item->getProduct()->getId() ?>'>
                    <input type='hidden' name='order-id' id='<?= 'order'.$order->getId() ?>' value='<?= $order->getId() ?>'>
                    <div class="rating h4">
                      <?php for ($i = 5; $i >= 1; $i--) { ?>
                        <?php if ($i == $item->getRate()) { ?>
                          <input type="radio" checked name="item-rate" value="<?= $item->getRate(); ?>" id="<?= $order->getId().'-',$item->getProduct()->getId(); ?>"><label for="<?= $order->getId().'-'.$item->getProduct()->getId(); ?>">☆</label>
                        <?php } else { ?>
                          <input type="radio" name="item-rate" onclick="RateProduct(this)" value="<?= $i ?>" id="<?= $order->getId().'prod'.$i.'-'.$item->getProduct()->getId() ?>"><label for="<?= $order->getId().'prod'.$i.'-'.$item->getProduct()->getId() ?>">☆</label>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </form>
                  <?php } ?>
                  </div>
                </div><!-- col -->

              </div><!-- modal body -->
            <?php } ?>

          </div>
          <div class="modal-footer border-top p-2">
            <button class="btn text-primary p-1" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Finalizar Avaliação</button>
          </div>
        </div>
      </div>
    </div>



    <div class="modal fade" id="<?= 'order-tracking-modal' . $order->getId(); ?>" tabindex="-1" aria-labelledby="<?= 'order-track-modal-label' . $order->getId(); ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="container padding-bottom-3x mb-1">
          <div class="card mb-3">
            <div class="modal-header my-bg-yellow align text-white ">
              <h6 class="modal-title" id="<?= 'order-track-modal-label' . $order->getId(); ?>"> Rastreamento do Pedido <b>#<?= $order->getId(); ?></b></h6>
              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-1 bg-secondary">
              <div class="w-100 text-center py-1 px-2">Entregue via: <span class="text-small text-primary">@LP
                  Express</span></div>
              <div class="w-100 text-center py-1 px-2">Status: <span class="text-small text-primary"><?= $order->getStatus()->onGoingStatus(); ?></span></div>
              <div class="w-100 text-center py-1 px-2">Atualizado: <span class="text-small text-primary">
              <?= date("d/m/Y H:i", strtotime($order->getStatus()->getUpdate_time())); ?>
                  </span></div>
            </div>
            <div class="card-body mt-5">
              <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                <div class="step completed">
                  <div class="step-icon-wrap">
                    <div class="step-icon"><i class="pe-7s-cart"></i></div>
                  </div>
                  <h4 class="step-title">Pedido Confirmado</h4>
                </div><!-- step -->
                <?php if($order->getStatus()->isCompleted("Paid")){ ?>
                <div class="step completed">
                <?php }else{ ?>
                <div class="step ">
                <?php }?>
                  <div class="step-icon-wrap">
                    <div class="step-icon"><i class="pe-7s-config"></i></div>
                  </div>
                  <h4 class="step-title">Pedido Processado</h4>
                </div><!-- step -->
                <?php if($order->getStatus()->isCompleted("Prepared")){ ?>
                <div class="step completed">
                <?php }else{ ?>
                <div class="step ">
                <?php }?>
                  <div class="step-icon-wrap">
                    <div class="step-icon"><i class="pe-7s-medal"></i></div>
                  </div>
                  <h4 class="step-title">Qualidade Checada</h4>
                </div><!-- step -->
                <?php if($order->getStatus()->isCompleted("Checked")){ ?>
                <div class="step completed">
                <?php }else{ ?>
                <div class="step ">
                <?php }?>
                  <div class="step-icon-wrap">
                    <div class="step-icon"><i class="pe-7s-car"></i></div>
                  </div>
                  <h4 class="step-title">Pedido Entregue</h4>
                </div><!-- step -->
              </div><!-- steps -->
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>

</div><!-- end user-orders -->

<div class="row container-fluid p-0 m-0 col-1">
  <div class="col-12 mt-5 mx-1 pt-0 pb-4 px-0 ml-4 text-left container-fluid">
    <img class="mt-2 mb-2" width="86px" id="header_logo_left" alt="logo" src="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>" />
    <h5 class="fw-normal mt-auto text-secondary">Bem vindo <?= $this->customer->getCustomer()->NamePieces()[0]; ?>!!</h5>
    <h6 class="fw-normal text-dark">Revise e Avalie seus pedidos no @LaPechincha</h6>
  </div>
</div>
</div>