<?php

class Login {
    private $log_codigo;
    private $log_login;
    private $log_senha;
    private $log_fun_codigo;
    
    function getLog_codigo() {
        return $this->log_codigo;
    }

    function getLog_login() {
        return $this->log_login;
    }

    function getLog_senha() {
        return $this->log_senha;
    }

    function getLog_fun_codigo() {
        return $this->log_fun_codigo;
    }

    function setLog_codigo($log_codigo) {
        $this->log_codigo = $log_codigo;
    }

    function setLog_login($log_login) {
        $this->log_login = $log_login;
    }

    function setLog_senha($log_senha) {
        $this->log_senha = $log_senha;
    }

    function setLog_fun_codigo($log_fun_codigo) {
        $this->log_fun_codigo = $log_fun_codigo;
    }


}
