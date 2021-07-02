<div class="container-fluid row">
    <div class="col-3 card bg-transparent border pl-0 account-menu">
        <div class="card-header text-center bg-transparent text-dark h5"> Minha Conta </div>

        <ul class=" list-group list-group-flush bg-transparent">
            <a class="text-decoration-none"  href="<?= DIRPAGE . 'account/page/myData'; ?>">
                <li class="list-group-item d-flex pl-3 bg-transparent">
                    <i class="bi bi-pencil-square my-dark me-2"></i>
                    Informações Pessoais
                    <?php if($this->requested_page == "Dados"){ ?>
                    <span class="text-right ml-5"><i class="bi bi-pin-angle-fill text-primary"></i></span>
                    <?php } ?>
                </li>
            </a>
            <a class="text-decoration-none" href="<?= DIRPAGE . 'account/page/myRegister'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-gear-fill my-dark me-2"></i>
                    Segurança
                    <?php if($this->requested_page == "Registro"){ ?>
                    <span class="text-right ml-5"><i class="bi bi-pin-angle-fill text-primary"></i></span>
                    <?php } ?>
                </li>
            </a>
            <a class="text-decoration-none" href="<?= DIRPAGE . 'account/page/myOrders'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-box-seam my-dark me-2"></i>
                    Minhas Compras
                    <?php if($this->requested_page == "Compras"){ ?>
                    <span class="text-right ml-5"><i class="bi bi-pin-angle-fill text-primary"></i></span>
                    <?php } ?>
                </li>
            </a>
            <a class="text-decoration-none " href="<?= DIRPAGE . 'account/page/myCards'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-credit-card-2-back-fill my-dark me-2"></i>
                    Meus Cartões
                    <?php if($this->requested_page == "Cartoes"){ ?>
                    <span class="text-right ml-5"><i class="bi bi-pin-angle-fill text-primary"></i></span>
                    <?php } ?>
                </li>
            </a>
            <a class="text-decoration-none" href="<?= DIRPAGE . 'account/page/myAddress'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-house-fill my-dark me-2"></i>
                    Meus Endereços
                    <?php if($this->requested_page == "Enderecos"){ ?>
                    <span class="text-right ml-5"><i class="bi bi-pin-angle-fill text-primary"></i></span>
                    <?php } ?>
                </li>
            </a>
            <a class="text-decoration-none mt-4" href="<?= DIRPAGE . 'login/logout'; ?>">
                <li class="list-group-item bg-transparent pl-3 ">
                    <i class="bi bi-door-open-fill my-dark me-2"></i>
                    Sair
                </li>
            </a>
        </ul>

    </div>

    <?php echo $this->addSubPage(); ?>

</div>