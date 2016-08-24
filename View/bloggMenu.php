{%extends 'plantillas/baseBlog.php'%}
{%block title%} Cursos {% endblock%}
{%block css%}
<link rel="stylesheet" media="all" href="/assets/css/css/blogMenu.css">
<link rel="stylesheet" media="all" href="/assets/css/dropzone.css">
{%endblock%}

{%block contenido%}
  <div class="container-fluid" id="contenidoBlog">

    <div class="pagePosts">
      <!---<div class="row">
        <div class="col-md-3 col-md-offset-6 text-right">
          <label for="">Buscar Curso</label>
          <input type="text" name="name" value="" placeholder="Titulo del Curso" class="form-control">
        </div>
      </div> -->

      <div class="row" id="contPost" data-rol={{role}}>
        {% if role == 'administrador' %}
            <div class="col-xs-6 col-md-4">
              <div class="card-post text-center" id="addPost">
                <center>
                  <div>
                    <label><span class="fa fa-plus" style="color:gray;"></span></label>
                  </div>
                  <h4><b>Añadir Curso</b></h4>
                </center>
              </div>
            </div>
        {% endif %}
        <div class="posters">

        <!-- ./Aqui se iran añadiendo los cursos dinamicamente -->
        </div>

      </div>
    </div>

    <div class="pageAdd" hidden="hidden">
        <div class="form-group">
          <label for="">Titulo del curso</label>
          <input type="text" name="titulo" class="form-control" id="titulo">
        </div>
        <div class="form-group">
            <label for="">Fecha Inicio </label>
          <input type="date" name="fecha_inicio" class="form-control col-md-12" id="fecha_inicio">
        </div>
        <div class="form-group">
            <label for="">Fecha Fin </label><br>
          <input type="date" name="fecha_fin" class="form-control col-md-12" id="fecha_fin">
        </div>
        <div class="form-group">
          <label for="">Descripción</label><br>
          <textarea name="content" id="content" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label>Elegir Imagen de Portada</label><br>
          <button type="button" class="btn btn-info btn-inline" id="selectFile">
            Seleccionar Imagen
          </button>
          <img id="image-curso" style="width:300px; height:300px; margin:10px; margin-left:20px; border-radius:5px;" class="hide">
          <input type="text" name="name" value="" class="form-control" placeholder="No se ha seleccionado imagen" disabled>
          <form id="frm_post"  enctype="multipart/form-data">
              <input type="file" id="img-curso" accept="image/gif,image/jpeg,image/png" style="display:none;"  name="file" >
          </form>
          <label>Archivos para el curso</label>
          <div id="files_curso" class="hide"  style="background:rgba(221, 211, 211, 0.8); color:#000; border:none;">

          </div>
          <form id="my-dropzone" enctype="multipart/form-data" method="POST" class="dropzone col-md-12" style="background:rgba(221, 211, 211, 0.8); color:#000; border:none;" >

            <div class="fallback">
                <input type="file" class="fallback"  name="file" id="file">

            </div>
            <div class="dz-message"> Suelta tus archivos aqui..</div>
                  <h4>Total de archivos cargados: <b id="toload">0</b></h4>
                  <h4 id="progress"></h4><h4 id="bytesSent"></h4>
                  <button hidden="hidden" id="subirJuego" class="btn btn-primary" type="button" style="margin-left:300px;"><i class="fa fa-upload"></i> Subir Archivo</button>
             <div class="dropzone-previews"></div>
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
{% endblock %}

{% block js %}
 <script type="text/javascript" src="/assets/js/js/Create.js"></script>
 <script type="text/javascript" src="/assets/js/dropzone.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        var idCurso;

      $(".posters").on('click','button[name=btn-view]',function(event) {
          var $element = this;
         $.ajax({
             url:'/curso/setIdCurso/buscarPost',
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
        clearFrmCurso();
        $(".pageAdd").attr('hidden', 'hidden');
        $("#files_curso").addClass('hide');
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
            $("#img-curso").trigger('click');
            var file_in = document.querySelector("#img-curso");
            file_in.onchange = function(e){
                var files = e.target.files;
                var reader = new FileReader();
                reader.addEventListener("load",displayFileInfo,false);
                for(var i=0,f;f= files[i];++i){
                    console.log(f.name);
                    $("input[name=name]").attr('placeholder',"Nombre de la imagen: "+f.name + " Peso: "+f.size+"KB");
                    if(f.type.match(/image.*/i)){
                       reader.readAsDataURL(f);
                       continue;
                    }
                    reader.readAsText(f);
                }
            }

        });
        function displayFileInfo(e){
            var resultado = e.target.result;
            var image = $('#image-curso');
            if(resultado.indexOf(' ') < 1){
                image.attr('src',resultado);
                image.removeClass('hide');
            }
        }


        $("#send").click(function(){
             if(alertify.confirm("Deseas guardar asi el curso")){
                 var formData = new FormData($("#frm_post")[0]);
                 formData.append('nombre',$("#titulo").val());
                 formData.append('descripcion',$("#content").val());
                  formData.append('fecha_inicio',$("#fecha_inicio").val());
                  formData.append('fecha_fin',$("#fecha_fin").val());

                 $.ajax({
                    url:'/curso/save/guardar-curso',
                    method:'POST',
                    dataType:'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:formData,
                    beforeSend: function(){
                        $("#send").prop('disabled',true);
                        $("#send").text('Guardando...');
                        alertify.log("Los archivos del curso se estan guardando");
                        $("#subirJuego").trigger('click');
                    },
                }).done(function(response){
                    alertify.success("El curso se guardo con exito");
                    //window.location="/blog/show/all";

                }).fail(function(error,status,statusText){
                    console.log(status);
                    console.log(error);
                    console.log(statusText);
                }).always(function(){
                    $("#send").prop('disabled',false);
                    $("#send").text('Guardar');
                 });
             }
        });
        $("#files_curso").on('click','#delete-file',function(){
            $.ajax({
                url:'/curso/deleteFiles/borrar-archivo',
                method:'POST',
                dataType:'JSON',
                data:{id:$(this).attr('data-id')}
            }).done(function(response){
                if(response.status)
                    alertify.success("El archivo fue eliminado");

                    getFilesCurso(idCurso);
                }).fail(function(error,status,statusText){
                    console.log(status);
                    console.log(error);
                    console.log(statusText);
                });
        });

        $("#files_curso_modal").on('click','#view-file',function(){
            window.location=$(this).attr('data-route');
        });

        cargarCursos();

        function cargarCursos(){
            $.ajax({
                url:'/curso/showMe/cursos-actuales',
                method:'POST',
                dataType:"JSON",
                cache:false
            }).done(function(response){
                $(".pagePosts > #contPost .posters").empty();
                $.each(response,function(index,object){
                    elemento.Curso.id=object.id;
                    elemento.Curso.nombre=object.nombre;
                    elemento.Curso.descripcion=(object.descripcion);
                    elemento.Curso.ruta="/"+object.src;
                    elemento.Curso.fecha_inicio= object.created_at;
                    elemento.Curso.fecha_fin= object.fecha_fin;
                    if($("#contPost").attr('data-rol') == "administrador")
                        $(".pagePosts > #contPost .posters").append(elemento.Curso.create());
                    else
                        $(".pagePosts > #contPost .posters").append(elemento.Curso.createGeneral());
                });
            }).fail(function(error,status,statusText){
                console.log(error);
                alertify.error(error.responseText.error);
                console.log(status);
                console.log(statusText);
            });
        }
        $(".pagePosts > #contPost .posters").on("click","button[name=btn-disabled]",function(){
            var element_delete = this;
            alertify.confirm("¿Seguro que deseas eliminarlo?",function(e){
                if(e){
                        $.ajax({
                            url:'/curso/disabled/deshabilitar-post',
                            method:'POST',
                            dataType:'JSON',
                            data:{id:$(element_delete).attr('data-id-curso')},
                            cache:false
                        }).done(function(response){
                            console.log(response);
                            alertify.success("El curso se elimino con exito");
                            cargarCursos();

                        }).fail(function(error,status,statusText){
                            console.log(error);
                            console.log(status);
                            console.log(statusText);
                        });
                }
            });
        });
        $(".pagePosts > #contPost .posters").on("click","button[name=btn-refresh]",function(){
            idCurso = $(this).attr('data-id-post');
            $("#titulo").val($(".posters #title_post_"+idCurso).text());
            $("#content").val($(".posters #content_post_"+idCurso).attr('title').replace("Comentario:",""));
            $("#send").attr('hidden','hidden');
            getFilesCurso(idCurso);
            $("#fecha_inicio").val(moment(fecha_inicio).format('YYYY-MM-DD'));
            $("#fecha_fin").val(moment(fecha_fin).format('YYYY-MM-DD'));
            $("#update").removeAttr('hidden');
            $(".pagePosts").fadeOut('slow');
            $(".pageAdd").removeAttr('hidden');

        });
        $(".pagePosts > #contPost .posters").on("click","button[name=btn-view-file]",function(){
            idCurso = $(this).attr('data-id-curso');
            $.ajax({
                url:'/curso/getFiles/Obtener-archivos',
                method:'POST',
                dataType:'JSON',
                data:{'id':idCurso}
            }).done(function(response){
                console.log(response);
                if(response.status == '403')
                    alertify.alert("Aun no te haz unido a este curso. Comunicate con el administrador");
                else{
                    getFilesCursoModal(idCurso);
                    $("#modal_files_curso").modal('show');
                }
            }).fail(function(error){
                console.log(error);
            });
        });
        function getFilesCursoModal(id_Curso){
                $.ajax({
                    url:'/curso/getFilesCursos/obtener-cursos',
                    method:'POST',
                    dataType:'JSON',
                    data:{id:id_Curso}
                }).done(function(response){
                    console.log(response);
                    if(response.status == 200){
                        var jsonResponse = JSON.parse(response.files);
                    }
                    console.log(jsonResponse);
                    var filesCurso = {
                            create: function(name,id,ruta){
                                return '<div class="col-md-4">'+
                                          '<image src="/assets/files/cursos/fileCurso.png" class="col-md-12"></image><br>'+
                                          '<label class="col-md-12" style="word-wrap:brake-word">'+name+'</label>'+
                                          '<button class="btn btn-info col-md-12" id="view-file" data-id='+id+' data-route='+ruta+'>Ver</button>'+
                                      '</div>'
                            }
                        }
                    $("#files_curso_modal").empty();
                    $.each(jsonResponse,function(index,file){
                        $("#message_not_files").addClass("hide");
                        $("#files_curso_modal").append(filesCurso.create(file.nombre,file.id,'/'+file.ruta));
                    });
                }).fail(function(error){
                    console.log(error);
                });
            }
        function clearFrmCurso(){
            $("#titulo").trigger('reset');
            $("#content").trigger('reset');
            $("#fecha_inicio").trigger('reset');
            $("#fecha_fin").trigger('reset');
            $("#image-curso").attr('src','');
            $("#image-curso").addClass('hide');
            $("input[name=name]").attr('placeholder',"Seleccionar una imagen");
        }
        function getFilesCurso(id_Curso){
            $.ajax({
                url:'/curso/getFilesCursos/obtener-cursos',
                method:'POST',
                dataType:'JSON',
                data:{id:id_Curso}
            }).done(function(response){
                console.log(response);
                if(response.status == 200){
                    var jsonResponse = JSON.parse(response.files);
                }
                console.log(jsonResponse);
                var filesCurso = {
                        create: function(name,id,ruta){
                            return '<div class="col-md-2">'+
                                      '<image src="/assets/files/cursos/fileCurso.png" class="col-md-12"></image><br>'+
                                      '<label class="col-md-12">'+name+'</label>'+
                                      '<button class="btn btn-danger" id="delete-file" data-id='+id+' data-route='+ruta+'>Eliminar</button>'+
                                  '</div>'
                        }
                    }
                $("#files_curso").empty();
                $.each(jsonResponse,function(index,file){
                    $("#files_curso").append(filesCurso.create(file.nombre,file.id,file.ruta));
                });
                $("#files_curso").removeClass('hide');
            }).fail(function(error){
                console.log(error);
            });
        }
        $("#update").click(function(){
            alertify.confirm("¿Realmente deseas actualizar estos campos?",function(e){
                if(e){
                    var formData = new FormData($("#frm_post")[0]);
                    formData.append('nombre',$("#titulo").val());
                    formData.append('descripcion',$("#content").val());
                    formData.append('fecha_inicio',$("#fecha_inicio").val());
                    formData.append('fecha_fin',$("#fecha_fin").val());
                    formData.append('id',idCurso);
                     $.ajax({
                        url:'/curso/update/update-curso',
                        method:'POST',
                        dataType:'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data:formData,
                        beforeSend:function(){
                             $("#update").prop('disabled',true);
                             $("#update").text('Actualizando...');
                             alertify.log("Los archivos del curso se estan guardando");

                             $("#subirJuego").trigger('click');

                        }
                    }).done(function(response){
                        alertify.success("Se actualizo el curso con exito");
                        cargarCursos();
                        $("#btnAddCancel").trigger('click');

                    }).fail(function(error,status,statusText){
                        console.log(status);
                        alertify.error(error);
                        console.log(statusText);
                    }).always(function(){
                        $("#update").prop('disabled',false);
                        $("#update").text('Actualizar');
                    });
                }
            });

        });
        var fileAdded;
        Dropzone.options.myDropzone = {
            url: '/curso/uploadFileCourse/subir-archivos',
            autoProcessQueue : false,
            uploadMultiple:true,
            maxFiles:10,
            addRemoveLinks:true,
            maxFilesize:10000000,//MB
            success: function(file, response){
                getFilesCurso(idCurso);
            },
            init:function(){
                var submitButton = document.querySelector('#subirJuego');
                myDropzone=this;

                submitButton.addEventListener("click",function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                var addedfile = false;
                this.on('addedfile',function(file){
                        fileAdded=file;
                        //Evento al agregar un archivo
                        var toload = $("#toload").text();
                        var total = parseFloat(toload) + 1;
                        $("#toload").text(total);

                        $("#removeFile").attr('disabled',false);
                });
                this.on('complete',function(file){
                    //Evento al completar la carga
                    $("#subirJuego").prop('disabled',false);
                    myDropzone.removeFile(file);
                    $("#toload").text(0);
                    $("#subirJuego").empty();
                    $("#subirJuego").append("<i class='fa fa-upload'></i> Subir Juego");

                });
                this.on("removedfile",function(file){
                    var toload = $("#toload").text();
                    var total = parseFloat(toload) - 1;
                    $("#toload").text(total);
                });
                this.on("maxfilesexceeded",function(file){
                    alertify.log("El Archivo "+ file.name +" demasiado grande");
                });
                this.on('success',function(file, response){
                    $("#subirJuego").prop('disabled',false);
                    $("#bytesSent").text("");
                    $("#progress").text("");

                });

                this.on('sending',function(files,xhr,formData){
                    $("#subirJuego").prop('disabled',true);
                    $("#removeFile").attr('disabled',true);
                    formData.append('id', idCurso);
                    $("#subirJuego").text('Subiendo archivo...');
                });

            },
            uploadprogress: function(file, progress, bytesSent) {
                // Display the progress
                file.upload = {
                      progress: progress,
                      total: file.size,
                      bytesSent: bytesSent
                    };
                $("#bytesSent").text(bytesSent+"KB");
                $("#progress").text(progress+"%");
            }


        }
    });
  </script>
{%endblock%}

