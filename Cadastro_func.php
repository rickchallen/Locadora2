<!DOCTYPE html>
    <html>
        <head>
            <title>Cadastro de Funcionário</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
            maximum-scale=1.0,minimum-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/MeuEstilo.css">
        </head>
        <body class="imagem">
            
            
            <?php
               $erro = null;
               if(isset($_REQUEST["enviar"]) && $_REQUEST["enviar"] == true){
                
                if(strlen(utf8_decode($_POST["nome"])) < 5){
                    $erro = "O Nome digitado possui menos de 5 letras!";
                }
                else if(!isset($_POST["fone"]) || !is_numeric($_POST["fone"])){
                    $erro = "Digite no Campo Telefone apenas Numeros";
                    
                }else if(strlen(utf8_decode($_POST["endereco"]))<5){
                    $erro = "O Endreço informado possui menos de 5 Letras";
                    
                }else if(isset($_POST["salario"]) && !is_numeric($_POST["salario"])){
                    $erro = "Digite Um Valor Válido";
                    
                }else{
                    include_once("Conexao.php");
                    include_once("Locadora.php");
                    
                    
                    $locadora = new Locadora(new Usuario("","","",0),new Funcionario("","","",0),new Cd("","",""),new Dvd("",""),
                                    new Bluray("","",""),new Locacao(new Usuario("","","",0),new Cd("","","")));
                    
                     $locadora->criarUsuario($_POST["nome"],$_POST["fone"],$_POST["endereco"],$_POST["salario"]);
                        
                    
                }
                
               }
            
            ?>
            <div class="container padrao">
                
                <form method="post" action="?enviar=true" class="">
                   
                </div>
                    <fieldset class="col-md-offset-3">
                    <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu Nome" class="form-control tamanho"
                    <?php
                    if(isset($erro)){echo "value='".$erro."'";}?>>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Telefone:</label>
                    <input type="tel" name="fone" placeholder="Digite seu número" class="form-control tamanho" <?php
                    if(isset($erro)){echo "value='".$erro."'";}?>
                    >
                    </div>
                    <div class="form-group">
                    <label class="control-label">Endereço</label>
                    <input type="text" name="endereco" placeholder="Digite seu Endereço" class="form-control tamanho"
                    <?php
                    if(isset($erro)){echo "value='".$erro."'";}?>>
                    </div>
                    <div class="form-group">
                        <label for="salario" class="control-label">Salário</label>
                        <input type="text" class="form-control" placeholder="Digite o Salário" name="salario"
                        <?php
                    if(isset($erro)){echo "value='".$erro."'";}?>
                        >

                    </div>
                    <div class="form-group">
                        <label for="data" class="control-label">Data</label>
                        <input type="date" name="data" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Enviar</button>
                    </div>
                    </fieldset>
                    
                </form>
            </div>
             <div class=" row">
                <!--
                    <img src="imagens/desempenho.jpg"/>
                -->
                </div>
        </body>
    </html>