<?php
$pagina = "cliente";

include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";




include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

$consulta = "SELECT * FROM cliente order by clave";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$message = "";



?>

<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header bg-green ">
                <h1 class="card-title mx-auto">CLIENTES</h1>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <button id="btnNuevo" type="button" class="btn bg-gradient-green btn-ms" data-toggle="modal"><i class="fas fa-plus-square text-light"></i><span class="text-light"> Nuevo</span></button>
                    </div>
                </div>
                <br>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table name="tablaV" id="tablaV" class="table table-sm table-striped table-bordered table-condensed  w-auto mx-auto" style="width:100%">
                                    <thead class="text-center bg-gradient-green">
                                        <tr>
                                            <th>Clave</th>
                                            <th>RFC</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Calle</th>
                                            <th>Colonia</th>
                                            <th>C.P.</th>
                                            <th>Ciudad</th>
                                            <th>Estado</th>
                                            <th>Tel Casa</th>
                                            <th>Tel Trabajo</th>
                                            <th>Movil</th>
                                            <th>Nacionalidad</th>
                                            <th>Edo Civ</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $dat) {
                                        ?>
                                            <tr>
                                                <td><?php echo $dat['clave'] ?></td>
                                                <td><?php echo $dat['rfc'] ?></td>
                                                <td><?php echo $dat['nombre'] ?></td>
                                                <td><?php echo $dat['email'] ?></td>
                                                <td><?php echo $dat['dir_calle'] ?></td>
                                                <td><?php echo $dat['dir_colonia'] ?></td>
                                                <td><?php echo $dat['dir_cp'] ?></td>
                                                <td><?php echo $dat['dir_ciudad'] ?></td>
                                                <td><?php echo $dat['dir_edo'] ?></td>
                                                <td><?php echo $dat['tel_casa'] ?></td>
                                                <td><?php echo $dat['tel_trab'] ?></td>
                                                <td><?php echo $dat['tel_cel'] ?></td>
                                                <td><?php echo $dat['nacionalidad'] ?></td>
                                                <td><?php echo $dat['estado'] ?></td>
                                                <td></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>


    <section>
        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-green">
                        <h5 class="modal-title" id="exampleModalLabel">NUEVO CLIENTE</h5>

                    </div>
                    <div class="card card-widget" style="margin: 10px;">
                        <form id="formDatos" action="" method="POST">
                            <div class="modal-body ">
                                <div class="row justify-content-between">
                                    <div class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label for="rfc" class="col-form-label">RFC:</label>
                                            <input type="text" class="form-control" name="rfc" id="rfc" autocomplete="off" placeholder="RFC">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label for="nacionalidad" class="col-form-label">Nacionalidad:</label>
                                            <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" autocomplete="off" placeholder="Nacionalidad">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-7">
                                        <div class="form-group input-group-sm">
                                            <label for="nombre" class="col-form-label">Nombre:</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" placeholder="Nombre">
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group input-group-sm">
                                            <label for="correo" class="col-form-label">Correo Eléctronico:</label>
                                            <input type="text" class="form-control" name="correo" id="correo" autocomplete="off" placeholder="Correo Eléctronico">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label for="calle" class="col-form-label">Calle y Número:</label>
                                            <input type="text" class="form-control" name="calle" id="calle" autocomplete="off" placeholder="Calle">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group input-group-sm">
                                            <label for="col" class="col-form-label">Colonia:</label>
                                            <input type="text" class="form-control" name="col" id="col" autocomplete="off" placeholder="Colonia">
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="form-group input-group-sm">
                                            <label for="cp" class="col-form-label">CP:</label>
                                            <input type="text" class="form-control" name="cp" id="cp" autocomplete="off" placeholder="C.P.">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group input-group-sm">
                                            <label for="cd" class="col-form-label">Ciudad:</label>
                                            <input type="text" class="form-control" name="cd" id="cd" autocomplete="off" placeholder="Ciudad">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group input-group-sm">
                                            <label for="edo" class="col-form-label">Estado:</label>
                                            <input type="text" class="form-control" name="edo" id="edo" autocomplete="off" placeholder="Estado">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group input-group-sm">
                                            <label for="tel" class="col-form-label">Tel:</label>
                                            <input type="text" class="form-control" name="tel" id="tel" autocomplete="off" placeholder="Tel.">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group input-group-sm">
                                            <label for="cel" class="col-form-label">Móvil:</label>
                                            <input type="text" class="form-control" name="cel" id="cel" autocomplete="off" placeholder="Móvil">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group input-group-sm">
                                            <label for="trabajo" class="col-form-label">Tel. Trabajo:</label>
                                            <input type="text" class="form-control" name="trabajo" id="trabajo" autocomplete="off" placeholder="Tel. Trabajo">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group input-group-sm">
                                            <label for="edociv" class="col-form-label">Estado civil:</label>
                                            <input type="text" class="form-control" name="edociv" id="edociv" autocomplete="off" placeholder="Estado Civil">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <?php
                    if ($message != "") {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <span class="badge "><?php echo ($message); ?></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>

                        </div>

                    <?php
                    }
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> Cancelar</button>
                        <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-success" value="btnGuardar"><i class="far fa-save"></i> Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<?php include_once 'templates/footer.php'; ?>
<script src="fjs/cntacliente.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>