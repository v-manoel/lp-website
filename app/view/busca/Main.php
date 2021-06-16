<div class="container" style="min-width: 90%; margin-top: 30px;">

  <div class="row">
    <div class="col-md-3">
      <!--         <nav class="page-path" aria-label="breadcrumb">
            <ol class="breadcrumb text-center pl-0 mb-0 bg-transparent">
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1"><a href="#">Home</a><i class="bi bi-chevron-right"  aria-hidden="true"></i></li>
                <li class="me-1 active" aria-current="page">Library</li>
            </ol>
        </nav> -->
    </div>
    <div class="col-md-6">

    </div>
    <div class="col-md-3 text-center search-orderby mt-3">
      <form class="w-100" action="<?php echo DIRPAGE . 'busca/filter'; ?>" method="GET" role="search">
        <span class="title">Odernar por</span>
        <select id="select_orderby" class="selectpicker" name="orderby" onchange="this.form.submit()" data-width="fit">
          <option id="by_expensive" class="order-option text-right" value="by_expensive">Maior Preço</option>
          <option id="by_cheaper" class="order-option text-right" value="by_cheaper">Menor Preço</option>
          <option id="by_offer" class="order-option text-right" value="by_offer">Maior Desconto</option>
        </select>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="left-content col-md-3">
      <div id="sidebar" class="active">
        <div class="d-flex">
          <div class="sidebar-header">
            <h4><?= $search_string ?></h4>
            <p><span id="resuls-qtd"><?= count($products) ?></span> Resultados</p>
          </div>
          <div id="dismiss" class="active">
            <i class="bi bi-list h4"></i>
          </div>
        </div><!-- d-flex -->
        <div class="w-75 tags">
          <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 124 <span type="button" class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
          <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 9999 <span type="button" class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
          <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 6 <span type="button" class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
          <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 71 <span type="button" class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
          <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 123456 <span type="button" class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
          <span class=" text-center badge p-2 bg-warning text-light me-2 my-1">Tag 1 <span type="button" class=" btn-close btn-close-white h-100" aria-label="Close"></span></span>
        </div><!-- tags -->

        <div class="filters w-75">
          <form action="<?php echo DIRPAGE . 'busca/filter'; ?>" method="GET">
            <ul class="list-group mt-4 caracteristica">
              <h6 class="font-weight-bold">Categorias</h6>
              <?php foreach ($categories as $name => $qnt) { ?>
                <label for="<?= 'cat' . $name ?>">
                  <li class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                    <input type="radio" class="radio_filter" name="filter_category"  onclick="changeLabelColor('<?= $name ?>')" value=<?= $name ?> id=<?= 'cat' . $name ?>>
                    <?= $name ?>
                    <span class="badge bg-dark rounded-pill " id="<?= 'label' . $name ?>"><?= $qnt ?></span>
                  </li>
                </label>
              <?php } ?>
            </ul>
            <ul class="list-group mt-4 caracteristica">
              <h6 class="font-weight-bold">Marcas</h6>
              <?php foreach ($sources as $name => $qnt) { ?>
                <label for="<?= 'src' . $name ?>">
                  <li class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                    <input type="radio" name="filter_source" value=<?= $name ?> id=<?= 'src' . $name ?>>
                    <?= $name ?>
                    <span class="badge bg-dark rounded-pill "><?= $qnt ?></span>
                  </li>
                </label>
              <?php } ?>
            </ul>

            <ul class="list-group mt-4 price_slide">
              <h6 class="font-weight-bold">Preço</h6>
              <li class="list-group-item text-secondary bg-transparent border-0 p-0 pb-2 d-flex justify-content-between align-items-center">
                <input name="filter_price" oninput="num.value = this.value" type="range" min="<?= $min_price; ?>" max="<?= $max_price; ?>" step="0.01" value="<?= $max_price; ?>" />
                <span class="badge bg-dark rounded-pill p-1">
                  R$ <output id="num"><?= $max_price; ?></output>
                </span>
              </li>
            </ul>
            <button class="btn btn-dark text-warning float-end mt-4" type="submit">Filtrar</button>
          </form>
        </div><!-- filters -->
      </div><!-- sidebar -->

      <!-- Page Content  -->
      <div id="content">
        <button type="button" id="sidebarCollapse" class="btn btn-dark text-warning">
          <i class="fas fa-align-left"></i>
          <span>Filtrar Busca</span>
        </button>
      </div>
    </div>
    <div class="right-content col-md-9 row h-100">
      <?php foreach ($products as $prod) { ?>
        <div class="col-lg-4 col-sm-6">
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
                    <p class="badge bg-warning text-dark tag p-1 m-0"><?= $prod->getSource(); ?></p>
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
        </div><!-- col -->
      <?php } ?>


    </div>
  </div>
</div>