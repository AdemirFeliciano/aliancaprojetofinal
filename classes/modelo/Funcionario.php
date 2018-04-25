<?php

class Funcionario{
    private $fun_codigo;
    private $fun_nome;
    private $fun_cpf;
    private $fun_rg;
    private $fun_cep_codigo;
    private $fun_sex_codigo;
    private $fun_foto;
    
    function getFun_codigo() {
        return $this->fun_codigo;
    }

    function getFun_nome() {
        return $this->fun_nome;
    }

    function getFun_cpf() {
        return $this->fun_cpf;
    }

    function getFun_rg() {
        return $this->fun_rg;
    }

    function getFun_cep_codigo() {
        return $this->fun_cep_codigo;
    }

    function getFun_sex_codigo() {
        return $this->fun_sex_codigo;
    }

    function getFun_foto() {
        return $this->fun_foto;
    }

    function setFun_codigo($fun_codigo) {
        $this->fun_codigo = $fun_codigo;
    }

    function setFun_nome($fun_nome) {
        $this->fun_nome = $fun_nome;
    }

    function setFun_cpf($fun_cpf) {
        $this->fun_cpf = $fun_cpf;
    }

    function setFun_rg($fun_rg) {
        $this->fun_rg = $fun_rg;
    }

    function setFun_cep_codigo( $fun_cep_codigo) {
        $this->fun_cep_codigo = $fun_cep_codigo;
    }

    function setFun_sex_codigo($fun_sex_codigo) {
        $this->fun_sex_codigo = $fun_sex_codigo;
    }

    function setFun_foto($fun_foto) {
        $this->fun_foto = $fun_foto;
    }


}

