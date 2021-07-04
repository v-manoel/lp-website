<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title ">Estatísticas dos Setores</h1>
			<div class="row g-4 mb-4">
				<div class="col-12 col-lg-6">
					<div class="row g-4">
						<div class="col-12 col-lg-12">
							<div class="app-card app-card-chart h-100 shadow-sm">
								<div class="app-card-header p-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto m-auto">
											<h4 class="app-card-title">Funcionário do mês</h4>
										</div>
										<!--//col-->

									</div>
									<!--//row-->
								</div>
								<!--//app-card-header-->
								<div class="app-card-body p-3 p-lg-4">

									<div class="chart-container text-center">
									<i class="bi bi-award-fill" style="font-size: 4rem" ></i>
									</div>
									<div class="description text-center text-warning m-auto mt-3">
										<?= $this->content['employees-stats'][0]->NamePieces()[0] .' - '. $this->content['employees-stats'][0]->getDepartment() ?>
									</div>
								</div>
								<!--//app-card-body-->
							</div>
							<!--//app-card-->
						</div>
						<!--//col-->
						<div class="col-12 col-lg-12">
							<div class="app-card app-card-chart h-100 shadow-sm">
								<div class="app-card-header p-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<h4 class="app-card-title">Tempo médio por setor</h4>
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
										<canvas id="department-pie-time"></canvas>
									</div>
								</div>
								<!--//app-card-body-->
							</div>
							<!--//app-card-->
						</div>
						<!--//col-->
					</div><!-- row -->
				</div><!-- col -->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-stats-table h-100 shadow-sm">
						<div class="app-card-header p-3">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<h4 class="app-card-title">Atendimentos por setor</h4>
								</div>
								<!--//col-->
								<div class="col-auto">
									<div class="card-header-action">
										<select class="form-select form-select-sm ml-auto d-inline-flex w-auto ">
											<option value="1" selected>Todos</option>
											<option value="2">Preparação</option>
											<option value="3">Conferência</option>
											<option value="3">Embalagem</option>
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
							<div class="table-responsive">
								<table class="table table-borderless mb-0">
									<thead>
									<tr>
                                                <th class="meta">Funcionário</th>
    											<th class="meta stat-cell text-center">Atendimentos</th>
    											<th class="meta stat-cell">Duração</th>
											</tr>
										</thead>
										<tbody>
                                        <?php foreach($this->content['employees-stats'] as $employee_stats){ ?>
    										<tr class="border-0 border-secondary">
    											<td class="text-dark"><?= $employee_stats->getName() ?></td>
    											<td class="stat-cell text-center"><?= $employee_stats->getAttendances_qnty() ?></td>
    											<td class="stat-cell"><?= $employee_stats->getAttendances_Time() ?></td>
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
			</div><!-- row -->



		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-content-->

</div>
<!--//app-wrapper-->


<!-- Javascript -->
<script src="<?= DIRJS . 'setor-graphs.js'; ?>"></script>