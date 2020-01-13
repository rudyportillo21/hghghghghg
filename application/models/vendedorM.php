<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vendedorM extends CI_Model {
	public function get_vendedor(){
		$pa_mostrarVendedor = "CALL pa_mostrarVendedor()";
		$query = $this->db->query($pa_mostrarVendedor);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function eliminar($id){
		$pa_eliminarVendedor = "CALL pa_eliminarVendedor(?)";
		$arreglo = array('id_vendedor'=>$id);
		$query = $this->db->query($pa_eliminarVendedor,$arreglo);
		if($query){
			return true;
		}else{
			return false;
		}
	}


	public function get_categoria(){
		$exe = $this->db->get('categoria');
		return $exe->result();
	}
	public function get_sexo(){
		$exe = $this->db->get('sexo');
		return $exe->result();
	}

	public function set_vendedor($datos){
		$pa_insertarVendedor = "CALL pa_insertarVendedor(?,?,?,?)";
		$arreglo = array('nombre'=>$datos['nombre'],
			'apellido'=>$datos['apellido'],
			'id_categoria'=>$datos['categoria'],
			'id_sexo'=>$datos['sexo']);

		$query= $this->db->query($pa_insertarVendedor,$arreglo);
		if($query!==null){
			return "add";
		}else{
			return false;
		}
	}

	public function get_datos($id){
		$this->db->where('id_vendedor',$id);
		$exe = $this->db->get('vendedor');
		return $exe->row();
	}

	public function actualizar($datos){
		$pa_editarVendedor = "CALL pa_editarVendedor(?,?,?,?,?)";
		$arreglo = array('id_vendedor'=>$datos['id_vendedor'],
			'nombre'=>$datos['nombre'],
			'apellido'=>$datos['apellido'],
			'id_categoria'=>$datos['categoria'],
			'id_sexo'=>$datos['sexo']);

		$query= $this->db->query($pa_editarVendedor,$arreglo);
		if($query){
			return "edi";
		}else{
			return false;
		}
	}

}
