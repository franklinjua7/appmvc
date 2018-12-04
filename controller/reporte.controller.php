<?php

use Dompdf\Dompdf;

require_once 'model/setting.php';
require_once 'model/profesor.php';
require_once 'model/libro.php';

class ReporteController {

	public $model_setting;
	public $model_profesor;
	public $model_libro;

	public function __CONSTRUCT(){

		$this->model_setting = new Setting();    
    	$this->model_profesor = new Profesor();
    	$this->model_libro = new Libro();
    }

	private function GenerarPDF($vista_html){
		
		$dompdf = new Dompdf();
		$dompdf->loadHtml($vista_html);
		$dompdf->setPaper('A4', 'portrait'); //landscape
		$dompdf->render();
		$dompdf->stream(); 
	}

	private function ListarDatosEmpresa() {
		
		return $this->model_setting->Listar();
	}

	private function HtmlCabeceraReporte($empresas){
		
		$vista_html ="";
		$vista_html = $vista_html . 
					"<!DOCTYPE html>
					<html lang='es'>
 						<head>
 							<meta charset='UTF-8'>
 							<title>Reporte de Listado de Alumnos</title>
 						</head>
 						<body>
 							<table cellspacing='0' style='width: 100%;'>
 							    <tr>";
 							        	$vista_html = $vista_html . 
 							        	"<td style='width: 75%; color: #34495e;font-size:12px;text-align:center'>
		 					                <span style='color: #34495e;font-size:14px;font-weight:bold'>
		 					                	  " .  $empresas[0]->ph_name ."
		 					                </span>
		 					                 <br>  " . $empresas[0]->ph_caracteristicas ."  
		 					                 <br>RUC: " .  $empresas[0]->ph_ruc ."   
		 									 <br>   " . $empresas[0]->ph_address ."<br>
		 									 Teléfono:   ". $empresas[0]->ph_telephone ."<br>
		 									 Email:   ". $empresas[0]->ph_email ."
		 					             </td>
	 					        </tr>
							</table>
							<br>";
		return $vista_html;
	}

	private function HtmlDetalleReporteProfesores($profesores) {
		
		$vista_html ="";
		$vista_detalle_html = "";y
		$vista_html = $vista_html . 
					"<h1 style='text-align:center; font-weight:bold;'> Listado de Profesores</h1>
					 <table cellspacing='0' style='width: 100%; text-align: left; font-size: 10pt;'>
        				<tr>
				            <th style='width: 10%;text-align: center;background:#2c3e50;padding: 4px 4px 4px;color:white;
				            	font-weight:bold;font-size:12px;'>Nombres</th>
				            <th style='width: 40%;text-align: left;background:#2c3e50;padding: 4px 4px 4px;color:white;
				            	font-weight:bold;font-size:12px;'>Apellido Paterno</th>
				            <th style='width: 25%;text-align: left;background:#2c3e50;padding: 4px 4px 4px;color:white;
				            	font-weight:bold;font-size:12px;'>Apellido Materno</th>
				            <th style='width: 25%;text-align: left;background:#2c3e50;padding: 4px 4px 4px;color:white;
				            	font-weight:bold;font-size:12px;'>DNI</th>
				        </tr>";

 	 	 foreach ($profesores as $profesor) 
 	 	 {

		    $vista_detalle_html = $vista_detalle_html . 
		 
		    	"<tr>
		            <td  style='width: 10%; text-align: center'>" . $profesor->Nombres . "</td>
		            <td  style='width: 40%; text-align: left'>" . $profesor->ApellidoPaterno . "</td>
		            <td  style='width: 25%; text-align: left'>" . $profesor->ApellidoMaterno . "</td>
		            <td  style='width: 25%; text-align: left'>" . $profesor->dni . "</td>       
		        </tr>";
  		}
	  
        $vista_html = $vista_html . $vista_detalle_html ."</tr></table></body></html>";
		
		return $vista_html;
	}

	public function ReporteProfesores(){

		$empresas = $this->ListarDatosEmpresa(); 
		$profesores = $this->model_profesor->Listar();
		$html_cabecera =  $this->HtmlCabeceraReporte($empresas);
		$thml_detalle = $this->HtmlDetalleReporteProfesores($profesores);		
		$this->GenerarPDF($html_cabecera . $thml_detalle);
	}

	private function HtmlDetalleReporteLibros($libro){

		$vista_html = "";
		$vista_detalle_html = "";
		$vista_html = $vista_html.
			"<h1 style='text-align:center; font-weight: bold;'>Listado de Libros</h1>
			<table cellspacing='0' style='width:100%; text-align:left; font-size: 10pt;'>
				<tr>
					<th></th>
				</tr>
			"

		foreach ($libros as $libro) {
			# Un libro por cada libro
			$vista_detalle_html = $vista_detalle_html.
				"<tr>
					<td></td>
				</tr>";
		}

		$vista_html = $vista_html.$vista_detalle_html."</tr></table></body></html>";
	}

	public function ReporteLibros(){
		//Listamos y organizamos la cabecera de la institución
		$empresas = $this->ListarDatosEmpresa();
		$html_cabecera = $this->HtmlCabeceraReporte($empresas);
		//Listamos y organizamos los detalles del cuerpo a mostrar
		$libro = $this->model_libro->Listar();
		$html_detalle = $this->HtmlDetalleReporteLibros($libro);

		var_dump($empresas);
		echo $html_cabecera;
		var_dump($libro);
		echo $html_detalle;

	}
}




