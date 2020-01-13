<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vendedorC extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('vendedorM');
	}

	public function index()
	{
		$data = array('title'=>'Tienda || vendedor');
		$this->load->view('template/header',$data);
		$this->load->view('vendedorV');
		$this->load->view('template/footer');
	}

	public function get_vendedor(){
		$respuesta = $this->vendedorM->get_vendedor();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->vendedorM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_categoria(){
		$respuesta = $this->vendedorM->get_categoria();
		echo json_encode($respuesta);
	}

	public function get_sexo(){
		$respuesta = $this->vendedorM->get_sexo();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['nombre']= $this->input->post('nombre');
		$datos['apellido']= $this->input->post('apellido');
		$datos['sexo']= $this->input->post('sexo');
		$datos['categoria']= $this->input->post('categoria');

		$respuesta = $this->vendedorM->set_vendedor($datos);
		echo json_encode($respuesta);
	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->vendedorM->get_datos($id);
		echo json_encode($respuesta);
	}


	public function actualizar(){
		$datos['id_vendedor']= $this->input->post('id_vendedor');
		$datos['nombre']= $this->input->post('nombre');
		$datos['apellido']= $this->input->post('apellido');
		$datos['sexo']= $this->input->post('sexo');
		$datos['categoria']= $this->input->post('categoria');

		$respuesta = $this->vendedorM->actualizar($datos);
		echo json_encode($respuesta);
	}
}
