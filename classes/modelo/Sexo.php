<?php

class Sexo{
    private $sex_codigo;
    private $sex_sexo;
    
    function getSex_codigo() {
        return $this->sex_codigo;
    }

    function getSex_sexo() {
        return $this->sex_sexo;
    }

    function setSex_codigo($sex_codigo) {
        $this->sex_codigo = $sex_codigo;
    }

    function setSex_sexo($sex_sexo) {
        $this->sex_sexo = $sex_sexo;
    }


}

