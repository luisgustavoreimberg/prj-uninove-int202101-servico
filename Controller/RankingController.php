<?php

    include '../../Model/RankingModel.php';

    class RankingController{
        public function consultaRanking(){
            $rankingModel = new RankingModel();
            return $rankingModel->sql_consultaRanking();
        }
    }

?>