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
                <?php if(count($this->content['order']->allStatus()) > 1){ ?>
                <div class="step completed">
                <?php }else{ ?>
                <div class="step ">
                <?php }?>
                  <div class="step-icon-wrap">
                    <div class="step-icon"><i class="pe-7s-config"></i></div>
                  </div>
                  <h4 class="step-title">Pedido Processado</h4>
                </div><!-- step -->
                <?php if(count($this->content['order']->allStatus()) > 2){ ?>
                <div class="step completed">
                <?php }else{ ?>
                <div class="step ">
                <?php }?>
                  <div class="step-icon-wrap">
                    <div class="step-icon"><i class="pe-7s-medal"></i></div>
                  </div>
                  <h4 class="step-title">Qualidade Checada</h4>
                </div><!-- step -->
                <?php if(count($this->content['order']->allStatus()) > 3 && $this->content['order']->getStatus()->getStatus() == "Delivered"){ ?>
                <div class="step completed">
                <?php }else{ ?>
                <div class="step ">
                <?php }?>
                  <div class="step-icon-wrap">
                    <div class="step-icon"><i class="pe-7s-car"></i></div>
                  </div>
                  <h4 class="step-title">Pedido Entregue</h4>
                </div><!-- step -->
              </div><!-- steps -->

</div>

<div class="container order-addres-data mt-5">
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
    <a href="<?= DIRPAGE . 'department/Delivery'; ?>" class="btn btn-dark text-warning">Concluir Pedido</a>
</div>