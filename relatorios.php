<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
    
    if($_SESSION['logado'] != 1){
        header("location: login.php");
    }
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

    <!-- Title Page-->
    <title>Relatórios - Drocsid</title>

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
                                        <a href="#">Relatórios</a>
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
                                            <li>
                                                <a class="js-arrow" href="#">
                                                    <i class="fas fa-database"></i>Produtos
                                                    <span class="arrow">
                                                        <i class="fas fa-angle-down"></i>
                                                    </span>
                                                </a>
                                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                    <li>
                                                        <a href="novo-cadastro.php">Novo Cadastro</a>
                                                    </li>
                                                    <li>
                                                        <a href="consulta.php">Consulta</a>
                                                    </li>
                                                    <li>
                                                        <a href="categorias.php">Categorias</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="active has-sub">
                                                <a href="#">
                                                    <i class="fas fa-clipboard"></i>Relatórios
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </aside>
                            <!-- END MENU SIDEBAR-->
                        </div>
                        <div class="col-xl-9">
                            <!-- PAGE CONTENT-->
                            <div class="card">
                                <form action="gerarPdf.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-header">
                                        <strong>RELATÓRIO</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static">Selecione as opções abaixo para gerar um documento PDF.</p>
                                            </div>
                                        </div>
                                        <section class="alert-wrap p-t-70"></section>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Opções:</label>
                                            </div>
                                            <div class="col col-md-9">
                                                <div class="form-check">
                                                    <div class="checkbox">
                                                        <label for="produtos" class="form-check-label ">
                                                            <input type="checkbox" id="produtos" name="option-produtos" value="produtos" class="form-check-input">produtos
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="categorias" class="form-check-label ">
                                                            <input type="checkbox" id="categorias" name="option-categorias" value="categorias" class="form-check-input">categorias
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <section class="alert-wrap p-t-70"></section>
                                        <?php if(isset($_SESSION["mensagem"])) : ?>
                                            <div class="alert alert-<?= $_SESSION["tipo_mensagem"]; ?>" role="alert">
                                                <?= $_SESSION["mensagem"]; ?>
                                            </div>
                                        <?php
                                            unset($_SESSION["mensagem"]);
                                            unset($_SESSION["tipo_mensagem"]);
                                            endif;
                                        ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">Confirmar</button>
                                        <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2021 Drocsid. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
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