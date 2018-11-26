<!DOCTYPE html>
<html lang="en">
    <?php 
    session_start();
    if(empty($_SESSION['nocontrol']))
    {
        header("Location: login.php");
    }
    require_once('php/Clases/alumno.php');
    $alumno = new Alumno();
    $nocontrol = $_SESSION['nocontrol'];
    $alumno->ObtenerDatos($nocontrol,$alumno);
    $nombre = $alumno->Nombre;
    $pass = $alumno->Contraseña;
    $correo= $alumno->Correo;
    $appat = $alumno->Ap_Pat;
    $apmat = $alumno->Ap_Mat;
    $sexo = $alumno->Sexo;
    $semestre = $alumno->Semestre;
    $carrera = $alumno->Carrera;
    ?>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi perfil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/miperfil.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/ModificarDatos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="js/mensaje.js"></script>
</head>
<body>
    <div class="row justify-content-center">
        <img src="banner.png" alt="" class="w-100" style="border:3px solid gray; height:100px">
    </div>
    <div class="page-header pb-2 pt-2 row justify-content-center">
            <h1 class="lead display-3 justify-content-center">Ver mi perfil <img src="asesor.png" alt="Login"></h1>
    </div>        
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información de la cuenta:
                    </p>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo $nocontrol?>" class="cajas lead" id="nocontrol" readonly placeholder="Número de control"maxlength=8 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="password"  value="<?php echo $pass?>" class="cajas lead  ml-4" id=pass placeholder="Contraseña"maxlength=20 required>
                        <a class="btn btn-success" onclick="mostrar()"><i class="ojo fas fa fa-eye fa-fw"></i></a>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text"  value="<?php echo $appat?>" class="cajas lead"id="appat" placeholder="Apellido Paterno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo $apmat?>" class="cajas lead" id="apmat" placeholder="Apellido Materno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                        <input type="text" value="<?php echo $nombre?>" class="cajas lead" id="nombre" placeholder="Nombre"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                 <input type="e-mail" value="<?php echo $correo?>" id="correo" class="cajas lead"maxlength=128 placeholder="Correo"required>
                    </div>
                </div>
              
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="radio" name="sexo" id="hombre" <?php ?> class="radio my-2 mx-3 lead">
                        <label for="hombre" class="radio lead">Hombre</label>
                        <input type="radio" name="sexo" id="mujer" class="radio my-2 mx-3 lead">
                        <label for="mujer" class="radio lead">Mujer</label>
                        <input type="radio" name="sexo" id="ninguno" class="radio my-2 mx-3 lead">
                        <label for="No binario" class="radio lead">No binario</label>
                    </div>
                </div>
                <script language="javascript">
                var hombre = document.getElementById('hombre');
                var mujer = document.getElementById('mujer');
                var ninguno = document.getElementById('ninguno');
                var sexo = '<?php echo $sexo ?>';
                if(sexo=="Hombre")
                hombre.checked=true;
                else if(sexo=="Mujer")
                mujer.checked = true;
                else if(sexo=="No binario")
                ninguno.checked=true;
                </script>

            </div>
        </div>
    </div>
    <div class="container mt-3 forma">
        <div class="row" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead">Información del usuario:
                    </p>
                </div>
                <div class="row justify-content-center">
                    <div class="row my-2 ">
                        <select id="carrera" value="<?php echo $carrera?>" class="lead">
                          <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>
                        </select>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="row">
                            <input type="text" value="<?php echo $semestre?>" class="cajas lead"maxlength=2 id="semestre"placeholder="Semestre" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2 mt-2 container w-100">
        <div class="row  justify-content-center">
            <input type="submit" value="Guardar"  id="guardarbtn"class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal" onclick="window.location.href='menu1.php'">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
     </div>
     
    </body>
 
<script>
  function mostrar(){
      var tipo = document.getElementById("pass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
</html>