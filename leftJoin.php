<?php

/*B)Observe a estrutura da tabela de estoque e da tabela de produtos,
 monte um select para trazer todos os produtos que existem na tabela de produtos que não
existem na tabela de estoque.*/

try{
    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'get'){

    



        $query = "SELECT produtoss.desc_prod , produtoss.dt_inclu_prod , produtoss.preco_prod FROM produtoss LEFT JOIN estoque ON estoque.cod_prod = produtoss.cod_prod  ";
        $sql= $pdo->prepare($query);
        $sql->execute();

        if($sql->rowCount()>0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            

            foreach($data as $item){
                $array['result'][]=[
                'desc_prod' => $item['desc_prod'],
                'dt_inclu_prod' => $item['dt_inclu_prod'],
                'preco_prod' => $item['preco_prod'],
                
                
        
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

}catch (Exception $e){

    $array['error'] = 'Error:'.$e;
    var_dump(http_response_code(404));

    require('return.php');

}