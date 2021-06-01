<!DOCTYPE html>
<html lang="pt-br">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Vitor M & Reinilson B">
    <meta name="description" content="<?= $this->getDesc(); ?>">
    <meta name="keywords" content="<?= $this->getKeywords(); ?>">
    <title><?= $this->getTitle(); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= DIRCSS.'Layout.css'; ?>">
    <?= $this->addHead(); ?>
    
    <link rel="icon" type="image/png" href="<?= DIRIMG.'logos/coinlogo2.svg'; ?>"/>
</head>

<body>
    <div class="Nav">
        <!-- Navbar Begin -->
        <div id="desk-header" class="py-1 my-bg-dark header">
            <div class="container-fluid pb-2">
            <div id="header_top" class="row align-items-center">

                <div class="col-2 col-lg-3">
                <a href="#" class="text-decoration-none">
                    <img id="header_logo_left" alt="logo" src="<?= DIRIMG.'logos/coinlogo2.svg'; ?>"/>
                    <img id="header_logo_right" alt="" src="<?= DIRIMG.'logos/brand.png'; ?>"/>
                </a>
                </div><!-- //col -->

                <div class="col-10 col-lg-6" id="search-input">
                <form class="w-100" action="/search" method="POST" role="search" id="custom-search-input">
                    <div class="input-group">
                    <input id="keywords" name="keywords" type="text" class="form-control" id="search-field" placeholder="Buscar produtos, marcas e mais">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-lg"><i class="bi bi-search" aria-hidden="true"></i></button>
                    </span><!-- input-group-append -->
                    </div><!--//input-group-->
                </form><!--//form -->
                </div><!-- //col -->
                
                <div class="col-3 col-lg-3 d-flex menu collapse" id="collapseExample">
                <div class=" m-auto mx-1 header-icon" id="header_login">
                    <a href="../login/login.html" class="my-yellow">
                    <p class="m-auto font-weight-bold text-center">Entre ou <br> Cadastre-se</p>
                    </a>
                    
                </div>

                <div class="m-auto mx-1 header-icon " id="header_bell">
                    <a href="#" class="my-yellow">
                    <i class="bi bi-bell my-yellow me-2"></i>
                    </a>
                </div>

                <div class=" m-auto mx-1 header-icon" id="header_cart">
                    <a href="../cart/cart.html" class="my-yellow">
                    <i class="bi bi-basket2 my-yellow"></i>
                    <span class="badge bg-warning rounded-circle text-dark">4</span>
                    </a>
                </div>
                </div><!-- col -->
            </div><!-- row -->
            </div><!-- //container -->
        </div> <!-- NavBar End -->
    </div>

    <!-- Navbar Begin -->
  <div id="mobile-header" class="py-1 my-bg-dark header">
    <div class="container-fluid">
      <div id="header_top" class="row align-items-center my-auto">

        <div class="col-2 col-sm-2">
          <a href="#">
            <img id="header_logo_left" alt="logo" src="<?= DIRIMG.'logos/coinlogo2.svg'; ?>"/>
          </a>
        </div><!-- //col -->

        <div class="col-8 col-sm-8" id="search-input">
          <form class="w-100" action="/search" method="get" role="search" id="custom-search-input">
            <div class="input-group">
              <input id="keywords" name="keywords" type="text" class="form-control" id="search-field" placeholder="Buscar produtos, marcas e mais">
              <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-lg"><i class="bi bi-search" aria-hidden="true"></i></button>
              </span><!-- input-group-append -->
            </div><!--//input-group-->
          </form><!--//form -->
        </div><!-- //col -->
        
        <div class="col-2 col-sm-2 d-flex menu p-0 my-auto">
          <div class=" m-auto mx-1 header-icon" id="header_login">
            <a class="my-yellow" data-bs-toggle="collapse" href="#mobileMenu" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="bi bi-list"></i>
            </a>
          </div>

          <div class=" m-auto mx-1 header-icon" id="header_cart">
            <a href="../cart/cart.html" class="my-yellow">
              <i class="bi bi-basket2 my-yellow"></i>
              <span class="badge bg-warning rounded-circle text-dark cart-qtd">4</span>
            </a>
          </div>
        </div><!-- col -->
        </div><!-- row -->
  
    </div><!-- //container -->
  </div> <!-- NavBar End -->

  <div class="mobile-menu pb-1 mb-3 collapse" id="mobileMenu">
      <div class="container-fluid row m-auto login">
        <div class="col-3 m-auto text-center">
          <i class="bi bi-person-circle login-icon"></i>
        </div>
        <div class="col-9 m-auto">
          <h6> <b> Bem vindo </b></h6>
          <p class="mb-0">Entre na sua conta para ver suas compras</p>
        </div>
      </div>

      <div class="container-fluid row m-auto">
        <div class="col-6 text-center">
          <a href="../login/login.html"> <button class="btn btn-warning text-dark w-100 m-auto">Entre</button> </a>
        </div>
        <div class="col-6 text-center">
          <a href="../login/login.html"> <button class="btn btn-dark my-yellow w-100 m-auto">Cadastrar</button></a>
        </div>
      </div>
      
      <hr class="small my-bg-gray">

      <div class="container-fluid text-center">
        <h5><i class="bi bi-question-circle me-3"></i>Contate-nos</h5>
      </div>
  </div><!-- mobile menu -->

    <div class="Header">
        <?php echo $this->addHeader(); ?>
    </div>

    <div class="Main">
        <?php echo $this->addMain(); ?>
    </div>

    <div class="Footer">
        <footer class="bg-dark text-center text-lg-start w-100 mt-4">
        <div class="container-fluid">
            <div class="row">
            <div class="text-center p-1" style="background-color: #141314;">
            © 2020 Copyright | Todos os Direitos reservados    
            </div>
            </div><!-- row -->
            <div class="row">
            <div class="text-center p-2" style="background-color: #141310;">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <?php echo $this->addFooter(); ?>
    
</body>
  

</html>