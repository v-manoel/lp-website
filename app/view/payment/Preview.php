<div class="container page-container">
    <div class="row">
        <div class="col-md-7 payment-method">
            <h4 class="mb-4">Como você prefere pagar ?</h4>
            <form id="card-form" action="<?= DIRPAGE.'payment/PaymentMethod'?>" method="POST">
            <?php if($this->content['order']->getPayment()){?>
            <div class="mb-3">
                <h6 class="mb-3">Cartão Selecionado</h6>
                <div class="form-check payment-option align-items-center border-1 text-dark bg-warning bg-gradient rounded shadow-lg">
                    <input class="form-check-input" type="radio" name="card-number" id="atual-card" value="keep">
                    <label class="form-check-label row align-items-center" for="atual-card">
                        <div class="col-md-1">
                            <i class="bi bi-credit-card-fill h4"></i>
                        </div>
                        <div class="col-md-11 desc">
                            <?= $this->content['order']->getPayment()->getNumber(); ?>
                        </div>
                    </label>
                </div>
            </div>
            <?php } ?>
            <div>
                <h6 class="mb-3">Com cartão de crédito </h6>
                <div class="container-fluid">
                
                    <?php if($this->content['order']->getOwner()){?>
                        <?php foreach (CreditCard::allByCustomer($this->content['order']->getOwner()) as $card) { ?>
                        <div class="form-check payment-option align-items-center border-1 border-bottom">
                            <input class="form-check-input" type="radio" name="card-number" id="<?= $card->getNumber(); ?>" value="<?= $card->getNumber(); ?>">
                            <label class="form-check-label row align-items-center" for="<?= $card->getNumber(); ?>">
                                <div class="col-md-1">
                                    <i class="bi bi-credit-card-fill h4"></i>
                                </div>
                                <div class="col-md-11 desc">
                                    <?= $card->getNumber(); ?>
                                </div>
                            </label>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    
                    <div class="form-check payment-option align-items-center">
                        <input class="form-check-input" type="radio" name="card-number" id="other-card" value="new">
                        <label class="form-check-label row align-items-center" for="other-card">
                            <div class="col-md-1">
                                <i class="bi bi-credit-card-fill h4"></i>
                            </div>
                            <div class="col-md-11 desc">
                                Novo Cartão de Crédito
                            </div>
                        </label>
                    </div>
                </form>
                </div>
            </div>
            <div>
                <h6 class="mb-3">Com outros meios de pagamento </h6>
                <div class="container-fluid">
                    <div class="form-check payment-option align-items-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label row align-items-center" for="flexRadioDefault2">
                            <div class="col-md-1">
                            <i class="bi bi-x-diamond-fill h4 "></i>
                            </div>
                            <div class="col-md-11 desc">
                                Pagar com Pix
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" form="card-form" class="btn btn-warning text-dark float-md-end">Continuar</button>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 text-center">
            <div class="wrapper mt-2">
                <div id="sidebar" class="mb-4">
                    <div class="container">
                        <div class="sidebar-header py-3 px-2 border-1 border-bottom">
                            <span class="title text-dark h5">Resumo da compra</span>
                            <i id="dismiss" class="bi bi-x h2"></i>
                        </div>
                        
                        <div class="row item parcial-price">
                            <div class="col-md-6 col-sm-6 text-start">
                                Produtos(<span class="quantidade h6"><?= $this->content['order']->getProdQnty(); ?></span>)
                            </div>
                            <div class="col-md-6 col-sm-6 text-end">
                            <p class="price m-auto"><?= 'R$ ' . floor($this->content['order']->calcTotal()) ?><span class="decimals align-top"><?= ($this->content['order']->calcTotal() * 100) % 100; ?></span></p>
                            </div>
                        </div>

                        <div class="row item frete-price">
                            <div class="col-md-6 col-sm-6 text-start">
                                Envio
                            </div>
                            <div class="col-md-6 col-sm-6 text-end text-success">
                                Grátis
                            </div>
                        </div>
                        <hr class="m-0 h-25 text-secondary mt-3 mb-2">
                        <div class="row item total-price text-primary">
                            <div class="col-md-6 col-sm-6 text-start font-weight-bold">
                                Você Pagará
                            </div>
                            <div class="col-md-6 col-sm-6 text-end h6">
                            <p class="price m-auto h5"><?= 'R$ ' . floor($this->content['order']->calcTotal()) ?><span class="decimals align-top"><?= ($this->content['order']->calcTotal() * 100) % 100; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="content">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark text-warning align-items-center">
                        <i class="bi bi-info-square-fill"></i>
                        <span class="h6 ml-2">Resumo da compra</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
