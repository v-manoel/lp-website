<div class="text-center h5 mt-4 font-weight-bold text-dark">Lista de Pedidos</div>

<div class="container bg-dark text-warning mt-3">
    <div class="row text-center">
        <div class="col-lg-1 m-auto p-2"><i class="bi bi-box-seam h5"></i></div>
        <div class="col-lg-2 m-auto p-2 list-header">
            ORDER
        </div>
        <div class="col-lg-2 m-auto p-2 list-header">
            DATA
        </div>
        <div class="col-lg-2 m-auto p-2 list-header">
            ENTRADA
        </div>
        <div class="col-lg-2 m-auto p-2 list-header">
            Nº ITEMS
        </div>
        <div class="col-lg-2 m-auto p-2 list-header">
            STATUS
        </div>
        <div class="col-lg-1 p-2 m-auto">
            <i class="bi bi-clipboard-check h5"></i>
        </div>
    </div>
</div>

<form action="" method="post">
    <div class="container orders-list">

        <?php foreach ($this->content['orders'] as $order) { ?>
        <div class="row item text-center p-2 border-bottom">
            <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
            <div class="col-md-2 m-auto">
                #<span class="prod-id"><?= $order->getId() ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date"><?= date("d/m/Y H:i", strtotime($order->getDate())); ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date"><?= date("d/m/Y H:i", strtotime($order->getStatus()->getUpdate_time())); ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-qtd"><?= count($order->getItems()) ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-status bg-success p-1 text-white"><?= $order->getStatus()->getStatus() ?></span>
            </div>
            <div class="col-md-1 m-auto h5 form-check">
                <input class="form-check w-100" type="radio" name="order1" id="order1">
            </div>
        </div>
        <?php } ?>

        <hr class="m-1 h-25 text-secondary w-100">

        <div class="row item text-center p-2">
            <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
            <div class="col-md-2 m-auto">
                #<span class="prod-id">198254</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-qtd">9999</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-status bg-warning p-1 text-white">Preparando</span>
            </div>
            <div class="col-md-1 m-auto h5 form-check">
                <input class="form-check w-100" type="radio" name="order1" id="order1">
            </div>
        </div>

        <hr class="m-1 h-25 text-secondary w-100">

        <div class="row item text-center p-2">
            <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
            <div class="col-md-2 m-auto">
                #<span class="prod-id">198254</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-qtd">9999</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-status bg-danger p-1 text-white">Revisando</span>
            </div>
            <div class="col-md-1 m-auto h5 form-check">
                <input class="form-check w-100" type="radio" name="order1" id="order1">
            </div>
        </div>

        <hr class="m-1 h-25 text-secondary w-100">

        <div class="row item text-center p-2">
            <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
            <div class="col-md-2 m-auto">
                #<span class="prod-id">198254</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-qtd">9999</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-status bg-dark p-1 text-white">Conferindo</span>
            </div>
            <div class="col-md-1 m-auto h5 form-check">
                <input class="form-check w-100" type="radio" name="order1" id="order1">
            </div>
        </div>

        <hr class="m-1 h-25 text-secondary w-100">

        <div class="row item text-center p-2">
            <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
            <div class="col-md-2 m-auto">
                #<span class="prod-id">198254</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-qtd">9999</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-status bg-primary p-1 text-white">Entregando</span>
            </div>
            <div class="col-md-1 m-auto h5 form-check">
                <input class="form-check w-100" type="radio" name="order1" id="order1">
            </div>
        </div>

        <hr class="m-1 h-25 text-secondary w-100">

        <div class="row item text-center p-2">
            <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
            <div class="col-md-2 m-auto">
                #<span class="prod-id">198254</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date">00/00/00</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-qtd">9999</span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-status bg-success p-1 text-white">Disponível</span>
            </div>
            <div class="col-md-1 m-auto h5 form-check">
                <input class="form-check w-100" type="radio" name="order1" id="order1" disabled>
            </div>
        </div>


    </div>
    <div class="container text-center">
        <button type="submit" class="btn btn-dark text-warning">Selecionar Pedido</button>
    </div>
</form>