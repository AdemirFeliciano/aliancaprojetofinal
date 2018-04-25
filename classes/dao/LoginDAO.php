<?php

class LoginDAO{
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao:: conectar();
    }
    
    public function Logar($login, $senha) {
        $usuario = $this->buscarPorLogin ($login);
        if($usuario != null && $usuario->getLog_senha() == $senha){
            return true;
        }
        return false;
        
        
    }
    
    public function buscarPorLogin($login) {
        $sql = "select * from tb_logins where log_login='{$login}'";
        $resultado = mysqli_query($this->conexao, $sql);
       
        while ($linha = mysqli_fetch_assoc($resultado)){
            //$senha = $linha['log_senha'];
            
            $usuario = new Login();
            $usuario->setLog_codigo($linha['log_codigo']);
            $usuario->setLog_login($linha['log_login']);
            $usuario->setLog_senha($linha['log_senha']);
            $usuario->setLog_fun_codigo($linha['log_fun_codigo']);
            
            return $usuario;
         
            
        }
        return null;
    }
    
    public function buscarFuncionario() {
        $sql = "select * from tb_funcionarios where fun_codigo = {$_POST['codfun']}";
        $resultado = mysqli_query($this->conexao, $sql);
       
        while ($linha = mysqli_fetch_assoc($resultado)){
            
            
            $funcionario = new Funcionario();
            $funcionario->setFun_nome($linha['fun_nome']);
            $funcionario->setFun_cpf($linha['fun_cpf']);
            $funcionario->setFun_rg($linha['fun_rg']);
            $funcionario->setFun_sex_codigo($linha['fun_sex_codigo']);
            
            
         
            
        }
        return $funcionario;
        
    }

}

