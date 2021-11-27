<?php

/* Inserindo na tabela LOJAS*/
try{

    require('config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'post'){

        $loj_prod = filter_input(INPUT_POST, 'loj_prod');
        $desc_loj = filter_input(INPUT_POST, 'desc_loj');
    
    

        if($loj_prod && $desc_loj ){

            $sql = $pdo->prepare("INSERT INTO lojas (loj_prod,desc_loj) VALUES (:loj_prod, :desc_loj)");
            $sql->bindValue(':loj_prod',$loj_prod);
            $sql->bindValue(':desc_loj',$desc_loj);
            
            
            $sql->execute();

            $array['result']=[
                'resultado' => 'Inserido com sucesso'.$loj_prod,
                'descrição da loja' => $desc_loj

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