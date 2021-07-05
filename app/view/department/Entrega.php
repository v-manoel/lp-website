<div class="text-center h3 mt-3 font-weight-bold text-dark"> Rastreio do Pedido <br>
  <span class="badge bg-dark text-warning h3"><?= '# ' . $this->content['order']->getId() ?></span>
</div>


<div class="container delivery-progress-bar text-center mt-3">
  <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
    <div class="step completed">
      <div class="step-icon-wrap">
        <div class="step-icon"><i class="pe-7s-cart"></i></div>
      </div>
      <h4 class="step-title">Pedido Confirmado</h4>
    </div><!-- step -->
    <?php if ($this->content['order']->getStatus()->isCompleted("Paid")) { ?>
      <div class="step completed">
      <?php } else { ?>
        <div class="step ">
        <?php } ?>
        <div class="step-icon-wrap">
          <div class="step-icon"><i class="pe-7s-config"></i></div>
        </div>
        <h4 class="step-title">Pedido Processado</h4>
        </div><!-- step -->
        <?php if ($this->content['order']->getStatus()->isCompleted("Prepared")) { ?>
          <div class="step completed">
          <?php } else { ?>
            <div class="step ">
            <?php } ?>
            <div class="step-icon-wrap">
              <div class="step-icon"><i class="pe-7s-medal"></i></div>
            </div>
            <h4 class="step-title">Qualidade Checada</h4>
            </div><!-- step -->
            <?php if ($this->content['order']->getStatus()->isCompleted("Checked")) { ?>
              <div class="step completed">
              <?php } else { ?>
                <div class="step ">
                <?php } ?>
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-car"></i></div>
                </div>
                <h4 class="step-title">Pedido Entregue</h4>
                </div><!-- step -->
              </div><!-- steps -->
              <!-- Button trigger modal -->

          </div>




          <div class="container order-addres-data mt-2">
            <div class="card">
              <div class="card-header">
                Dados da entrega
              </div>
              <div class="card-body">
                <div class="input-group mb-3">
                  <span class="bi bi-signpost-2-fill me-2 input-group-text"></span>
                  <input type="text" class="form-control" id="manager_user" readonly value="<?= $this->content['order']->getDestination()->getStreet() ?>">
                  <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark"> Endereço</span>
                </div>
                <div class="row mb-3">
                  <div class="col-md-8 input-group">
                    <span class="bi bi-mailbox2 me-2 input-group-text"></span>
                    <input type="text" class="form-control" id="manager_user" readonly value="<?= $this->content['order']->getDestination()->getCep() ?>">
                    <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark">CEP</span>
                  </div>
                  <div class="col-md-4 input-group">

                    <input type="text" class="form-control" id="manager_user" readonly value="<?= $this->content['order']->getDestination()->getNumber() ?>">
                    <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark">Número</span>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <span class="bi bi-person-fill me-2 input-group-text"></span>
                  <input type="text" class="form-control" id="manager_user" readonly value="<?= $this->content['order']->getDestination()->getDestinatary() ?>">
                  <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark"> Destinatário</span>
                </div>
                <div class="row mb-3">
                  <div class="col-md-8 input-group">
                    <span class="bi bi-geo-fill me-2 input-group-text"></span>
                    <input type="text" class="form-control" id="manager_user" readonly value="<?= $this->content['order']->getDestination()->getDistrict() ?>">
                    <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark">Bairro</span>
                  </div>
                  <div class="col-md-6">

                  </div>
                </div>
              </div>
            </div>
          </div>

                
          <div class="container text-center mt-5">
            <a href="<?= DIRPAGE . 'department/Delivery'; ?>" class="btn btn-dark text-warning text-end">Concluir Pedido</a>
            <button type="button" class="btn btn-primary float-end position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="bi bi-receipt-cutoff"></i>
            </button>
          </div>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable ">
    <div class="modal-content shadow-lg pb-4 px-4 my-bg-paper ">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <h5 class="modal-title text-center" id="exampleModalLabel">Relatório de Rastreamento</h5>
      <div class="modal-body">
        <div class="row border-bottom border-top border-dark my-auto">
        <p class="col-3 my-auto py-1 px-1" >Status</p>
        <p class="col-2 text-center my-auto py-1 px-1">Funcionário</p>
        <p class="col-3 text-center my-auto py-1 px-1">Setor</p>
        <p class="col-4 text-center my-auto py-1 px-1">Modificação</p>
        </div>
        <div class="pb-3"></div>
        <?php foreach($this->content['status'] as $status){ ?>
          <div class="row status-info">
          <p class="col-3 my-auto p-1 px-1"><?= $status->getStatus() ?></p>
          <p class="col-2 text-center my-auto py-1 px-1"><?= $status->getModifier()->NamePieces()[0] ?></p>
          <p class="col-3 text-center my-auto py-1 px-1"><?= $status->getModifier()->getDepartment() ?></p>
          <p class="col-4 text-end my-auto py-1 px-1"><?= date("d/m/Y H:i", strtotime($status->getUpdate_time())) ?></p>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>