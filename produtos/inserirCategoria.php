<?php
    $id_categoria = $_POST["id-categ"];
    $desc_categoria = $_POST["desc-categ"];
    
    include("../database/conection.php");
    session_start();

    // var_dump($id_categoria);
    // var_dump($desc_categoria);
    // die();

    if ($desc_categoria == 0 || $desc_categoria == "") {
            
        $_SESSION["tipo_mensagem"] = "danger";
        $_SESSION["titulo_mensagem"] = "FALHA";
        $_SESSION["mensagem"] = "Por favor preencha os campos!";
    } else {
        $sql = "INSERT INTO categorias (id_categoria, descricao)
                VALUES ($id_categoria, '$desc_categoria')";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        // var_dump($result);
        // die();

        $_SESSION["tipo_mensagem"] = "success";
        $_SESSION["titulo_mensagem"] = "SUCESSO";
        $_SESSION["mensagem"] = "Categoria inserida com sucesso!";
    }

    header("location: ../categorias.php");
?>