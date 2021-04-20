<?php

    include 'DAL/ConexaoBanco.php';

    class RankingModel extends ConexaoBanco{
        public function sql_consultaRanking(){
            $sql = "SELECT UsuarioApelido, UsuarioEmail, UsuarioPontuacao FROM usuario ORDER BY UsuarioPontuacao DESC";
            $consulta = ConexaoBanco::prepararInstanciaBanco($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }
    }

?>