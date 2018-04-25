<!DOCTYPE html>
<?php

require_once './classes/dao/Conexao.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="MeuEstilo.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.js"></script>	
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <title>Aliança Funcionários</title>
    </head>
       <body style="background-color:#bfbfbf">
           <div id="conteiner">
               <div class="form-group col-lg-offset-5">
                   <form action="controle-login.php" method="post">
                   <table>                       
                       <tr>
                           <td><label for="login">Login:</label></td>
                           <td><input type="text" name="login"></td>
                           <td></td>
                       </tr>

                       <tr>
                           <td><label for="senha">Senha:</label></td>
                           <td><input type="password" name="senha"></td>
                           <td rowspan="2"><input type="submit" class="btn" name="entrar" id="entrar"></td>
                       </tr>
                   </table>
                   </form>
                   <a href="funcionarios/Funcionario.php">Novo Cadastro</a>
               </div>
               
           </div>
    </body>
</html>
