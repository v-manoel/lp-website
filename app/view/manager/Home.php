    <div class="app-wrapper">

    	<div class="app-content pt-3 p-md-3 p-lg-4">
    		<div class="container-xl">
    			<h1 class="app-page-title text-center text-white">Painel do Administrador</h1>


    			<div class="row g-4 mb-2">
    				<div class="col-6 col-lg-3">
    					<div class="app-card app-card-stat shadow-sm h-75">
    						<div class="app-card-body p-3 p-lg-4">
    							<h4 class="stats-type mb-1">Total em Vendas</h4>
    							<div class="stats-figure">
								<p class="price mr-3"><?= 'R$ ' . floor($this->content['orders-price']) ?><span class="decimals position-absolute mt-5"><?= $this->content['orders-price'] * 100 % 100; ?></span></p>
								</div>
    							
    						</div>
    						<!--//app-card-body-->
    						<a class="app-card-link-mask" href="#"></a>
    					</div>
    					<!--//app-card-->
    				</div>
    				<!--//col-->

    				<div class="col-6 col-lg-3">
    					<div class="app-card app-card-stat shadow-sm h-75">
    						<div class="app-card-body p-3 p-lg-4">
    							<h4 class="stats-type mb-1">Pedidos</h4>
    							<div class="stats-figure"><?= $this->content['orders-qnty'] ?></div>
    						</div>
    						<!--//app-card-body-->
    						<a class="app-card-link-mask" href="#"></a>
    					</div>
    					<!--//app-card-->
    				</div>
    				<!--//col-->
    				<div class="col-6 col-lg-3">
    					<div class="app-card app-card-stat shadow-sm h-75">
    						<div class="app-card-body p-3 p-lg-4">
    							<h4 class="stats-type mb-1">Bairros Atingidos</h4>
    							<div class="stats-figure"><?= $this->content['districts-rechead'] ?></div>
    							<div class="stats-meta">
    							</div>
    						</div>
    						<!--//app-card-body-->
    						<a class="app-card-link-mask" href="#"></a>
    					</div>
    					<!--//app-card-->
    				</div>
    				<!--//col-->
    				<div class="col-6 col-lg-3">
    					<div class="app-card app-card-stat shadow-sm h-75">
    						<div class="app-card-body p-3 p-lg-4">
    							<h4 class="stats-type mb-1">Visitantes</h4>
    							<div class="stats-figure">6</div>
    							<div class="stats-meta"></div>
    						</div>
    						<!--//app-card-body-->
    						<a class="app-card-link-mask" href="#"></a>
    					</div>
    					<!--//app-card-->
    				</div>
    				<!--//col-->
    			</div>
    			<!--//row-->
    			<div class="row g-4 mb-4">
    				<div class="col-12 col-lg-6">
    					<div class="app-card app-card-chart h-100 shadow-sm">
    						<div class="app-card-header p-3">
    							<div class="row justify-content-between align-items-center">
    								<div class="col-auto">
    									<h4 class="app-card-title">Número de vendas</h4>
    								</div>
    								<!--//col-->
    								<div class="col-auto">
    									<div class="card-header-action">
    										<select class="form-select form-select-sm ml-auto d-inline-flex w-auto ">
    											<option value="1" selected>Esta semana</option>
    											<option value="2">Hoje</option>
    											<option value="3">Este mês</option>
    											<option value="3">Este ano</option>
    										</select>
    									</div>
    									<!--//card-header-actions-->
    								</div>
    								<!--//col-->
    							</div>
    							<!--//row-->
    						</div>
    						<!--//app-card-header-->
    						<div class="app-card-body p-3 p-lg-4">

    							<div class="chart-container">
    								<canvas id="canvas-line"></canvas>
    							</div>
    						</div>
    						<!--//app-card-body-->
    					</div>
    					<!--//app-card-->
    				</div>
    				<!--//col-->
    				<div class="col-12 col-lg-6">
    					<div class="app-card app-card-stats-table h-100 shadow-sm">
    						<div class="app-card-header p-3">
    							<div class="row justify-content-between align-items-center">
    								<div class="col-auto ">
    									<h4 class="app-card-title">Estatísticas por Categoria</h4>
    								</div>
    								<!--//col-->

    							</div>
    							<!--//row-->
    						</div>
    						<!--//app-card-header-->
    						<div class="app-card-body p-3 p-lg-4">
    							<div class="table-responsive">
    								<table class="table table-borderless mb-0 ">
    									<thead>
    										<tr>
    											<th class="meta">Categoria</th>
    											<th class="meta stat-cell text-center">Pedidos</th>
    											<th class="meta stat-cell">Receita</th>
    										</tr>
    									</thead>
    									<tbody>
											<?php for ($i=0; $i < count($this->content['categories-price']); $i++){ ?>
    										<tr class="border-0 border-secondary">
    											<td class="text-dark"><?= array_keys($this->content['categories-price'])[$i] ?></td>
    											<td class="stat-cell text-center"><?= array_values($this->content['categories-qnty'])[$i] ?></td>
    											<td class="stat-cell"><?= array_values($this->content['categories-price'])[$i] ?></td>
    										</tr>
											<?php } ?>
    									</tbody>
    								</table>
    							</div>
    							<!--//table-responsive-->
    						</div>
    						<!--//app-card-body-->
    					</div>
    					<!--//app-card-->
    				</div>
    				<!--//col-->
    			</div>
    			<!--//row-->

    			<div class="row g-4 mb-4">
    				<div class="col-12 col-lg-4">
    					
    				</div>

    				<div class="col-12 col-lg-8 h-25">
    					<div class="app-card app-card-chart h-100 shadow-lg">
    						<div class="app-card-header p-3">
    							<div class="row justify-content-between align-items-center">
    								<div class="col-auto">
    									<h4 class="app-card-title text-dark">Espera Média Por Setor (em horas)</h4>
    								</div>
    								<!--//col-->
    								<div class="col-auto">
    									<div class="card-header-action">
    										
    									</div>
    									<!--//card-header-actions-->
    								</div>
    								<!--//col-->
    							</div>
    							<!--//row-->
    						</div>
    						<!--//app-card-header-->
    						<div class="app-card-body p-3 p-lg-4">
    							<div class="mb-3 d-flex">
    								<select class="form-select form-select-sm ml-auto d-inline-flex w-auto">
    									<option value="1" selected>Por Semestre</option>
    									<option value="2">Por Trimeste</option>
    									<option value="3">Por Ano</option>
    								</select>
    							</div>
    							<div class="chart-container">
    								<canvas id="canvas-bar"></canvas><!-- canvas-barchart -->
    							</div>
    						</div>
    						<!--//app-card-body-->
    					</div>
    					<!--//app-card-->
    				</div>
    				<!--//col-->

    			</div>
    			<!--//row-->

    		</div>
    		<!--//container-fluid-->
    	</div>
    	<!--//app-content-->


    </div>
    <!--//app-wrapper-->



    <!-- Charts JS -->
    <script src="<?= DIRJS . 'index-charts.js'; ?>"></script>
	<script src="<?= DIRJS . 'stats-charts.js'; ?>"></script>
    <script src="<?= DIRJS . 'charts-demo.js'; ?>"></script>