<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
    
    if($_SESSION['logado'] != 1){
        header("location: login.php");
    }
    
    include("produtos/listaCategorias.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="shortcut icon" href="images/icon/fav-icon-drocsid.png" type="image/x-icon">

    <!-- Title Page-->
    <title>Novo Cadastro - Drocsid</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
       
        <!-- WELCOME-->
        <section class="welcome2 p-t-40 p-b-55">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb3">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">Você está em:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="#">Produtos</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item active">
                                        <a href="#">Novo Cadastro</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome2-inner m-t-60">
                            <div class="welcome2-greeting">
                                <h1 class="title-6">
                                    <span>
                                        <?php echo $_SESSION["nome"]; ?>
                                    </span>
                                </h1>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="database/validaLogoff.php">Sair
                                            <span>
                                                <i class="fas fa-sign-out-alt"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class="alert-wrap p-t-70"></section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3">
                            <!-- MENU SIDEBAR-->
                            <aside class="menu-sidebar3 js-spe-sidebar">
                                <nav class="navbar-sidebar2 navbar-sidebar3">
                                    <ul class="list-unstyled navbar__list">
                                        <li>
                                            <a href="home.php">
                                                <i class="fas fa-tachometer-alt"></i>Home
                                            </a>
                                        </li>
                                        <li class="active has-sub">
                                            <a class="js-arrow" href="#">
                                                <i class="fas fa-database"></i>Produtos
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                <li class="active">
                                                    <a href="#">Novo Cadastro</a>
                                                </li>
                                                <li>
                                                    <a href="consulta.php">Consulta</a>
                                                </li>
                                                <li>
                                                    <a href="categorias.php">Categorias</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="relatorios.php">
                                                <i class="fas fa-clipboard"></i>Relatórios
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </aside>
                            <!-- END MENU SIDEBAR-->
                        </div>
                        <div class="col-xl-8">
                            <!-- PAGE CONTENT-->
                            <?php if(isset($_SESSION["mensagem"])) : ?>
                            <div class="sufee-alert alert with-close alert-<?= $_SESSION["tipo_mensagem"]; ?> alert-dismissible fade show">
                                <span class="badge badge-pill badge-<?= $_SESSION["tipo_mensagem"]; ?>"><?= $_SESSION["titulo_mensagem"]; ?></span>
                                    <?= $_SESSION["mensagem"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                unset($_SESSION["mensagem"]);
                                unset($_SESSION["tipo_mensagem"]);
                                unset($_SESSION["titulo_mensagem"]);
                            endif;
                            ?>
                            <div class="page-content">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>NOVO CADASTRO</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="produtos/inserirProduto.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label"></label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"></p>
                                                    <input type="hidden" name="id-produto" value="default">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="desc-input" class="form-control-label">Descrição</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="desc-input" name="desc-prod" placeholder="Digite aqui..." class="form-control">
                                                    <div class="row form-group">
                                                        <div class="col-12 col-md-9">
                                                            <p class="form-control-static"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="quant-input" class="form-control-label">Quantidade</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="quant-input" name="quant-prod" placeholder="Number" value="1" class="form-control col-md-4">
                                                    <div class="row form-group">
                                                        <div class="col-12 col-md-9">
                                                            <p class="form-control-static"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select-categ" class="form-control-label">Categoria</label>
                                                    <div class="row form-group">
                                                        <div class="col-12 col-md-9">
                                                            <p class="form-control-static"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="categoria" id="select-categ" class="form-control">
                                                        <option value="0">Selecione</option>
                                                        <?php echo all_category(0); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                                                <button type="reset" class="btn btn-danger btn-sm">Limpar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Copyright © 2021 Drocsid. All rights reserved.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>
<!-- end document-->