{%extends 'plantillas/baseBlog.php'%}
{%block title%}Bloggs{% endblock%}
{%block css%}
<link rel="stylesheet" media="all" href="/assets/CSS/css/publicaciones.css">
{%endblock%}

{%block contenido%}
<!--all contenido-->
<div class="container-fluid">
    <div class="row">
           <div id="loading" class="col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
            <div class="col-lg-8">
                <!--Image Card-->
                <!---Despliegue de cursos------->
            </div><!--fin col-lg-8-->
            <div class="col-lg-4 visible-lg">
                <div class="widget">
                    <ul class="nav nav-tabs tabs-3">
                        <li class="">
                            <a href="#reciente" data-toggle="tab" arial-expanded="false">Recientes</a>
                        </li>
                        <li class="">
                            <a href="#aleatorios" data-toggle="tab" arial-expanded="false">Aleatorios</a>
                        </li>
                    </ul>
                    <div class="tab-content card-panel">

                         <div id="reciente" class="tab-pane fade">
                            <div class="horizontal-listing">

                            </div>
                        </div><!--fin segunda pestaña-->
                         <div id="aleatorios" class="tab-pane fade">
                            <div class="horizontal-listing">

                            </div>
                        </div><!--fin tercera pestaña-->
                    </div>
                </div>
            </div>
    </div>
</div>
<!--fin contenido-->
{%endblock%}

{%block js%}
<script type="text/javascript" src="/assets/js/js/Create.js"></script>
<script type="text/javascript" >

    $(document).ajaxStart(function(){
        $("#loading").removeClass("hide");
    });
    $(document).ajaxStop(function(){
        $("#loading").addClass("hide");
    });
    $(document).on('ready',__init);


    function __init()
    {
        /*-----------------------------------
        | Variables Globales
        |------------------------------------
        | Esta son las variables que se utilizaran
        | a lo largo del actividad dentro de esta
        | seccion
        |-------------------------------------*/

            //---Esta variable  ayudará a evitar otras llamadas a ajax cuando no se requieren
            var finishCallAjax = true;

            //---Me contabiliza el numero de comentarios dentro del Post
            var contComment = 0;

            //---Esta variable ayudará a saber si ya se terminaron los comentarios dentro de ese post
            var finishComment = false;

        /*-----------------------------------
        | Carga de Contenido                 |
        |------------------------------------|
        | Inicializamos las funciones        |
        | para poder cargar el post          |
        | encontrar sus likes y comentarios  |
        ------------------------------------*/
            getLikes();
            findPost();
            getComment();

        //-------------------------------------

            //---- FUNCIONES -------//
        //-------------------------------------

        //--Function para encontrar el post que se escogio
        function findPost(){
            $.ajax({
            url:'/blog/postFind/encontrar',
            method:'POST',
            dataType:"JSON",
            cache:false
            }).done(function(response){
                console.log(response);
                $.each(response,function(i,o){
                    $("#img_post").attr("src","/"+o.src);
                    $("#titulo").text(o.titulo);
                    $("#contenido_post").text(o.contenido);
                    $("#created_at").text(" "+moment(o.created_at,"YYYYMMDD , h:mm:ss a").fromNow());
                });
            }).fail(function(error,status,statusText){
                console.log(error);
                console.log(status);
                console.log(statusText);
            });
        }
        //---End Function findPost


        //--Function  para obtner los likes del post

        function getLikes(){
            $.ajax({
                url:'/like/getLikes/all',
                method:'POST',
                dataType:"JSON",
                cache:false
            }).done(function(response){
                console.log(response);
                if(response[0].total > 0){
                    $("#like").text(response[0].total);
                    $("#like").addClass("badge green");
                    $("#like").removeAttr("hidden");
                }

            }).fail(function(error,status,statusText){
                console.log(error);
                console.log(status);
                console.log(statusText);
            });
        }
        //---End Function getLikes

        //--Cargar comentarios del post
        function getComment(){
            finishCallAjax = false;
            $.ajax({
                url:'/comentario/show/post',
                method:'POST',
                dataType:'JSON',
                cache:false
            }).done(function(response){
                finishCallAjax=true;
                finishComment=false;
                contComment=0;
                $("#comments").empty();
                $("#finishcomment").empty();
                $.each(response,function(i,comentario){
                    contComment++;
                    elemento.Comment.id=comentario.id;
                    elemento.Comment.contenido = comentario.contenido;
                    elemento.Comment.srcImage = comentario.src_imagen_perfil;
                    elemento.Comment.nombre_completo = comentario.nombre_completo;
                    elemento.Comment.fecha = " "+moment(comentario.fecha,"YYYYMMDD , h:mm:ss a").fromNow();
                    $("#comments").append(elemento.Comment.create());
                });

                $("#total-comment").text(contComment).addClass("badge");

            }).fail(function(error,status,statusText){
                console.log(error);
                console.log(status);
                console.log(statusText);
            });
        }
        //---End Function getComment

        //-------------------------------------

            //---- CLOUSHURES -------//
        //-------------------------------------

         //---Al momento de scrollear todos los post se cargan los faltantes
            $(window).scroll(function(e) {
                e.preventDefault();

	           if($(window).scrollTop() + $(window).height() == $(document).height()){
                   var lastComment = $("#comments").children().last().attr("data-id-comment");
                   var start = (lastComment == null || lastComment == undefined || lastComment == '') ? 0 : (parseFloat(lastComment)-1);
                   var limit = start + 5;
                   if(!finishComment){
                       if(finishCallAjax){
                           finishCallAjax=false;
                           $.ajax({
                               url:'/comentario/showMore/more-comments',
                               method:'POST',
                               dataType:'JSON',
                               data:{start:start,limit:limit},
                               cache:false
                           }).done(function(response){

                               if($.isArray(response)){
                                   contComment=0;
                                   $.each(response,function(i,comentario){
                                       if($.isPlainObject(comentario)){
                                           contComment++;
                                            elemento.Comment.id = comentario.id;
                                            elemento.Comment.contenido = comentario.contenido;
                                            elemento.Comment.srcImage = comentario.src_imagen_perfil;
                                            elemento.Comment.nombre_completo = comentario.nombre_completo;
                                            elemento.Comment.fecha = " "+moment(comentario.fecha,"YYYYMMDD , h:mm:ss a").fromNow();
                                            var lastComment2 = $("#totComentarios").children().last().attr("data-id-comment");
                                           console.log(lastComment2+'-'+comentario.id);
                                            if(lastComment2 != comentario.id)
                                                $("#comments").append(elemento.Comment.create());
                                       }
                                    });
                                   var commentTot = $("#total-comment").text();
                                   if(commentTot != "")
                                        $("#total-comment").text(parseFloat(commentTot)+contComment).addClass("badge");
                                   finishCallAjax=true;
                               }
                               else{
                                    finishComment = true;
                                    var $message = $("<h5/>").css({
                                        'text-align':'center',
                                        'padding-top':'10px',
                                        'padding-bottom':'10px',
                                        'margin-top':'15px',
                                        'border':'solid 2px grey',
                                        'opacity':'.5'
                                    });
                                    $("#finishcomment").append($message.text("Final de comentarios"));
                               }
                           }).fail(function(error,status,statusText){
                                console.log(error);
                                console.log(status);
                                console.log(statusText);
                           });
                        }
                   }

                }
            });
            //--Al darle like en el btn_like se registrará un like al post
            $("#btn_like").click(function(){

                $.ajax({
                    url:'/like/setLikes/all',
                    method:'POST',
                    dataType:"JSON",
                    cache:false
                }).done(function(response){
                    console.log(response);
                    if($.isArray(response)){
                        $("#like").addClass("badge green");
                        $("#like").removeAttr("hidden");
                        $("#like").text(response[0].total);
                    }
                }).fail(function(error,status,statusText){
                    console.log(error);
                    console.log(status);
                    console.log(statusText);
                });
            });

            //--Al dar click en comentar se registra el comentario para el post
            $("#comentar,#comentar-lg").click(function(){

                $.ajax({
                    url:'/comentario/save/save-comment',
                    method:'POST',
                    dataType:'JSON',
                    cache:false,
                    data:{contenido:$("#comentario").val()}
                }).done(function(response){
                    $("#comentario").val('');
                    getComment();
                }).fail(function(error,status,statusText){
                    console.log(error);
                    console.log(status);
                    console.log(statusText);
                });
            });


            moment().calendar('es', {
                sameDay: '[Hoy]',
                nextDay: '[Mañana]',
                nextWeek: 'dddd',
                lastDay: '[Ayer]',
                lastWeek: '[Last] dddd',
                sameElse: 'DD/MM/YYYY'
            });
            document.getElementById("pruebas").innerHTML = " "+moment("07-03-2016 18:00:01","DDMMYYYY , h:mm:ss a").fromNow();
            document.getElementById("pruebas1").innerHTML = " "+moment("15-02-2016 18:00:01","DDMMYYYY , h:mm:ss a").fromNow();
            document.getElementById("pruebas2").innerHTML = " "+moment("08-03-2016 00:14:10","DDMMYYYY , h:mm:ss a").fromNow();
    }
</script>
{%endblock%}
