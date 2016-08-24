<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="images/capacitarte/logo.png">
	<link href="assets/css/bootstrap.min.css" rel='stylesheet'>
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/estilo.css">
  <link rel="stylesheet" media="all" href="/assets/css/alertify.core.css">
  <link rel="stylesheet" media="all" href="/assets/css/alertify.default.css">
	<!-- estilos para el slider -->
    <!-- Diseño de iconos -->
		<link rel="stylesheet" type="text/css" href="assets/css/slider/demo.css" />
		<!-- Diseño de los colores -->
    <link rel="stylesheet" type="text/css" href="assets/css/slider/style.css" />
    <!-- Ps nose que sea pero se ve feo sin el -->
    <link rel="stylesheet" type="text/css" href="assets/css/slider/custom.css" />
  <title>capacitARTE</title>
</head>
<body>
  <style media="screen">
    .slideIMG{
      width: 90%;
      margin-top: 12px;
    }
  </style>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="miNavbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/images/capacitarte/logo.png" alt="" class="img-responsive nav-inicio">
        </a>
      </div>

      <div class="collapse navbar-collapse navbar-right" id="navbar">
        <ul class="nav navbar-nav">
          <li class="nav-inicio"><a href="javascript:void(0)">INICIO</a></li>
          <li id="nav-nosotros"><a href="javascript:void(0)">NOSOTROS</a></li>
          <li id="nav-portafolio"><a href="javascript:void(0)">PORTAFOLIO</a></li>
          <li id="nav-equipo"><a href="javascript:void(0)">NUESTRO EQUIPO</a></li>
          <li id="nav-contacto"><a href="javascript:void(0)">CONTACTO</a></li>
          {% if nombre == '' %}
              <li id="login"><a data-toggle="modal" data-target="#modal_login">LOGIN</a></li>
          {% else %}
              <li id="login"><a href={{nombre_completo}}>{{nombre}}</a></li>
          {% endif %}
        </ul>
      </div>
    </div>
  </nav>
  <section class="alturaTop" id="inicio">
        <div class="modal fade" id="modal_login" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Iniciar Sesión</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" id="frm_login" action="login/login/show" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                          <input type="text" class="form-control" id="" name="username" placeholder="Usuario">
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                          <input type="password" class="form-control" id="" name="password" placeholder="Contraseña">
                        </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" id="entrar" class="btn btn-lg btn-primary-custom">
                        Entrar
                        &nbsp;
                        <i class="fa fa-arrow-right"></i>
                   </button>
                </div>
              </div>

            </div>
        </div>
		<div class="conatiner">
      <div class="col-md-6">
      </div>
		</div>
	</section>
  <section id="informacion">
    <div class="container">
      <div class="row">
        <div class="col-md-4 text-center">
          <div class="infoPanel wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.2s">
            <span class="fa fa-group fa-4x icon"></span>
            <h3>Nosotros</h3>
            <p>
              Somos una organización integrada por diferentes profesionales en Psicología, Nutrición, Marketing, enfocados al servicio y al desarrollo de talento humano de nuestros cómplices de negocio por medio de estrategias innovadoras de capacitación.
            </p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="infoPanel wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.6s">
            <span class="fa fa-balance-scale fa-4x icon"></span>
            <h3>¿Qué Buscamos?</h3>
            <p>
              Buscamos detonar procesos de bienestar individual y grupal en nuestros cómplices de negocio para generar cultura de salud, ya que estamos convencidos que de esta forma las organizaciones son más rentables en todos sus aspectos... EL NEGOCIO DEL BIENESTAR, ES EL BIEN ESTAR DEL NEGOCIO.
            </p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="infoPanel wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="1s">
            <span class="fa fa-flag-checkered fa-4x icon"></span>
            <h3>¿Qué Queremos?</h3>
            <p>
              Ser una organización sólida con profesionistas que viven en primera persona el bienestar, reconocidos y diferenciados por el anclaje de conocimientos. Queremos la transformación de conductas de nuestros cómplices de negocio y su bienestar organizacional, técnicas innovadoras.
            </p>
          </div>
        </div>
      </div>
      <!-- <hr id="divisorAbout"> -->
      <div class="row">
        <div class="col-xs-5">
          <hr>
        </div>
        <div class="col-xs-2">
          <img src="assets/images/capacitarte/logoGray.png" alt="" class="img-responsive" id="imgDiv">
        </div>
        <div class="col-xs-5">
          <hr>
        </div>
      </div>
      <div class="row">
        <div id="informacion-2">
          <div class="col-md-5">
            <div id="img-guia">
              <img src="assets/images/capacitarte/img.jpg" alt="" class="img-responsive wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.2s">
            </div>
          </div>
          <div class="col-md-7 text-justify">
            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
              <h2 id="info2-Titulo">¿Qué Nos Guía?</h2>
              <p id="info2-cuerpo">
                Constantemente revisamos que nuestro quehacer este en el marco de; LA ÉTICA: Actuamos congruentemente al saber, identificar y conocer a nuestros Cómplices de Negocio, para guiarlos profesionalmente en el logro de sus objetivos. EL SERVICIO: Empatizamos y comprendemos de forma activa a las personas en nuestro entorno, expresando nuestra mayor disposición en traducir sus deseos en satisfacciones y lo hacemos “bien”. EL COMPROMISO: Trabajamos diariamente en nuestra pasión de negocio buscando siempre la transformación personal, detonada en nuestros compañeros y Cómplices de Negocio al enfrentar retos y desafíos. LA INICIATIVA: Respondemos en lo cotidiano, con inversiones de acción para anticiparnos aun en circunstancias adversas, con soluciones. INTEGRIDAD: Vivimos la vida plenamente, con transparencia y respeto orientados siempre al bienestar y el equilibrio de nuestros diferentes escenarios de actuación.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row" hidden="hidden" id="cabecera_cursos">
        <div class="col-xs-4">
          <hr>
        </div>
        <div class="col-xs-4">
          <h2 id="info2-Titulo">Algunos de nuestros cursos</h2>
        </div>
        <div class="col-xs-4">
          <hr>
        </div>
      </div>
      <div class="row" hidden="hidden" id="body_cursos">
          <div class="contenedor col-md-4 hide">
              <div class="carta">
                  <div class="lado frente" style="background-image: url(assets/images/capacitarte/img.jpg); background-size: 700px,250px; background-repeat: no-repeat; background-position:cover;">
                      <h2 class="wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s"></h2>
                  </div>
                  <div class="lado atras">
                      <h3>Descripción</h3>
                      <section class="descripcion">
                      </section>
                  </div>
              </div>
          </div>
          <div class="contenedor col-md-4 col-md-offset-4 hide">
              <div class="carta">
                  <div class="lado frente" style="background-image: url(assets/images/capacitarte/img.jpg); background-size: 700px,250px; background-repeat: no-repeat; background-position:cover;">
                      <h2 class="wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="1s"></h2>
                  </div>
                  <div class="lado atras">
                      <h3>Descripción</h3>
                      <section class="descripcion">
                      </section>
                  </div>
              </div>
          </div>
          <div class="contenedor col-md-4 hide">
              <div class="carta">
                  <div class="lado frente" style="background-image: url(assets/images/capacitarte/img.jpg); background-size: 700px,250px; background-repeat: no-repeat; background-position:cover;">
                      <h2 class="wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1s"></h2>
                  </div>
                  <div class="lado atras">
                      <h3>Descripción</h3>
                      <section class="descripcion">
                      </section>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">

      </div>
    </div>
  </section>

  <section id="galeria">
    <div class="container">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-right" id="btns">
            <button type='button' class='btn btn-success btn-lg galleryActive wow fadeInDown' data-wow-delay='0.2s' id='btn-all'>
              TODO
            </button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="2s" id="gpoGaleria">

        </div>
      </div>
    </div>
  </section>

  <div class="container demo-1 wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.3s" id="equipo">
    <div id="slider" class="sl-slider-wrapper">
			<div class="sl-slider">

					<div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/edicion_antonio.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>José Antonio Torres Bustamante</h2>
							<blockquote>
                <p>
                  "El Tigre". Loquero de Profesión y Loco por diversión, Segundo al mando en la Organización, Profesional en Capacitación y Coach en Liderazgo. Va por la vida buscando hacer las cosas BIEN, por Amor y Convicción. Su comportamiento se rige principalmente por los valores: Lealtad, Responsabilidad e Integridad.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

					<div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/luisa.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>Ana Luisa García Méndez</h2>
              <blockquote>
                <p>
                  Si buscáramos la palabra "afabilidad", seguramente encontraríamos su nombre como referencia. Entrega, carisma y espontaneidad son las cartas de presentación de su trabajo como instructora de capacitación. Tiene un futuro prometedor por delante y un presente brillante en la empresa.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

					<div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/karem.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>Kareem Gibrán Valdez Zúñiga</h2>
              <blockquote>
                <p>
                  Psicólogo, apasionado de los deportes, amante de la literatura y concubino de la vida. La flexibilidad, creatividad y profesionalismo, son sus medios para cumplir metas propias y en conjunto. Disfruta su trabajo, su familia, sus logros y sobre todo, esas pequeñas inconsistencias de la vida; ese huevo sin sal, la llanta ponchada, la nómina traspapelada y la canción sin estribillo. Disfruta mucho las cosas que nos hacen recordar que estamos vivos.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

					<div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/edicion_wendy.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>Wendy Denise Martínez Martínez</h2>
              <blockquote>
                <p>
                  Directora de escena, psicóloga por entrega y pasión, desarrollo de habilidades de comunicación y divulgación de técnicas para hablar en público. Filosofía de vida: "Sí es posible para ti, es posible para mí, todo es cuestión de cómo."
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

					<div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/edicion_sol.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>María del Sol Sánchez Bustos</h2>
              <blockquote>
                <p>
                  Gerente de Finanzas, Mercadóloga por convicción, Administradora por naturaleza; representa una amalgama perfecta de carácter, inteligencia y belleza.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

          <div class="sl-slide bg-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/edicion_mixiari.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>Mixari Núñez Rosales</h2>
              <blockquote>
                <p>
                  Gestora de nacimiento, Guía con el corazón, Eficaz en la Integración de Equipo, Psicóloga por convicción. Patriota de nacimiento (15 de Septiembre), mortal leal y apasionada con lo que le gusta, la diversión y la responsabilidad la caracterizan, con gran apertura y adaptabilidad, una TODO TERRENO.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

          <div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/edicion_jorge.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>Jorge Muñetones Contreras</h2>
              <blockquote>
                <p>
                  Psicologoza-zo; sinónimo de aventura, pasión y aprendizaje, gran amor a la vida y a su profesión; pilar en casa y papá de una nena, conócelo y no te arrepentirás… más que de tener que escucharlo, bailar y que te ponga hacer Tabata.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

          <div class="sl-slide bg-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/edicion_jesus.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>JESUS ALEJANDRO ROSAS ALBA</h2>
              <blockquote>
                <p>
                  Director de la orquesta, Psicólogo por azares del destino y desarrollador del talento por causalidad. El Teatro y el buen café son dos cuestiones que él considera se deben respetar.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

          <div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco">
                <center>
                  <img src="assets/images/edicion_abel.jpg" alt="" class="img-circle img-responsive slideIMG">
                </center>
							</div>
							<h2>Abel González Viesca</h2>
              <blockquote>
                <p>
                  Nutricionista, enfocado en el balance y el “buen comer”, mal humorado por diversión y con gran capacidad para meter en cintura a los más renuentes. Su herramienta preferida es una bascula y su cintilla de medición. Detalle y análisis, son dos palabras que lo describen a la perfección.
                </p>
                <cite>CapacitARTE 2015</cite>
              </blockquote>
						</div>
					</div>

				</div>

				<nav id="nav-arrows" class="nav-arrows">
					<span class="nav-arrow-prev">Anterior</span>
					<span class="nav-arrow-next">Siguiente</span>
				</nav>

				<nav id="nav-dots" class="nav-dots">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
                    <span></span>
                    <span></span>
					<span></span>
					<span></span>
				</nav>

			</div>
    </div>

    <section id="contacto">
      <div class="container">
        <div class="row">
          <center>
            <h1><b class="wow fadeIn" data-wow-delay="0s" data-wow-duration="2s">Contacto</b></h1>
          </center>
          <div class="col-md-6">
            <div class="container" id="contactoEmail">
              <div class="row">
                <div class="col-md-12">
                  <form action="" class="form-horizontal">
                    <div class="form-group">
                      <label for="" class="sr-only">Nombre</label>
                      <input type="text" class="form-control wow fadeInDown" data-wow-delay="0.2s" data-wow-duration="1s" id="" placeholder="Escribe tu Nombre">
                    </div>
                    <div class="form-group">
                      <label for="" class="sr-only">E-Mail</label>
                      <input type="text" class="form-control wow fadeInDown" data-wow-delay="0.4s" data-wow-duration="1s" id="" placeholder="Escribe tu E-Mail">
                    </div>
                    <div class="form-group">
                      <label for="" class="sr-only">Comentario</label>
                      <textarea name="name" class="form-control wow fadeInDown" data-wow-delay="0.6s" data-wow-duration="1s" rows="6" placeholder="Escribe aquí tu Comentario"></textarea>
                    </div>
                  </form>
                  <div class="text-right">
                    <button type="button" name="button" class="btn btn-lg btn-cap wow fadeInDown" data-wow-delay="0.8s" data-wow-duration="1s" id="enviarComent">
                      <i class="fa fa-paper-plane"></i>
                      &nbsp;
                      Enviar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-2 text-center wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s">
            <span class="foot-icon">
              <i class="fa fa-envelope fa-2x"></i>
              <h4>contacto@capacitarte.mx</h4>
            </span>
          </div>
          <div class="col-md-2 text-center wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1s">
            <span class="foot-icon">
              <i class="fa fa-phone fa-2x"></i>
              <h4>01 87 17 12 68 27</h4>
            </span>
          </div>
          <div class="col-md-2 text-center wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1s">
            <span class="foot-icon">
              <i class="fa fa-facebook-square fa-2x"></i>
              <h4>/capacitarte.consultores</h4>
            </span>
          </div>
          <div class="col-md-3"></div>
        </div>
        <div class="row" id="pie">
          <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="0.8s" data-wow-duration="1s">
            capacitARTE<small>.mx</small><br>
            Todos los derechos reservados.<br>
            2015
          </div>
        </div>
      </div>
    </footer>

  <script src="assets/js/jquery.min.js" charset="utf-8"></script>
  <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
  <script src="assets/js/wow.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="/assets/js/alertify.js"></script>
  <!-- scripts para el slider -->
  <script type="text/javascript" src="assets/js/slider/modernizr.custom.79639.js"></script>
	<script type="text/javascript" src="assets/js/slider/jquery.ba-cond.min.js"></script>
	<script type="text/javascript" src="assets/js/slider/jquery.slitslider.js"></script>
  <script type="text/javascript" src="assets/js/slider/sliderControl.js"></script>
  <!-- script web -->
  <script src="assets/js/capacitarte.js" charset="utf-8"></script>
  <script src="assets/js/scrolling.js"></script>
  <script src="/assets/js/js/galleryEfect.js" charset="utf-8"></script>
</body>
</html>
