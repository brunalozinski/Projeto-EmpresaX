<?php

function lerArquivo($nomeArquivo) {
    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

function buscarFuncionario ($funcionarios, $first_name) {
    $funcionariosFiltro = [];
    foreach($funcionarios as $funcionario) {
        if($funcionario -> first_name == $first_name) {
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
}