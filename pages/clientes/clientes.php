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

 <!-- Slick Carousel-->

  <link rel="stylesheet" type="text/css" href="../../slick/slick.css">
  <link rel="stylesheet" type="text/css" href="../../slick/slick-theme.css"/>
        
  <!-- Our styles -->
  <link rel="stylesheet" href="../../commom/css/index.css">
  <link rel="stylesheet" href="../../commom/css/items5-carousel.css">
  <link rel="stylesheet" href="css/clientes.css">
  
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

  <!--Start Selection -->
  <section id="clients" class="section-bg">
    <div class="container">
        <div class="section-header">
            <h3>Minha conta</h3>
            <br>
        </div>
        <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        	<div class="row">
        	
            <div class="cpo float-md-left">
                <h5>Dados da Conta</h5>
                <a href="page-int/dados_conta.html">
                <div class="imgs">
                	<img src="img/dados.svg">
                </div>

                <br>
                  <p>Veja e altere seus dados</p>
                 </a>
            </div>
          

            
            <div class="cpo">
            	<h5>Dados cadastrais</h5>
            	<a href="page-int/dados_cads.html">
            	<div class="imgs">
            		 <div class="imgs">
                		<img src="img/d2-p.svg">
                	</div>
                	<br>
                  	<p>Veja e altere seus dados</p>
                 </a>
            </div>
            
            	
            </div>
            <div class="cpo float-md-right">
                <h5>Minha compras</h5>
                <a href="page-int/compras.html">
               <div class="imgs">
            		 <div class="imgs">
                		<img src="img/carinho.svg">
                	</div>
                	<br>
                  	<p>Veja seu historico de compras</p>
            	</div>
            	</a>
                
            </div>
            </div>
            <div class="row">
            <div class="cpo float-lg-left">
                <h5>Meus cartões</h5>
                <a href="page-int/cartoes.html">
                <div class="imgs">
            		 <div class="imgs">
                		<img src="img/cartao.svg">
                	</div>
                	<br>
                  	<p>Veja seus cartões cadastrados</p>
            	</div>
            	</a>
                
            </div>
            <div class="cpo">
                <h5>Endereços</h5>
                <a href="page-int/endereco.html">
                <div class="imgs">
            		 <div class="imgs">
                		<img src="img/casa.svg">
                	</div>
                	<br>
                  	<p>Veja seus endereços de entregas</p>
            	</div>
            	</a>
                
            </div>
            <div class="cpo float-lg-right">
               <h5>Privacidade</h5>
               <a href="page-int/privacidade.html">
               <div class="imgs">
            		 <div class="imgs">
                		<img src="img/gear.svg">
                	</div>
                	<br>
                  	<p>Veja e altere seus dados</p>
            	</div>
               </a>
            </div>
            </div>
            
        </div>
    </div>
  </section>
  <!-- End Selection-->



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

  <!-- Our Scripts -->
  <script src="../../commom/js/index.js" ></script>


</body>

</html>