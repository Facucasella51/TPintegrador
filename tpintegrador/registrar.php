<?php
    //print_r($_POST);
    

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
    
    $sentencia = $bd->prepare("INSERT INTO lista(nombre,tecnicatura,ciclo,anio,curso,g_taller,profesor,s_revista,horario) VALUES (?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$tecnicatura,$ciclo,$anio,$curso,$g_taller,$profesor,$s_revista,$horario]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>