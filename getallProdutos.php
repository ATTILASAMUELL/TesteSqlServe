<?php

/*Com base na tabela de “produtos” monte um select trazendo todos os registros da loja 1 e 2:*/

try{
    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if( $method ==='get'){
        $sql = $pdo->query("SELECT * FROM produtoss "); 
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $item){
                $array['result'][]=[
                    'cod_prod' => $item['cod_prod'],
                    'loj_prod' => $item['loj_prod'],
                    'desc_prod' => $item['desc_prod'],
                    'dt_inclu_prod' => $item['dt_inclu_prod'],
                    'preco_prod' => $item['preco_prod'],
                


                ];
            }

        }



    } else{
        $array['error'] = 'Metodo não permitido (apenas get)';
        var_dump(http_response_code(404));
    }



    require('return.php');
}catch (Exception $e){

    $array['error'] = 'Error:'.$e;
    var_dump(http_response_code(404));

    require('return.php');

}