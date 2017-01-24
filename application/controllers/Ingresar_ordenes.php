<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresar_ordenes extends CI_Controller {


	public function index()
	{
        /*titulo de la pestaña*/
        $data['title'] = 'Ingresar Ordenes';

        /*para agregar la class active al menu*/
        $data['ingresar_ordenes'] = TRUE;

        /*pasando los datos al menu*/
        $this->load->view('common/header_menu',$data);

        /*carga la vista*/
        $this->load->view('dinamic/ingresar_ordenes_view');

        $this->load->view('common/footer');
	}
}
