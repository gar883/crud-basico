<?php

class Clientes_model extends CI_Model {
     public function getClientes(){
       $this->db->order_by('id');
       $this->db->where('status', 0);
       $query = $this->db->get('clientes');
       return $query->result();
    }

    public function getClienteById($id){
       $this->db->where('id', $id);
       $this->db->where('status', 1);
       $query = $this->db->get('cliente');
       return $query->result();
    }
    public function createCliente($form_data){
       $this->db->insert('clientes', $form_data);
       return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
    }
    public function updateCliente($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('clientes', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function deleteCliente($id){
       $this->db->set('status', 0);
       $this->db->where('id', $id);
       $this->db->where('status', 1);
        $this->db->update('clientes');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}