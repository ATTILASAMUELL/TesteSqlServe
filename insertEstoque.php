<?php

/* Inserindo na tabela Estoque*/

try{

    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'post'){

        $cod_prod = filter_input(INPUT_POST, 'cod_prod');
        $loj_prod = filter_input(INPUT_POST, 'loj_prod');
        $qtd_prod = filter_input(INPUT_POST, 'qtd_prod');
    

        if($cod_prod && $loj_prod && $qtd_prod){

            $sql = $pdo->prepare("INSERT INTO estoque (cod_prod,loj_prod,qtd_prod) VALUES (:cod_prod, :loj_prod, :qtd_prod)");
            $sql->bindValue(':cod_prod',$cod_prod);
            $sql->bindValue(':loj_prod',$loj_prod);
            $sql->bindValue(':qtd_prod',$qtd_prod);
            
            $sql->execute();

            $array['result']=[
                'resultado' => 'Inserido com sucesso'.$cod_prod,
                'codigo produto' => $cod_prod

            ];
            var_dump(http_response_code());


        } else{
            $array['error'] = 'Campos não enviados';
            var_dump(http_response_code(404));


        }
    }else{
        $array['error'] = 'Método não permitido, (apenas POST)';
        var_dump(http_response_code(404));
    }


    require('return.php');
}catch (Exception $e){

    $array['error'] = 'Error:'.$e;
    var_dump(http_response_code(404));

    require('return.php');

}