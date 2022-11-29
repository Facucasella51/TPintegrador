<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from lista where codigo = ?;");
    $sentencia->execute([$codigo]);
    $lista = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($lista);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required
                        value="<?php echo $lista->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tecnicatura: </label>
                        <input type="text" class="form-control" name="txtTecnicatura" autofocus required
                        value="<?php echo $lista->tecnicatura; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciclo: </label>
                        <input type="text" class="form-control" name="txtCiclo" autofocus required
                        value="<?php echo $lista->ciclo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Año: </label>
                        <input type="number" class="form-control" name="txtAnio" autofocus required
                        value="<?php echo $lista->anio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Curso: </label>
                        <input type="text" class="form-control" name="txtCurso" autofocus required
                        value="<?php echo $lista->curso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grupo de Taller: </label>
                        <input type="number" class="form-control" name="txtG_Taller" autofocus required
                        value="<?php echo $lista->g_taller; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Profesor: </label>
                        <input type="text" class="form-control" name="txtProfesor" autofocus required
                        value="<?php echo $lista->profesor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Situacion de Revista: </label>
                        <input type="text" class="form-control" name="txtS_Revista" autofocus required
                        value="<?php echo $lista->s_revista; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Horario: </label>
                        <input type="number" class="form-control" name="txtHorario" autofocus required
                        value="<?php echo $lista->horario; ?>">
                    </div>
                    
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>