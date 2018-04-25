<?php

class Uf{
    private $uf_codigo;
    private $uf_uf;
    private $uf_sigla;
    
    function getUf_codigo() {
        return $this->uf_codigo;
    }

    function getUf_uf() {
        return $this->uf_uf;
    }

    function getUf_sigla() {
        return $this->uf_sigla;
    }

    function setUf_codigo($uf_codigo) {
        $this->uf_codigo = $uf_codigo;
    }

    function setUf_uf($uf_uf) {
        $this->uf_uf = $uf_uf;
    }

    function setUf_sigla($uf_sigla) {
        $this->uf_sigla = $uf_sigla;
    }


}

