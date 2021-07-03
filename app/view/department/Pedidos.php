<div class="text-center h5 mt-4 font-weight-bold text-dark">Lista de Pedidos</div>

<div class="container bg-dark text-warning mt-3">
    <form action="<?= DIRPAGE . 'department/SortOrder'; ?>" method="post">
    <div class="row text-center">
        <div class="col-lg-1 m-auto p-2"><i class="bi bi-box-seam h5"></i></div>
        <div class="col-lg-2 m-auto p-2 list-header">
          <button type="submit" class="list-header border-0 p-0 text-decoration-none m-0">ORDER</button> 
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
    </form>
</div>

<form action="<?= DIRPAGE . 'department/SetEmployeeOrder'; ?>" method="post">
    <div class="container orders-list">

        <?php foreach ($this->content['orders'] as $order) { ?>
        <div class="row item text-center p-2 border-bottom">
            <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
            <div class="col-md-2 m-auto">
                #<span class="prod-id"><?= $order->getId() ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date"><?= date("d/m/y H:i", strtotime($order->getDate())); ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-date"><?= date("d/m/y H:i", strtotime($order->getStatus()->getUpdate_time())); ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-qtd"><?= count($order->getItems()) ?></span>
            </div>
            <div class="col-md-2 m-auto">
                <span class="prod-status p-1 text-dark bg-gradient">
                    <?= $order->getStatus()->getStatus() ?>
                </span>
            </div>
            <div class="col-md-1 m-auto h5 form-check">
                <?php if(unserialize($_SESSION['employee'])->isInMyDepartment($order) && !isset($_SESSION['dep-order'])){ ?>
                    <input class="form-check w-100" type="radio" name="order-id" value="<?= $order->getId() ?>" required>
                <?php }else{ ?>
                    <input class="form-check w-100" type="radio" name="order-id" value="<?= $order->getId() ?>" disabled>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

    </div>
    <div class="container text-center">
        <button type="submit" class="btn btn-dark text-warning">Selecionar Pedido</button>
    </div>
</form>