<?php
$pagina = 'home';
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";



include_once 'bd/conexion.php';



?>
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header bg-gradient-green">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 form-group">
          <h1>SISTEMA INMOBILIARIA BOSQUE DE LAS ANIMAS</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content" style="margin-top:5px">
    <div class="container-fluid">
      <div class="row justify-content-center mt-5">
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <h3>BUSCADOR</h3>
              </div>
            </div>

            <div class="card-body ">
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group row">

                    <label for="tcuenta" class="col-sm-2 control-label">Buscar Cliente:</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tbuscar" id="tbuscar" value="" placeholder="Introduzca el nombre del cliente">
                    </div>

                    <div class="col-sm-2 ">
                      <button type="button" class="btn btn-success w-100">Buscar</button>
                    </div>

                  </div>
                </div>

              </div>




            </div>
          </div>


        </div>


      </div>
    </div>
  </section>


  <section id="resultado" name="resultado" class=''>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table name="tablaV" id="tablaV" class="table table-sm table-striped table-bordered table-condensed text-nowrap w-auto mx-auto" style="width:100%">
              <thead class="text-center bg-gradient-green">
                <tr>
                  <th>Folio</th>
                  <th>Fecha</th>
                  <th>Proyecto</th>
                  <th>Lote</th>
                  <th>Total</th>
                  <th>Saldo</th>
                  
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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
<script src="http://cdn.datatables.net/plug-ins/1.10.21/sorting/formatted-numbers.js"></script>-