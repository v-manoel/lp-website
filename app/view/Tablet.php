<!DOCTYPE html>
<html lang="pt-br">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Vitor M & Reinilson B">
    <meta name="description" content="<?= $this->getDesc(); ?>">
    <meta name="keywords" content="<?= $this->getKeywords(); ?>">
    <title><?= $this->getTitle(); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400&display=swap" rel="stylesheet">

    <!-- Our styles -->
    <link rel="stylesheet" href="<?= DIRCSS.'Layout.css'; ?>">
    <link rel="stylesheet" href="<?= DIRCSS.'Tablet.css'; ?>">
    <?= $this->addHead(); ?>

    <link rel="icon" type="image/png" href="<?= DIRIMG.'logos/coinlogo2.svg'; ?>"/>
</head>

<body>
    <div class="tablet container-fluid p-0">
        <div class="content container-fluid m-0">
            <!-- Header begin -->
            <div class="row header align-items-center p-1 bg-warning">
                <div class="col-md-4">
                    <a href="#">
                        <img id="header_logo_left" alt="logo" src="../../commom/img/logos/coinlogo2.svg" width="40px" />

                        <img id="header_logo_right" alt="" src="../../commom/img/logos/brand.png"
                            style="height:30px;width:80px; margin-left: 10px; margin-right: 30px; margin-top: 5px;" />
                    </a>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-center text-dark">
                    Manager Screen
                </div>
            </div>
            <!-- Header end -->

            <div class="Header">
                <?php echo $this->addHeader(); ?>
            </div>

            <div class="Main">
                <?php echo $this->addMain(); ?>
            </div>

            <?php echo $this->addFooter(); ?>

        </div><!-- Content -->
    </div><!-- Tablet -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</body>

</html>