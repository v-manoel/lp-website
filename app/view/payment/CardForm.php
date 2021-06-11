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
                <h4 class="mb-4">Adicione um novo cartão</h4>
                <form action="" method="POST">
                    <div class="container-fluid">
                        <div class="row p-4">
                        
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="label-float w-100">
                                            <input type="text" class="" id="cardNumber" placeholder=" ">
                                            <label for="cardNumber" class="">Número do cartão</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="label-float w-100">
                                            <input type="text" class="" id="cardName" placeholder=" ">
                                            <label for="cardName" class="">Nome completo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="label-float">
                                            <input type="text" class="w-100" id="cardVal" placeholder=" ">
                                            <label for="cardVal" class="w-100">Data de vencimento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="label-float">
                                            <input type="text" class="w-auto" id="cardCod" placeholder=" ">
                                            <label for="cardCod" class="w-auto">Código de segurança</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="label-float w-100">
                                            <input type="text" class="" id="cardCpf" placeholder=" ">
                                            <label for="cardCpf" class="">CPF do títular</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="mt-5" id="iterativeCard" >
                                    <div class="" id="flagCard"> </div>
                                    <div class="h4 text-light text-center mt-5">
                                    <span class="me-3">* * *</span>
                                    <span class="me-3">* * *</span>
                                    <span class="me-3">* * *</span>
                                    <span class="">* * *</span>
                                    </div>
                                    <div class="text-light text-center text-monospace text" style="font-size: 14px;">
                                        <span class="float-left ml-3">NOME E SOBRENOME</span>
                                        <span class="float-right me-3">MM/AA</span>
                                    </div>
                            </div>
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