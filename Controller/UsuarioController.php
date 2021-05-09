<?php

    include '../../Model/UsuarioModel.php';

    class UsuarioController{
        function criaNovoUsuario($obj){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_criaNovoUsuario($obj);
        }

        function atualizaUsuario($obj){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_atualizaUsuario($obj);
        }

        function atualizaSenha($obj){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_atualizaSenha($obj);
        }

        function atualizaPontuacao($obj){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_atualizaPontuacao($obj);
        }

        function buscarUsuario($obj){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_buscarUsuario($obj);
        }

        function buscarUsuarioPorId($obj){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_buscarUsuarioPorId($obj);
        }

        function listarUsuarios(){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_listaUsuarios();
        }

        function loginUsuario($obj){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_loginUsuario($obj);
        }

        function recuperarSenha($id, $senhaTemp){
            $usuarioModel = new UsuarioModel();
            return $usuarioModel->sql_recuperarSenha($id, $senhaTemp);
        }
    }

?>