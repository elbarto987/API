<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>DOCUMENTACION API</title>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">DOCUMENTACION DE LA API</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 border border-dark m-3 p-2  bg-info">
                <h3 class="text-center">METODO GET</h3>
                <p class="lead mx-5">END-POINTS</p>
                <p class="border border-dark p-2"><strong>/usuarios?page<br>Retorno: Array con todos los usuarios</strong></p>
                <p class="border border-dark p-2"><strong>/usuarios?id=(id del usuario)<br>Retorno: Array con todos los datos del usuario el cual corresponde al id</strong></p>
                <p class="border border-dark p-2"><strong>/usuarios?parametro=(parametro de busqueda en todas las filas de la base de datos)<br>Retorno: Array con todos los datos encontrados en la busqueda</strong></p>
                <p class="border border-dark p-2"><strong>/usuarios?filtro=(nombre de la columna donde se desea buscar)&& parametro(parametro de busqueda)<br>Retorno: Array con todos los datos encontrados en la busqueda</strong></p>
            </div>
            <div class="col-12  border border-dark m-3 p-2  bg-success">
                <h3 class="text-center">METODO POST</h3>
                <p class="lead mx-5">JSON requerido</p>
                <p class="lead mx-5">/usuarios</p>
                <div class="row mx-5">
                    <div class="col-12">
                    <p class="lead"><strong>[<br>
                    &nbsp &nbsp<strong>{</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"nombreUsuario":"Miguel Angel", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"apellidoUsuario":" Suarez Sanchez", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"edadUsuario":"000000", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"fotoUsuario":"5555555", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"tipoDocumentoUsuario":"2000-2-20", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"numeroDocumentoUsuario":"2020202020", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"userId_rol":"000000000" =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp<strong>}</strong><br>
                    <strong>]<br>Retorno: id de usuario creado o mensaje de error 500 [error interno del servidor]  si no se pudo guardar</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-12 border border-dark m-3 p-2 bg-warning">
                <h3 class="text-center">METODO PUT</h3>
                <p class="lead mx-5">JSON requerido</p>
                <p class="lead mx-5">/usuarios</p>
                <div class="row mx-5">
                    <div class="col-12">
                    <p class="lead"><strong>[<br>
                    &nbsp &nbsp<strong>{</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"idUsuario":"26", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"nombreUsuario":"Miguel Angel", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"apellidoUsuario":" Suarez Sanchez", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"edadUsuario":"000000", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"fotoUsuario":"5555555", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"tipoDocumentoUsuario":"2000-2-20", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"numeroDocumentoUsuario":"2020202020", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"userId_rol":"000000000" =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp<strong>}</strong><br>
                    <strong>]<br>Retorno: numero '1' si el usuario fue modificado o mensaje de error 500 [error interno del servidor] si no se pudo actualizar</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-12 border border-dark m-3 p-2 bg-danger">
                <h3 class="text-center">METODO DELETE</h3>
                <p class="lead mx-5">JSON requerido</p>
                <p class="lead mx-5">/usuarios</p>
                <div class="row mx-5">
                    <div class="col-12">
                    <p class="lead"><strong>[<br>
                    &nbsp &nbsp<strong>{</strong><br>
                    &nbsp &nbsp &nbsp &nbsp<strong>"id":"26", =>(Campos Requerido)</strong><br>
                    &nbsp &nbsp<strong>}</strong><br>
                    <strong>]<br>Retorno:  numero '1' si el usuario fue eliminado o mensaje de error 500 [error interno del servidor]  si no se pudo eliminar</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/bootstrap.min.js"></script>
</html>