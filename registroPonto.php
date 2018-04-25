<!DOCTYPE html>
<?php
require_once './classes/dao/Conexao.php';
require_once './classes/dao/HoraDAO.php';
require_once './classes/modelo/Login.php';
require_once './classes/modelo/Hora.php';
require_once './classes/dao/LoginDAO.php';
require_once './classes/modelo/Funcionario.php';
require_once './classes/dao/FuncionarioDAO.php';
require_once './classes/modelo/Sexo.php';

date_default_timezone_set("America/Recife");
setlocale(LC_TIME, "pt_BR");
session_start();
$usuario = unserialize($_SESSION['usuario']);
$funcionario = unserialize($_SESSION['funcionario']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="MeuEstilo.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <title>Registro Ponto</title>
    </head>
    <body>
        <div class="container">
            <div class="row">

                <div class="form-group">

                </div>

                <div class="form-group col-sm-4">
                    <h2>Registro Ponto</h2>
                    <form action="controle-registroPonto.php" method="post">
                        <input type="hidden" name="hora" id="hora" value="<?= date("H:i") ?>">
                        <input type="hidden" name="data" id="data" value="<?= date("y-m-d") ?>">
                        <input type="hidden" name="codfun" id="codfun" value="<?= $usuario->getLog_fun_codigo() ?>">
                        <?php
                        echo "<h3>" . strftime('%A') . ', ' . strftime('%d') . ' de ' . strftime('%B') . ' de ' . strftime('%G') . "</h3>";
                        echo "<b><font color='#FF0000'>" . date("H:i") . "</font></b>";
                        ?>
                        <input type="submit" class="btn btn-info" name="enviar">
                    </form>
                </div>
                <div class="form-group col-sm-8">
                    <form action="registroPonto.php" method="post">
                        <input type="hidden" name="codfun" id="codfun" value="<?= $usuario->getLog_fun_codigo() ?>">
                        <input type="text" name="nome" id="nome" value="<?= $funcionario->getFun_nome() ?>">
                        <br>
                        <input type="date" class="" name="dtInicio" id="dtInicio"value="<?php echo date("Y-m-d"); ?>" >
                        <input type="date" class="" name="dtFinal" id="dtFinal" value="<?php echo date("Y-m-d"); ?>" >
                        <button type="submit" class="btn btn-group-vertical" id="pesquisa" name="pesquisa">Pesquisa</button>                      


                        <table class="table table-striped">
                            <thead>

                                <tr class="info">
                                    <td>Data</td>
                                    <td>Entrada</td>
                                    <td>Intervalo</td>
                                    <td>Intervalo</td>
                                    <td>Saída</td>
                                    <td class="danger">Int.</td>
                                    <td class="danger">H.T</td>

                                </tr>

                            </thead>
                            <tbody>

                                <?php
                                if (isset($_POST['pesquisa'])) {

                                    $dao = new HoraDAO();
                                    $horas = $dao->listarHora();
                                    $data = "";
                                    $entrada = "";
                                    $saidaIntervalo = "";
                                    $entradaIntervalo = "";
                                    $saida = "";
                                    ?>

                                    <?php foreach ($horas as $hora) { ?>

                                        <?php if ($data != $hora->getHor_data()) { ?>
                                            <tr>
                                                <td><?= $hora->getHor_data() ?></td>
                                                <td><?= $hora->getHor_hora() ?></td>
        <?php } elseif ($data == $hora->getHor_data()) { ?>
                                                <td><?= $hora->getHor_hora() ?></td>      
                                                <?php
                                            }if ($entrada == "") {
                                                $entrada = $hora->getHor_hora();
                                            } elseif ($saidaIntervalo == "") {
                                                $saidaIntervalo = $hora->getHor_hora();
                                            } elseif ($entradaIntervalo == "") {
                                                $entradaIntervalo = $hora->getHor_hora();
                                            } elseif ($saida == "") {
                                                $saida = $hora->getHor_hora();
                                            }
                                            if ($entrada != "" && $saidaIntervalo != "" && $entradaIntervalo != "" && $saida != "") {
                                                $horasTrabalhadas = date((strtotime($saidaIntervalo) - strtotime($entrada)) / 60);
                                                $horasTrabalhadas += date((strtotime($saida) - strtotime($entradaIntervalo)) / 60);
                                                $horasDescanso = date((strtotime($entradaIntervalo) - strtotime($saidaIntervalo))/60);
                                                
                                                $minutos = ($horasDescanso%60);
                                                $horas =(int) ($horasDescanso/60);
                                                ?>
                                                <td><?= $horas.":".$minutos ?></td>
                                                <td><?= $horasTrabalhadas ?></td> 
                                                
                                                <?php
                                                $entrada = "";
                                                $saidaIntervalo = "";
                                                $entradaIntervalo = "";
                                                $saida = "";
                                                        }
                                            ?>


                                            <?php
                                            $data = $hora->getHor_data();
                                        }
                                    }
                                    ?>

                                </tr>
                            </tbody>
                        </table>

                    </form>
                </div>


            </div>
        </div>
    </body>
</html>
