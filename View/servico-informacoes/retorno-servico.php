<?php

    include '../../Controller/ConfigController.php';
    include '../../Model/RetornoServicoModel.php';

    $resposta;

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        $configController = new ConfigController();
        $dados = $configController->modeloResposta();
        $resposta = new RetornoServicoModel(true, false, 200, "", $dados);
        echo json_encode($resposta->ObjetoResposta);

    }else{
        $resposta = new RetornoServicoModel(false, true, 405, "Método não permitido", null);
        echo json_encode($resposta);
    }

    header("HTTP/1.0 ".$resposta->CodigoHttp);    

?>