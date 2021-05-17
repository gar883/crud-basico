<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->load->model('Clientes_model','cliente');
    }

	public function index()
	{
        $this->load->view('clientes/clientes_view');
       
	}
    public function registros(){
        $data = array();
        $data['clientes'] = $this->cliente->getClientes();
        $this->load->view('clientes/clientes_view', $data);
    }
    public function form($id_cliente = null)
    {
        $data = array();
        if($id_cliente){
            $data['cliente'] = $this->product->getClienteById($id_cliente);
        }
        $this->load->view('clientes/clientes_view', $data);
    }
    

    public function save($id = null)
    {
        $form_data = array
        (
            
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'dni' => $this->input->post('dni'),
            'fecha_nac' => $this->input->post('fecha_nac'),
            'provincia' => $this->input->post('provincia'),
            'email' => $this->input->post('email')
        );
        if(!$id){
            $send_form = $this->cliente->createCliente($form_data);
        } else {
            $send_form = $this->cliente->updateCliente($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Cliente cargado con exito!'));
            redirect('clientes');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Datos incorretos!'));
            redirect('cliente');
        }
    }
}