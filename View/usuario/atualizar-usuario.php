<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");

    include '../../Controller/UsuarioController.php';
    include '../../Model/RetornoServicoModel.php';

    $resposta;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dados = file_get_contents('php://input');
        $obj = json_decode($dados);

        if(!empty($dados) && !empty($obj->id)){
            $usuarioController = new UsuarioController();
            $aux = $usuarioController->buscarUsuario($obj);

            if(!$aux || (count($aux)==1 && $obj->id == $aux[0]->UsuarioID)){
                if(count($usuarioController->buscarUsuarioPorId($obj))>0){
                    $usuarioController->atualizaUsuario($obj);
                    $resposta = new RetornoServicoModel(true, false, 201, "Dados atualizados com sucesso!", null);
                }else{
                    $resposta = new RetornoServicoModel(false, false, 200, "Usuário não encontrado!", null);
                }
            }else{
                $resposta = new RetornoServicoModel(false, false, 200, "Apelido e/ou e-mail já existente!", null);
            }

        }else{
            $resposta = new RetornoServicoModel(false, false, 200, "Sem dados para atualização!",null);
        }

    }else{
        $resposta = new RetornoServicoModel(false, true, 405, "Método não permitido", null);
    }

    echo json_encode($resposta);
    header("HTTP/1.0 ".$resposta->CodigoHttp);

?>