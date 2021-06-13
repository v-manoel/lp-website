<div class="container prod-info" id="prod-x">
    <div class="row">
        <div class="left-content col-lg-8 col-12">
            <div class="prod-images row h-auto border-bottom pb-3">
                <div class="col-lg-2 col-12 text-center p-2">
                    <?php if (count($product->getImgs()) > 0) { ?>
                        <div class="vertical-items-carousel img-preview-carousel">
                            <?php for ($index = 0; $index < count($product->getImgs()); $index++) { ?>
                                <div class="item my-1 img-preview">
                                    <div type="button"><img src="<?= DIRIMG . $prod->getImgs()[$index]; ?>" onclick="SwitchImgSrc(this,'main-img')" alt="SomeProd" width="75%"></div>
                                </div>
                            <?php } ?>
                        </div><!-- carousel -->
                    <?php } ?>
                </div><!-- col -->
                <div class="col-lg-5 col-12 text-center m-auto p-3">
                    <?php if (count($product->getImgs()) > 0) { ?>
                        <img class="h-100 w-100 img-fluid" id="main_img" src="<?= DIRIMG . $product->getImgs()[0]; ?>" alt="SomeProd">
                    <?php } else { ?>
                        <img class="card-img" id="main-img" src="<?= DIRIMG . 'examples/produtos.svg'; ?>" alt="...">
                    <?php } ?>
                </div><!-- col -->

                <div class="col-lg-5 col-12">
                    <div class="my-2">
                        <p class="n-sales m-0">1985 vendidos</p>
                        <p class="prod-title m-0"><?= $product->getTitle(); ?></p>
                        <p class="m-0 rating">
                            <span class="bi bi-star-fill text-warning"></span>
                            <span class="bi bi-star-fill text-warning"></span>
                            <span class="bi bi-star-half text-warning"></span>
                            <span class="bi bi-star"></span>
                            <span class="bi bi-star"></span>
                        </p>
                    </div>
                    <div class="my-2">
                        <p class="text-secondary text-decoration-line-through m-0 off-price"> <?= 'R$' . floor($product->getPrice()) ?><span class="decimals align-top"><?= ($product->getPrice() * 100) % 100; ?></span></p>
                        <p class="card-title price m-0"><?= 'R$ ' . floor($product->offerPrice()) ?><span class="decimals align-top"><?= ($product->offerPrice() * 100) % 100; ?></span>
                            <span class="text-success off-rate"><?= $product->offerAsPerc(); ?> % OFF</span>
                        </p>

                        <p class="parcela text-success m-0"><?= '12x de R$ ' . floor($product->offerPrice()) ?><span class="decimals align-top"><?= ($product->offerPrice() * 100) % 100; ?></span>
                            sem juros
                        </p>
                        <?php for ($i = 0; $i < count($product->getCategories()); $i++) { ?>
                            <p class="badge bg-warning text-dark tag p-1 m-0"><?= $product->getCategories()[$i]->getName(); ?></p>
                        <?php } ?>
                    </div>
                    <div class="my-2">
                        <p class="m-0">Informações sobre o produto</p>
                        <ul class="pl-3">
                            <li>Some information</li>
                            <li>Some information</li>
                            <li>Some information</li>
                            <li>Some information</li>
                            <li>Some information</li>
                            <li>Some information</li>
                            <li>Some information</li>
                        </ul>
                    </div><!-- list -->

                </div><!-- col -->
            </div><!-- row -->

            <section class="container products-carousel-section my-5 border-bottom pb-3" id="based-on-history">
                <?php
                $prod = new Product();
                $prod->setSource($product->getSource());
                $products = $prod->all();
                ?>
                <div class="h4 p-2 section-title"><?= 'Mais de '.$product->getSource() ?></div>

                <div class="items-carousel items-carousel-4">
                    <?php foreach ($products as $prod) { ?>
                        <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
                            <form action="<?php echo DIRPAGE . 'product'; ?>" method="post">
                                <input type='hidden' name='product_id' id='product_id' value='<?= $prod->getId() ?>'><br>
                                <button type="submit" class="border-0 bg-transparent p-0">
                                    <div class="card align-items-center prod-card w-auto">
                                        <div class="card-header bg-white">
                                            <?php if (count($prod->getImgs()) > 0) { ?>
                                                <img class="card-img" src="<?= DIRIMG . $prod->getImgs()[0]; ?>" alt="...">
                                            <?php } else { ?>
                                                <img class="card-img" src="<?= DIRIMG . 'examples/produtos.svg'; ?>" alt="...">
                                            <?php } ?>
                                        </div><!-- card header -->

                                        <div class="card-body">
                                            <p class="badge bg-warning text-dark tag p-1 m-0"><?= $prod->getCategories()[0]->getName(); ?></p>
                                            <!-- <p class="badge bg-warning text-dark tag p-1 m-0"><?= $prod->getSource(); ?></p> -->
                                            <p class="text-secondary text-decoration-line-through m-0 off-price"><?= "R$ " . floor($prod->getPrice()); ?><span class="decimals align-top"><?= ($prod->getPrice() * 100) % 100; ?></span></p>
                                            <p class="card-title price m-0"><?= "R$ " . floor($prod->offerPrice()); ?><span class="decimals align-top"><?= ($prod->offerPrice() * 100) % 100; ?></span>
                                                <span class="text-success off-rate"><?= $prod->offerAsPerc() . "% OFF"; ?></span>
                                            </p>
                                            <p class="parcela text-success m-0"><?= "12x de R$ " . floor($prod->offerPrice()); ?><span class="decimals align-top"><?= ($prod->offerPrice() * 100) % 100; ?></span>
                                                sem juros
                                            </p>
                                            <p class="product-desc m-auto pt-1 text-center"><?= $prod->getTitle(); ?></p>
                                        </div><!-- card body -->

                                    </div><!-- card -->
                                </button>
                            </form>
                        </div><!-- item -->
                    <?php } ?>
                </div><!-- carousel -->
            </section>

            <div class="prod-caract container">
                <h5>Descrição</h5>
                <p>
                    <?= $product->getDescription(); ?>
                </p>
            </div>

        </div><!-- col -->
        <div class="right-content col-lg-4 col-12">
            <div class="card payment-card">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-1 col-1 text-center">
                            <i class="bi bi-truck h5"></i>
                        </div><!-- col -->
                        <div class="col-lg-10 col-10">
                            <p class="text-success">Produto com frete grátis</p>
                        </div><!-- col -->
                    </div><!-- row -->
                    <p>Fornecido por <span class="text-warning" id="fornecedor"><?= $product->getSource(); ?></span></p>
                    <form class="" action="#" method="POST">

                        <label for="item-qtd">Quantidade:</label>
                        <select class="selectpicker border-0 bg-transparent my-4" id="item-qtd" data-width="fit">
                            <option class="order-option" value="1" selected>1 unidade</option>
                            <option class="order-option" value="2">2 unidades</option>
                            <option class="order-option" value="3">3 unidades</option>
                            <option class="order-option" value="4">4 unidades</option>
                            <option class="order-option" value="5">5 unidades</option>
                            <option class="order-option" value="6">6 unidades</option>
                            <option class="order-option" value="6">mais de 6 unidades</option>
                        </select>

                        <button class="btn btn-dark text-warning my-2 w-100 mt-5" type="submit">Comprar agora</button>
                        <button class="btn btn-warning text-dark my-2 w-100" type="submit">Adicionar ao Carrinho</button>
                    </form>
                    <div class="row my-3">
                        <i class="bi bi-shield-check text-warning h5 col-lg-2 col-2 pr-0 m-auto"></i>
                        <p class="col-lg-10 col-10 text-left p-0 m-auto">Compra Garantida, receba o produto que está esperando ou devolvemos o dinheiro.</p>
                    </div><!-- row -->
                </div><!-- card body -->
            </div><!-- card -->

            <div class="card payment-card my-4">
                <div class="card-body p-0">
                    <p class="mb-4">Meios de pagamento</p>
                    <div class="btn btn-success w-100"><i class="bi bi-credit-card-2-front me-2"></i> Pague em até <b>12</b>x sem juros!</div>

                    <div class="mt-4">
                        <p class="my-1">Cartões de crédito</p>
                        <i class="bi bi-credit-card-2-front h2 me-3"></i>
                        <i class="bi bi-credit-card-2-front h2 me-3"></i>
                        <i class="bi bi-credit-card-2-front h2 me-3"></i>
                        <i class="bi bi-credit-card-2-front h2 me-3"></i>
                        <i class="bi bi-credit-card-2-front h2 me-3"></i>
                        <i class="bi bi-credit-card-2-front h2 me-3"></i>
                    </div>

                    <div class="mt-4">
                        <p class="my-1">Transferencia PIX</p>
                        <i class="bi bi-x-diamond-fill h2 me-3"></i>
                    </div>
                </div><!-- card body -->
            </div><!-- card -->

        </div><!-- col -->
    </div><!-- row -->

</div><!-- container -->

<section class="container products-carousel-section my-5">
    <?php    
        $bycategory = $product->allByCategory($product->getCategories()[0]);
    ?> 
    <div class="p-2 h2 section-title"> <?= 'Mais de '. $product->getCategories()[0]->getName() ?></div>

    <div class="items-carousel items-carousel-5 m-auto">
    <?php foreach ($bycategory as $prod){?>
        <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
            <form action="<?php echo DIRPAGE.'product'; ?>" method="post">
                <input type='hidden' name='product_id' id='product_id' value='<?= $prod->getId() ?>'><br> 
                <button type="submit" class="border-0 bg-transparent p-0">
                    <div class="card align-items-center prod-card w-auto">
                        <div class="card-header bg-white">
                            <?php if(count($prod->getImgs()) > 0){ ?>
                                <img class="card-img" src="<?= DIRIMG . $prod->getImgs()[0]; ?>" alt="...">
                            <?php }else{?>
                                <img class="card-img" src="<?= DIRIMG . 'examples/produtos.svg'; ?>" alt="...">
                            <?php } ?>
                        </div><!-- card header -->
                        
                        <div class="card-body">
                            <p class="badge bg-warning text-dark tag p-1 m-0"><?= $prod->getCategories()[0]->getName(); ?></p><br>
                            <p class="badge bg-warning text-dark tag p-1 m-0"><?= $prod->getSource(); ?></p>
                            <p class="text-secondary text-decoration-line-through m-0 off-price"><?= "R$ ".floor($prod->getPrice()); ?><span class="decimals align-top"><?= ($prod->getPrice() *100)%100; ?></span></p>
                            <p class="card-title price m-0"><?= "R$ ".floor($prod->offerPrice()); ?><span class="decimals align-top"><?= ($prod->offerPrice() *100)%100; ?></span>
                                <span class="text-success off-rate"><?= $prod->offerAsPerc()."% OFF"; ?></span>
                            </p>
                            <p class="parcela text-success m-0"><?= "12x de R$ ".floor($prod->offerPrice()); ?><span class="decimals align-top"><?= ($prod->offerPrice() *100)%100; ?></span>
                                sem juros
                            </p>
                            <p class="product-desc m-auto pt-1 text-center"><?= $prod->getTitle(); ?></p>
                        </div><!-- card body -->
                        
                    </div><!-- card -->
                </button>
            </form>
        </div><!-- item -->
    <?php } ?>
    </div><!-- carousel -->
</section>

<section class="container products-carousel-section my-5">
    <?php
        $prod_base = new Product();
        $prod_base->setOffer(0.6);
        $bycategory = $prod_base->all();
    ?> 
    <div class="p-2 h2 section-title"> <?= 'Mais de '. $prod_base->offerAsPerc() .'% de desconto' ?></div>

    <div class="items-carousel items-carousel-5 m-auto">
    <?php foreach ($bycategory as $prod){?>
        <div class="item" onmouseout="CollapseItem(this, 'product-desc')" onmouseover="UncollapseItem(this, 'product-desc')">
            <form action="<?php echo DIRPAGE.'product'; ?>" method="post">
                <input type='hidden' name='product_id' id='product_id' value='<?= $prod->getId() ?>'><br> 
                <button type="submit" class="border-0 bg-transparent p-0">
                    <div class="card align-items-center prod-card w-auto">
                        <div class="card-header bg-white">
                            <?php if(count($prod->getImgs()) > 0){ ?>
                                <img class="card-img" src="<?= DIRIMG . $prod->getImgs()[0]; ?>" alt="...">
                            <?php }else{?>
                                <img class="card-img" src="<?= DIRIMG . 'examples/produtos.svg'; ?>" alt="...">
                            <?php } ?>
                        </div><!-- card header -->
                        
                        <div class="card-body">
                            <p class="badge bg-warning text-dark tag p-1 m-0"><?= $prod->getCategories()[0]->getName(); ?></p><br>
                            <p class="badge bg-warning text-dark tag p-1 m-0"><?= $prod->getSource(); ?></p>
                            <p class="text-secondary text-decoration-line-through m-0 off-price"><?= "R$ ".floor($prod->getPrice()); ?><span class="decimals align-top"><?= ($prod->getPrice() *100)%100; ?></span></p>
                            <p class="card-title price m-0"><?= "R$ ".floor($prod->offerPrice()); ?><span class="decimals align-top"><?= ($prod->offerPrice() *100)%100; ?></span>
                                <span class="text-success off-rate"><?= $prod->offerAsPerc()."% OFF"; ?></span>
                            </p>
                            <p class="parcela text-success m-0"><?= "12x de R$ ".floor($prod->offerPrice()); ?><span class="decimals align-top"><?= ($prod->offerPrice() *100)%100; ?></span>
                                sem juros
                            </p>
                            <p class="product-desc m-auto pt-1 text-center"><?= $prod->getTitle(); ?></p>
                        </div><!-- card body -->
                        
                    </div><!-- card -->
                </button>
            </form>
        </div><!-- item -->
    <?php } ?>
    </div><!-- carousel -->
</section>

