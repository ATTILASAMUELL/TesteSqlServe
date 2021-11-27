<?php

/*Montar um unico select para trazer os seguintes campos: o código da loja do produto, a descrição da loja,
 código do produto, a descrição do produto, o preço do produto, a quantidade 
em estoque do produto. Considere  que o código da loja para esta consulta seja igual a 1.*/

try{
    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'get'){
        
        $loj_prod = filter_input(INPUT_GET, 'loj_prod');

        

        


        if($loj_prod){
            $query = "SELECT produtoss.cod_prod, produtoss.loj_prod, produtoss.desc_prod,  produtoss.dt_inclu_prod , produtoss.preco_prod, estoque.qtd_prod as qtd_prod, lojas.desc_loj as desc_loj FROM produtoss INNER JOIN lojas ON produtoss.loj_prod = lojas.loj_prod INNER JOIN estoque ON produtoss.loj_prod = estoque.loj_prod WHERE produtoss.loj_prod = :loj_prod  ";
            $sql= $pdo->prepare($query);
            $sql->bindParam(":loj_prod", $loj_prod);
            $sql->execute();

            if($sql->rowCount()>0){
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $item){
                    $array['result'][]=[
                        'cod_prod' => $item['cod_prod'],
                        'loj_prod' => $item['loj_prod'],
                        'desc_prod' => $item['desc_prod'],
                        'dt_inclu_prod' => $item['dt_inclu_prod'],
                        'preco_prod' => $item['preco_prod'],
                        'desc_loj' => $item['desc_loj'],
                        'qtd_prod' => $item['qtd_prod']
                    
        
        
                    ];
                }

            }else{
                $array['error']= 'ID não existente';
                var_dump(http_response_code(404));

            }
        }else{
            $array['error'] = 'ID não enviado';
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