<?php


class FuncionarioDAO{
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao:: conectar();
    }
    public function inserirUf (Uf $uf){
        $sql= "insert into tb_ufs"
                . "(uf_sigla) value"
                . "('{$uf->getUf_sigla()}')";
        return mysqli_query($this->conexao, $sql);
    }

    public function inserirCidade(Cidade $cidade){
        $sql= "insert into tb_cidades"
                . "(cid_cidade, cid_uf_codigo) value"
                . "('{$cidade->getCid_cidades()}',(select uf_codigo from tb_ufs where uf_sigla ='{$_POST['uf']}'))";
     return mysqli_query($this->conexao, $sql);   
    }
    public function inserirBairro(Bairro $bairro){
        $sql= "insert into tb_bairros"
                . "(bai_bairro, bai_cid_codigo) value"
                . "('{$bairro->getBai_bairro()}',(select cid_codigo from tb_cidades where cid_cidade ='{$_POST['cidade']}'))";
     return mysqli_query($this->conexao, $sql);
    }
    public function inserirCep(Cep $cep){
        $sql= "insert into tb_ceps"
                . "(cep_codigo, cep_numero, cep_rua, cep_bai_codigo) value"
                . "('{$cep->getCep_codigo()}',{$cep->getCep_numero()},'{$cep->getCep_rua()}',(select bai_codigo from tb_bairros where bai_bairro ='{$_POST['bairro']}'))";
     return mysqli_query($this->conexao, $sql);
    }

    public function inserir(Funcionario $funcionario){
        
        $sql = "insert into tb_funcionarios"
                . "(fun_nome, fun_cpf, fun_rg, fun_cep_codigo,fun_sex_codigo) value"
                . "('{$funcionario->getFun_nome()}','{$funcionario->getFun_cpf()}',"
                . "'{$funcionario->getFun_rg()}','{$funcionario->getFun_cep_codigo()->getCep_codigo()}',"
                . "{$funcionario->getFun_sex_codigo()})";
        return mysqli_query($this->conexao, $sql);
    }
    
    public function inserirFone(foneFuncionario $fone){
        $sql = "insert into tb_fone_funcionarios"
                . "(fon_fun_codigo, fon_fone) value"
                . "((select last_insert_id()),'{$fone->getFon_fone()}')";
        return mysqli_query($this->conexao, $sql);
    }
    
    public function inserirLogin(login $login) {
        $sql = "insert into tb_logins"
                . "(log_login, log_senha,log_fun_codigo) value"
                . "('{$login->getLog_login()}','{$login->getLog_senha()}',(select last_insert_id()))";
        return mysqli_query($this->conexao, $sql);
    }

    public function remover(Funcionario $funcionario) {
        
    }
    
    public function editar (Funcionario $funcionario){
        
    }
    
    public function buscarPorCod($cod) {
        $sql = "select * from tb_funcionarios join tb_sexos on sex_codigo = fun_sex_codigo where fun_codigo={$cod}";
        $resultado = mysqli_query($this->conexao, $sql);
        $funcionario = new Funcionario();
        
        while ($funcionario_array = mysqli_fetch_assoc($resultado)){
            $sexo = new Sexo();
            $sexo->setSex_codigo($funcionario_array['sex_codigo']);
            $sexo->setSex_sexo($funcionario_array['sex_sexo']);
            
            $funcionario->setFun_codigo($funcionario_array['fun_codigo']);
            $funcionario->setFun_nome($funcionario_array['fun_nome']);
            $funcionario->setFun_cpf($funcionario_array['fun_cpf']);
            $funcionario->setFun_rg($funcionario_array['fun_rg']);
            $funcionario->setFun_foto($funcionario_array['fun_foto']);
            $funcionario->setFun_cep_codigo($funcionario_array['fun_cep_codigo']);
            $funcionario->setFun_sex_codigo($sexo);
           
            
        }
        return $funcionario;
      
    }
    
    
    public function listarTodos() {
        
    }

}