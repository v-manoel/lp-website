<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title ">Estatísticas dos Produtos</h1>


			<div class="items-carousel items-carousel-4 mb-4">
				<?php foreach ($this->content['products-stats'] as $prod) { ?>
				<div class="item">
					<div class="app-card app-card-stat shadow-sm h-100">
						<div class="app-card-body p-3 p-lg-4">
							<h5 class="stats-type mb-1 card-prod-title"><?= $prod->getTitle() ?></h5>
							<?php if(count($prod->getImgs()) > 0){ ?>
                                <div class="stats-figure my-2"><img src="<?= DIRIMG . $prod->getImgs()[0]; ?>" class="m-auto" width="100px" alt=""></div>
                            <?php }else{?>
                                <div class="stats-figure my-2"><img src="<?= DIRIMG . 'examples/produtos.svg'; ?>" class="m-auto" width="100px" alt=""></div>
                            <?php } ?>
							<div class="stats-meta">
								<?= $prod->getTotal_sales() ?>
							</div>
						</div>
						<!--//app-card-body-->
						<a class="app-card-link-mask" href="#"></a>
					</div>
					<!--//app-card-->
				</div>
				<?php } ?>

				
			</div>

			<div class="row g-4 mb-4">
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Participação dos produtos</h4>
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
								<canvas id="prod-donut-chart"></canvas>
							</div>
						</div>
						<!--//app-card-body-->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-chart h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Vendas por Produto</h4>
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
							<canvas id="prod-sales-bar"></canvas><!-- canvas-barchart -->
							</div>
						</div>
						<!--//app-card-body-->
					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
			</div>
			<!--//row-->

			<div class="row g-4 mb-4">
				<div class="col-12 col-lg-12 h-25">
					
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

<script src="<?= DIRJS.'product-graphs.js'; ?>"></script>