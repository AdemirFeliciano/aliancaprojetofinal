<?php

require_once './classes/dao/Conexao.php';
require_once './classes/modelo/Login.php';
require_once './classes/dao/LoginDAO.php';
require_once './classes/modelo/Funcionario.php';
require_once './classes/dao/FuncionarioDAO.php';
require_once './classes/modelo/Cep.php';
require_once './classes/modelo/Sexo.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$dao = new LoginDAO();
$funcionarioDao = new FuncionarioDAO();

if(isset($_POST['entrar'])){
if($dao->Logar($login, $senha)){
    session_start();
    $usuario = $dao->buscarPorLogin($login);
    $cod = $usuario->getLog_fun_codigo();
    $_SESSION['usuario'] = serialize($usuario);
    
    $funcionario = $funcionarioDao->buscarPorCod($cod);
    $_SESSION['funcionario'] = serialize($funcionario);
    header("location:registroPonto.php");
    
    }else{
        header("location:LoginSenha.php");
        $naoLogado = "Usuario ou senha incorreto!";
        
    }
   
}
