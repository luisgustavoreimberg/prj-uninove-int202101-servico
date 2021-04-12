<?php

    include '../../Controller/UsuarioController.php';
    include '../../Model/RetornoServicoModel.php';

    $resposta;

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $dados = file_get_contents('php://input');
        $obj = json_decode($dados);

        if(!empty($dados) && !empty($obj->id)){
            $usuarioController = new UsuarioController();
            $dados = $usuarioController->buscarUsuarioPorId($obj);
            $resposta = new RetornoServicoModel(true, false, 200, "", $dados);
        }else{
            $resposta = new RetornoServicoModel(false, false, 200, "Sem dados para busca!",null);
        }

    }else{
        $resposta = new RetornoServicoModel(false, true, 405, "Método não permitido", null);
    }

    echo json_encode($resposta);
    header("HTTP/1.0 ".$resposta->CodigoHttp);

?>