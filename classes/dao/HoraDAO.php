<?php

class HoraDAO {
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao:: conectar();
    }
    
    public function inserirHora(Hora $hora){
                   echo $_POST['hora'];
    echo $_POST['data'];
    echo $_POST['codfun'];
        $sql = "insert into tb_horas"
                . "(hor_hora, hor_data, hor_fun_codigo)value"
                . "('{$hora->getHor_hora()}', '{$hora->getHor_data()}',{$hora->getHor_fun_codigo()})";
       return mysqli_query($this->conexao, $sql); 
    }
    
    public function listarHora(){

        $horas = array();

        $sql="select * from tb_horas where "
                . "hor_data between '{$_POST['dtInicio']}' and '{$_POST['dtFinal']}' and "
                . "hor_fun_codigo ={$_POST['codfun']}";
        $resultado = mysqli_query($this->conexao, $sql);
        
        while ($hora_array = mysqli_fetch_assoc($resultado)){
            $hora = new Hora();
            
            $hora->setHor_data($hora_array['hor_data']);
            $hora->setHor_hora($hora_array['hor_hora']);
            $hora->setHor_fun_codigo($hora_array['hor_fun_codigo']);
            array_push($horas, $hora);
        }
        return $horas;
        
    }
}
