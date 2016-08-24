{%extends 'plantillas/baseBlog.php'%}
{%block title%} Bloggs {% endblock%}
{%block css%}
<link rel="stylesheet" media="all" href="/assets/css/css/blogMenu.css">
{%endblock%}

{%block contenido%}
  <div class="container-fluid" id="contenidoBlog">

    <div class="pagePosts">
      <div class="row">
        <div class="col-md-3 col-md-offset-6 text-right">
          <label for="">Buscar Cursos</label>
          <input type="text" name="name" value="" placeholder="Titulo de Post" class="form-control">
        </div>
      </div>

      <div class="row" id="contPost">

        <div class="col-xs-6 col-md-4">
          <div class="card-post text-center" id="addPost">
            <center>
              <div>
                <label><span class="fa fa-plus"></span></label>
              </div>
              <h4><b>Aè´–adir Curso</b></h4>
            </center>
          </div>
        </div>
        <div class="posters">

        <!-- ./Aqui se iran a√±adiendo los posts dinamicamente --->
        </div>

      </div>
    </div>

    <div class="pageAdd" hidden="hidden">
        <div class="form-group">
          <label for="">Titulo del post</label>
          <input type="text" name="titulo" class="form-control" id="titulo">
        </div>
        <div class="form-group">
          <label for="">Contenido</label>
          <textarea name="content" id="content" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label>Elegir Imagen de Portada</label><br>
          <button type="button" class="btn btn-info btn-inline" id="selectFile">
            Seleccionar Archivo
          </button>
          <input type="text" name="name" value="" class="form-control" placeholder="No se ha seleccionado archivo" disabled>
          <form id="frm_post" enctype="multipart/form-data">
              <input type="file" accept="image/gif,image/jpeg,image/png" style="display:none;" name="file" id="file">
          </form>
        </div>
      <div class="text-right">
        <button type="button" name="button" class="btn btn-primary" id="send" name="send">
          Publicar
        </button>
        <button type="button" name="button" class="btn btn-primary" id="update" name="update" hidden="hidden">
          Actualizar
        </button>
        <button type="button" name="button" class="btn btn-warning">
          Limpiar
        </button>
        <button type="button" name="button" class="btn btn-danger" id="btnAddCancel">
          Cancelar
        </button>
      </div>
    </div>

  </div>
{%endblock%}

{%block js%}
 <script type="text/javascript" src="/assets/js/js/Create.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        var idPost;

      $(".posters").on('click','button[name=btn-view]',function(event) {
          var $element = this;
         $.ajax({
             url:'/post/setIdPost/buscarPost',
             type:'JSON',
             method:'POST',
             data:{id:$($element).attr('data-id-post')}
         }).done(function(reponse){
             window.location='/blog/showPost/'+$($element).attr('data-id-post');
         }).fail(function(error,status,statusText){
             console.log(error);
             console.log(status);
             console.log(statusText);
         });
      });

      $("#addPost").click(function(event) {
        $(".pagePosts").fadeOut('slow');
        $(".pageAdd").removeAttr('hidden');
      });

      $("#btnAddCancel").click(function(event) {
        $(".pagePosts").show('slow');
        $(".pageAdd").attr('hidden', 'hidden');
      });

      $(".btnUpdatePost, .btnDelPost").hover(function() {
        $(this).css({
          'transition' : '0.4s',
          'opacity' : '1'
        });
      }, function() {
        $(this).css({
          'transition' : '0.4s',
          'opacity' : '0.5'
        });

      });
        $("#selectFile").click(function(e){
            e.preventDefault();
            $("#file").trigger('click');
            $("input[name=name]").attr('placeholder',"Seleccionaste un archivo");
        });
        $("#send").click(function(){
             var formData = new FormData($("#frm_post")[0]);
                formData.append('titulo',$("#titulo").val());
                formData.append('contenido',$("#content").val());
                 $.ajax({
                    url:'/post/save/guardar-post',
                    method:'POST',
                    dataType:'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:formData,
                    beforeSend: function(){
                            alertify.log("El post se esta publicando");
                    },
                }).done(function(response){

                    alertify.success("El post se publico con exito");
                    window.location="/blog/show/all"

                }).fail(function(error,status,statusText){
                    console.log(status);
                    console.log(error);
                    console.log(statusText);
                });
        });

        cargarPosts();

        function cargarPosts(){
            $.ajax({
                url:'/post/showMe/post-actuales',
                method:'POST',
                dataType:"JSON",
                cache:false
            }).done(function(response){
                $(".pagePosts > #contPost .posters").empty();
                $.each(response,function(index,object){
                    console.log(object);
                    elemento.Post.id=object.id;
                    elemento.Post.titulo=object.titulo;
                    elemento.Post.contenido=(object.contenido);
                    console.log(object.contenido);
                    elemento.Post.srcImage="/"+object.src;
                    $(".pagePosts > #contPost .posters").append(elemento.Post.create());
                });
            }).fail(function(error,status,statusText){
                alertify.error(error);
                console.log(status);
                console.log(statusText);
            });
        }
        $(".pagePosts > #contPost .posters").on("click","button[name=btn-disabled]",function(){
            $.ajax({
                url:'/post/disabled/deshabilitar-post',
                method:'POST',
                dataType:'JSON',
                data:{id:$(this).attr('data-id-post')},
                cache:false
            }).done(function(response){
                alertify.success("El post se elimino con exito");
                cargarPosts();

            }).fail(function(error,status,statusText){
                console.log(error);
                console.log(status);
                console.log(statusText);
            });
        });
        $(".pagePosts > #contPost .posters").on("click","button[name=btn-refresh]",function(){
            idPost = $(this).attr('data-id-post');
            $("#titulo").val($(".posters #title_post_"+idPost).text());
            $("#content").val($(".posters #content_post_"+idPost).attr('title').replace("Comentario:",""));
            $("#send").attr('hidden','hidden');
            $("#update").removeAttr('hidden');
            $(".pagePosts").fadeOut('slow');
            $(".pageAdd").removeAttr('hidden');

        });
        $("#update").click(function(){
            idPost = $(this).attr('data-id-post');
            var formData = new FormData($("#frm_post")[0]);
                formData.append('titulo',$("#titulo").val());
                formData.append('contenido',$("#content").val());
                formData.append('id',idPost);
                 $.ajax({
                    url:'/post/update/update-post',
                    method:'POST',
                    dataType:'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:formData,
                }).done(function(response){

                    alertify.success("Se actualizo el post con exito");
                    window.location="/blog/show/all"

                }).fail(function(error,status,statusText){
                    console.log(status);
                    alertify.error(error);
                    console.log(statusText);
                });
        });
    });
  </script>
{%endblock%}
