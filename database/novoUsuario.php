<?php
    $id_usuario = $_POST["id_usuario"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $tipoUsuario = $_POST["tipoUsuario"];
    
    include("conection.php");

    // var_dump($id_usuario);
    // var_dump($nome);
    // var_dump($login);
    // var_dump($senha);
    // var_dump($tipoUsuario);
    // die();

    $sql = "INSERT INTO usuarios (id_usuario, nome, login, senha, tipoUsuario_id)"
            ."VALUES ($id_usuario, '$nome', '$login', '$senha', $tipoUsuario)";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("location: ../login.php");
?>