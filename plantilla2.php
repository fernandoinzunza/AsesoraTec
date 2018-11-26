<?php
require 'fpdf/fpdf.php';
class PDF extends FPDF{

    function Header(){
        $this->Image('SEP-MX.png',0,0,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(65);
        $this->Cell(130,10,utf8_decode('Instituto Tecnológico de la paz'),0,1,'C');
        $this->Cell(265,10,'Departamento de Ciencias Basicas',0,1,'C');
        $this->SetFont('Arial','B',12);
        $this->Cell(70,10,'Programas de Asesorias',0,0,'C');
        $this->Cell(310	,10,'Agosto-Diciembre de 2018',0,1,'C');
        $this->Ln(20);
    }
    function Footer(){
        $this->Ln(20);
        $this->SetFont('Arial','B',12);
        $this->Cell(110,6,'ING.HECTOR I. GUERRERO LAFARGA,',0,0,'C');
        $this->Cell(200,6,'ING.LAMBERTO VILLEGAS MONTOYA',0,1,'C');
        $this->SetFont('Arial','B',12);
        $this->Cell(110,6,'JEFE DEL DEPTO. DE CS. BASICAS',0,0,'C');
        $this->Cell(200,6,'PRESIDENTE ACADEMIA DE CS. BASICAS',0,1,'C');
        $this->SetY(-12);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
?>