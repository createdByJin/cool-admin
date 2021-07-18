<?php
    // busca todos os registros do banco de dados
    function all_category($id_categoria) {
        
        include("database/conection.php");

        $sql = "SELECT * FROM categorias WHERE id_categoria <> ".$id_categoria;

        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);

        // var_dump($result);
        // die();

        $list = '';

        if (mysqli_num_rows($result) > 0) {
                
            $array = array();

            while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($array, $linha);
            }
            
            foreach ($array as $coluna) {
                
                $list .=  '<option value="'.$coluna["id_categoria"].'">'.$coluna["descricao"].'</option>';
            }                

        }

        return $list;
    }


    // função da pagina de cadastro de categoria
    function list_category()
    {
        include("database/conection.php");

        $sql = "SELECT * FROM categorias";

        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);

        // var_dump($result);
        // die();

        $list = "";

        if (mysqli_num_rows($result) > 0) {
                
            $array = array();

            while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($array, $linha);
            }
            
            foreach ($array as $coluna) {
                
                $list .= '<tr>'
                            .'<td>'.$coluna["descricao"].'</td>'
                        .'</tr>';
            }                

        }
        else
        {
            $list .= '<tr>'
                        .'<td>0 resultado(s)</td>'
                    .'</tr>';
        }

        return $list;
    }
?>