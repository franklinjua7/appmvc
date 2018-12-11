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
		$vista_detalle_html = "";
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
	  
        $vista_html = $vista_html . $vista_detalle_html ."</table></body></html>";
		
		return $vista_html;
	}

	public function ReporteProfesores(){

		$empresas = $this->ListarDatosEmpresa(); 
		$profesores = $this->model_profesor->Listar();
		$html_cabecera =  $this->HtmlCabeceraReporte($empresas);
		$thml_detalle = $this->HtmlDetalleReporteProfesores($profesores);		
		$this->GenerarPDF($html_cabecera . $thml_detalle);
	}

	private function HtmlDetalleReporteLibros($libros){

		$vista_html = "";
		$vista_detalle_html = "";
		$vista_html = $vista_html.
			"<h1 style='text-align:center; font-weight: bold;'>Listado de Libros</h1>
			<table cellspacing='0' style='width:100%; text-align:left; font-size: 10pt;'>
				<tr>
					<th style='width:20%; text-align: center; background: #2c3e50; padding: 4px 4px 4px; color: white; font-weight:bold; font-size: 12px;'>Nombre</th>
					<th style='width:10%; text-align: center; background: #2c3e50; padding: 4px 4px 4px; color: white; font-weight:bold; font-size: 12px;'># de Páginas</th>
					<th style='width:10%; text-align: center; background: #2c3e50; padding: 4px 4px 4px; color: white; font-weight:bold; font-size: 12px;'>Año</th>
					<th style='width:10%; text-align: center; background: #2c3e50; padding: 4px 4px 4px; color: white; font-weight:bold; font-size: 12px;'>Fecha de Publicación</th>
					<th style='width:10%; text-align: center; background: #2c3e50; padding: 4px 4px 4px; color: white; font-weight:bold; font-size: 12px;'>Foto</th>
				</tr>
			";

		foreach ($libros as $libro) {
			# Un libro por cada libro
			$vista_detalle_html = $vista_detalle_html.
				"<tr>
					<td style='width:20%; text-align: center'>".$libro->nombre_libro."</td>
					<td style='width:10%; text-align: center'>".$libro->numero_paginas."</td>
					<td style='width:10%; text-align: center'>".$libro->anio_edicion."</td>
					<td style='width:10%; text-align: center'>".$libro->FechaPublicacion."</td>
					<td style='width:10%; text-align: center'><img src=".$libro->RutaImagenReferencia." style='width: 150px; height: 150px;'></td>
				</tr>";
		}

		$vista_html = $vista_html.$vista_detalle_html."</tr></table></body></html>";

		return $vista_html;
	}

	public function ReporteLibros(){
		//Listamos y organizamos la cabecera de la institución
		$empresas = $this->ListarDatosEmpresa();
		$html_cabecera = $this->HtmlCabeceraReporte($empresas);
		//Listamos y organizamos los detalles del cuerpo a mostrar
		$libros = $this->model_libro->Listar();
		$html_detalle = $this->HtmlDetalleReporteLibros($libros);

		$this->GenerarPDF($html_cabecera.$html_detalle);

		//var_dump($empresas);
		//echo $html_cabecera;
		//var_dump($libros);
		//echo $html_detalle;

	}

	private function HtmlDetalleReporteLibro($libro){

		$vista_html = "";
		$vista_detalle_html = "";
		$vista_html = $vista_html."
		<table border='1' style='width: 100%'>
		<tbody>
			<tr>
				<td colspan='4' style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'>Libro</td>
			</tr>
			<tr>
        		<td colspan='4' style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->nombre_libro."</td>
    		</tr>
    		<tr>
    			<td colspan='2' style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'>Título del Libro</td>
    			<td colspan='2' style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'>Editorial</td>
    		</tr>
    		<tr>
    			<td colspan='2' style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->nombre_libro."</td>
    			<td colspan='2' style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->nombre_editorial."</td>
    		</tr>
			<tr>
				<td colspan='2' style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'>Estado</td>
				<td colspan='2' style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'>Género</td>
			</tr>
			<tr>
				<td colspan='2' style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->nombre_estado."</td>
				<td colspan='2' style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->nombre_genero."</td>
			</tr>
			<tr>
				<td style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'># de páginas</td>
				<td style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'># de páginas</td>
				<td style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'># de páginas</td>
				<td style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'># de páginas</td>
			</tr>
			<tr>
				<td style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->numero_paginas."</td>
				<td style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->anio_edicion."</td>
				<td style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->FechaPublicacion."</td>
				<td style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->codigo_isbn."</td>
			</tr>
			<tr>
				<td colspan='4' style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'>Resumen</td>
			</tr>
			<tr>
				<td colspan='4' style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'>".$libro->resumen."</td>
			</tr>
			<tr>
				<td colspan='4' style='padding: 4px 4px 4px; font-weight:bold; font-size: 15px;'>Portada</td>
			</tr>
			<tr>
				<td colspan='4' style='text-align: center; padding: 4px 4px 4px; font-size: 15px;'><img src=".$libro->RutaImagenReferencia."></td>
			</tr>
		</tbody>
		</table>
		";

		return $vista_html;
	}

	public function ReporteLibro(){
		//Listamos los datos de la cabecera
		$empresas = $this->ListarDatosEmpresa();
		$html_cabecera = $this->HtmlCabeceraReporte($empresas);
		//Listamos y organizamos los detalles del cuerpo del libro a mostrar
		$libro = $this->model_libro->VerLibro($_REQUEST['id']);
		$html_detalle = $this->HtmlDetalleReporteLibro($libro);

		$this->GenerarPDF($html_cabecera.$html_detalle);
		//echo $_REQUEST['id'];
		//var_dump($libro);
		//echo $html_detalle;
	}
}




