<div class="text-center h3 mt-3 font-weight-bold text-dark">Itens do Pedido <br>
    <span class="badge bg-dark text-warning h3"><?= '# ' . $this->content['order']->getId() ?></span>
</div>

<div class="container bg-dark text-warning" style="margin-top: 3%">
    <div class="row text-center p-2">
        <div class="col-md-1 m-auto h5">
            <img src="../../commom/img/examples/produtos.svg" width="30px" alt="">
        </div>
        <div class="col-md-1 m-auto h5">
            Código
        </div>
        <div class="col-md-6 m-auto h5">
            Descrição
        </div>
        <div class="col-md-2 m-auto h5">
            Seção
        </div>
        <div class="col-md-1 m-auto h5">
            Qtd
        </div>
        <div class="col-md-1 m-auto h5">
            <i class="bi bi-cart3"></i>
        </div>

    </div>
</div>

<form action="<?= DIRPAGE . 'department/Prepare'; ?>" method="POST" name="preparation-form">
    <div class="container order-items">
        <?php foreach ($this->content['order']->getItems() as $item) { ?>
            <div class="row item text-center p-2 border-bottom">
                <div class="col-md-1 m-auto mx-1 px-1">
                <?php if (count($item->getProduct()->getImgs()) > 0) { ?>
                      <img src="<?= DIRIMG . $item->getProduct()->getImgs()[0]; ?>" width="48px"  alt="...">
                    <?php } else { ?>
                      <img src="<?= DIRIMG . 'examples/produtos.svg'; ?>" width="48px"   alt="...">
                    <?php } ?>
                </div>
                <div class="col-md-1 m-auto mx-0 px-0">
                    #<span class="item-id"><?= $item->getProduct()->getId(); ?></span>
                </div>
                <div class="col-md-6 m-auto mx-0 px-0">
                    <span class="item-desc"><?= $item->getProduct()->getTitle(); ?></span>
                </div>
                <div class="col-md-2 m-auto mx-0 px-0">
                    <span class="item-section"><?= $item->getProduct()->getCategories()[0]->getName(); ?></span>
                </div>
                <div class="col-md-1 m-auto mx-0 px-0">
                    <span class="item-qtd"><?= $item->getQnty(); ?></span>
                </div>
                <div class="col-md-1 m-auto mx-0 px-0">
                    <input class=" w-75" type="number" name="<?= 'stored[' . $item->getProduct()->getId() . ']' ?>" min="0" max=<?= $item->getQnty(); ?>>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="container text-center">
        <button type="submit" name="prepare-button" class="btn btn-dark text-warning">Para Conferência</button>
    </div>
</form>