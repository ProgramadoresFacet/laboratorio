<?php
class Ingresados_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($idorden, $codanalisis, $check)
    {
        if($check == false){
            $check = 0;
        }else{
            $check = 1;
        }
        $data = Array(
            'idorden'           => $idorden,
            'codigoanalisis'    => $codanalisis,
            'autorizado'        => $check
        );

        $this->db->insert('ingresados', $data);
        $this->db->trans_complete();

        if($this->db->affected_rows()  > 0)
            return 1;
        else
            return 0;
    }
}