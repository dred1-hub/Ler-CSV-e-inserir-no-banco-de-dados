<?php
    $conn = new mysqli("localhost", "root", "", "led");
    mysqli_set_charset($conn, "utf8");

    $arquivo = $_FILES  ["file"]["tmp_name"];
    $nome = $_FILES ["file"]["name"];

    $ext = explode(".", $nome);

    $extensao = end($ext);

    if($extensao != "csv"){
        echo "Extensão Invalida";
    }else{
        $objeto = fopen($arquivo, 'r');

            while (($dados = fgetcsv($objeto, 1000, ";")) !== FALSE){
                $arqdisciplina = utf8_encode($dados[0]);
                $arqareaquestao = utf8_encode($dados[1]);
                $arqlinkautoria = utf8_encode($dados[2]);
                $arqaplicacao = utf8_encode($dados[3]);
                $arqlinkestudo = utf8_encode($dados[4]);
                $arqdificuldadequestao = utf8_encode($dados[5]);
                $arqpergunta = utf8_encode($dados[6]);
                $arqalternativacorreta = utf8_encode($dados[7]);
                $arqsegundaalternaditva = utf8_encode($dados[8]);
                $arqterceiraalternaditva = utf8_encode($dados[9]);
                $arqquartaalternaditva = utf8_encode($dados[10]);
                $arqquintaalternaditva = utf8_encode($dados[11]);

                $result = $conn->query("INSERT INTO perguntasgerais (disciplina, areaQuestao, linkAutoria, aplicacao,
                 linkEstudo, dificuldadeQuestao, pergunta, alternativaCorreta, segundaAlternativa, terceiraAlternativa, 
                 quartaAlternativa, quintaAlternativa) VALUES('$arqdisciplina', '$arqareaquestao', '$arqlinkautoria', '$arqaplicacao', 
                 '$arqlinkestudo', '$arqdificuldadequestao', '$arqpergunta', '$arqalternativacorreta', '$arqsegundaalternaditva', 
                 '$arqterceiraalternaditva', '$arqquartaalternaditva', '$arqquintaalternaditva')");
            }

            if($result){
                echo "Dados inseridos com sucesso";
            }else{
                echo "Erro ao inserir os dados";
            }
    }
?>
