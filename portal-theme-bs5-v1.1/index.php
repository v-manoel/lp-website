<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    
	<link rel="icon" type="image/png" href="../../commom/img/logos/coinlogo2.svg"/>
	<title>La Pechincha Brasil</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
	integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">
				
	<!-- Our styles -->
	<link rel="stylesheet" href="../../commom/css/index.css">
	<link rel="stylesheet" href="../../commom/css/tablet.css">    
    
    <!-- FontAwesome JS-->

    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="../pages/admin/css/portal.css">
</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <i class="bi bi-list" style="font-size: 24px;"><title>Menu</title></i>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->
		            <div class="app-search-box col">
		                <form class="app-search-form">   
							<input type="text" placeholder="Search..." name="search" class="form-control search-input">
							<button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> 
				        </form>
		            </div><!--//app-search-box-->
		            
		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-notifications-dropdown dropdown">    
				            <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					            <i class="bi bi-bell icon" style="font-size: 24px;" fill="currentColor"></i>
					            <span class="icon-badge">2</span>
					        </a><!--//dropdown-toggle-->
					        
					        <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
					            <div class="dropdown-menu-header p-3">
						            <h5 class="dropdown-menu-title mb-0">Notificações</h5>
						        </div><!--//dropdown-menu-title-->
						        <div class="dropdown-menu-content">
			
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										        <div class="app-icon-holder">
											        <i class="bi bi-receipt" style="font-size: 20px;" fill="currentColor"></i>
										        </div>
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">You have a new invoice. Proin venenatis interdum est.</div>
											        <div class="meta"> 1 day ago</div>
										        </div>
									        </div><!--//col-->
								        </div><!--//row-->
								        <a class="link-mask" href="notifications.html"></a>
							       </div><!--//item-->
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										        <div class="app-icon-holder icon-holder-mono">
													<i class="bi bi-bar-chart-line" style="font-size: 20px;" fill="currentColor"></i>
										        </div>
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">Your report is ready. Proin venenatis interdum est.</div>
											        <div class="meta"> 3 days ago</div>
										        </div>
									        </div><!--//col-->
								        </div><!--//row-->
								        <a class="link-mask" href="notifications.html"></a>
							       </div><!--//item-->
						        </div><!--//dropdown-menu-content-->
						        
						        <div class="dropdown-menu-footer p-2 text-center">
							        <a href="notifications.html">View all</a>
						        </div>
															
							</div><!--//dropdown-menu-->					        
				        </div><!--//app-utility-item-->
			            <div class="app-utility-item">
				            <a href="settings.html" title="Settings">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
								<i class="bi bi-gear icon icon" style="font-size: 24px;" fill="currentColor"></i>
					        </a>
					    </div><!--//app-utility-item-->
			            

		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.html"><img class="logo-icon mr-2" src="../commom/img/logos/coinlogo2.svg" alt="logo"><span class="logo-text">Menu</span></a>
	
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link active" href="index.html">
						        <span class="nav-icon">
									<i class="bi bi-house-door" style="font-size: 20px;" fill="currentColor"></i>
						         </span>
		                         <span class="nav-link-text">Home</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="docs.html">
						        <span class="nav-icon">
						        <i width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" style="font-size: 19px;"></i>

						         </span>
		                         <span class="nav-link-text">Clientes</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->						

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="index.html">
						        <span class="nav-icon">
						        <i width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" style="font-size: 19px;"></i>
						         </span>
		                         <span class="nav-link-text">Produtos</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="index.html">
						        <span class="nav-icon">
						        <i width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-graph-up " fill="currentColor" style="font-size: 19px;">
								</i>
						         </span>
		                         <span class="nav-link-text">Vendas</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="index.html">
						        <span class="nav-icon">
								<i class="bi bi-diagram-3-fill" fill="currentColor" style="font-size: 19px;"></i>
						         
						         </span>
		                         <span class="nav-link-text">Setores</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="orders.html">
						        <span class="nav-icon">
									<i class="bi bi-card-list" fill="currentColor" style="font-size: 19px;"></i>
								</span>
		                         <span class="nav-link-text">Pedidos</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    					    
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->

		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
				<h1 class="app-page-title ">Painel do Administrador</h1>
			

				    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total em Vendas</h4>
							    <div class="stats-figure">R$12,628</div>
							    <div class="stats-meta text-success">
									<i class="bi bi-arrow-up" fill="currentColor" style="font-size: 19px;"></i>
								 20%</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Pedidos</h4>
							    <div class="stats-figure">2,250</div>
							    <div class="stats-meta text-success">
									<i class="bi bi-arrow-up" fill="currentColor" style="font-size: 19px;"></i>
									 5% </div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Bairros Atingidos</h4>
							    <div class="stats-figure">23</div>
							    <div class="stats-meta">
								    </div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Visitantes</h4>
							    <div class="stats-figure">6</div>
							    <div class="stats-meta"></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			    <div class="row g-4 mb-4">
			        <div class="col-12 col-lg-6">
				        <div class="app-card app-card-chart h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">Número de vendas</h4>
							        </div><!--//col-->
							        <div class="col-auto">
								        <div class="card-header-action">
											<select class="form-select form-select-sm ml-auto d-inline-flex w-auto">
												<option value="1" selected>Esta semana</option>
												<option value="2">Hoje</option>
												<option value="3">Este mês</option>
												<option value="3">Este ano</option>
											</select>
								        </div><!--//card-header-actions-->
							        </div><!--//col-->
						        </div><!--//row-->
					        </div><!--//app-card-header-->
					        <div class="app-card-body p-3 p-lg-4">

						        <div class="chart-container">
				                    <canvas id="canvas-linechart" ></canvas>
						        </div>
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->
					<div class="col-12 col-lg-6">
				        <div class="app-card app-card-stats-table h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">Estatisticas por Categoria</h4>
							        </div><!--//col-->

						        </div><!--//row-->
					        </div><!--//app-card-header-->
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">
							        <table class="table table-borderless mb-0">
										<thead>
											<tr>
												<th class="meta">Source</th>
												<th class="meta stat-cell">Views</th>
												<th class="meta stat-cell">Today</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">Limpeza</a></td>
												<td class="stat-cell">110</td>
												<td class="stat-cell">
													<i class="bi bi-arrow-up text-success" fill="currentColor" style="font-size: 14px;"></i>
									                30%
									            </td>
											</tr>
											<tr>
												<td><a href="#">Enlatados</a></td>
												<td class="stat-cell">67</td>
												<td class="stat-cell">23%</td>
											</tr>
											<tr>
												<td><a href="#">Carros</a></td>
												<td class="stat-cell">56</td>
												<td class="stat-cell">
													<i class="bi bi-arrow-down text-danger" fill="currentColor" style="font-size: 14px;"></i>
												    20%
											    </td>
											</tr>
											<tr>
												<td><a href="#">Eletrodomésticos</a></td>
												<td class="stat-cell">24</td>
												<td class="stat-cell">-</td>
											</tr>
											<tr>
												<td><a href="#">Brinquedos</a></td>
												<td class="stat-cell">17</td>
												<td class="stat-cell">15%</td>
											</tr>
										</tbody>
									</table>
						        </div><!--//table-responsive-->
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->
			    </div><!--//row-->

			    <div class="row g-4 mb-4">
					<div class="col-12 col-lg-4">
						<div class="row g-4 mb-4">
						<div class="col-12 col-lg-12">
							<div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
								<div class="app-card-header p-3 border-bottom-0">
									<div class="row align-items-center gx-3">
										<div class="col-auto">
											<div class="app-icon-holder">
												<i class="bi bi-receipt" fill="currentColor" style="font-size: 22px;"></i>
											</div><!--//icon-holder-->
											
										</div><!--//col-->
										<div class="col-auto">
											<h4 class="app-card-title">Invoices</h4>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//app-card-header-->
								<div class="app-card-body px-4">
									
									<div class="intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet eros vel diam semper mollis.</div>
								</div><!--//app-card-body-->
								<div class="app-card-footer p-4 mt-auto">
								   <a class="btn app-btn-secondary" href="#">Create New</a>
								</div><!--//app-card-footer-->
							</div><!--//app-card-->
						</div><!--//col-->
						<div class="col-12 col-lg-12">
							<div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
								<div class="app-card-header p-3 border-bottom-0">
									<div class="row align-items-center gx-3">
										<div class="col-auto">
											<div class="app-icon-holder">
												<i class="bi bi-code-square" fill="currentColor" style="font-size: 22px;"></i>
											</div><!--//icon-holder-->
											
										</div><!--//col-->
										<div class="col-auto">
											<h4 class="app-card-title">Apps</h4>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//app-card-header-->
								<div class="app-card-body px-4">
									
									<div class="intro">Pellentesque varius, elit vel volutpat sollicitudin, lacus quam efficitur augue</div>
								</div><!--//app-card-body-->
								<div class="app-card-footer p-4 mt-auto">
								   <a class="btn app-btn-secondary" href="#">Create New</a>
								</div><!--//app-card-footer-->
							</div><!--//app-card-->
						</div><!--//col-->
						<div class="col-12 col-lg-12">
							<div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
								<div class="app-card-header p-3 border-bottom-0">
									<div class="row align-items-center gx-3">
										<div class="col-auto">
											<div class="app-icon-holder">
												<i class="bi bi-tools" fill="currentColor" style="font-size: 22px;"></i>
											</div><!--//icon-holder-->
											
										</div><!--//col-->
										<div class="col-auto">
											<h4 class="app-card-title">Tools</h4>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//app-card-header-->
								<div class="app-card-body px-4">
									
									<div class="intro">Sed maximus, libero ac pharetra elementum, turpis nisi molestie neque, et tincidunt velit turpis non enim.</div>
								</div><!--//app-card-body-->
								<div class="app-card-footer p-4 mt-auto">
								   <a class="btn app-btn-secondary" href="#">Create New</a>
								</div><!--//app-card-footer-->
							</div><!--//app-card-->
						</div><!--//col-->
					</div>
					</div>
					
					<div class="col-12 col-lg-8 h-25">
				        <div class="app-card app-card-chart h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title text-warning">Tempo médio gasto em cada setor</h4>
							        </div><!--//col-->
							        <div class="col-auto">
								        <div class="card-header-action">
									        <a href="charts.html">More charts</a>
								        </div><!--//card-header-actions-->
							        </div><!--//col-->
						        </div><!--//row-->
					        </div><!--//app-card-header-->
					        <div class="app-card-body p-3 p-lg-4">
							    <div class="mb-3 d-flex">   
							        <select class="form-select form-select-sm ml-auto d-inline-flex w-auto">
									    <option value="1" selected>Por Semestre</option>
									    <option value="2">Por Trimeste</option>
									    <option value="3">Por Ano</option>
									</select>
							    </div>
						        <div class="chart-container">
				                    <canvas id="canvas-barchart" ></canvas><!-- canvas-barchart -->
						        </div>
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->
			        
			    </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">

		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="../plugins/popper.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Charts JS -->
    <script src="../plugins/chart.js/chart.min.js"></script> 
    <script src="../pages/admin/js/index-charts.js"></script> 
	<script src="../pages/admin/js/charts-demo.js"></script>
    
    <!-- Page Specific JS -->
    <script src="../pages/admin/js/app.js"></script> 

</body>
</html> 
