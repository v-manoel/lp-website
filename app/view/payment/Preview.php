<div class="container page-container">
    <div class="row">
        <div class="col-md-7 payment-method">
            <h4 class="mb-4">Como você prefere pagar ?</h4>
            <div>
                <h6 class="mb-3">Com cartão de crédito </h6>
                <div class="container-fluid">
                    <div class="form-check payment-option align-items-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault0">
                        <label class="form-check-label row align-items-center" for="flexRadioDefault0">
                            <div class="col-md-1">
                                <i class="bi bi-credit-card-fill h4"></i>
                            </div>
                            <div class="col-md-11 desc">
                                Cartão de Crédito Cadastrado
                            </div>
                        </label>
                    </div>
                    <hr class="m-0 h-25 text-secondary ">
                    <div class="form-check payment-option align-items-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label row align-items-center" for="flexRadioDefault1">
                            <div class="col-md-1">
                                <i class="bi bi-credit-card-fill h4"></i>
                            </div>
                            <div class="col-md-11 desc">
                                Outro Cartão de Crédito
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <h6 class="mb-3">Com outros meios de pagamento </h6>
                <div class="container-fluid">
                    <div class="form-check payment-option align-items-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label row align-items-center" for="flexRadioDefault2">
                            <div class="col-md-1">
                                <img src="../../commom/img/icons/pix.svg" alt="pix" width="60px">
                            </div>
                            <div class="col-md-11 desc">
                                Pagar com Pix
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-warning text-dark float-md-end">Continuar</button>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4 text-center">
            <div class="wrapper mt-2">
                <div id="sidebar" class="mb-4">
                    <div class="container">
                        <div class="sidebar-header p-2">
                            <span class="title text-dark h5">Resumo da compra</span>
                            <i id="dismiss" class="bi bi-x h2"></i>
                        </div>
                        <hr class="m-0 h-25 text-secondary mt-3 mb-2">
                        <div class="row item parcial-price">
                            <div class="col-md-6 col-sm-6 text-start">
                                Produtos(<span class="quantidade">3</span>)
                            </div>
                            <div class="col-md-6 col-sm-6 text-end">
                                <p class="price m-auto">R$ 9.998<span class="decimals align-top">12</span>
                            </div>
                        </div>

                        <div class="row item frete-price">
                            <div class="col-md-6 col-sm-6 text-start">
                                Envio
                            </div>
                            <div class="col-md-6 col-sm-6 text-end">
                                Grátis
                            </div>
                        </div>
                        <hr class="m-0 h-25 text-secondary mt-3 mb-2">
                        <div class="row item total-price">
                            <div class="col-md-6 col-sm-6 text-start h6">
                                Você Pagará
                            </div>
                            <div class="col-md-6 col-sm-6 text-end h6">
                                <p class="price m-auto">R$ 9.998<span class="decimals align-top">12</span>
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