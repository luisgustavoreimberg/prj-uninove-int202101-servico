<?php

    class RetornoServicoModel{
        public $Sucesso;
        public $Erro;
        public $CodigoHttp;
        public $MensagemResposta;
        public $ObjetoResposta;

        public function __construct($sucesso, $erro, $codigoHttp, $mensagemResposta, $objetoResposta){
            $this->Sucesso = $sucesso;
            $this->Erro = $erro;
            $this->CodigoHttp = $codigoHttp;
            $this->MensagemResposta = $mensagemResposta;
            $this->ObjetoResposta = $objetoResposta;
        }
    }

?>