<?php
    // busca todos os registros do banco de dados
    function all_data() {

        include("database/conection.php");

        $sql = "SELECT p.id_produto, p.descricao, p.quantidade, c.descricao as categoria
                FROM produtos p
                INNER JOIN categorias c
                ON c.id_categoria = p.categoria_id
                ORDER BY p.id_produto
                DESC";

        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);

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
                                .'<td>'.$coluna["categoria"].'</td>'
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
                        ."<p>Seus registros são exibidos aqui</p>"
                    ."</div>";
        }

        return $list;
    }

    function fill_form()
    {
        $id_prod = $_POST["id_produto"];

        include("database/conection.php");

        $sql = "SELECT p.id_produto, p.descricao, p.quantidade, c.id_categoria as id_categoria, c.descricao as categoria
                FROM produtos p
                INNER JOIN categorias c
                ON c.id_categoria = p.categoria_id
                WHERE p.id_produto = ".$id_prod;

        $result = mysqli_query($conn, $sql);
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
                
                $list .= '<div class="row form-group">'
                            .'<div class="col col-md-3">'
                                .'<label class=" form-control-label"></label>'
                            .'</div>'
                            .'<div class="col-12 col-md-9">'
                                .'<p class="form-control-static"></p>'
                                .'<input type="hidden" name="id-produto" value="'.$coluna["id_produto"].'">'
                            .'</div>'
                        .'</div>'
                        .'<div class="row form-group">'
                            .'<div class="col col-md-3">'
                                .'<label for="desc-input" class="form-control-label">Descrição</label>'
                            .'</div>'
                            .'<div class="col-12 col-md-9">'
                                .'<input type="text" id="desc-input" name="desc-prod" value="'.$coluna["descricao"].'" class="form-control">'
                                .'<div class="row form-group">'
                                    .'<div class="col-12 col-md-9">'
                                        .'<p class="form-control-static"></p>'
                                    .'</div>'
                                .'</div>'
                            .'</div>'
                        .'</div>'
                        .'<div class="row form-group">'
                            .'<div class="col col-md-3">'
                                .'<label for="quant-input" class="form-control-label">Quantidade</label>'
                            .'</div>'
                            .'<div class="col-12 col-md-9">'
                                .'<input type="number" id="quant-input" name="quant-prod" value="'.$coluna["quantidade"].'" class="form-control col-md-4">'
                                .'<div class="row form-group">'
                                    .'<div class="col-12 col-md-9">'
                                        .'<p class="form-control-static"></p>'
                                    .'</div>'
                                .'</div>'
                            .'</div>'
                        .'</div>'
                        .'<div class="row form-group">'
                            .'<div class="col col-md-3">'
                                .'<label for="select-categ" class="form-control-label">Categoria</label>'
                                .'<div class="row form-group">'
                                    .'<div class="col-12 col-md-9">'
                                        .'<p class="form-control-static"></p>'
                                    .'</div>'
                                .'</div>'
                            .'</div>'
                            .'<div class="col-12 col-md-4">'
                                .'<select name="categoria" id="select-categ" class="form-control">'
                                    .'<option selected value="'.$coluna["id_categoria"].'">'.$coluna["categoria"].'</option>'
                                    .all_category($coluna["id_categoria"])
                                .'</select>'
                            .'</div>'
                        .'</div>';

            }

        }
        
        return $list;
    }
    
?>