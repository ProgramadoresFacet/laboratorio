<?php
class Cajas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($fecha, $monto)
    {
        $data = Array(
            'fecha'           => $fecha,
            'descripcion'    => 'Análisis particular',
            'monto'           => $monto,
            'tipocaja'    => '2' // tipo 1: debe - tipo 2: haber
            //'idusuario' => $usuario
        );

        $this->db->insert('cajas', $data);
        $this->db->trans_complete();

        if($this->db->affected_rows()  > 0)
            return 1;
        else
            return 0;
    }
}