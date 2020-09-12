<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Presentacion proyecto</title>
	<?php
		$url = Route::ctrRoute();

		echo '<link rel="icon" href="'.$url.'assets/images/logo.png">';
	?>

	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/table.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/style.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!--==============================================
	 DATA TABLE 
	================================================-->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/dataTable/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/dataTable/css/responsive.bootstrap.min.css">

	<script src="<?php echo $url; ?>assets/dataTable/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $url; ?>assets/dataTable/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>assets/dataTable/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo $url; ?>assets/dataTable/js/responsive.bootstrap.min.js"></script>
</head>
<body>

	<!--==============================================
	 NAVBAR 
	================================================-->

	<nav class="navbar">
		<div class="inner-width">
			<a href="/" class="logo"></a>
			<button class="menu-toggler">
			<span></span>
			<span></span>
			<span></span>
			</button>
			<div class="navbar-menu">
				<a href="#">Home</a>
				<a href="#actores">Actores</a>
				<a href="#tablas">Tablas</a>
				<a href="#normalizacion">Normalización</a>
				<a href="#diagrama">Diagrama</a>
				<a href="#backend">Back-end</a>
				<a href="#frontend">Front-end</a>
				<a href="#descripcion">Descripción</a>
				<a href="#sintesis">Síntesis</a>
			</div>
		</div>
	</nav>

	<!--==============================================
	 PARALLAX LAYERS 
	================================================-->

	<div class="layer-container">
		<div class="sky layer lax" data-lax-translate-y="0 1, 400 -100" ></div>
		<h1 class="parallax-text">PRESENTACIÓN <br> DEL PROYECTO</h1>
		<div class="montains layer lax"  data-lax-translate-y="0 1, 400 -260"></div>
		<div class="line lax" data-lax-opacity="0 1, 100 0"></div>
	</div>

	<!--==============================================
	 ACTORES 
	================================================-->

	<section class="actores lax" id="actores" data-lax-translate-y="0 0, 400 -300">
		<div class="heading">
			<h4>Presentación del Proyecto</h4>
			<h1 style="margin-bottom: 100px;">TeamOne</h1>
		</div>

		<div class="container course-row">
            <div class="course-left-col">
              <div class="course-text">
                    <h1>Definición de <br>actores.</h1>
                    <span class="square"></span>
                    <p>Los actores principales de nuestra empresa <strong>TeamOne</strong> son primordialmente aquellas personas emprendedoras e independientes o empresas que quieren ofrecer sus servicios a través de internet, por medio de aplicaciones web. Nuestro otro actor importante son las instituciones educativas, ya que nuestra empresa tiene un servicio de Learning Management System que busca ayudar a las instituciones educativas.</p>
              </div>
            </div>
            <div class="course-right-col">
                <img src="<?php echo $url; ?>assets/images/actores.svg" alt="">
            </div>
        </div>
	</section>

	<!--==============================================
	 ESTRUCTURA DE TABLA 
	================================================-->

	<section id="tablas">
		<div class="heading">
			<h2 style="color: #fff;">Estructura de tablas (base de datos)</h2>
		</div>

		<!--==============================================
		 TABLA DE USUARIOS 
		================================================-->
		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Usuarios</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableUsers dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Id_institucion</th>
							<th>Nombre</th>
							<th>Labor</th>
							<th>Grupo</th>
							<th>password</th>
							<th>Email</th>
							<th>Modo</th>
							<th>Foto</th>
							<th>Verificacion</th>
							<th>EmailEncriptado</th>
							<th>Session_actual</th>
							<th>En_linea</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

		<!--==============================================
		 TABLA DE INSTITUCIONES 
		================================================-->

		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Instituciones</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableInstitutions dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Nombre</th>
							<th>Logo</th>
							<th>Departamento</th>
							<th>Ciudad</th>
							<th>ubicacion</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

		<!--==============================================
		 TABLA DE BANDEJA DE ENTRADA 
		================================================-->

		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Bandeja de Entrada</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableInbox dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Id_usuario</th>
							<th>Nombre</th>
							<th>labor</th>
							<th>Para</th>
							<th>De</th>
							<th>Asunto</th>
							<th>Informacion</th>
							<th>Archivo</th>
							<th>Visto</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

		<!--==============================================
		 TABLA DE SUBIR TAREAS 
		================================================-->

		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Tareas</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableUploadTasks dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Id_usuario</th>
							<th>NombreMaestro</th>
							<th>labor</th>
							<th>Email</th>
							<th>TituloTarea</th>
							<th>Materia</th>
							<th>Descripcion</th>
							<th>Archivo</th>
							<th>Grupo</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

		<!--==============================================
		 TABLA DEL CHAT DEL GRUPO 
		================================================-->

		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Chat Grupal</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableChatGroup dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Id_usuario</th>
							<th>Nombre</th>
							<th>Foto</th>
							<th>Informacion</th>
							<th>Grupo</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

		<!--==============================================
		 TABLA DE LOS COMENTARIOS 
		================================================-->

		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Comentarios</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableComments dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Id_usuario</th>
							<th>Nombre</th>
							<th>Me_gustas</th>
							<th>Respuestas</th>
							<th>Comentarios</th>
							<th>Foto</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

		<!--==============================================
		 TABLA DE LAS REPUESTAS DE LOS COMENTARIOS 
		================================================-->

		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Respuestas de los Comentarios</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableAnswersComments dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Id_usuario</th>
							<th>id_comentario</th>
							<th>Nombre</th>
							<th>Comentario</th>
							<th>Foto</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

		<!--==============================================
		 TABLA DE LOS LIKES
		================================================-->

		<div class="content">
			<div class="box">
				<div class="box-header">
					<h3>Likes</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped tableLikes dt-responsive" width="100%">

						<thead>
						<tr>

							<th>Id</th>
							<th>Id_usuario</th>
							<th>Usuario</th>
							<th>id_comentario</th>
							<th>Fecha</th>

						</tr>
						</thead>

					</table>
				</div>
			</div>	
		</div>

	</section>

	<!--==============================================
	 Detalles de normalización. 
	================================================-->

	<div class="normalizacion" id="normalizacion">
		<div class="container course-row">
            <div class="course-left-col">
				<div class="course-text">
					<h1>Detalles de <br>normalización.</h1>
					<span class="square"></span>
					<p>Los detalles de esta normalización en la 1FN y 2FN fueron en las tablas de las tareas, el inbox, usuarios e instituciones con el atributo de usuario y en la 3FN se aplico mas que todo a tabla de instituciones haciendo referencia a la tabla de usuarios y ya el resto de las tablas como la de los comentarios, respuestas_comentarios, likes y chat_group, se normalizaron de tal manera que se evitara la repetición de datos haciendo referencia cada una a un usuario en general.</p>
				</div>
            </div>
            <div class="course-right-col">
                <img src="<?php echo $url; ?>assets/images/normalizacion.png" alt="" style="box-shadow: -1px -1px 10px 10px #333;">
            </div>
        </div>
	</div>

	<!--==============================================
	 DIAGRAMA. 
	================================================-->

	<div class="normalizacion" id="diagrama">
		<div class="container course-row">
            <div class="course-left-col">
				<img src="<?php echo $url; ?>assets/images/diagrama.png" alt="" style="width:100%;box-shadow: -1px -1px 10px 10px #333;">
            </div>
            <div class="course-right-col">
				<div class="course-text" style="margin: 0 60px;">
					<h1>Diagrama</h1>
					<span class="square"></span>
					<p>Este es el diagrama ER de nuestra empresa TeamOne</p>
				</div>
            </div>
        </div>
	</div>

	<!--==============================================
	 BACKEND. 
	================================================-->

	<div class="normalizacion" id="backend">
		<div class="container course-row">
            <div class="course-left-col">
				<div class="course-text">
					<h1>Back-end</h1>
					<span class="square"></span>
					<p>La explicación de este proceso es facil, simplemente necesitaba un formulario para obtener los datos del usuario, una vez el sistema tiene los datos, los envia a la base de datos, pero si y solo si no existe ya el registro en esta. Una vez esta registrado el usuario, el sistema envia un email al correo del usuario para que verifique su cuenta y pueda entrar al sistema sin problemas.</p>
				</div>
            </div>
            <div class="course-right-col">
                <img src="<?php echo $url; ?>assets/images/backend.png" alt="" style="box-shadow: -1px -1px 10px 10px #fff;">
            </div>
        </div>
	</div>

	<!--==============================================
	 FRONTEND. 
	================================================-->

	<div class="normalizacion" id="frontend">
		<div class="container course-row">
            <div class="course-left-col">
				<img src="<?php echo $url; ?>assets/images/frontend.png" style="width:100%;box-shadow: -1px -1px 10px 10px #333;" alt="">
            </div>
            <div class="course-right-col">
				<div class="course-text" style="margin: 0 60px;">
					<h1>Front-end</h1>
					<span class="square"></span>
					<p>La estructura de este proceso comenzo con un wireframe del sistema, comenzando por el header, los sections, el menu de navegación y por ultimo el footer, para poder tener una vista previa del sistema, una vez estaba esto listo, se paso a estructurar la pagina en html y css y con un poco de javaScript para poder darle al sistema un poco más de funcionalidades.</p>
				</div>
            </div>
        </div>
	</div>

	<!--==============================================
	 DESCRIPCION. 
	================================================-->

	<div class="normalizacion" id="descripcion">
		<div class="container course-row">
            <div class="course-left-col">
				<div class="course-text">
					<h1>Descripcion <br> del Proyecto</h1>
					<span class="square"></span>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste ut, nemo ipsa repellat nihil dolores perspiciatis. Voluptatum molestias, repudiandae dignissimos, facilis veniam molestiae ipsa, rerum adipisci repellat nam aliquid magni.</p>
				</div>
            </div>
            <div class="course-right-col">
                <img src="<?php echo $url; ?>assets/images/descripcion.svg" alt="" style="box-shadow: -1px -1px 10px 10px #333;">
            </div>
        </div>
	</div>

	<!--==============================================
	 SINTESIS. 
	================================================-->

	<div class="normalizacion" id="sintesis">
		<div class="container course-row">
            <div class="course-left-col">
				<img src="<?php echo $url; ?>assets/images/sintesis.svg" style="width:100%;box-shadow: -1px -1px 10px 10px #333;" alt="">
            </div>
            <div class="course-right-col">
				<div class="course-text" style="margin: 0 60px;">
					<h1>Sintesis <br> del Proyecto</h1>
					<span class="square"></span>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste ut, nemo ipsa repellat nihil dolores perspiciatis. Voluptatum molestias, repudiandae dignissimos, facilis veniam molestiae ipsa, rerum adipisci repellat nam aliquid magni.</p>
				</div>
            </div>
        </div>
	</div>

	<!--==============================================
	FOOTER 
	================================================-->
	
	<footer>
		<div class="inner-width">
		<div class="copyright">
			&copy; 2020 | Created & Designed By <a href="#">Brayan</a>
		</div>
		<div class="sm">
			<a href="#" class="fab fa-facebook-f"></a>
			<a href="#" class="fab fa-twitter"></a>
			<a href="#" class="fab fa-instagram"></a>
			<a href="#" class="fab fa-linkedin-in"></a>
			<a href="#" class="fab fa-youtube"></a>
		</div>
		</div>
	</footer>

	<!-- Go Top BTN -->
	<button class="goTop fas fa-arrow-up"></button>

	<!------- SCRIPT -------->
	<script src="<?php echo $url; ?>assets/js/lax.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/script.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableUsers.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableInstitutions.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableInbox.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableUploadTasks.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableChatGroup.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableComments.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableAnswersComments.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableLikes.js" type="text/javascript"></script>

</body>
</html>
