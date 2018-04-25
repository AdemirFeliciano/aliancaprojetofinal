<?php

include '../funcoes/localizaCep.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="MeuEstilo.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.js"></script>
 
        <title>Funcionários</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <fieldset>
                    <legend>Cadastro Funcionários</legend>
                    <form action="controle-funcionario.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="cod" value="">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="" onkeyup="letraMaiuscula()" autofocus/>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="cpf">CPF</label>
                                <input type="text" id="cpf" name="cpf" class="form-control" maxlength="14" onblur="MascaraCPF(this.value)" value=""/>

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="rg">RG</label>
                                <input type="text" id="rg" name="rg" class="form-control" value=""/>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Sexo</label>
                                <div class="radio">
                                    <label><input type="radio" name="sexo"  value="1">Masculino</label>
                                    <label><input type="radio" name="sexo"  value="2">Feminino</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control" onblur="pesquisacep(this.value) " value=""/>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="rua" id="rua" class="form-control" value=""/>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="numero">Número</label>
                                <input type="text" name="numero" id="numero" class="form-control" value=""/>
                            </div>                             
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-5">
                                <label>Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" value=""/>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Cidade</label>
                                <input type="text" name="cidade" id="cidade" class="form-control" value=""/>
                            </div>
                            <div class="form-group col-sm-2">
                                <label>Estado</label>
                                <input type="text" name="uf" id="uf" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="fon">Telefone</label>
                                <input type="text" id="fone" name="fone" class="form-control" value=""/>
                            </div>
                            <div class=" form-group col-sm-8">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="nome" class="form-control-file">
                            </div>
                        </div>

                    
                    <div class="row">
                     <legend>Dados de Acesso</legend>
                      
                            <div class="form-group col-sm-4">
                                <label for="login">Login</label>
                                <input type="text" name="login" id="loginsenha" class="form-control" placeholder="Cadastrar Login" value=""/>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control" placeholder="Cadastrar Senha" value=""/>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Senha</label>
                                <input type="password" name="confsenha" id="confsenha" class="form-control" placeholder="Confirmar Senha" onblur="validaSenha()" value=""/>
                            </div>
                      

                    </div>
                        <button type="submit" class="btn btn-success" name="cadastrar" id="cadastrar" disabled="true">Cadastrar</button>
                
                </fieldset> 

              
            </div>
            </form>
        </div>
    </body>
</html>
