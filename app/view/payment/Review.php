<div class="container page-container">
    <div class="row">
        <div class="col-md-7 payment-method">
            <h4 class="mb-4">Revise e Confirme sua compra</h4>
            <h6 class="mb-3 font-weight-bold">Detalhes do envio</h6>
            <div class="container-fluid info">
                <div class="form-check payment-option align-items-center p-0">
                    <div class="row align-items-center p-3">
                        <div class="col-md-1 p-2">
                            <i class="bi bi-geo-alt h3"></i>
                        </div>
                        <?php if ($this->content['order']->getDestination()) { ?>
                            <div class="col-md-7 desc">
                                <div class="row address-name">
                                    <?= $this->content['order']->getDestination()->getStreet() . ', ' . $this->content['order']->getDestination()->getNumber(); ?>
                                </div>
                                <div class="row address-info small text-secondary">
                                    <span class="p-0"><span><?= $this->content['order']->getDestination()->getCity()->getName() . ', ' . $this->content['order']->getDestination()->getState()->getUf(); ?>

                                        </span> - CEP: <span> <?= $this->content['order']->getDestination()->getCep() ?> </span>
                                    </span>
                                </div>
                                <div class="row address-user small text-secondary">
                                    <span class="p-0"><span><?= $this->content['order']->getDestination()->getDestinatary() ?>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="#" class="text-primary text-decoration-none small" data-bs-toggle="modal" data-bs-target="#enderecoModal">Editar ou escolher outro</a>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-8 text-start">
                                <a href="#" class="text-primary text-decoration-none h6" data-bs-toggle="modal" data-bs-target="#enderecoModal">Adicionar Ponto de Entrega</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row mb-5">

                <div class="vertical-items-carousel my-items">
                    <?php foreach ($this->content['order']->getItems() as $item) { ?>
                        <div class="item my-2 img-preview">
                            <div class="row">
                                <div class="col-md-2 text-center m-0">
                                    <?php if (count($item->getProduct()->getImgs()) > 0) { ?>
                                        <img width="75%" src="<?= $item->getProduct()->getImgs()[0]; ?>" alt="<?= $item->getProduct()->getTitle(); ?>">
                                    <?php } else { ?>
                                        <img width="75%" src="<?= DIRIMG . 'examples/produtos.svg'; ?>" alt="<?= $item->getProduct()->getTitle(); ?>">
                                    <?php } ?>
                                </div>
                                <div class="col-md-8 text-secondary m-auto text-start">
                                    <div class="prod-title">
                                        <?= $item->getProduct()->getTitle(); ?>
                                    </div>
                                    <div class="prod-other-info">
                                        quantidade: <span><?= $item->getQnty(); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-2 m-auto">
                                    <p class="price m-0"><?= 'R$ ' . floor($item->getPrice()) ?><span class="decimals align-top"><?= ($item->getPrice() * 100) % 100; ?></span></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!-- carousel -->
            </div><!-- row -->

            <h6 class="mb-3 font-weight-bold">Detalhes do pagamento</h6>
            <div class="container-fluid mb-2 info">
                <div class="form-check payment-option align-items-center p-0">
                    <div class="row align-items-center p-3">
                        <div class="col-md-1 p-2">
                            <i class="bi bi-credit-card-2-back-fill h3"></i>
                        </div>
                        <div class="col-md-7 desc">
                            <?php if ($this->content['order']->getPayment()) { ?>
                                <div class="row card-name">
                                    <span> Cartão - <span class="number"><?= substr($this->content['order']->getPayment()->getNumber(), 0, -4) . '****' ?></span> </span>
                                </div>
                                <div class="row address-user text-secondary">
                                    <span class="">Você pagará <span class="">1</span>x de <span class="m-auto"><?= 'R$ ' . floor($this->content['order']->calcTotal()) ?><span class="decimals top-0 mt-3 align-top"><?= ($this->content['order']->calcTotal() * 100) % 100; ?></span></span></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="<?= DIRPAGE . 'payment/ResetPayment' ?>" class="text-primary text-decoration-none">alterar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid info">
                <div class="form-check payment-option align-items-center p-0">
                    <div class="row align-items-center p-3">
                        <div class="col-md-1 p-2">
                            <i class="bi bi-file-earmark-text-fill h3"></i>
                        </div>
                        <div class="col-md-7 desc">
                            <div class="row card-name">
                                <span> Dados para sua nota fiscal </span>
                            </div>
                            <?php if ($this->content['order']->getOwner()) { ?>
                                <div class="row address-user text-secondary">
                                    <span><span><?= $this->content['order']->getOwner()->getName() ?>
                                        </span> - <span><?= $this->content['order']->getOwner()->getCpf() ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="#" class="text-primary text-decoration-none">alterar</a>
                        </div>
                    </div><!-- row -->
                </div><!-- form -->
            </div><!-- container -->

        </div><!-- col -->

        <div class="col-md-1"></div>

        <div class="col-md-4 text-center">
            <div id="sidebar" class="mb-4 rounded-3" style="display: block;">
                <div class="container">
                    <div class="sidebar-header py-3 px-2 border-1 border-bottom">
                        <span class="title text-dark h5">Resumo da compra</span>
                    </div>
                    <div class="row item parcial-price">
                        <div class="col-md-6 col-sm-6 text-start">
                            Produtos(<span class="quantidade h6"><?= $this->content['order']->getProdQnty(); ?></span>)
                        </div>
                        <div class="col-md-6 col-sm-6 text-end">
                            <p class="price m-auto"><?= 'R$ ' . floor($this->content['order']->calcTotal()) ?><span class="decimals align-top"><?= ($this->content['order']->calcTotal() * 100) % 100; ?></span></p>
                        </div>
                    </div>

                    <div class="row item frete-price">
                        <div class="col-md-6 col-sm-6 text-start">
                            Envio
                        </div>
                        <div class="col-md-6 col-sm-6 text-end text-success">
                            Grátis
                        </div>
                    </div>

                    <hr class="h-25 text-secondary" style="margin: 0; margin-top: 200px;">
                    <div class="row item total-price text-primary">
                        <div class="col-md-6 col-sm-6 text-start font-weight-bold">
                            Você Pagará
                        </div>
                        <div class="col-md-6 col-sm-6 text-end h6">
                            <p class="price m-auto h5"><?= 'R$ ' . floor($this->content['order']->calcTotal()) ?><span class="decimals align-top"><?= ($this->content['order']->calcTotal() * 100) % 100; ?></span></p>
                        </div>
                    </div>
                    <div class="row item w-75 m-auto">
                        <button type="button" class="btn btn-dark text-warning align-items-center m-auto">
                            <i class="bi bi-wallet2 h5 me-2"></i>
                            <a class="h6 text-decoration-none text-warning" href="<?= DIRPAGE . 'payment/FinishOrder' ?>">Confirmar compra</a>
                        </button>
                    </div>
                </div><!-- container -->
            </div><!-- sidebar -->
        </div><!-- col -->

    </div><!-- row -->
</div><!-- container -->

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

            <div class="modal-body" id="address-modal-body">
                <?php if ($this->content['order']->getOwner()) { ?>
                    <div class="user-enderecos">
                        <h6>Em um dos seus endereços</h6>
                        <div class="container-fluid">

                            <form id="addr-form" action="<?= DIRPAGE . 'payment/ChangeDestination'; ?>" method="POST">
                                <?php foreach (Address::allByCustomer($this->content['order']->getOwner()) as $addr) { ?>
                                    <div class="form-check endereco-option align-items-center">
                                        <input class="form-check-input mt-3" type="radio" name="order-addr" id="<?= 'addr-' . $addr->getId(); ?>" value="<?= $addr->getId(); ?>">
                                        <label class="form-check-label row" for="<?= 'addr-' . $addr->getId(); ?>">
                                            <div class="row">
                                                <span class=" h6 col-md-6"><?= $addr->getName(); ?></span>
                                                <span class="col-md-6 text-end"><?= $addr->getStreet(); ?></span>
                                            </div>
                                            <div class="row">
                                                <span class="col-md-6"><?= $addr->getCep() . '  |  ' . $addr->getCity()->getName(); ?></span>
                                                <span class="col-md-6 text-end text-primary"><?= $addr->getDestinatary(); ?></span>
                                            </div>
                                        </label>
                                    </div><!-- form-check -->
                                <?php } ?>
                                <div class="form-check endereco-option align-items-center">
                                    <input class="form-check-input mt-3" type="radio" name="atual-addr" id="atual-addr">
                                    <label class="form-check-label row" for="atual-addr">
                                        <div class="row">
                                            <span class=" h6 col-md-6"><?= $this->content['order']->getDestination()->getName(); ?></span>
                                            <span class="col-md-6 text-end"><?= $this->content['order']->getDestination()->getStreet(); ?></span>
                                        </div>
                                        <div class="row">
                                            <span class="col-md-6"><?= $this->content['order']->getDestination()->getCep() . '  |  ' . $this->content['order']->getDestination()->getCity()->getName(); ?></span>
                                            <span class="col-md-6 text-end text-primary"><?= $this->content['order']->getDestination()->getDestinatary(); ?></span>
                                        </div>
                                    </label>
                                </div><!-- form-check -->
                            </form>


                            <a class="btn text-primary text-decoration-none" href="<?= DIRPAGE . 'account/page/myAddress' ?>">Editar endereços</a>

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
                        <a class="btn text-primary text-decoration-none" id="new-payment-address-link">Adicionar endereço completo</a>
                    </div><!-- container -->
                </div><!-- cep-entry -->
            </div><!-- modal body -->

            <div class="modal-footer" id="address-modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="addr-form" class="btn btn-primary">Salvar modificações</button>
            </div><!-- modal footer -->

            <form action="<?= DIRPAGE . 'payment/ChangeDestination'; ?>" class="p-2 bg-white rounded-bottom" method="post" id="new-payment-address-form">
                <div class="row px-3 py-2">
                    <div class="form-floating col-6 mb-3 f-1">
                        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="name" name="name" placeholder="Ex.: Casa" value="">
                        <label class="mx-2" for="name">Apelido do endereço</label>
                    </div>
                    <div class="form-floating col-10 mb-3 f-6">
                        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="street" name="street" placeholder="Ex.: travessa sempre verde" value="">
                        <label class="mx-2" for="street">Rua</label>
                    </div>
                    <div class="form-floating col-2 mb-3 f-2 ">
                        <input type="text" class="form-control p-0 px-2 m-auto field-size " required name="number" id="number" placeholder="Ex.: 15" value="">
                        <label class="mx-2" for="number">Nº</label>
                    </div>

                    <div class=" mb-3 f-3 col-3">
                        <select class="form-select py-2" id="state" name="state" required>
                            <option value="" selected disabled hidden>UF</option>
                            <?php $state = new State();
                            foreach ($state->all() as $state) { ?>
                                <option value="<?= $state->getId() ?>"><?= $state->getUf() ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-floating col-9 mb-3 f-4">
                        <input type="text" class="form-control p-0 px-2 m-auto field-size " required name="cep" id="cep" placeholder="Ex.: 000000-000" value="">
                        <label class="mx-2" for="cep">CEP</label>
                    </div>

                    <div class=" mb-3 f-3 col-9">
                        <select class="form-select py-2" id="city" name="city" required>
                            <option value="" selected disabled hidden>Selecione um estado primeiro</option>
                        </select>
                    </div>

                    <div class="form-floating col-5 mb-3 f-5">
                        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="district" name="district" placeholder="Ex.: Periperi" value="">
                        <label class="mx-2" for="district">Bairro</label>
                    </div>
                    <div class="form-floating col-7 mb-3 f-5">
                        <input type="text" class="form-control p-0 px-2 m-auto field-size " id="destinatary" name="destinatary" placeholder="Ex.: João Almeida" value="">
                        <label class="mx-2" for="destinatary">Destinatário</label>
                    </div>

                    <div class="col-12 mb-3 f-6">
                        <textarea class="form-control py-2 px-2 m-auto" id="description" name="description" rows="4" placeholder="Descreva as caracteristicas desse endereço"></textarea>
                    </div>

                    <div class="text-right col-12 mt-4 mb-3">
                        <button type="reset" id="back-to-modal" class="btn btn-outline-danger mx-4">Cancelar</button>
                        <button type="submit" name="new-address" class="btn btn-primary float-none">Confirmar</button>
                    </div>
                </div>
            </form>

        </div><!-- modal content -->
    </div><!-- modal dialog -->
</div><!-- modal -->