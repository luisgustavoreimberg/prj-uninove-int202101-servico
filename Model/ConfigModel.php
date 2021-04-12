<?php

    class ConfigModel{
        public function info_ModeloResposta(){
            return array(
                'Sucesso'=>'(Boolean) Informa se houve ou não sucesso no procedimento solicitado.',
                'Erro'=>'(Boolean) Informa se houve ou não erro/excessão no processo.',
                'CodigoHttp'=>'(Inteiro) Código de status http de resposta.',
                'MensagemResposta'=>'(String) Mensagem de resposta para informar erro e/ou insucesso.',
                'ObjetoResposta'=>'(Objeto) Dados de resposta de pesquisas.'
            );
        }
    }

?>