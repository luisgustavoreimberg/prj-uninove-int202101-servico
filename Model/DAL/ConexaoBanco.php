<?php

    require_once 'configuracao.php';

    class ConexaoBanco{
        private static $instanciaBanco;

        public static function carregarInstancia(){
            if(!isset(self::$instanciaBanco)){
                try{
                    self::$instanciaBanco = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NOME, DB_USUARIO, DB_SENHA);
                    self::$instanciaBanco->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    self::$instanciaBanco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                }catch(PDOException $ex){
                    echo "ERRO: ".$ex->getMessage();
                }
            }
            return self::$instanciaBanco;
        }

        public static function prepararInstanciaBanco($sql){
            return self::carregarInstancia()->prepare($sql);
        }
    }
    
?>