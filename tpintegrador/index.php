<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from lista");
    $lista = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($lista);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista
                </div>
                <div class="col-md-8">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tecnicatura</th>
                                <th scope="col">Ciclo</th>
                                <th scope="col">Año</th>
                                <th scope="col">Curso</th>
                                <th scope="col">G. Taller</th>
                                <th scope="col">Profesor</th>
                                <th scope="col">S. Revista</th>
                                <th scope="col">Horario</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($lista as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->tecnicatura; ?></td>
                                <td><?php echo $dato->ciclo; ?></td>
                                <td><?php echo $dato->anio; ?></td>
                                <td><?php echo $dato->curso; ?></td>
                                <td><?php echo $dato->g_taller; ?></td>
                                <td><?php echo $dato->profesor; ?></td>
                                <td><?php echo $dato->s_revista; ?></td>
                                <td><?php echo $dato->horario; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tecnicatura: </label>
                        <input type="text" class="form-control" name="txtTecnicatura" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciclo: </label>
                        <input type="text" class="form-control" name="txtCiclo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Año: </label>
                        <input type="number" class="form-control" name="txtAnio" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Curso: </label>
                        <input type="text" class="form-control" name="txtCurso" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grupo de Taller: </label>
                        <input type="number" class="form-control" name="txtG_Taller" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Profesor: </label>
                        <input type="text" class="form-control" name="txtProfesor" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Situacion de Revista: </label>
                        <input type="text" class="form-control" name="txtS_Revista" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Horario: </label>
                        <input type="text" class="form-control" name="txtHorario" autofocus required>
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