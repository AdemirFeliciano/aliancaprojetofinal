<?php

class hora {
    private $hor_codigo;
    private $hor_hora;
    private $hor_min;
    private $hor_data;
    private $hor_fun_codigo;
    
    function getHor_codigo() {
        return $this->hor_codigo;
    }

    function getHor_hora() {
        return $this->hor_hora;
    }

    function getHor_data() {
        return $this->hor_data;
    }

    function getHor_fun_codigo() {
        return $this->hor_fun_codigo;
    }

    function setHor_codigo($hor_codigo) {
        $this->hor_codigo = $hor_codigo;
    }

    function setHor_hora($hor_hora) {
        $this->hor_hora = $hor_hora;
    }

    function setHor_data($hor_data) {
        $this->hor_data = $hor_data;
    }

    function setHor_fun_codigo($hor_fun_codigo) {
        $this->hor_fun_codigo = $hor_fun_codigo;
    }
    
    function getHor_min() {
        return $this->hor_min;
    }

    function setHor_min($hor_min) {
        $this->hor_min = $hor_min;
    }




}

