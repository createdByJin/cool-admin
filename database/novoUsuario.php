<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    $_SESSION['logado'] = 0;

    $id_usuario = $_POST["id_usuario"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $tipoUsuario = $_POST["tipoUsuario"];
    
    if($nome == 0 || $nome == "")
    {
        //Retorna para tela de cadastro
        $_SESSION["tipo_mensagem"] = "danger";
        $_SESSION["mensagem"] = "Favor preencher todos os campos.";

        header('location: ../cadastro.php');
    }
    else if($login == 0 || $login == "")
    {
        //Retorna para tela de cadastro
        $_SESSION["tipo_mensagem"] = "danger";
        $_SESSION["mensagem"] = "Favor preencher todos os campos.";

        header('location: ../cadastro.php');
    }
    else if($senha == 0 || $senha == "")
    {
        //Retorna para tela de cadastro
        $_SESSION["tipo_mensagem"] = "danger";
        $_SESSION["mensagem"] = "Favor preencher todos os campos.";

        header('location: ../cadastro.php');
    }
    else
    {
        include("conection.php");

        $sql = "INSERT INTO usuarios (id_usuario, nome, login, senha, tipoUsuario_id)"
                ."VALUES ($id_usuario, '$nome', '$login', '$senha', $tipoUsuario)";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        header("location: ../index.php");
    }
?>