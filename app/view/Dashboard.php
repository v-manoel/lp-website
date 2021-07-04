<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    
<link rel="icon" type="image/png" href="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>" />
	<title>La Pechincha Brasil</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Vitor M & Reinilson B">
    <meta name="description" content="<?= $this->getDesc(); ?>">
    <meta name="keywords" content="<?= $this->getKeywords(); ?>">
    <title><?= $this->getTitle(); ?></title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">
				
	<!-- Our styles -->
	<link rel="stylesheet" href="<?= DIRCSS . 'Layout.css'; ?>">
	<link rel="stylesheet" href="<?= DIRCSS . 'Tablet.css'; ?>">
    <link rel="stylesheet" href="<?= DIRCSS . 'Dashboard.css'; ?>">
    <link rel="stylesheet" href="<?= DIRCSS . 'Items-carousel.css'; ?>">

    <!-- Slick Carousel-->
    <link rel="stylesheet" type="text/css" href="<?= DIRPAGE.'src/vendor/slick/slick.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?= DIRPAGE.'src/vendor/slick/slick-theme.css'; ?>"/> 
    
    <!-- FontAwesome JS-->

    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= DIRCSS . 'Portal.css'; ?>">

    <?= $this->addHead(); ?>
</head>

<body class="app pt-0">   	
    <header >	   	            
        
        <div id="app-sidepanel" class="app-sidepanel border-0"> 

	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="<?= DIRPAGE . 'admin/page/home'; ?>" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo text-decoration-none" href="index.html"><img class="logo-icon mr-2" src="<?= DIRIMG . 'logos/coinlogo2.svg'; ?>" alt="logo"><span class="logo-text text-white ">Menu</span></a>
	
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<?php if(ucfirst($this->requested_page) == "Home"){ ?>
					        	<a class="nav-link active" href="<?= DIRPAGE . 'admin/page/home'; ?>">
						    <?php }else{ ?>    
								<a class="nav-link" href="<?= DIRPAGE . 'admin/page/home'; ?>">	
							<?php } ?>
						        <span class="nav-icon">
									<i class="bi bi-house-door" style="font-size: 20px;" fill="currentColor"></i>
						         </span>
		                         <span class="nav-link-text">Home</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<?php if(ucfirst($this->requested_page) == "DadosClientes"){ ?>
					        	<a class="nav-link active" href="<?= DIRPAGE . 'admin/page/clients'; ?>">
						    <?php }else{ ?>    
								<a class="nav-link" href="<?= DIRPAGE . 'admin/page/clients'; ?>">	
							<?php } ?>
						        <span class="nav-icon">
						        <i width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" style="font-size: 19px;"></i>

						         </span>
		                         <span class="nav-link-text">Clientes</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->						

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<?php if(ucfirst($this->requested_page) == "DadosProdutos"){ ?>
					        	<a class="nav-link active" href="<?= DIRPAGE . 'admin/page/products'; ?>">
						    <?php }else{ ?>    
								<a class="nav-link" href="<?= DIRPAGE . 'admin/page/products'; ?>">	
							<?php } ?>
								<span class="nav-icon">
								<i width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" style="font-size: 19px;"></i>
						         </span>
		                         <span class="nav-link-text">Produtos</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="#">
						        <span class="nav-icon">
						        <i width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-graph-up " fill="currentColor" style="font-size: 19px;">
								</i>
						         </span>
		                         <span class="nav-link-text">Vendas</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<?php if(ucfirst($this->requested_page) == "DadosSetores"){ ?>
					        	<a class="nav-link active" href="<?= DIRPAGE . 'admin/page/sectors'; ?>">
						    <?php }else{ ?>    
								<a class="nav-link" href="<?= DIRPAGE . 'admin/page/sectors'; ?>">	
							<?php } ?>
						        <span class="nav-icon">
								<i class="bi bi-diagram-3-fill" fill="currentColor" style="font-size: 19px;"></i>
						         
						         </span>
		                         <span class="nav-link-text">Setores</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="#">
						        <span class="nav-icon">
									<i class="bi bi-card-list" fill="currentColor" style="font-size: 19px;"></i>
								</span>
		                         <span class="nav-link-text">Pedidos</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="<?= DIRPAGE . 'department/page/menu'; ?>"">
						        <span class="nav-icon">
									<i class="bi bi-tablet" fill="currentColor" style="font-size: 19px;"></i>
								</span>
		                         <span class="nav-link-text">Tablet</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    					    
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->

		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="Header">
    <?=$this->addHeader(); ?>
  </div>

  <div class="Main">
    <?= $this->addMain(); ?>
  </div>


    <!-- Javascript -->          
    <script type="text/javascript" src="<?= DIRPAGE.'src/vendor/popper.min.js'; ?>"></script>
    <script type="text/javascript" src="<?= DIRPAGE.'src/vendor/bootstrap/js/bootstrap.min.js'; ?>"></script>

    <!-- Charts JS -->
    <script type="text/javascript" src="<?= DIRPAGE.'src/vendor/chart.js/chart.min.js'; ?>"></script>
    

    
    <!-- Page Specific JS -->
    <script src="<?= DIRJS.'app.js'; ?>"></script> 
	<script src="<?= DIRJS.'stats-charts.js'; ?>"></script> 

    <!-- Slick scripts -->

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
 <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 <script type="text/javascript" src="<?= DIRPAGE.'src/vendor/slick/slick.min.js'; ?>"></script>
    

    <!-- Our scripts -->
    <script src="<?= DIRJS.'items4-carousel.js'; ?>"></script>
 <script src="<?= DIRJS.'vertical-items-carousel.js'; ?>"></script>


</body>
</html> 