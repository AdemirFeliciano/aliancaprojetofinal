<?php

class Bairro{
    private $bai_codigo;
    private $bai_bairro;
    private $bai_cid_codigo;
    
    function getBai_codigo() {
        return $this->bai_codigo;
    }

    function getBai_bairro() {
        return $this->bai_bairro;
    }

    function getBai_cid_codigo() {
        return $this->bai_cid_codigo;
    }

    function setBai_codigo($bai_codigo) {
        $this->bai_codigo = $bai_codigo;
    }

    function setBai_bairro($bai_bairro) {
        $this->bai_bairro = $bai_bairro;
    }

    function setBai_cid_codigo(Cidade $bai_cid_codigo) {
        $this->bai_cid_codigo = $bai_cid_codigo;
    }


}
