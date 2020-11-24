<?php
$pagina = 'home';
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";



include_once 'bd/conexion.php';
$objeto = new conn();
$conexion = $objeto->connect();

$consulta = "SELECT * FROM vcntacuenta WHERE ejercicio='" . date('Y') . "' AND mes='" . date('m') . "'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header bg-gradient-green">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ERP CIUDAD CENTRAL</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:5px">
    <div class="container-fluid">
      <!--CARDS ENCABEZADO -->

      <!--
      <div class="row">
        <div class="col-lg-3 col-6">
         
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-3 col-6">
         
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-3 col-6">
       
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-3 col-6">
     
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
      </div>
-->
      <div class="row ">
        <!-- Left col -->
        <div class="col-lg-12 col-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header bg-gradient-green boder-0">
              <h3 class="card-title ">
                <i class="fas fa-money-check-alt mr-1"></i>
                COBRANZA DEL MES
              </h3>
              <div class="card-tools">
                <button type="button" class="btn bg-blue text-light btn-sm daterange" data-toggle="tooltip" title="Date range">
                  <i class="fas fa-money-check-alt"></i>
                </button>
                <button type="button" class="btn bg-blue btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>

            </div><!-- /.card-header -->

            <div class="card-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table name="tablaV" id="tablaV" class="table table-striped table-sm text-nowrap  table-bordered table-condensed  mx-auto" style="width:100%">
                        <thead class="text-center bg-gradient-green">
                          <tr>
                            <th>Local</th>
                            <th>Denominación</th>
                            <th>Cliente</th>
                            <th>Renta</th>
                            <th>Mantenimiento</th>
                            <th>Saldo Renta</th>
                            <th>Saldo Mnto</th>
                            <th>Tipo</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($data as $dat) {
                          ?>
                            <tr>
                              <td><?php echo $dat['concepto'] ?></td>
                              <td><?php echo $dat['razon'] ?></td>
                              <td><?php echo $dat['cliente'] ?></td>
                              <td class="text-right"><?php echo "$ " . number_format($dat['renta'], 2) ?></td>
                              <td class="text-right"><?php echo "$ " . number_format($dat['cuota'], 2) ?></td>
                              <td class="text-right"><?php echo "$ " . number_format($dat['saldorenta'], 2) ?></td>
                              <td class="text-right"><?php echo "$ " . number_format($dat['saldomnto'], 2) ?></td>
                              <td><?php echo $dat['tipo'] ?></td>
                              
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

          </div><!-- /.card-body -->
        </div>



      </div>
      <!-- Default box -->

      <!-- /.card -->

  </section>
  <!-- /.content -->
</div>


<?php
include_once 'templates/footer.php';
?>
<script src="fjs/cards.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="http://cdn.datatables.net/plug-ins/1.10.21/sorting/formatted-numbers.js"></script>