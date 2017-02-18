<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresar_ordenes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('medicos_model');
        $this->load->model('obrassociales_model');
        $this->load->model('analisis_model');
        $this->load->model('ordenes_model');
        $this->load->model('ingresados_model');
        $this->load->model('cajas_model');
    }

    public function index()
    {
        /*titulo de la pestaña*/
        $data['title'] = 'Ingresar Ordenes';

        /*para agregar la class active al menu*/
        $data['ingresar_ordenes'] = TRUE;

        //FUNCION AUTOCOMPLETAR
        $data['medicos'] = $this->medicos_model->get_apellidomedico();
        $data['obrassociales'] = $this->obrassociales_model->get_nombreobrasocial();
        $data['analisis'] = $this->analisis_model->get_nombreanalisis();

        /*pasando los datos al menu*/
        $this->load->view('common/header_menu', $data);

        /*carga la vista*/

        $this->load->view('dinamic/ingresar_ordenes_view', $data);


        $this->load->view('common/footer');
    }

    public function obtener_numorden()//relacionada por ajax con agregar_analisis.js/ $(document).ready(function()
    {
       $orden = $this->ordenes_model->ultima_orden();

      /*  if($orden == '0'){
            echo $orden;
        }else{*/
            $array[] = $orden->idorden;
            $array[] = $array[0]+1;
            echo $array[0];
       // }

    }

    public function obtener_analisis()//relacionada por ajax con agregar_analisis.js/ $('#bt_add').click(function()
    {
        if ($this->input->is_ajax_request()) {
            $analisis = $this->input->post('valor');
            $tipo = $this->input->post('tipo');
            if($tipo ==1){//1 es numero, 0 es texto,
                $resultado = $this->analisis_model->get_analisis($analisis);
            }else{
                $resultado = $this->analisis_model->get_analisis1($analisis);
            }
            echo json_encode($resultado);
        }
    }

    //PROCESO 5: ORDENES.INSERTAR (fecha: fecha, Apellidopaciente: cad de caracteres, Nombrepaciente: cad de caracteres, Idmedico: entero, Idobrasocial: entero, Numumeroorden: entero, Numeroafiliado: entero, Cod_Analisis[]: arreglo de enteros, Preciototal: flotante, Preciopagado: flotante)
    public function cargar_ordenes()//relacionada por ajax con agregar_analisis.js/ $('#enviar').click(function()
    {
        $cant=0;
        if ($this->input->is_ajax_request()) {

            $data = json_decode(stripslashes($_POST['orden']));

            $idmedico = $this->medicos_model->get_idmedico($data[4]);
            $idOS = $this->obrassociales_model->get_idOS($data[5]);

            $query = $this->cajas_model->insert($data[1],$data[9]);

            $query2 = $this->ordenes_model->insert_ordenes($data[0], $data[1], $data[2], $data[3], $idmedico[0]['idmedico'],$idOS[0]['idobrasocial'], $data[6], $data[7], $data[8], $data[9]);

            $datos = json_decode(stripslashes($_POST['analisis']));

            for ( $i=0; $i < count($datos); $i++) {
                $query3 = $this->ingresados_model->insert($data[0],$datos[$i][0],$datos[$i][1]);
                $cant= $cant+1;
            }
            echo $query3;
        }
    }
}
