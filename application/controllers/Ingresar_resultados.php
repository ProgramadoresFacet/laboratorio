<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresar_resultados extends CI_Controller {


	public function index()
	{
        /*titulo de la pestaña*/
        $data['title'] = 'Ingresar Resultados';

        /*para agregar la class active al menu*/
        $data['ingresar_resultados'] = TRUE;

        /*pasando los datos al menu*/
        $this->load->view('common/header_menu',$data);

        /*carga la vista*/
        $this->load->view('dinamic/ingresar_resultados_view');
        //
        $this->load->view('common/footer');
	}

        public function buscar_ordenes()
        {
          $this->load->model('ordenes_model');
                if($this->input->is_ajax_request()){
                   $dato1 = $this->input->post('criterioctr'); //criterioctr ES TRAIDO DEL form.js
                   $dato2 = $this->input->post('filtroctr'); //filtroctr ES TRAIDO DEL form.js
                   $resultado = $this->ordenes_model->get_paciente($dato1, $dato2);
                   echo json_encode($resultado); 
                   //print_r($resultado);
               }
        }

        public function mostrar_analisis()
        {
          $this->load->model('general_model');
                if($this->input->is_ajax_request()) {
                   $dato = $this->input->post('ordenctr'); //ordenctr ES TRAIDO DEL form.js
                   $resultado = $this->general_model->get_analisis($dato);
                   echo json_encode($resultado);
                   //echo $dato;
                   //print_r($resultado);
                }
        }

        public function autorizar_analisis()
        {
                
          $this->load->model('ingresados_model');
          if($this->input->is_ajax_request()) {
                   $dato1 =  $this->input->post('autorizctr') ;

                   $dato2 = $this->input->post('idingresctr'); //idingresctr ES TRAIDO DEL form.js

                   $resultado = $this->ingresados_model->update_autorizados($dato1,$dato2);
                   echo $resultado;
                  
                   //echo 'autorizado '.$dato1.' idingresado '.$dato2;
                   //printer_abort($resultado);
           }
        }

        public function eliminar_analisis_autorizado()
        {
          $this->load->model('ingresados_model');
          if($this->input->is_ajax_request()) {                   
                   $dato = $this->input->post('idingresctr'); //idingresctr ES TRAIDO DEL form.js
                   $resultado = $this->ingresados_model->delete_autorizados($dato);
                   //echo json_encode($resultado);
                   echo $resultado;
                   //printer_abort($resultado);
           }
        }
}
