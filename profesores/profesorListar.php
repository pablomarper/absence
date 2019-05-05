<?php

require("../clases/profesor.php");
require("../clases/alumno.php");
require("../lib/conexion.php");
require("../pdf/fpdf.php");


class PDF extends FPDF
{
    public function imprime_incidencia($id)
	{
		$mes = date('m/Y');
        $alu = new Alumno();
        $alu->get($id);

        $apellido1Alu = $alu->getApellido1();
        $apellido2Alu = $alu->getApellido2();
        $nombreAlu = $alu->getNombre();

        $alumno = new Alumno();
        $alumno->faltas($id, $mes);

        $incidencias = $alumno->getIncidencias();

        $this->SetFont('Arial','B',10);
        $this->SetLineWidth(0.4);
        $this->setDrawColor(0,0,0);
        
        $this->Cell(60, 8, "Alumno", "B", 0, "C");
    
        $this->SetLineWidth(0.4);
        $this->setDrawColor(0,0,0);

        $this->Cell(30, 8, "Tipo", "B", 0, "C");

        $this->SetLineWidth(0.4);
        $this->setDrawColor(0,0,0);

        $this->Cell(30, 8, "Fecha", "B", 0, "C");
        
        $this->SetLineWidth(0.4);
        $this->setDrawColor(0,0,0);

        $this->Cell(55, 8, "Materia", "B", 1, "C");

        // --> DATOS
        $this->SetFont('Arial','',10);
        $this->Cell(60, 8, "$apellido1Alu $apellido2Alu, $nombreAlu", 0, 0, "L");

        $cont = 0;

        foreach ($incidencias as $valor) {
            $descr = $valor['descripcion'];
            $dia = $valor['dia'];
            $nombre = $valor['nombre'];

            if ($cont > 0) {
                $this->Cell(60, 8, "", 0, 0, "L");

                $this->Cell(30, 8, "$descr", 0, 0, "C");

                $this->Cell(30, 8, "$dia", 0, 0, "C");
    
                $this->Cell(50, 8, "$nombre", 0, 1, "L");
            } else {
                $this->Cell(30, 8, "$descr", 0, 0, "C");

                $this->Cell(30, 8, "$dia", 0, 0, "C");
    
                $this->Cell(50, 8, "$nombre", 0, 1, "L");
            }

            $cont++;
        }

        $this->ln(150);
        
        // --> FIRMA
        $this->SetFont('Arial','',10);
        $this->Cell(65, 8, "Firma del Tutor/a:", 0, 0, "");
        $this->Cell(65, 8, "Sello del centro:", 0, 0, "");
        $this->Cell(50, 8, "Firma de la Madre/Padre:", 0, 0, "");
		
    }
    
    // Cabecera de pagina

	function Header()
	{
		$dia=date("j",time());
		$mes=date("m",time());
        $any=date("Y",time());

        $profe = new Profesor();
        $profe->get($_GET['id_pro']);

        $apellido1Pro = $profe->getApellido1();
        $apellido2Pro = $profe->getApellido2();
        $nombrePro = $profe->getNombre();

        $profe->claseTutoria($_GET['id_pro']);
        $clase = $profe->getClaseTuto();
        $nombreClase = $clase['nombre'];

		// Arial bold 8
        $this->SetFont('Arial','B',13);
        
        $this->setTextColor(100,100,100);
        $this->Cell(0, 10, "LISTADO DE INCIDENCIAS POR ALUMNO", 0, 1, 'C');
        $this->SetLineWidth(0.7);
		$this->setDrawColor(100,100,100);
        $this->Cell(0, 10, "", "T", 1, 1);

        // --> CENTRO
        $this->SetFont('Arial','B',10);
        $this->setFillColor(226, 217, 217);
        $this->setTextColor(0,0,0);
        $this->setDrawColor(0,0,0);
        $this->SetLineWidth(0.2);
        
        $this->Cell(20, 8, "CENTRO", 1, 0, "C", true);

        $this->Cell(30, 8, "IES MACIA ABELA", 0, 0, "L");
        
        // --> DESDE
        $this->setX($this->getX()+80);
        $this->SetFont('Arial','B',10);
        $this->setFillColor(226, 217, 217);
        $this->setDrawColor(0,0,0);
        $this->SetLineWidth(0.2);
        
        $this->Cell(20, 8, "DESDE", 1, 0, "C", true);

        $this->Cell(30, 8, "01/$mes/$any", 0, 1, "L");

        // --> GRUPO
        $this->setY($this->getY()+1);
        $this->SetFont('Arial','B',10);
        $this->setFillColor(226, 217, 217);
        $this->setDrawColor(0,0,0);
        $this->SetLineWidth(0.2);
        
        $this->Cell(20, 8, "GRUPO", 1, 0, "C", true);

        $this->Cell(30, 8, "$nombreClase", 0, 0, "L");

        // --> HASTA
        $this->setX($this->getX()+80);
        $this->SetFont('Arial','B',10);
        $this->setFillColor(226, 217, 217);
        $this->setDrawColor(0,0,0);
        $this->SetLineWidth(0.2);
        
        $this->Cell(20, 8, "HASTA", 1, 0, "C", true);

        if ($mes == '04' || $mes == '06' || $mes == '09' || $mes == '11') {
            $this->Cell(30, 8, "30/$mes/$any", 0, 1, "L");
        } else if ($mes == '2') {
            $this->Cell(30, 8, "28/$mes/$any", 0, 1, "L");
        } else {
            $this->Cell(30, 8, "31/$mes/$any", 0, 1, "L");
        }
        
        // --> TUTOR
        $this->setY($this->getY()+1);
        $this->SetFont('Arial','B',10);
        $this->setFillColor(226, 217, 217);
        $this->setDrawColor(0,0,0);
        $this->SetLineWidth(0.2);
        
        $this->Cell(20, 8, "TUTOR", 1, 0, "C", true);

        $this->Cell(30, 8, "$apellido1Pro $apellido2Pro, $nombrePro", 0, 1, "L");
		
		$this->ln(15);
		
	}

	// Pie de pagina
	function Footer()
	{
		// Posicion: a 1,5 cm del final
		$this->SetY(-8);
		
		// Arial italic 8
		$this->SetFont('Arial','',8);
		$this->SetLineWidth(0.7);
		$this->setDrawColor(100,100,100);
		$this->Cell(0,10,"","T",0,0);
	}
}

	$pdf = new PDF();
	$pdf->SetMargins(20, 25, 20);
	$pdf->SetFont('Arial','',12);
	$pdf->AliasNbPages();

    $profe = new Profesor();
    $profe->tutoria($_GET['id_pro']);

    $alumnos = $profe->getTutoria();
    
	foreach ($alumnos as $valor){	
        $pdf->AddPage();
        $pdf->imprime_incidencia($valor['dni']);
	}
	
	$pdf->Output();

?>