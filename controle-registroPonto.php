<?php

require_once './classes/dao/Conexao.php';
require_once './classes/dao/HoraDAO.php';
require_once './classes/modelo/Login.php';
require_once './classes/modelo/Hora.php';
require_once './classes/dao/LoginDAO.php';
require_once './classes/modelo/Funcionario.php';
require_once './classes/dao/FuncionarioDAO.php';
require_once './classes/modelo/Sexo.php';

session_start();
$usuario = unserialize($_SESSION['usuario']);

$hora = new Hora();
$dao = new HoraDAO();

if(isset($_POST['enviar'])){
    
$hora->setHor_hora($_POST['hora']);
$hora->setHor_data($_POST['data']);
$hora->setHor_fun_codigo($_POST['codfun']);
$dao->inserirHora($hora);

}

header("location:registroPonto.php");