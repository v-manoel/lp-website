<div class="container page-container">
<?php foreach ($this->content['cart']->getItems() as $item) {?>
    <div class="row item pb-3 pt-2 px-3 align-items-md-center">
        <div class="col-lg-7 col-12  align-items-md-center d-flex">
            <div class="text-center w-25">
                <form action="<?php echo DIRPAGE.'product'; ?>" method="post">
                <input type='hidden' name='product_id' id='product_id' value='<?= $item->getProduct()->getId() ?>'><br> 
                    <button type="submit" class="border-0 bg-transparent p-0">
                        <?php if(count($item->getProduct()->getImgs()) > 0){ ?>
                            <img class="w-75" src="<?= $item->getProduct()->getImgs()[0]; ?>" alt="example" style="min-width: 75px;">
                        <?php }else{ ?>
                            <img class="w-75" src="<?= DIRIMG . 'examples/produtos.svg'; ?>" alt="example" style="min-width: 75px;">
                        <?php } ?>
                    </button>
                </form>
            </div>
            <div class="w-75">
                <p class="m-0 mb-0 prod-title"><?= $item->getProduct()->getTitle(); ?></p>
                <p class="m-0 mb-3 prod-desc"><?= $item->getProduct()->getSource(); ?></p>
                <form name="cats-form" action="<?php echo DIRPAGE . 'busca/result'; ?>" method="GET">
                    <nav class="nav options m-0">
                        <?php foreach ($item->getProduct()->getCategories() as $cat) { ?>
                            <button type="submit" name="category" value="<?= $cat->getName() ?>" class="bg-transparent text-primary border-0 p-0 me-3 nav-link"><?= $cat->getName() ?></button>
                        <?php } ?>
                        <a class="p-0 me-3 nav-link active text-danger cursor-pointer btn" aria-current="page" onclick="changeQnty('<?= 'qnty-'.$item->getProduct()->getId() ?>','delete')">Excluir</a>
                    </nav>
                </form>
            </div>
        </div><!-- col -->

        <div class="col-lg-2 col-6 text-end">
            <div class="qtd m-auto border-1">
                <form action="<?= DIRPAGE.'cart/changeItem'?>" id="<?= 'form-qnty-'.$item->getProduct()->getId() ?>" method="post">
                    <input type="hidden" name="prod-id" value="<?= $item->getProduct()->getId(); ?>">
                    <i class="bi bi-dash my-auto mx-0 text-warning" id="add-qnty" onclick="changeQnty('<?= 'qnty-'.$item->getProduct()->getId() ?>','remove')"></i>
                    <span class="m-auto w-25"><input onchange="attItem(this)" name="item-qnty" id="<?= 'qnty-'.$item->getProduct()->getId() ?>" class="border-0 text-center w-25" type="text" min="1" max="99" value="<?= $item->getQnty(); ?>" style="outline:none"></span>
                    <i class="bi bi-plus my-auto mx-0 text-warning" id="rem-qnty" onclick="changeQnty('<?= 'qnty-'.$item->getProduct()->getId() ?>','add')"></i>
                  </form>
            </div>
        </div>
        
        <div class="col-lg-1 col-12"></div>

        <div class="col-lg-2 col-6 text-center total">
            <p class="price m-0"><?= 'R$ ' . floor($item->getPrice()) ?><span class="decimals align-top"><?= ($item->getPrice() * 100) % 100; ?></span></p>
        </div>
    </div><!-- row -->
    <?php } ?>

    <div class="row price-information pb-4 align-items-md-center">
        <div class="col-md-7">

        </div>
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-dark text-warning" data-bs-toggle="modal" data-bs-target="#enderecoModal">Escolher endereço</button>
            <div>Frete dos produtos</div>
            <div></div>
        </div>
        <div class="col-md-2 text-end">
            <p class="text-success mb-0">Frete Grátis</p>
            <p class="price m-auto">R$ 0<span class="decimals align-top">0</span></p>
        </div>
    </div>

    <div class="row total-information pb-4 align-items-md-cente pt-4">
        <div class="col-lg-7">

        </div>
        <div class="col-lg-3 text-end">
            <h5 class="">Total com frete</h5>
        </div>
        <div class="col-lg-2 text-end">
            <p class="price m-auto"><?= 'R$ ' . floor($this->content['cart']->calcTotal()) ?><span class="decimals align-top"><?= ($this->content['cart']->calcTotal() * 100) % 100; ?></span></p>
        </div>
    </div>
    <div class="row price-information pb-4 align-items-md-center">
        <div class="col-md-8">

        </div>
        <div class="col-lg-4 text-end">
            <a href="<?= DIRPAGE.'cart/goToPayment'?>" class="btn btn-warning text-dark">Continuar Compra</a>
        </div>
    </div>
</div>


<!-- Endereco modal -->
<div class="modal fade" id="enderecoModal" tabindex="-1" aria-labelledby="enderecoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">

            <div class="modal-header pb-0">
                <div>
                    <h5 class="modal-title" id="enderecoModalLabel">Selecione onde quer receber suas compras</h5>
                    <p>Você poderá ver custos e prazos de entrega da sua compra</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <?php if($this->content['cart']->getOwner()){?>
                <div class="user-enderecos">
                    <h6>Em um dos seus endereços</h6>
                    <div class="container-fluid">

                    <form id="addr-form" action="<?= DIRPAGE.'cart/changeDestination'?>" method="POST">
                    <?php foreach (Address::allByCustomer($this->content['cart']->getOwner()) as $addr) { ?>
                        <div class="form-check endereco-option align-items-center">
                            <input class="form-check-input mt-3"  type="radio" name="order-addr" id="<?= 'addr-'.$addr->getId(); ?>" value="<?= $addr->getId(); ?>">
                            <label class="form-check-label row" for="<?= 'addr-'.$addr->getId(); ?>">
                                <div class="row">
                                    <span class=" h6 col-md-6"><?= $addr->getName(); ?></span>
                                    <span class="col-md-6 text-end"><?= $addr->getStreet(); ?></span>
                                </div>
                                <div class="row">
                                    <span class="col-md-6"><?= $addr->getCep() .'  |  '. $addr->getCity()->getName(); ?></span>
                                    <span class="col-md-6 text-end text-primary"><?= $addr->getDestinatary(); ?></span>
                                </div>
                            </label>
                        </div><!-- form-check -->
                    <?php }?>
                    </form>


                        <a class="btn text-primary text-decoration-none" href="<?= DIRPAGE.'account/page/myAddress'?>">Editar endereços</a>

                    </div><!-- container -->
                </div><!-- user-enderecos -->
            <?php } ?>
                <div class="cep-entry">
                    <h6>Em um novo lugar</h6>
                    <div class="container-fluid mb-0">

                        <form class="align-items-center">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-floating" style="margin-left: -10px;">
                                        <input type="text" class="form-control" id="informcep" placeholder="">
                                        <label for="floatingInputGrid">Informar um CEP</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-warning text-dark">Usar</button>
                                </div>
                                <div class="col-md-5">
                                    <div class="link-warning">Não sei meu CEP</div>
                                </div>
                            </div>
                        </form>
                        <a class="btn text-primary text-decoration-none" href="<?= DIRPAGE.'account/page/myAddress'?>">Adicionar endereço completo</a>
                    </div><!-- container -->
                </div><!-- cep-entry -->
            </div><!-- modal body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="addr-form" class="btn btn-primary">Salvar modificações</button>
            </div>

        </div><!-- modal content -->
    </div><!-- modal dialog -->
</div><!-- modal -->