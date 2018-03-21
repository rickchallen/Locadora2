<!DOCTYPE html>
    <?PHP
        include_once("Locadora.php");
        include_once("Pessoa.php");
        include_once("Funcionario.php");
        include_once("Produto.php");
        include_once("Usuario.php");
        include_once("Cd.php");
        include_once("Dvd.php");
        include_once("Bluray.php");
        include_once("Conexao.php");
        include_once("Locacao.php");
        ?>
<HTML>
<head>
    <title>Lista</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,
            minimum-scale=1.0">
</head>
<body>
    <div class="col-md-5">
    <table class="table table-striped table-hover">
        <TR>
            <TH>NOME</TH>
            <TH>TELEFONE</TH>
            <TH>ENDEREÇO</TH>
            <TH>QTD_LOCADO / SALÁRIO</TH>
            <TH>TIPO</TH>
        </TR>
        
        <?php
           $locadora = new Locadora(new Usuario("","","",0),new Funcionario("","","",0),new Cd("","",""),new Dvd("",""),
                                    new Bluray("","",""),new Locacao(new Usuario("","","",0),new Cd("","","")));
           
           $locadora->listarUsuario();
        
        ?>
        
    </table>
    </div>
</body>
</HTML>