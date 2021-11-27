<?php

/* O Índice da tabela  de “produtos é o cód_prod e a loj_prod, com base no referido índice faça a alteração do
 preço do produto para R$95,40, lembrando que o cod_prod =170 e a loj_prod=2: */

try{

    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'put'){
        
        parse_str(file_get_contents('php://input'), $input);

        $cod_prod= $input['cod_prod'] ?? null;
        $loj_prod= $input['loj_prod'] ?? null;
        $preco_prod =$input['preco_prod'] ?? null;

        $cod_prod= filter_var($cod_prod);
        $loj_prod= filter_var($loj_prod);
        $preco_prod= filter_var($preco_prod);

        if($cod_prod &&  $loj_prod && $preco_prod){
            $sql = $pdo->prepare("SELECT * FROM produtoss WHERE cod_prod = :cod_prod AND loj_prod = :loj_prod");
            $sql->bindValue(':cod_prod', $cod_prod);
            $sql->bindValue(':loj_prod', $loj_prod);
            $sql->execute();

            if($sql->rowCount()>0){
                $sql = $pdo->prepare("UPDATE produtoss SET preco_prod = :preco_prod  WHERE cod_prod = :cod_prod AND loj_prod = :loj_prod");
                $sql->bindValue(':preco_prod', $preco_prod);
                $sql->bindValue(':cod_prod', $cod_prod);
                $sql->bindValue(':loj_prod', $loj_prod);
                $sql->execute();

                $array['result'] =  'Código: '.$cod_prod.' novo preço '.$preco_prod.' alterado com sucesso!!!';
                

            }else{
                $array['error']= 'Nenhum dado encontrado com os ID informado';
                var_dump(http_response_code(404));
            }
        }else{
            $array['error'] = 'dados não enviado';
            var_dump(http_response_code(404));
        }


    

    }else{
        $array['error'] = 'Método não permitido, (apenas PUT)';
        var_dump(http_response_code(404));
    }


    require('return.php');
}catch (Exception $e){

    $array['error'] = 'Error:'.$e;
    var_dump(http_response_code(404));

    require('return.php');

}