<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">
                
    <!-- Our styles -->
    <link rel="stylesheet" href="../../commom/css/index.css">
    <link rel="stylesheet" href="../../commom/css/tablet.css">
    <link rel="stylesheet" href="css/preparacao.css">

    <link rel="icon" type="image/png" href="../../commom/img/logos/coinlogo2.svg"/>
    <title>La Pechincha Brasil</title>
</head>

<body>


    <div class="tablet container-fluid p-0">
        <div class="content container-fluid m-0">
            <!-- Header begin -->
            <div class="row header align-items-center p-1 bg-warning">
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none">
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
                    
                    <div class="row item text-center p-2">
                        <div class="col-md-1 m-auto"><i class="bi bi-box-seam h5"></i></div>
                        <div class="col-md-2 m-auto">
                            #<span class="prod-id">198254</span>
                        </div>
                        <div class="col-md-2 m-auto">
                            <span class="prod-date">00/10/00</span>
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
            

            <!-- footer begin -->
            <div class="row footer align-items-center p-1">

                <div class=" text-center" id="return-btn">
                    <a href="main.html" class="text-secondary"><i class="bi bi-arrow-return-left h3"></i></a>
                </div>
                <div class="text-center" id="home-btn">
                    <a href="main.html" class="text-secondary"><i class="bi bi-house-fill h3"></i></a>
                </div>
                <div class="text-center" id="apps-btn">
                    <a href="main.html" class="text-secondary"><i class="bi bi-back h3"></i></a>
                </div>

            </div>
            <!-- footer end -->

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous">
    </script>

</body>

</html>