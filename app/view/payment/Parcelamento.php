<div class="container page-container card-form">
        <div class="row">
            <div class="col-md-7 payment-method">
                <h4 class="mb-4">Como você prefere pagar ?</h4>
                <div id="atual-payment-method" class="container-fluid">
                    <div class="payment-option align-items-center">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <i class="bi bi-credit-card-fill h4"></i>
                            </div>
                            <div class="col-md-8 desc">
                                Cartão de Crédito Example
                            </div>
                            <div class="col-md-3 text-end">
                                <a href="preview.html">Alterar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                <h4 class="mb-4">Insira os dados do cartão</h4>
                <div class="container-fluid">
                    <div class="row p-4">

                        <div class="col-md-3">
                            <form class="row g-3 mt-auto">

                                <div class="label-float">
                                    <input type="text" class="w-auto" id="cardCod" placeholder="123" required>
                                    <label for="cardCod" class="w-auto">Código de segurança</label>
                                </div>

                            </form>
                        </div>

                        <div class="col-md-9">
                            <div class="m-auto" id="iterativeCardBack">
                                <div class="" id="stripCard"> </div>
                                <div class="h4 text-light mt-4 text-end">
                                    <span class="mr-4 p-1 text-dark bg-white">* * *</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <h4 class="mb-3">Em quantas vezes ? </h4>
                    <div class="container-fluid">
                        <div class="form-check payment-option align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="1x">
                            <label class="form-check-label row align-items-center" for="1x">
                                <div class="col-md-6 parcela-parcial h5">
                                    <span class="font-weight-bold me-2">1x </span> R$ <span>99,99</span>
                                </div>
                                <div class="col-md-6 parcela-total text-end text-secondary h6">
                                    <span> R$ <span>99,99</span></span>
                                </div>
                            </label>
                        </div>
                        <hr class="m-0 h-25 text-secondary ">

                        <div class="form-check payment-option align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="2x">
                            <label class="form-check-label row align-items-center" for="2x">
                                <div class="col-md-6 parcela-parcial h5">
                                    <span class="font-weight-bold me-2">2x </span> R$ <span>99,99</span>
                                </div>
                                <div class="col-md-6 parcela-total text-end text-secondary h6">
                                    <span> R$ <span>99,99</span></span>
                                </div>
                            </label>
                        </div>
                        <hr class="m-0 h-25 text-secondary ">
                        <div class="form-check payment-option align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="3x">
                            <label class="form-check-label row align-items-center" for="3x">
                                <div class="col-md-6 parcela-parcial h5">
                                    <span class="font-weight-bold me-2">3x </span> R$ <span>99,99</span>
                                </div>
                                <div class="col-md-6 parcela-total text-end text-secondary h6">
                                    <span> R$ <span>99,99</span></span>
                                </div>
                            </label>
                        </div>
                        <hr class="m-0 h-25 text-secondary ">
                        <div class="form-check payment-option align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="4x">
                            <label class="form-check-label row align-items-center" for="4x">
                                <div class="col-md-6 parcela-parcial h5">
                                    <span class="font-weight-bold me-2">4x </span> R$ <span>99,99</span>
                                </div>
                                <div class="col-md-6 parcela-total text-end text-secondary h6">
                                    <span> R$ <span>99,99</span></span>
                                </div>
                            </label>
                        </div>
                        <hr class="m-0 h-25 text-secondary ">
                        <div class="form-check payment-option align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="5x">
                            <label class="form-check-label row align-items-center" for="5x">
                                <div class="col-md-6 parcela-parcial h5">
                                    <span class="font-weight-bold me-2">5x </span> R$ <span>99,99</span>
                                </div>
                                <div class="col-md-6 parcela-total text-end text-secondary h6">
                                    <span> R$ <span>99,99</span></span>
                                </div>
                            </label>
                        </div>
                        <hr class="m-0 h-25 text-secondary ">
                        <div class="form-check payment-option align-items-center">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="6x">
                            <label class="form-check-label row align-items-center" for="6x">
                                <div class="col-md-6 parcela-parcial h5">
                                    <span class="font-weight-bold me-2">6x </span> R$ <span>99,99</span>
                                </div>
                                <div class="col-md-6 parcela-total text-end text-secondary h6">
                                    <span> R$ <span>99,99</span></span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning text-dark float-md-end">Continuar</button>
                </form>
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
                            <div class="row item">
                                <div class="col-md-6 col-sm-6 text-start">
                                    Produtos(<span class="quantidade">3</span>)
                                </div>
                                <div class="col-md-6 col-sm-6 text-end">
                                    R$ <span clas="total">99,99</span>
                                </div>
                            </div>

                            <div class="row item">
                                <div class="col-md-6 col-sm-6 text-start">
                                    Envio
                                </div>
                                <div class="col-md-6 col-sm-6 text-end">
                                    R$ <span clas="total">99,99</span>
                                </div>
                            </div>
                            <hr class="m-0 h-25 text-secondary mt-3 mb-2">
                            <div class="row item">
                                <div class="col-md-6 col-sm-6 text-start h5">
                                    Você Pagará
                                </div>
                                <div class="col-md-6 col-sm-6 text-end h5">
                                    R$ <span clas="total">99,99</span>
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