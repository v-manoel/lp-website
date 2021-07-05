<div class="container page-container card-form">
    <div class="row">
        <div class="col-md-7 payment-method">
            <?php if ($this->content['order']->getPayment()) { ?>
                <h4 class="mb-3">Como você prefere pagar ?</h4>
                <div id="atual-payment-method" class="container-fluid">
                    <div class="payment-option align-items-center">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <i class="bi bi-credit-card-fill h4"></i>
                            </div>
                            <div class="col-md-8 desc">
                                <?= $this->content['order']->getPayment()->getNumber(); ?>
                            </div>
                            <div class="col-md-3 text-end">
                                <a href="<?= DIRPAGE . 'payment/page/preview' ?>">Alterar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="<?= DIRPAGE . 'payment/PaymentValidation' ?>" method="post">
                    <h4 class="mb-4">Insira os dados do cartão</h4>
                    <div class="container-fluid">
                        <div class="row p-4">

                            <div class="col-md-4">
                                <div class="label-float">
                                    <input type="text" class="w-auto" name="card-cvv" id="card-cvv" placeholder="123" minlength="3" maxlength="3" required>
                                    <label for="card-cvv" class="w-auto">Código de segurança</label>
                                </div>
                            </div>

                            <div class="col-md-2"></div>

                            <div class="col-md-6 mt-5" id="back-card" style="display: block;">
                                <div class="m-auto iterativeCard newcard" id="">
                                    <div class="" id="stripCard"> </div>
                                    <div class="h4 text-light mt-4 text-end">
                                        <span class="mr-4 p-1 text-dark bg-white h6" id="model-cvv">* * *</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <button type="submit" name="user-card" class="btn btn-warning text-dark float-md-end">Continuar</button>
                </form>
            <?php } else { ?>
                <div class="row py-4 bg-white rounded-bottom input-label shadow-lg">
                    <form action="<?= DIRPAGE . 'payment/PaymentValidation' ?>" class="col-6" method="post">
                        <div class="row py-2">
                            <div class="form-floating col-12 mb-2 f-2 ">
                                <input type="text" class="form-control p-0 px-2 m-auto field-size" required name="card-holder" id="card-holder" placeholder="name example">
                                <label class="mx-2" for="card-holder">Nome do títular</label>
                            </div>
                            <div class="form-floating col-9 mb-2 f-1">
                                <input type="text" class="form-control p-0 px-2 m-auto field-size " required id="card-number" name="card-number" placeholder="************" minlength="16" maxlength="16" value="">
                                <label class="mx-2" for="card-number">Número</label>
                            </div>
                            <div class="form-floating col-3 mb-2 f-1">
                                <input type="text" class="form-control p-0 px-2 m-auto field-size " required id="card-cvv" name="card-cvv" placeholder="***" minlength="3" maxlength="3" value="">
                                <label class="mx-2" for="card-cvv">cvv</label>
                            </div>

                            <div class="form-floating col-8 mb-2 f-6">
                                <input type="month" class="form-control p-0 px-2 m-auto field-size " required name="card-expiration" id="card-expiration" placeholder="07/2021">
                                <label class="mx-2" for="card-expiration">Validade</label>
                            </div>
                        </div>
                        <button type="submit" name="new-card" class="btn btn-warning text-dark float-md-end">Continuar</button>
                    </form>
                    <div class="col-md-6 mt-5" id="front-card">
                        <div class="iterativeCard newcard" id="card-model">
                            <div class="flagCard bi bi-layers-half h2 text-center text-white"> </div>

                            <div class="h4 text-light text-center mt-4 number" id="model-number">
                                <span class="mx-2" id="num-4">* * * *</span>
                                <span class="mx-2" id="num-8">* * * *</span>
                                <span class="mx-2" id="num-12">* * * *</span>
                                <span class="mx-2" id="num-16">* * * *</span>
                            </div>
                            <div class="text-light mt-3 text-center text-monospace data">
                                <span class="float-left ml-3" id="model-name">NOME E SOBRENOME</span>
                                <span class="float-right me-3" id="model-date">MM/AA</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-5" id="back-card">
                        <div class="m-auto iterativeCard newcard" id="">
                            <div class="" id="stripCard"> </div>
                            <div class="h4 text-light mt-4 text-end">
                                <span class="mr-4 p-1 text-dark bg-white h6" id="model-cvv">* * *</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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