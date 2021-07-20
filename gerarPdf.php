<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $produtos = $_POST["option-produtos"];
    $categorias = $_POST["option-categorias"];

    // var_dump($produtos);
    // var_dump($categorias);
    // die();

    if ($produtos == NULL && $categorias == NULL)
    {      
        $_SESSION["tipo_mensagem"] = "warning";
        $_SESSION["mensagem"] = "Favor selecione os campos para continuar!";

        header("location: relatorios.php");
    } else if ($produtos != NULL && $categorias != NULL)
    {
        // falta implementar o PDF para todos os campos selecionados
    } else if ($produtos == NULL)
    {
        header("location: gerarPdfCategoria.php");
    } else
    {
        header("location: gerarPdfProduto.php");
    }
?>