<?php

function lerArquivo($nomeArquivo) {
    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

function buscarFuncionario ($funcionarios, $filtro) {

    $funcionariosFiltro = [];

    foreach($funcionarios as $funcionario) {

        if(
            strpos($funcionario -> first_name,  $filtro) !== false
            ||
            strpos($funcionario -> last_name,  $filtro) !== false
            ||
            strpos($funcionario -> department,  $filtro) !== false
        ){
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
}

function adicionarFuncionarios ($nomeArquivo, $novoFuncionario) {
    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);
}

function deletarFuncionario($nomeArquivo, $idFuncionario) {
    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $chave => $funcionario) {
        if($funcionario->id == $idFuncionario) {
            unset($funcionarios[$chave]);
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);

}

function buscarFuncionarioPorId($nomeArquivo, $idFuncionario) {
    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $funcionario) {
        if ($funcionario->id == $idFuncionario) {
            return $funcionario;
        }
    }
    return false;
}