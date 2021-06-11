<div class="text-center h3 mt-3 font-weight-bold text-dark"> Rastreio do Pedido <br>
    <span class="badge bg-dark text-warning h3">987456</span>
</div>


<div class="container delivery-progress-bar text-center mt-5">
    <div class="progress m-auto" style="width: 480px;">
        <div class="align-items-start progress-bar bg-warning text-warning progress-bar-striped progress-bar-animated" id="out-step" role="progressbar" style="width: 200px">
            <span class="step-dot dot-out">1</span>
        </div>
        <div class="align-items-start progress-bar bg-warning text-warning progress-bar-striped progress-bar-animated" id="out-step" role="progressbar" style="width: 200px">
            <span class="step-dot dot-out">2</span>
        </div>
        <div class="align-items-start progress-bar bg-transparent text-secondary progress-bar-striped progress-bar-animated" id="load-step" role="progressbar" style="width: 200px">
            <span class="step-dot dot-load">3</span>
        </div>
        <div class="align-items-start progress-bar bg-transparent  text-secondary progress-bar-striped progress-bar-animated" id="end-step" role="progressbar" style="width: 0">
            <span class="step-dot dot-end">4</span>
        </div>
    </div>

    <div class="mt-3 mb-4">
        <span class="step-begin">Pedido Efetuado</span>
        <span class="step-out">Saiu da Loja</span>
        <span class="step-load">Em Transporte</span>
        <span class="step-end">Pedido Entregue</span>
    </div>

</div>

<div class="container order-addres-data">
    <div class="card">
        <div class="card-header">
            Dados da entrega
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <span class="bi bi-signpost-2-fill me-2 input-group-text"></span>
                <input type="text" class="form-control" id="manager_user" readonly placeholder="Someone">
                <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark"> Endereço</span>
            </div>
            <div class="row mb-3">
                <div class="col-md-8 input-group">
                    <span class="bi bi-mailbox2 me-2 input-group-text"></span>
                    <input type="text" class="form-control" id="manager_user" readonly placeholder="Number">
                    <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark">CEP</span>
                </div>
                <div class="col-md-4 input-group">

                    <input type="text" class="form-control" id="manager_user" readonly placeholder="Number">
                    <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark">Número</span>
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="bi bi-person-fill me-2 input-group-text"></span>
                <input type="text" class="form-control" id="manager_user" readonly placeholder="Someone">
                <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark"> Destinatário</span>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 input-group">
                    <span class="bi bi-phone-fill me-2 input-group-text"></span>
                    <input type="text" class="form-control" id="manager_user" readonly placeholder="Number">
                    <span class="input-group-text ml-1 p-0 pl-1 pr-1  text-dark">Telefone</span>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-5">
    <button class="btn btn-dark text-warning">Concluir Pedido</button>
</div>