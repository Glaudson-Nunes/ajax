<?php

function listar_calendar(){

    try {
        $conect = $GLOBALS['pdo_sf'];
        $conect->beginTransaction();

        $consulta = $conect->prepare("
        SELECT

        d.ds_disciplina as nome ,
        d.id_disciplina,	
        al.data_atual,
        al.hora_inicial,
        al.hora_final,
        al.houve_falta,
        al.houve_presenca,
        al.e_feriado

        FROM aluno_aulas_letivas(p_id_turma => 439) al
        JOIN disciplina d ON al.id_disciplina = d.id_disciplina

        WHERE
        al.id_turma = 439 AND al.id_aluno = 12371

        ORDER BY
        al.data_atual
        ");
        $consulta->execute();

        $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return (json_encode($dados));

    }
    catch (Exception $e) {
        $conect->rollBack();
        return ($e->getMessage());
    }
}





?>