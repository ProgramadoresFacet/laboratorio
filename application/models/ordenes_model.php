<?php

class Ordenes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //PROCESO 6: ORDENES.ULTIMAORDEN()
    public function ultima_orden()
    {
        $consulta = $this->db->query('SELECT idorden FROM ordenes');

       // return $consulta-> last_row();
       // if ($consulta-> result()>0){

            /*if ($consulta-> last_row()==0){
                return '0';
            }*/

            return $consulta-> last_row();

        //}

    }

    public function insert_ordenes($idorden,$fecha,$apellido,$nombre,$apemedico,$os,$numorden,$numafil,$total,$pagado)
    {
        $data = Array(
            'idorden'             => $idorden,
            'nombrepaciente'      => $nombre,
            'apellidopaciente'    => $apellido,
            'fecha'               => $fecha,
            'numeroafiliado'      => $numafil,
            'preciopagado'        => $pagado,
            'preciototal'         => $total,
            'numeroorden'         => $numorden,
            'idusuario'           => '1',
            'idmedico'            => $apemedico,
            'idobrasocial'        => $os
        );

        $this->db->insert('ordenes', $data);
        $this->db->trans_complete();

        if($this->db->affected_rows()  > 0)
            return 1;
        else
            return 0;
    }
}