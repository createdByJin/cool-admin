<?php
    function getPdfProdutos()
    {
        include("database/conection.php");
    
        $sql = "SELECT p.id_produto, p.descricao, p.quantidade, c.descricao as categoria
                FROM produtos p
                INNER JOIN categorias c
                ON c.id_categoria = p.categoria_id
                ORDER BY p.id_produto
                ASC";

        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);

        if (mysqli_num_rows($result) > 0) {
                
            $array = array();

            while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($array, $linha);
            }     
            return $array;
        }
    }
?>