<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $opcao_pdf = $_POST["select"];

    if ($opcao_pdf == "")
    {      
        $_SESSION["tipo_mensagem"] = "warning";
        $_SESSION["mensagem"] = "Favor selecione os campos para continuar!";

        header("location: relatorios.php");
    } else if ($opcao_pdf == "categorias")
    {
        header("location: gerarPdfCategoria.php");
    } else if ($opcao_pdf == "produtos")
    {
        header("location: gerarPdfProduto.php");
    }
?>