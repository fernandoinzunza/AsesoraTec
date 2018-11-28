<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Agregar asesoría</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/AgregarAsesoria.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <script src=""></script>
</head>

<body>
    <div class="page-header pb-2 pt-2">
        <h1 class="lead display-3 justify-content-center">Agregar una asesoría
            <img src="agregar.png" alt="Login">
        </h1>
    </div>
    
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
            
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información de la asesoría:
                    </p>
                </div>
                <div class="control row ml-5 pl-2  text-white">
                    Tipo Asignatura:
                </div>
                <div class="row  justify-content-center">
                    <div class="row" id="tip">
                        <select name="" id="tipo" class="lead" tabindex="1">
                        <option value="Ciencias Básicas">Ciencias Básicas</option>
                        <option value="Asignatura de la Carrera">Asignatura de la Carrera</option>
                        <option value="Asignatura Equivalentes">Asignatura Equivalentes</option>
                        <option value="Económico Administrativo">Económico Administrativo</option>
                        </select>
                    </div>
                </div>
                <div class="control row ml-5 pl-2  text-white">
                    Código:
                </div>
                <div class="row  justify-content-center">
                    <div class="row" id="co" tabindex="2">

                    </div>
                </div>
                <div class="row ml-5 pl-2 mt-3 text-white">
                    Nombre Asesoría:
                </div>
                <div class="row  justify-content-center">
                    <div class="row" id="nom" tabindex="3">
                        
                    </div>
                </div>
                <div class="row ml-5 pl-2 mt-3 text-white">
                    Semestre:
                </div>
                <div class="row  justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="semestre" placeholder="Semestre" value="1" readonly tabindex="4">
                    </div>
                </div>
                
                <div class="row  mt-4  justify-content-center">
                        <p class="lead mx-2">Agregar asesor *Opcional*:
                        </p>
                    </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="asesor" placeholder="Alumno a Impartir" tabindex="5">
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="nocontrol" placeholder="Numero de control" tabindex="6">
                    </div>
                </div>
                <br>
            </div>
            
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
    <h1 id="titulo_tabla">Horario: </h1> 
    </div>
    <table class="table	">
        <thead class="encabezado">
            <tr>
            <th class="lead"></th>
            <th class="lead">Lunes</th>
            <th class="lead">Martes</th>
            <th class="lead">Miercoles</th>
            <th class="lead">Jueves</th>
            <th class="lead">Viernes</th>
            </tr>
        </thead>
        <tr>
            <td>Horario</td>
            <td><input type="text" name="" id="h1" tabindex="7"></td>
            <td><input type="text" name="" id="h2" tabindex="9"></td>
            <td><input type="text" name="" id="h3" tabindex="11"></td>
            <td><input type="text" name="" id="h4" tabindex="13"></td>
            <td><input type="text" name="" id="h5" tabindex="15"></td>
        </tr>
        <tr>
            <td>Salon</td>
            <td><input type="text" name="" id="s1" tabindex="8"></td>
            <td><input type="text" name="" id="s2" tabindex="10"></td>
            <td><input type="text" name="" id="s3" tabindex="12"></td>
            <td><input type="text" name="" id="s4" tabindex="14"></td>
            <td><input type="text" name="" id="s5" tabindex="16"></td>
        </tr>
    </table>
        <div class="row justify-content-center">
                <input type="submit" value="Agregar asesoría" tabindex="17" id="registrarbtn" class="form-control btn btn-primary"
                    data-toggle="modal" data-target="#mensaje">
                <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalLabel">
                                    Mensaje del Sistema
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="mens">
                                Asesoría agregada a la lista
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                </div>
            </div>
           
    </div>
    <div class="row justify-content-end">
                <button type="button" tabindex="17" class="mt-2 mr-5 btn btn-primary navegacion" style="border:0; background-color:transparent;cursor:pointer;"
                    value="" data-toggle="tooltip" title="Página anterior" onclick="window.location.href='menu2.php'"><img
                        class="hola" src="css/return.png"></button>
            </div> 
</body>

</html>