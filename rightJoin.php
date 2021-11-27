<?php

/*C)Observe a estrutura da tabela de estoque e da tabela de produtos, monte um select para trazer todos 
os produtos que existem na tabela de estoque que não existem na tabela de produtos.

*/

try{
    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'get'){

    



        $query = "SELECT estoque.qtd_prod FROM estoque LEFT JOIN produtoss ON produtoss.cod_prod = estoque.cod_prod  ";
        $sql= $pdo->prepare($query);
        $sql->execute();

        if($sql->rowCount()>0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            

            foreach($data as $item){
                $array['result'][]=[
                'qtd_prod' => $item['qtd_prod'],
                
                ];
            }

            }else{
                $array['error']= 'ID não existente';
                var_dump(http_response_code(404));

            }
        

    

    }else{
        $array['error'] = 'Método não permitido, (apenas GET)';
        var_dump(http_response_code(404));
    }


    require('return.php');
} catch (Exception $e){

    $array['error'] = 'Error:'.$e;
    var_dump(http_response_code(404));

    require('return.php');

}