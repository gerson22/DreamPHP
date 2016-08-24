{%extends 'plantillas/baseBlog.php'%}
{%block title%}Gestión Usuarios{% endblock%}
{%block css%}
  <link rel="stylesheet" media="all" href="/assets/css/css/.css">
{%endblock%}

{%block contenido%}
  <section id="cuerpo">
    <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Fotos de Perfil</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizonatl" action="" method="post">
              <div class="form-group">
                <input type="text" id="txtNombre" class="form-control" placeholder="Nombre" required="true">
              </div>
              <div class="form-group">
                <input type="text" id="txtApellidoP" class="form-control" placeholder="Apellido Paterno" required="true">
              </div>
              <div class="form-group">
                <input type="text" id="txtApellidoM" class="form-control" placeholder="Apellido Materno">
              </div>
              <div class="form-group">
                <input type="email" id="txtEmail" class="form-control" placeholder="E-Mail" required="true">
              </div>
            </form>
            <button type="button" id="btnFormOk" class="btn btn-info pull-right" data-dismiss="modal">
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
  <script src="/assets/js/js/.js" charset="utf-8"></script>
{%endblock%}
