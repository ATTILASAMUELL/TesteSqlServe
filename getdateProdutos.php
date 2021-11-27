<?php

/*
MAIOR:

Com base na tabela de “produtos” monte um select para trazer a maior e a
menor data  de inclusão do produto “dt_inclu_prod”:


 
*/

try{

    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if( $method ==='get'){
        $sql = $pdo->query("SELECT MAX(dt_inclu_prod) AS data_maior FROM produtoss "); 
        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'] = [
                'data_maior' =>$data['data_maior'],
                

            ];

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