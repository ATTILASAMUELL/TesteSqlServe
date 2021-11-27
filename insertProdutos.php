<?php

/* Com base na tabela de “produtos” acima favor inserir um registro na referida tabela passando os seguintes valores :
 cod_prod =170, loj_prod=2, desc_prod=LEITE CONDESADO MOCOCA, dt_inclu_prod=30/12/2010  e preço_prod = R$45,40. */
try{
    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'post'){

        $cod_prod = filter_input(INPUT_POST, 'cod_prod');
        $loj_prod = filter_input(INPUT_POST, 'loj_prod');
        $desc_prod = filter_input(INPUT_POST, 'desc_prod');
        $dt_inclu_prod = filter_input(INPUT_POST, 'dt_inclu_prod');
        $preco_prod = filter_input(INPUT_POST, 'preco_prod');

        if($cod_prod && $loj_prod && $desc_prod  && $dt_inclu_prod && $preco_prod){

            $sql = $pdo->prepare("INSERT INTO produtoss (cod_prod,loj_prod,desc_prod,dt_inclu_prod,preco_prod) VALUES (:cod_prod, :loj_prod, :desc_prod, :dt_inclu_prod, :preco_prod)");
            $sql->bindValue(':cod_prod',$cod_prod);
            $sql->bindValue(':loj_prod',$loj_prod);
            $sql->bindValue(':desc_prod',$desc_prod);
            $sql->bindValue(':dt_inclu_prod',$dt_inclu_prod);
            $sql->bindValue(':preco_prod',$preco_prod);
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