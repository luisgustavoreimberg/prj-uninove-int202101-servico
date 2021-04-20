<?php

    include '../../Controller/RankingController.php';
    include '../../Model/RetornoServicoModel.php';

    $resposta;

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        $rankingController = new RankingController();
        $dados = $rankingController->consultaRanking();
        $resposta = new RetornoServicoModel(true, false, 200, "", $dados);

    }else{
        $resposta = new RetornoServicoModel(false, true, 405, "Método não permitido", null);
    }

    echo json_encode($resposta);
    header("HTTP/1.0 ".$resposta->CodigoHttp);

?>