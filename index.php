<?php

require("./funcoes.php");

$funcionarios = lerArquivo ("empresaX.json");

if(isset($_GET["buscarFuncionario"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Empresa X</title>
</head>
<body>
    <main>

    <h1>Tabela de Funcionários da Empresa X</h1>

    <form>
        <input type="text" name="buscarFuncionario" placeholder="buscarFuncionario" 
        value="<?= isset ($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : ""?>">

        <button>Buscar</button>
    </form>

    <table border="13">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Endereço IP</th>
            <th>País</th>
            <th>Departamento</th>
        </tr>

        <?php
        foreach($funcionarios as $funcionario) :
        ?>
            <th><?= $funcionario->id ?></th>
            <th><?= $funcionario->first_name ?></th>
            <th><?= $funcionario->last_name ?></th>
            <th><?= $funcionario->email ?></th>
            <th><?= $funcionario->gender ?></th>
            <th><?= $funcionario->ip_address ?></th>
            <th><?= $funcionario->country ?></th>
            <th><?= $funcionario->department ?></th>
        </tr>
        <?php
        endforeach
        ?>

    </table>
    </main>
</body>
</html>