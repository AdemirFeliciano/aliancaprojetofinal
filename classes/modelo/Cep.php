<?php

class Cep{
    private $cep_codigo;
    private $cep_bai_codigo;
    private $cep_numero;
    private $cep_rua;
            
    function getCep_codigo() {
        return $this->cep_codigo;
    }

    function getCep_bai_codigo() {
        return $this->cep_bai_codigo;
    }

    function setCep_codigo($cep_codigo) {
        $this->cep_codigo = $cep_codigo;
    }

    function setCep_bai_codigo(Bairro $cep_bai_codigo) {
        $this->cep_bai_codigo = $cep_bai_codigo;
    }

    function getCep_numero() {
        return $this->cep_numero;
    }

    function setCep_numero($cep_numero) {
        $this->cep_numero = $cep_numero;
    }
    function getCep_rua() {
        return $this->cep_rua;
    }

    function setCep_rua($cep_rua) {
        $this->cep_rua = $cep_rua;
    }


            
}

