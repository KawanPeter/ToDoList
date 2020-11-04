<?php
// index sera o ponto central

require "src/classes/Tarefa.php";
require "src/classes/ArquivoTarefa.php";

// $tarefa = new Tarefa(0, "Teste", "Teste da classe tarefa", "22/10/2020");
// $tarefa2 = new Tarefa(1, "Teste 2", "Teste da classe tarefa 2", "23/10/2020");
// esta linha redireciona qualquer requisição no índice para o endereco
// cabeçalho ('Localização: /resource/lista_tarefas.html');

// $listaTarefas = [];
// $listaTarefas[] = $tarefa;
// $listaTarefas[] = $tarefa2;
$modelo = file_get_contents('resource/lista_tarefas.html');

$arquivoTarefa = new ArquivoTarefa("tarefas.json");
// $arquivoTarefa->salva($listaTarefas);
$arquivoTarefa = novo ArquivoTarefa('tarefas.json' );
$listaTarefasJSON   =   $arquivoTarefa->le();

print_r($arquivoTarefa->le());

$modeloTarefa = file_get_contents('resource/tarefa.html');

$linhasTabela = '';

foreach ($listaTarefasJSON como  $tarefa) {
    $Tr = '';
     $tr = str_replace('#STATUS',  $tarefa->getStatus(),  $modeloTarefa);
     $tr = str_replace('#ID',  $tarefa->getId(),  $tr);
     $tr = str_replace('#NOME',  $tarefa->getNome(),  $tr);
     $tr = str_replace('#DATALIMITE',  $tarefa->getDataLimite(),  $tr);
     $linhasTabela .=  $tr;
}

echo str_replace('#TAREFAS',  $linhasTabela,  $modelo); 