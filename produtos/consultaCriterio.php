<?php
    session_start();

    $consulta = $_POST["consulta-produto"];
    // var_dump($consulta);
    // die();

    criterio($consulta);

    function criterio($consulta)
    {
        include("../database/conection.php");
        
        if ($consulta == 0 || $consulta == "") {
            
            $_SESSION["tipo_mensagem"] = "warning";
            $_SESSION["titulo_mensagem"] = "Ops!";
            $_SESSION["mensagem"] = "Favor preencha o campo para pesquisar.";

            header("location: ../consulta.php");

        } else {
            $sql = "SELECT id_produto, produtos.descricao, quantidade, categorias.descricao FROM produtos
                    LEFT JOIN categorias
                    ON categorias.id_categoria = produtos.categoria_id
                    WHERE categorias.descricao LIKE '%$consulta%'
                    OR produtos.descricao LIKE '%$consulta%'";

            $result = mysqli_query($conn,$sql);
            mysqli_close($conn);

            // var_dump($sql);
            // die();
        }

        // var_dump($result);
        // die();

        $list = "";

        if (mysqli_num_rows($result) > 0) {
                
            $array = array();

            $list .=    '<thead>'
                            .'<tr>'
                                .'<th>ID</th>'
                                .'<th>DESCRIÇÃO</th>'
                                .'<th>QUANTIDADE</th>'
                                .'<th>CATEGORIA</th>'
                                .'<th>AÇÃO</th>'
                            .'</tr>'
                        .'</thead>'
                        .'<tbody>';

            while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($array, $linha);
            }
            
            foreach ($array as $coluna) {
                
                $list .=    '<tr>'
                                .'<td>'.$coluna["id_produto"].'</td>'
                                .'<td>'.$coluna["descricao"].'</td>'
                                .'<td>'.$coluna["quantidade"].'</td>'
                                .'<td>'.$coluna["descricao"].'</td>'
                                .'<td>'
                                    .'<div class="table-data-feature">'
                                        .'<form action="editar-cadastro.php" method="post">'
                                            .'<input type="hidden" name="id_produto" value="'.$coluna["id_produto"].'">'
                                            .'<button type="submit" class="item" data-placement="top" title="Edit">'
                                                .'<i class="zmdi zmdi-edit"></i>'
                                            .'</button>'
                                        .'</form>'
                                        .'<button class="item" data-toggle="modal" data-target="#smallmodal'.$coluna["id_produto"].'" data-placement="top" title="Delete">'
                                            .'<i class="zmdi zmdi-delete"></i>'
                                        .'</button>'
                                    .'</div>'
                                    .'<!-- modal small -->'
                                        .'<div class="modal fade" id="smallmodal'.$coluna["id_produto"].'" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">'
                                            .'<div class="modal-dialog modal-sm" role="document">'
                                                .'<div class="modal-content">'
                                                    .'<form action="produtos/excluirProduto.php" method="post">'
                                                        .'<div class="modal-header">'
                                                            .'<h5 class="modal-title" id="smallmodalLabel">EXCLUIR</h5>'
                                                            .'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                                                                .'<span aria-hidden="true">&times;</span>'
                                                            .'</button>'
                                                        .'</div>'
                                                        .'<div class="modal-body">'
                                                            .'<p>'
                                                                .'Deseja excluir "'.$coluna["descricao"].'" ?'
                                                            .'</p>'
                                                            .'<input type="hidden" name="id_produto" value="'.$coluna["id_produto"].'">'
                                                        .'</div>'
                                                        .'<div class="modal-footer">'
                                                            .'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'
                                                            .'<button type="submit" class="btn btn-primary">Confirmar</button>'
                                                        .'</div>'
                                                    .'</form>'
                                                .'</div>'
                                            .'</div>'
                                        .'</div>'
                                    .'<!-- end modal small -->'
                                .'</td>'
                            .'</tr>'
                        .'</tbody>';
            }

        } else {
            $list .= "<div>"
                        ."<p>Nenhum resultado encontrado para ".$consulta."</p>"
                    ."</div>";
        }

        return $list;
        // header("location: ../consulta.php");
    }
?>