<?php

    include '../../Model/ConfigModel.php';

    class ConfigController{
        public function modeloResposta(){
            $configModel = new ConfigModel();
            return $configModel->info_ModeloResposta();
        }
    }

?>