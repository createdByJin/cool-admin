<?php

    function todas_categorias()
    {
        include("database/conection.php");

        $sql = "SELECT * FROM categorias";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        // var_dump($sql);
        // die();

        if (mysqli_num_rows($result) > 0)
        {
            $array = array();

            while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                array_push($array, $linha);
            }

            foreach ($array as $coluna) {
                echo $coluna["descricao"];
            } 

            // var_dump($array[14]["descricao"]);
            // die();
            return $array;
        }
    }

    function count_categorias()
    {
        include("database/conection.php");

        $sql = "SELECT categorias.descricao,
                    COUNT(produtos.id_produto) AS qtd_produtos
                    FROM produtos
                    INNER JOIN categorias
                    ON categorias.id_categoria = produtos.categoria_id
                    GROUP BY categorias.id_categoria";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        if (mysqli_num_rows($result) > 0)
        {
            $array = array();

            while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                array_push($array, $linha);
            }
 
            return $array;
        }
    }
?>