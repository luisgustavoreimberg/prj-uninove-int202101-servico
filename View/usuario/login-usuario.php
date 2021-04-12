<?php

    include '../../Controller/UsuarioController.php';
    include '../../Model/RetornoServicoModel.php';

    $resposta;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dados = file_get_contents('php://input');
        $obj = json_decode($dados);

        if(!empty($dados) && !empty($obj->senha) && !empty($obj->usuario)){
            $usuarioController = new UsuarioController();
            $dados = $usuarioController->loginUsuario($obj);

            if(!isset($dados["UsuarioID"])){
                $resposta = new RetornoServicoModel(false, false, 200, "Usuário ou senha inválidos",null);
            }else{
                $resposta = new RetornoServicoModel(true, false, 200, "", $dados);
            }
        }else{
            $resposta = new RetornoServicoModel(false, false, 200, "Sem dados para login!",null);
        }

    }else{
        $resposta = new RetornoServicoModel(false, true, 405, "Método não permitido", null);
    }

    echo json_encode($resposta);
    header("HTTP/1.0 ".$resposta->CodigoHttp);

?>