<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");

    include '../../Controller/UsuarioController.php';
    include '../../Model/RetornoServicoModel.php';

    $resposta;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dados = file_get_contents('php://input');
        $obj = json_decode($dados);

        if(!empty($dados) && !empty($obj->email) && !empty($obj->senha)){
            $usuarioController = new UsuarioController();
            $usuario = $usuarioController->buscarUsuario($obj);
            if(count($usuario)==1){
                $usuarioController->recuperarSenha($usuario[0]->UsuarioID, $obj->senha);
                $resposta = new RetornoServicoModel(true, false, 201, "Senha de recuperação criada", null);
            }else{
                $resposta = new RetornoServicoModel(false, false, 200, "Email não cadastrado!", null);
            }
        }else{
            $resposta = new RetornoServicoModel(false, false, 200, "Sem dados para recuperação!",null);
        }

    }else{
        $resposta = new RetornoServicoModel(false, true, 405, "Método não permitido", null);
    }

    echo json_encode($resposta);
    header("HTTP/1.0 ".$resposta->CodigoHttp);

?>