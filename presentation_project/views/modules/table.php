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
                        <th>Acceso</th>
                        <th>Nombre</th>
                        <th>Labor</th>
                        <th>Grupo</th>
                        <th>password</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Verificacion</th>
                        <th>EmailEncriptado</th>
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
                <h3>Solicitudes LMS</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tableRequests dt-responsive" width="100%">

                    <thead>
                    <tr>

                        <th>Id</th>
                        <th>Id_usuario</th>
                        <th>Id_institucion</th>
                        <th>Nombre</th>
                        <th>labor</th>
                        <th>Mensaje</th>
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
                        <th>Id_institucion</th>
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