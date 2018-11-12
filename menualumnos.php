<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver mis asesorías</title>
    <link rel="stylesheet" href="css/ejemplo13bs.css">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="angular.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-verde fixed-top">
        <button type="button" class="navbar-toggler" data-toggle="collapse" 
        data-target="#nav-content" aria-control="nav-content"
            aria-expanded="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand">
            <h1 class="lead display-5">Ver Alumnos</h1>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="nav-content"></div>
        <ul class="navbar-nav">
        </ul>
        <form action="" class="form-inline" role="search">
            <div class="dropdown">
                <button id="usuario" class="btn btn-primary dropdown-toggle lead mx-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-user fa-fw"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                    <a href="a" class="dropdown-item lead">Cambiar de cuenta</a>
                    <a href="a" class="dropdown-item lead">Mi perfil</a>
                </div>
            </div>
            <div class="dropdown">
                <button id="acercade" class="btn btn-primary dropdown-toggle  lead" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-cog fa-fw"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acercade">
                    <a href="a" class="dropdown-item lead">Nuestra historia</a>
                    <a href="a" class="dropdown-item lead">Nuestro Equipo</a>
                    <a href="a" class="dropdown-item lead">Contacto</a>
                </div>
            </div>
        </form>
        </div>
    </nav>
    <div class="row justify-content-center filtros">
            <div class="alert alert-primary w-100 text-center">
            <h4 class="lead">
                Buscar: 
            <input type="text" name="busqueda" id="busqueda"placeholder="Buscar">  
La búsqueda puede ser por cualquier columna de la tabla!
<button class="btn btn-info ml-5" class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje"><i class="fa fa-question"></i></button>
<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">
                                        Ayuda del Sistema
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="mens">
                                  Para inscribirte en una asesoria sigue estos pasos: <br>
                                    1. Busca la asesoría de tu interés y selecciona el código <br>
                                    2. El código te llevará al horario de la asesoria <br>
                                    3. En la pantalla de horarios selecciona "Inscribirme" despúes de revisar los horarios
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </h4>
            </div>
        </div>
        <div class="row">
        <div class="alert alert-primary w-100 text-center">
            <h4 class="lead">
            Selecciona el código de la asesoria para ver el horario!
            </h4>
            </div>
        </div>
    <div class="container-fluid">
        <div class="row">
            <table class="table table-striped w-50" ng-app="myApp" ng-controller="customersCtrl">
                <thead class="justify-content-center">
                    <tr>
                        <th class="lead">NoControl</th>
                        <th class="lead">Contreseña</th>
                        <th class="lead">Nombre</th>
                        <th class="lead">Apellido_P</th>
                        <th class="lead">Apellido_M</th>
                        <th class="lead">Carrera</th>
                        <th class="lead">Semestre</th>
                        <th class="lead">Correo</th>
                        <th class="lead">Sexo</th>
                    </tr>
                </thead>
                <tbody ng-repeat="x in valores">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <button type="submit" value="" id="registrarbtn" class="btn btn-primary lead mx-4 mt-4">
            <i class="fas fa fa-mail-reply" onclick="window.location.href='menu2.html'"></i> Página anterior</button>
    </div>

    <script>
            app = angular.module('myApp',[]);
            app.controller('customersCtrl',function($scope,$http){
                $http.get("noti.php?id=0").then(function(response){
                    $scope.valores = response.data;
                })
            });
    </script>
</body>

</html>