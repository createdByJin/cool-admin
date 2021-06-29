<?php
    $id_prod = $_POST["id-produto"];
    $desc_prod = $_POST["desc-prod"];
    $quant_prod = $_POST["quant-prod"];
    $categ_prod = $_POST["categoria"];
    
    include("../database/conection.php");

    // var_dump($id_prod);
    // var_dump($desc_prod);
    // var_dump($quant_prod);
    // var_dump($categ_prod);
    // die();

    $sql = "UPDATE produtos
            SET id_produto = $id_prod,
                descricao = '$desc_prod',
                quantidade = $quant_prod,
                categoria_id = $categ_prod
            WHERE id_produto = $id_prod";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // var_dump($result);
    // die();

    header("location: ../home.php");
?>