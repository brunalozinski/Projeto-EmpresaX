<?php

require("./funcoes.php");

$funcionarios = lerArquivo ("empresaX.json");

if(isset($_GET["filtro"]) && $_GET["filtro"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
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

    <h1>Funcionários da empresa X</h1>

    <p style="text-align: center">
      A empresa conta com <em> <?= count($funcionarios) ?> </em> funcionários.
    </p>

    <form method="GET" class="search-form">

      <div class="input-group" style="flex: 1">

        <label>Pesquisar por nome</label>

        <input type="search" placeholder="Digite o nome" name="filtro" 
          value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>" />

      </div>

      <button class="material-icons">
        person_search
      </button>

    </form>
    <button id="buttonAdcFuncionario">Adicionar Funcionário</button>
    <br /> <br />

    <div class="modal-form">

    <form id="form-funcionario">
        <h1>Adicionar funcionário</h1>
        <input type="text" placeholder="Digite o id" name="id" />
        <input type="text" placeholder="Digite o primeiro nome" name="first_name" />
        <input type="text" placeholder="Digite o sobrenome" name="last_name" />
        <input type="text" placeholder="Digite o e-mail" name="email" />
        <input type="text" placeholder="Digite o sexo" name="gender" />
        <input type="text" placeholder="Digite o IP" name="ip_address" />
        <input type="text" placeholder="Digite o país" name="country" />
        <input type="text" placeholder="Digite o departamento" name="department" />
        <button>Salvar</button>
    </form>

    </div>
    
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
        <tr>
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