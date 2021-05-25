<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">


    <!-- Our styles -->
    <link rel="stylesheet" href="../../commom/css/index.css">
    <link rel="stylesheet" href="css/payment.css">

    <link rel="icon" type="image/png" href="../../commom/img/logos/coinlogo2.svg" />
    <title>La Pechincha Brasil</title>
</head>

<body>

    <!-- Little Navbar Begin -->
    <div class="my-bg-dark border-bottom">
        <div class="container " style="min-width: 92%;">
            <div class="row align-items-center p-2">
                <div class="col-md-4">
                    <a href="../home/index.html" class="text-decoration-none">
                        <img id="header_logo_left" alt="logo" src="../../commom/img/logos/coinlogo2.svg" width="40px" />

                        <img id="header_logo_right" alt="" src="../../commom/img/logos/brand.png"
                            style="height:30px;width:80px; margin-left: 10px; margin-right: 30px; margin-top: 5px;" />
                    </a>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-end text-warning">
                    Pagamento
                </div>
            </div>
        </div>
    </div>
    <!-- Little NavBar End -->

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
    
    

    <footer class="bg-dark text-center text-lg-start w-100 mt-4">
        <div class="container-fluid">
          <div class="row">
            <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2020 Copyright | Todos os Direitos reservados    
            </div>
          </div><!-- row -->
          <div class="row">
            <div class="text-center p-2">
              <ul class="m-0">
              <li><a href="">Trabalhe conosco</a> | </li>
              <li><a href="">Termos e condições</a> | </li>
              <li><a href="">Como cuidamos da sua privacidade</a> | </li>
              <li><a href="">Contato</a></li>
            </ul>
            </div>
          </div><!-- row -->
        </div><!-- conainer-fluid -->
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


    <!-- Our Scripts -->
    <script src="../../commom/js/items5-carousel.js"></script>
    <script src="js/sidebar.js"></script>


</body>

</html>