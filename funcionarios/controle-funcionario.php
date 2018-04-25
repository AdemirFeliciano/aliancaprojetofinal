<?php

require_once '../classes/dao/FuncionarioDAO.php';
require_once '../classes/modelo/Funcionario.php';
require_once '../classes/modelo/Uf.php';
require_once '../classes/modelo/Cidade.php';
require_once '../classes/modelo/Bairro.php';
require_once '../classes/modelo/Cep.php';
require_once '../classes/modelo/Sexo.php';
require_once '../classes/modelo/FoneFuncionario.php';
require_once '../classes/modelo/Login.php';
require_once '../classes/dao/Conexao.php';


if(isset($_POST['cadastrar'])){
$dao = new FuncionarioDAO();  

$uf= new Uf();
$uf->setUf_sigla($_POST['uf']);
$dao->inserirUf($uf);

$cidade = new Cidade();
$cidade->setCid_cidades($_POST['cidade']);
$cidade->setCid_uf_codigo($uf);
$dao->inserirCidade($cidade);

$bairro = new Bairro();
$bairro->setBai_bairro($_POST['bairro']);
$bairro->setBai_cid_codigo($cidade);
$dao->inserirBairro($bairro);

$cep = new Cep();
$cep->setCep_codigo($_POST['cep']);
$cep->setCep_numero($_POST['numero']);
$cep->setCep_rua($_POST['rua']);
$cep->setCep_bai_codigo($bairro);
$dao->inserirCep($cep);

$funcionario = new Funcionario();
$funcionario->setFun_nome($_POST['nome']);
$funcionario->setFun_cpf($_POST['cpf']);
$funcionario->setFun_rg($_POST['rg']);
$funcionario->setFun_sex_codigo($_POST['sexo']);
$funcionario->setFun_cep_codigo($cep);
$dao->inserir($funcionario);

$fone = new foneFuncionario();
$fone->setFon_fone($_POST['fone']);
$dao->inserirFone($fone);

$login = new login();
$login->setLog_login($_POST['login']);
$login->setLog_senha($_POST['senha']);
$dao->inserirLogin($login);

}

header("location:../LoginSenha.php");