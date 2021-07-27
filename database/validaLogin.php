<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    $_SESSION['logado'] = 0;

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    //$_POST - Valor enviado pelo FORM através da propriedade NAME do elemento HTML 
    //$_GET - Valor enviado pelo FORM através da URL
    //$_SESSION - Variável criada pelo usuário no PHP

    include("conection.php");

    $sql = "SELECT * FROM usuarios "
            ." WHERE login = '$usuario' "
            ." AND senha = '$senha';";

    $resultLogin = mysqli_query($conn, $sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($resultLogin) > 0) {
        
        $arrayLogin = array();
        
        while ($linha = mysqli_fetch_array($resultLogin, MYSQLI_ASSOC)) {
            array_push($arrayLogin, $linha);
        }
        
        foreach ($arrayLogin as $coluna) {
            
            $_SESSION['idTipoUsuario'] = $coluna['tipoUsuario_id'];
            $_SESSION["nome"] = $coluna["nome"];
            $_SESSION['logado'] = 1;

            //Acessar a tela inicial
            header('location: ../home.php');
            
        }        
    }else{
        //Retorna para tela de login
        $_SESSION["tipo_mensagem"] = "danger";
        $_SESSION["mensagem"] = "E-mail ou senha inválidos";
        header('location: ../home.php');
    } 

    

?>