<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $tecnicatura = $_POST["txtTecnicatura"];
    $ciclo = $_POST["txtCiclo"];
    $anio = $_POST["txtAnio"];
    $curso = $_POST["txtCurso"];
    $g_taller = $_POST["txtG_Taller"];
    $profesor = $_POST["txtProfesor"];
    $s_revista = $_POST["txtS_Revista"];
    $horario = $_POST["txtHorario"];
    $codigo = $_POST['codigo'];

    $sentencia = $bd->prepare("UPDATE `lista` SET `nombre`=?,`tecnicatura`=?,`ciclo`=?,`anio`=?,`curso`=?,`g_taller`=?,`profesor`=?,`s_revista`=?,`horario`=? WHERE `codigo`=?;");
    $resultado = $sentencia->execute([$nombre, $tecnicatura, $ciclo, $anio, $curso, $g_taller, $profesor, $s_revista, $horario, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>