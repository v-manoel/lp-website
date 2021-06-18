<div class="container-fluid row">
    <div class="col-3 card bg-transparent border pl-0">
        <div class="card-header text-center bg-transparent text-dark h5"> Minha Conta </div>

        <ul class=" list-group list-group-flush bg-transparent">
            <a class="text-decoration-none bg-warning" href="<?= DIRPAGE . 'account/page/myData'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-pencil-square my-dark me-2"></i>
                    Informações Pessoais
                </li>
            </a>
            <a class="text-decoration-none" href="<?= DIRPAGE . 'account/page/myRegister'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-gear-fill my-dark me-2"></i>
                    Segurança
                </li>
            </a>
            <a class="text-decoration-none" href="<?= DIRPAGE . 'account/page/myOrders'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-box-seam my-dark me-2"></i>
                    Minhas Compras
                </li>
            </a>
            <a class="text-decoration-none " href="<?= DIRPAGE . 'account/page/myCards'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-credit-card-2-back-fill my-dark me-2"></i>
                    Meus Cartões
                </li>
            </a>
            <a class="text-decoration-none" href="<?= DIRPAGE . 'account/page/myAddress'; ?>">
                <li class="list-group-item pl-3 bg-transparent">
                    <i class="bi bi-house-fill my-dark me-2"></i>
                    Meus Endereços
                </li>
            </a>
            <a class="text-decoration-none" href="<?= DIRPAGE . 'home/logout'; ?>">
                <li class="list-group-item bg-transparent pl-3 mt-4">
                    <i class="bi bi-door-open-fill my-dark me-2"></i>
                    Sair
                </li>
            </a>
        </ul>

    </div>

    <?php echo $this->addSubPage(); ?>

</div>