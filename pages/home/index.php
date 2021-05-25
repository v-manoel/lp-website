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

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400&display=swap" rel="stylesheet">

  <!-- Slick Carousel-->
  <link rel="stylesheet" type="text/css" href="../../slick/slick.css">
  <link rel="stylesheet" type="text/css" href="../../slick/slick-theme.css"/>
				
  <!-- Our styles -->
  <link rel="stylesheet" href="../../commom/css/index.css">
  <link rel="stylesheet" href="../../commom/css/items5-carousel.css">
  <link rel="stylesheet" href="css/indexStyle.css">
  
  <link rel="icon" type="image/png" href="../../commom/img/logos/coinlogo2.svg"/>
  <title>La Pechincha Brasil</title>
</head>

<body>

  <!-- Navbar Begin -->
  <div id="desk-header" class="py-1 my-bg-dark header">
    <div class="container-fluid pb-2">
      <div id="header_top" class="row align-items-center">

        <div class="col-2 col-lg-3">
          <a href="#" class="text-decoration-none">
            <img id="header_logo_left" alt="logo" src="../../commom/img/logos/coinlogo2.svg"/>
            <img id="header_logo_right" alt="" src="../../commom/img/logos/brand.png"/>
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

  <div id="categorias">
    <form class="list-group-horizontal w-100 text-center py-2 mb-1 h-auto my-bg-dark" action="/action_page.php" method="POST">
      <button type="submit" value="Categoria" class="bg-transparent my-yellow border-0 m-0 h6">Categoria</button>
      <button type="submit" value="Categoria" class="bg-transparent my-yellow border-0 m-0 h6">Categoria</button>
      <button type="submit" value="Categoria" class="bg-transparent my-yellow border-0 m-0 h6">Categoria</button>
      <button type="submit" value="Categoria" class="bg-transparent my-yellow border-0 m-0 h6">Categoria</button>
      <button type="submit" value="Categoria" class="bg-transparent my-yellow border-0 m-0 h6">Categoria</button>
      <button type="submit" value="Categoria" class="bg-transparent my-yellow border-0 m-0 h6">Categoria</button>
      <button type="submit" value="Categoria" class="bg-transparent my-yellow border-0 m-0 h6">Categoria</button>
    </form>
  </div>


  <!-- Navbar Begin -->
  <div id="mobile-header" class="py-1 my-bg-dark header">
    <div class="container-fluid">
      <div id="header_top" class="row align-items-center my-auto">

        <div class="col-2 col-sm-2">
          <a href="#">
            <img id="header_logo_left" alt="logo" src="../../commom/img/logos/coinlogo2.svg"/>
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

      <div class="container-fluid dropdown-show text-center">
       <a class="text-decoration-none text-dark m-auto" data-bs-toggle="collapse" href="#collapse-categorias" role="button" aria-expanded="false" aria-controls="collapseExample">
         <h5><i class="bi bi-list-task me-3"></i>Categorias</h5></a>
        
       <div class="collapse" id="collapse-categorias">
        <form class="list-group" action="/action_page.php">
          <button type="submit" value="Categoria" class="list-group-item list-group-item-action h5">Categoria</button>
          <button type="submit" value="Categoria" class="list-group-item list-group-item-action h5">Categoria</button>
          <button type="submit" value="Categoria" class="list-group-item list-group-item-action h5">Categoria</button>
          <button type="submit" value="Categoria" class="list-group-item list-group-item-action h5">Categoria</button>
          <button type="submit" value="Categoria" class="list-group-item list-group-item-action h5">Categoria</button>
          <button type="submit" value="Categoria" class="list-group-item list-group-item-action h5">Categoria</button>
        </form>
      </div>
      </div>

      <hr class="small my-bg-gray">

      <div class="container-fluid text-center">
        <h5><i class="bi bi-question-circle me-3"></i>Contate-nos</h5>
      </div>
  </div><!-- mobile menu -->


  <div class="container-carr">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
   </div>
   <div class="carousel-inner">
     <div class="carousel-item active">
       <img src="img/c2.jpg" class="d-block w-100 img-responsive" alt="...">
      </div>
     <div class="carousel-item">
       <img src="img/c4.jpg" class="d-block w-100 img-responsive" alt="...">
     </div>
     <div class="carousel-item">
       <img src="img/c3.jpg" class="d-block w-100 img-responsive" alt="...">
      </div>
    </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
</div>


<div class="container banner-size my-3">
  <div class="row callout">
      <div class="col-md-3 field">
        <h5>Pagamento rápido e seguro</h5>
        <p>com La Pechincha</p>
      </div>
      <div class="col-md-3 field row">
        <div class="col-md-2">
          <i class="bi bi-credit-card-2-back-fill text-dark h3"></i>
        </div>
        <div class="col-md-10">
          <h5>Até 12 vezes sem juros</h5>
        <a href="">Ver mais</a>
        </div>
      </div>
      <div class="col-md-3 field row">
        <div class="col-md-2">
          <i class="bi bi-x-diamond-fill text-dark h3"></i>
        </div>
        <div class="col-md-10">
          <h5>Pague Fácil com o Pix</h5> 
          <a href="">Ver mais</a>
        </div>
      </div>
      <div class="col-md-3 field row">
        <div class="col-md-2">
          <i class="bi bi-plus-circle-fill text-dark h3"></i>
        </div>
        <div class="col-md-10">
          <h5>Mais sobre pagamentos</h5>
          <a href="">Ver mais</a>
        </div>
      </div>
  </div><!-- row -->
</div><!-- container -->

<section class="container products-carousel-section my-5" id="destaques-da-semana">
    
  <div class="p-2 section-title"> OFERTAS IMPERDÍVEIS</div>

  <div class="items-carousel items-carousel-5 m-auto">

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

    <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
      <a href="../product-info/item-info.html">
        <div class="card align-items-center prod-card w-auto">
          <div class="card-header bg-white">
            <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
          </div><!-- card header -->
          <div class="card-body">
            <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
            <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
            <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
            <span class="text-success off-rate">20% OFF</span>
            </p>

            <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
              sem juros
            </p>
            <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
          </div><!-- card body -->
        </div><!-- card -->
      </a>
    </div><!-- item -->

  </div><!-- carousel -->
  </section>

  <section class="container products-carousel-section my-5" id="based-on-history">

    <div class="h4 p-2 section-title">BASEADO EM SUAS ÚLTIMAS COMPRAS</div>
  
    <div class="items-carousel items-carousel-5">
      
      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->

      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->

      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->

      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->

      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->

      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->

      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->
      
      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->

      <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
        <a href="../product-info/item-info.html">
          <div class="card align-items-center prod-card w-auto">
            <div class="card-header bg-white">
              <img class="card-img" src="../../commom/img/examples/produtos.svg" alt="...">
            </div><!-- card header -->
            <div class="card-body">
              <p class="badge bg-warning text-dark tag p-1 m-0">SOME TAG</p>
              <p class="text-secondary text-decoration-line-through m-0 off-price">R$ 10.193</p>
              <p class="card-title price m-0">R$ 9.998<span class="decimals align-top">12</span>
              <span class="text-success off-rate">20% OFF</span>
              </p>
  
              <p class="parcela text-success m-0">12x de R$ 98<span class="decimals align-top">12</span>
                sem juros
              </p>
              <p class="product-desc m-auto pt-1">Produto exemplar - amostra simples</p>
            </div><!-- card body -->
          </div><!-- card -->
        </a>
      </div><!-- item -->
    </div><!-- carousel -->
    </section>

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

  <!-- Slick Scripts -->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="../../slick/slick.min.js"></script>

  <!-- Our Scripts -->
  <script src="../../commom/js/items5-carousel.js"></script>
  <script src="../../commom/js/index.js" ></script>


</body>

</html>