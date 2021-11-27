<?php

/*Com base na tabela de “produtos” monte um select trazendo todos os registros da loja 1 e 2:*/

try{
    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'get'){
        
        $loj_prod = filter_input(INPUT_GET, 'loj_prod');

        

        if($loj_prod){
            $sql = $pdo->prepare("SELECT * FROM produtoss WHERE loj_prod = :loj_prod");
            $sql->bindValue(':loj_prod', $loj_prod);
            $sql->execute();

            if($sql->rowCount()>0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);

                $array['result'] = [
                    'cod_prod' =>$data['cod_prod'],
                    'loj_prod' => $data['loj_prod'],
                    'desc_prod'=> $data['desc_prod'],
                    'dt_inclu_prod'=> $data['dt_inclu_prod'],
                    'preco_prod'=> $data['preco_prod'],

                ];

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

}catch (Exception $e){

    $array['error'] = 'Error:'.$e;
    var_dump(http_response_code(404));

    require('return.php');

}