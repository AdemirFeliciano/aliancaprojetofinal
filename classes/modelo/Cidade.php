<?php

class Cidade {
    private $cid_codigo;
    private $cid_cidades;
    private $cid_uf_codigo;
    
    function getCid_codigo() {
        return $this->cid_codigo;
    }

    function getCid_cidades() {
        return $this->cid_cidades;
    }

    function getCid_uf_codigo() {
        return $this->cid_uf_codigo;
    }

    function setCid_codigo($cid_codigo) {
        $this->cid_codigo = $cid_codigo;
    }

    function setCid_cidades($cid_cidades) {
        $this->cid_cidades = $cid_cidades;
    }

    function setCid_uf_codigo(Uf $cid_uf_codigo) {
        $this->cid_uf_codigo = $cid_uf_codigo;
    }


}

