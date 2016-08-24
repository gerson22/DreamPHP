{%extends 'plantillas/baseBlog.php'%}
{%block title%} Gestión de portafolio {% endblock%}
{%block css%}
  <link rel="stylesheet" media="all" href="/assets/css/css/portafolioAdmin.css">
{%endblock%}

{%block contenido%}
  <section id="cuerpo">
    <button type="button" name="btnAdd" id="btnAddSeccion" class="btn btn-success">Agregar nueva sección</button>
    <form id="formFoto" method="post">
      <input type='file' name='foto' id='foto' class='hidden'>
    </form>
    <div class="col-md-12 text-justify" id="zonaSecciones">

    </div>
  </section>

  <section>
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Agregar Sección</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizonatl" action="" method="post">
              <input type="text" id="txtNombre" class="form-control" placeholder="Nombre de la sección">
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
  <script src="/assets/js/js/portafolioAdmin.js" charset="utf-8"></script>
{%endblock%}
