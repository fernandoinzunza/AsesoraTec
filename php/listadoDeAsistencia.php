<?php
session_start();
require_once("Clases/conexion.php");
if (isset($_SESSION['noeconomico'])) {
    if (isset($_POST['opcion'])) {
        if ($_POST['opcion'] == "Asesorias" ) {
            try{
                $noecon = $_SESSION['noeconomico'];
                $conexion = abrirBD();
                $SQL= "SELECT Codigo,Nombre_Materia FROM asesorias WHERE NOECON = ? AND Activo = 'Si'";
                $STMT = $conexion->prepare($SQL);
                $STMT->bind_param('s',$neo);
                $neo = $noecon;
                $STMT->execute();
                $STMT->bind_result($codigo,$nom);
                $resultdo = '<option value= "">Seleccione asesoría</option>';
                while( $fila = $STMT->fetch()){
                    $resultdo .= '<option value= "'.$codigo.'">'.utf8_encode($nom).'</option>';   
                }
                $conexion->close();
                echo $resultdo;
            }
            catch (Exception $e){
                $error = $e->getMessage();
                echo $error;
            }
          
        }
        else if ($_POST['opcion'] == "Fecha" ) {
            try{
                $noecon = $_SESSION['noeconomico'];
                $codigo = $_POST['code'];
                $conexion = abrirBD();
                $SQL= "SELECT Fecha FROM pass WHERE NOECON = ? AND Codigo_Asesoria = ?";
                $STMT = $conexion->prepare($SQL);
                $STMT->bind_param('ss',$neo,$cod);
                $neo = $noecon;
                $cod = $codigo;
                $STMT->execute();
                $STMT->bind_result($fecha);
                
                $resultdo = '<option value= "">Seleccione asesoría</option>';
                $vacio = true;
                while( $fila = $STMT->fetch()){
                    $vacio = false;
                    $resultdo .= '<option value= "'.$fecha.'*'.$codigo.'">'.$fecha.'</option>';   
                }
                if($vacio == true)
                    $resultdo = '<option value= "">Sin resultados.</option>';

                $conexion->close();
                echo $resultdo;
            }
            catch (Exception $e){
                $error = $e->getMessage();
                echo $error;
            }
        }
        else if ($_POST['opcion'] == "Agregar" ) {
            $codigo = $_POST['code'];
            $fecha = $_POST['fech'];
            try{
                $noecon = $_SESSION['noeconomico'];
                $conexion = abrirBD();
                $SQL= "SELECT nocontrol,nombre,Ap_Pat,Ap_Mat,semestre FROM alumno,asistenciasreg WHERE asistenciasreg.Control_Alumno = alumno.nocontrol And fecha = ? and asistenciasreg.NOECON = ? AND asistenciasreg.Codigo_Asesoria = ?";
                $STMT = $conexion->prepare($SQL);
                $STMT->bind_param('sss',$fec,$noe,$cod);
                $fec = $fecha;
                $noe = $noecon;
                $cod = $codigo;
                $STMT->execute();
                $STMT->bind_result($control,$nombre,$apePat,$apeMat,$semestre);
                $resultdo = "
                <div class='table-responsive'>
                <Table class='table'>
                    <theard>
                    <th scope='col' class='text-center'>No Control</th>
                    <th scope='col' class='text-center'>Nombre</th>
                    <th scope='col' class='text-center'>Semestre</th>
                    </theard>
                    <tbody>
                ";
                while( $fila = $STMT->fetch()){
                    $resultdo .= "
                    <tr> 
                        <th class='lead text-center'>".$control."</th>   
                        <td class='lead text-center'>".$nombre.' '.$apePat.' '. $apeMat ."</td>
                        <td class='lead text-center'>".$semestre."</td>
                    <tr>";
                }
                $resultdo .="</tbody><table></div>";
                $conexion->close();
                echo $resultdo;
            }
            catch (Exception $e){
                $error = $e->getMessage();
                echo $error;
            }
            
        }    
    }  
}
?>