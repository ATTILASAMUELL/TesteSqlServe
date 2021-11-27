<?php

/*
Com base na tabela de “produtos” monte um select para trazer a soma de todos os 
preços dos produtos totalizado por loja:

*/

try{

    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if( $method ==='get'){

        $loj_prod = filter_input(INPUT_GET, 'loj_prod');

        if($loj_prod ){
            $query = "SELECT sum(preco_prod )  as total FROM produtos WHERE loj_prod = :loj_prod";
            $sql= $pdo->prepare($query);
            $sql->bindParam(":loj_prod", $loj_prod);
            $sql->execute();
            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);

            

                $array['result'] = 'Soma de todos os preços dos produtos totalizado da loja  é: '.$data['total'];
                
                

            }else{
                $array['error']= 'ID não encontrado';
                var_dump(http_response_code(404));

            }
        }else{
            $array['error'] = 'ID não enviado';
            var_dump(http_response_code(404));
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