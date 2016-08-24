{%extends 'plantillas/baseBlog.php'%}
{%block title%}Gestión Usuarios{% endblock%}
{%block css%}
  <link rel="stylesheet" media="all" href="/assets/css/bootstrap_table/bootstrap-table.css">
  <link rel="stylesheet" media="all" href="/assets/css/css/gestionUsuarios.css">
{%endblock%}

{%block contenido%}
  <section id="cuerpo">
    <section id="informacion">
      <div id="toolbar" class="btn-group">
        <button type="button" class="btn btn-default tooltipShow" id="actualizar" title="Modificar Seleccionado">
            <i class="fa fa-refresh"></i>
        </button>
        <button type="button" class="btn btn-default tooltipShow" id="eliminar" title="Eliminar Seleccionado">
            <i class="fa fa-trash"></i>
        </button>
      </div>
      <!-- <table border="1" id="tablaInfo">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>E-Mail</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table> -->
      <table id="tabla-profesores" class="table table-stripped table-responsive"
        data-pagination="true"
        data-search="true"
        data-show-toggle="true"
        data-show-columns="true"
        data-toolbar="#toolbar"
        data-click-to-select="true"
        data-select-item-name="radioSelect"
        data-minimum-count-columns='1'
        data-page-list="[10, 25, 50, 100, Todo]">
        <thead id="tabla-head-profesores">
          <tr>
            <th data-field="state" data-radio="true"></th>
            <th data-field='nombre'>Nombre</th>
            <th data-field='email'>E-Mail</th>
          </tr>
        </thead>
      </table>
    </section>
  </section>

  <section>
    <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Actualizar Usuario</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizonatl" action="" method="post" id="formularioUsers">
              <div class="form-group">
                <input type="text" id="txtNombre" name="txtNombre" class="form-control" placeholder="Nombre" required="true">
              </div>
              <div class="form-group">
                <input type="text" id="txtApellidoP" name="txtApellidoP" class="form-control" placeholder="Apellido Paterno" required="true">
              </div>
              <div class="form-group">
                <input type="text" id="txtApellidoM" name="txtApellidoM" class="form-control" placeholder="Apellido Materno">
              </div>
              <div class="form-group">
                <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="E-Mail" required="true">
              </div>
            </form>
            <button type="button" id="btnFormOk" class="btn btn-info pull-right" >
              <i class="fa fa-upload"></i>
              Guardar
            </button>
            <button type="button" id="btnFormCancel" data-dismiss="modal" class="btn btn-warning pull-right">
              <i class="fa fa-remove"></i>
              Cancelar
            </button>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
{%endblock%}

{%block js%}
  <script src="/assets/js/bootstrap_table/bootstrap-table.js" charset="utf-8"></script>
  <script src="/assets/js/bootstrap_table/locale/bootstrap-table-es-MX.js" charset="utf-8"></script>
  <script src="/assets/js/js/gestionUsuarios.js" charset="utf-8"></script>
{%endblock%}
