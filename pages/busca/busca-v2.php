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

<!-- Bootstrap Select -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">  

  <!-- Our styles -->
  <link rel="stylesheet" href="../../commom/css/index.css">
  <link rel="stylesheet" href="css/busca.css">
  
  <link rel="icon" type="image/png" href="../../commom/img/logos/coinlogo2.svg"/>
  <title>La Pechincha Brasil</title>
</head>

<body>

  <!-- Navbar Begin -->
  <div id="desk-header" class="py-1 my-bg-dark header">
    <div class="container-fluid pb-2">
      <div id="header_top" class="row align-items-center">

        <div class="col-2 col-lg-3">
          <a href="../home/index.html" class="text-decoration-none">
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
          <a href="../home/index.html">
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
          <i class="bi bi-person-circle"></i>
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

  <div class="container" style="min-width: 90%; margin-top: 30px;">

    <div class="row">
        <div class="col-md-3">
        <nav class="page-path" aria-label="breadcrumb">
            <ol class="breadcrumb text-center pl-0 mb-0 bg-transparent">
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1 active" aria-current="page">Library</li>
            </ol>
        </nav>
        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-3 text-center search-orderby mt-3">
            <span class="title">Odernar por</span>
            <select class="selectpicker" data-width="fit">
              <option class="order-option" value="avaliacao">Melhor Avaliação</option>
              <option class="order-option" value="maior-preco">Maior Preço</option>
              <option class="order-option" value="menor-preco">Menor Preço</option>
            </select>            

        </div>
    </div>
    <div class="row">
        <div class="left-content col-md-3">
          <div id="sidebar">
            <div class="d-flex">
              <div class="sidebar-header">
                <h3>Search String</h3>
                <p><span id="resuls-qtd">999</span> results</p>
              </div>
              <div id="dismiss">
                <i class="bi bi-list h4"></i>
              </div>
            </div><!-- d-flex -->
            <div class="w-75 tags">
              <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 124 <span type="button"
                  class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
              <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 9999 <span type="button"
                  class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
              <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 6 <span type="button"
                  class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
              <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 71 <span type="button"
                  class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
              <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 123456 <span type="button"
                  class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
              <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 1 <span type="button"
                  class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
            </div><!-- tags -->
            
            <div class="filters w-75">
              <form action="" method="POST">
              <ul class="list-group mt-4 caracteristica">
                <h6 class="font-weight-bold">Caracteristica</h6>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 1
                  <span class="badge bg-dark rounded-pill ">14</span>
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 2
                  <span class="badge bg-dark rounded-pill">2</span>
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 3
                  <span class="badge bg-dark rounded-pill">1</span>
                </li>
              </ul>
              <ul class="list-group mt-4 caracteristica">
                <h6 class="font-weight-bold">Caracteristica2</h6>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 1
                  <span class="badge bg-dark rounded-pill ">14</span>
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 2
                  <span class="badge bg-dark rounded-pill">2</span>
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 3
                  <span class="badge bg-dark rounded-pill">1</span>
                </li>
              </ul>
              <ul class="list-group mt-4 caracteristica">
                <h6 class="font-weight-bold">Caracteristica3</h6>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 1
                  <span class="badge bg-dark rounded-pill ">14</span>
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 2
                  <span class="badge bg-dark rounded-pill">2</span>
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  cat 3
                  <span class="badge bg-dark rounded-pill">1</span>
                </li>
              </ul>
              <ul class="list-group mt-4 caracteristica">
                <h6 class="font-weight-bold">Caracteristica4</h6>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  <label class="form-check-label" for="User">cat 1</label>
                  <input class="form-check-inline" type="checkbox" value="">
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  <label class="form-check-label" for="User">cat 2</label>
                  <input class="form-check-inline" type="checkbox" value="">
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  <label class="form-check-label" for="User">cat 3</label>
                  <input class="form-check-inline" type="checkbox" value="">
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  <label class="form-check-label" for="User">cat 3</label>
                  <input class="form-check-inline" type="checkbox" value="">
                </li>
                <li
                  class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                  <label class="form-check-label" for="User">cat 3</label>
                  <input class="form-check-inline" type="checkbox" value="">
                </li>
              </ul>
                <button class="btn btn-dark text-warning float-end mt-4" type="submit">Filtrar</button>
              </form>
            </div><!-- filters --> 
          </div><!-- sidebar -->
          
          <!-- Page Content  -->
          <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-dark text-warning">
              <i class="fas fa-align-left"></i>
              <span>Filtrar Busca</span>
            </button>
          </div>
        </div>
        <div class="right-content col-md-9 row h-100">
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->

          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
          
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
           
          <div class="col-lg-4 col-sm-6">
            <div class="item" onmouseout="">
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
          </div><!-- col -->
           
          <div class="search-pagination">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link bg-transparent" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
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

  <!-- Bootstrap Select -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- jQuery Custom Scroller to Sidebar -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  
  <!-- Our Scripts -->
  <script src="../../commom/js/items3-carousel.js"></script>
  <script src="js/busca.js"></script>
  <script src="../../commom/js/index.js" ></script>


</body>

</html>