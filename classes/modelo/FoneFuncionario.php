<?php

class foneFuncionario {
    private $fon_fone;
    private $fon_fun_codigo;
    
    function getFon_fone() {
        return $this->fon_fone;
    }

    function getFon_fun_codigo() {
        return $this->fon_fun_codigo;
    }

    function setFon_fone($fon_fone) {
        $this->fon_fone = $fon_fone;
    }

    function setFon_fun_codigo(Funcionario $fon_fun_codigo) {
        $this->fon_fun_codigo = $fon_fun_codigo;
    }


}

