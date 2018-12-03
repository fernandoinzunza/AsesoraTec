<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('php/Clases/admin.php');
require_once('php/Clases/conexion.php');
if($_SESSION['usuariologeado']!='SI'){
    header("Location: login.php");
}
if(empty($_GET['cod']))
{
    header("Location: menumaterias.php");
}

$admin = new Admin();
$usuario= $_SESSION['usuario'];
$admin->ObtenerDatos($usuario,$admin);
$nc = $admin;
$nombre = $admin->Nombre;
$appat = $admin->Ap_Pat;
$apmat = $admin->Ap_Mat;
$nombrecompleto = $nombre." ".$appat." ".$apmat;

$codigo = $_GET['cod'];
$sql = "SELECT Codigo,Nombre,Tipo,Semestre FROM materias WHERE Codigo='$codigo'";
$conn = abrirBD();
$resultado = $conn->query($sql);
while($resul = mysqli_fetch_array($resultado)){ 
    $codigo = $resul[0];
    $nombrem = utf8_encode($resul[1]);
    $tipo = utf8_encode($resul[2]);
    $semestre = $resul[3];
    }
$conn->close();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Alumnos Datos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/botones.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/miperfil.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/modificarmateria.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/mensaje.js"></script>
</head>
<body class="contenedor">
    <div class="row justify-content-center">
        <img src="bannerac.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray; height:100px">
    </div>
    <div class="page-header pb-2 pt-2">
            <h1 class="lead display-3 justify-content-center">Información de la Materia <img src="alumno.png" alt="Login"></h1>
    </div>        
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información:
                    </p>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo utf8_decode($codigo);?>" class="cajas lead" id="codigo" placeholder="Número de control"maxlength=8 required readonly>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text"  value="<?php echo $nombrem;?>" class="cajas lead" id="nombrem" placeholder="Contraseña"maxlength=20 required onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text"  value="<?php echo $tipo;?>" class="cajas lead"id="tipo" placeholder="Apellido Paterno"maxlength=50 required onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo $semestre;?>" class="cajas lead .validanumericos" id="semestre" placeholder="Semestre"maxlength=50 required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2 mt-2 container w-100">
        <div class="row  justify-content-center">
            <input type="submit" value="Guardar"  id="guardarbtn"class="btn btn-success lead" data-toggle="modal" data-target="#mensaje">
            <input type="submit" value="Borrar"  id="eliminarbtn"class="btn btn-danger lead" data-toggle="modal" data-target="#mensaje">
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
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal" onclick="window.location.href='menumaterias.php'">Aceptar</button>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
     </div>
</body>
<script language="javascript">
$(document).ready(function(){
    $("#eliminarbtn").click(function(){
    window.location.href='eliminarmateria.php?nc=<?php echo $codigo;?>';
    });
});

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
<script language="javascript">
$(function(){

$('.validanumericos').keypress(function(e) {
  if(isNaN(this.value + String.fromCharCode(e.charCode))) 
   return false;
})
.on("cut copy paste",function(e){
  e.preventDefault();
});

});
</script>
</html>
