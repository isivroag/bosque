<?php
$pagina = 'home';
include_once "templates/header.php";
include_once "templates/barra.php";
include_once "templates/navegacion.php";


?>
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content ">
    <div class="container-fluid ">
      <div class="card">
        <div class="card-header bg-gradient-green">
          <h3>INMOBILIARIA BOSQUE DE LAS ANIMAS</h3>
        </div>

      </div>
    </div>
  </section>


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
                      <button type="button" id="btnBuscar" name="btnBuscar" class="btn bg-green w-100">Buscar</button>
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
    <div class="container-fluid ">
      <div class="card">
        <div class="card-header">
          <div class=" text-center">
            <h3>Resultado de Busqueda</h3>
          </div>
          <div class="text-center">
            <h3 id="cliente" name="cliente"></h3>
          </div>

        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table name="tablaV" id="tablaV" class="table table-sm table-striped table-bordered table-hover table-condensed text-nowrap w-auto mx-auto" style="width:100%">
                      <thead class="text-center bg-gradient-green">
                        <tr>
                          <th>Folio</th>
                          <th>Pres.</th>
                          <th>Fecha</th>
                          <th>Proyecto</th>
                          <th>Concepto</th>
                          <th>Total</th>
                          <th>Saldo</th>
                          <th>Saldo Mod. Met.</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>




    </div>
  </section>

  <section>
    <div class="container">


      <!-- Default box -->
      <div class="modal fade" id="modalResumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl " role="document">
          <div class="modal-content w-auto">
            <div class="modal-header bg-gradient-green">
              <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>

            </div>
            <br>
            <div class="table-hover responsive w-auto " style="padding:10px">
              <table name="tablaResumen" id="tablaResumen" class="table table-sm table-striped table-bordered table-condensed display compact" style="width:100%">
                <thead class="text-center bg-gradient-green">
                  <tr>
                    <th>ID</th>
                    <th>Rfc</th>
                    <th>Cliente</th>
                    <th>Seleccionar</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>


          </div>

        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </div>
  </section>


  <section>
    <div class="container">


      <!-- Default box -->
      <div class="modal fade" id="modalPagos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content w-auto">
            <div class="modal-header bg-gradient-green">
              <h5 class="modal-title" id="exampleModalLabel">CONSULTA DE PAGOS EN EFECTIVO</h5>
            </div>
            <br>
            <div class="row justify-content-center">
              <div class="col-sm-10">
              <h3>MONTO MAXIMO DE COBROS EN EFECTIVO $ 680,000.00</h3>
              </div>
            </div>
            <div class="table-hover responsive w-auto " style="padding:10px">
              <table name="tablaPagos" id="tablaPagos" class="table table-sm table-striped table-bordered table-condensed display compact" style="width:100%">
                <thead class="text-center bg-gradient-green">
                  <tr>
                    <th>METODO</th>
                    <th class="currency">% Pagado</th>
                    <th>% Permitido</th>
                    <th>Monto Permitido</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>


          </div>

        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

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
<script src="http://cdn.datatables.net/plug-ins/1.10.21/sorting/formatted-numbers.js"></script>