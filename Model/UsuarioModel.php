<?php

    include 'DAL/ConexaoBanco.php';

    class UsuarioModel extends ConexaoBanco{

        public function sql_criaNovoUsuario($obj){
            $sql = "INSERT INTO usuario(UsuarioNome, UsuarioSobreNome, UsuarioApelido, UsuarioEmail, UsuarioSenha, DataCriacao) VALUES(:nome, :sobrenome, :apelido, :email, :senha, NOW())";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->bindValue('nome', $obj->nome);
            $consulta->bindValue('sobrenome', $obj->sobrenome);
            $consulta->bindValue('apelido', $obj->apelido);
            $consulta->bindValue('email', $obj->email);
            $consulta->bindValue('senha', $obj->senha);
            return $consulta->execute();
        }

        public function sql_atualizaUsuario($obj){
            $sql = "UPDATE usuario SET UsuarioNome = :nome, UsuarioSobreNome = :sobrenome, UsuarioApelido = :apelido, UsuarioEmail = :email, UsuarioSenha = :senha WHERE UsuarioID = :id";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->bindValue('nome', $obj->nome);
            $consulta->bindValue('sobrenome', $obj->sobrenome);
            $consulta->bindValue('apelido', $obj->apelido);
            $consulta->bindValue('email', $obj->email);
            $consulta->bindValue('senha', $obj->senha);
            $consulta->bindValue('id', $obj->id);
            return $consulta->execute();
        }

        public function sql_atualizaPontuacao($obj){
            $sql = "UPDATE usuario SET UsuarioPontuacao = :pontos WHERE UsuarioID = :id";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->bindValue('pontos', $obj->pontos);
            $consulta->bindValue('id', $obj->id);
            return $consulta->execute();
        }

        public function sql_buscarUsuario($obj){
            $sql = "SELECT * FROM usuario WHERE (UsuarioApelido LIKE :apelido OR UsuarioEmail LIKE :email)";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->bindValue('apelido', $obj->apelido);
            $consulta->bindValue('email', $obj->email);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function sql_buscarUsuarioPorId($obj){
            $sql = "SELECT * FROM usuario WHERE UsuarioID = :id";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->bindValue('id', $obj->id);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function sql_listaUsuarios(){
            $sql = "SELECT * FROM usuario";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function sql_loginUsuario($obj){
            $sql = "SELECT * FROM usuario WHERE (UsuarioApelido LIKE :usuario OR UsuarioEmail LIKE :usuario) AND UsuarioSenha = :senha";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->bindValue('usuario', $obj->usuario);
            $consulta->bindValue('senha', $obj->senha);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
    }

?>