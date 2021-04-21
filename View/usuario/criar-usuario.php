<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");

    include '../../Controller/UsuarioController.php';
    include '../../Model/RetornoServicoModel.php';

    $resposta;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dados = file_get_contents('php://input');
        $obj = json_decode($dados);

        if(!empty($dados) &&
            isset($obj->nome) &&
            isset($obj->apelido) &&
            isset($obj->email) &&
            isset($obj->senha)){

            $usuarioController = new UsuarioController();
            
            if(count($usuarioController->buscarUsuario($obj))>0){
                $resposta = new RetornoServicoModel(false, false, 200, "Usuário já existente!", null);
            }else{
                $usuarioController->criaNovoUsuario($obj);
                if(count($usuarioController->buscarUsuario($obj))>0){
                    $resposta = new RetornoServicoModel(true, false, 200, "", null);
                }else{
                    $resposta = new RetornoServicoModel(false, true, 500, "Não foi possível criar o usuário!", null);
                }
            }
        }else{
            $resposta = new RetornoServicoModel(false, false, 200, "Sem dados para criação de usuário!",null);
        }

    }else{
        $resposta = new RetornoServicoModel(false, true, 405, "Método não permitido", null);
    }

    echo json_encode($resposta);
    header("HTTP/1.0 ".$resposta->CodigoHttp);

?>