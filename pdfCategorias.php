<?php

    function getPdfCategoria()
    {
        include("database/conection.php");
    
        $sql = "SELECT * FROM categorias";

        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);

        if (mysqli_num_rows($result) > 0) {
                
            $array = array();

            while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($array, $linha);
            }
            // var_dump($array);
            // die();            
            return $array;
        }
    }
?>