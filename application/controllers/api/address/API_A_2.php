<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_A_2 extends CI_Controller
{
	public function getList($id_nation){
		$data = $this->provinces($id_nation);
		$this->printJson($data,null);
	}

	private function provinces($id_nation){
		$data_province = $this->getDataProvinces($id_nation);
		$arr_data = array();

		foreach ($data_province as $data){
			$object_data = new stdClass();
			$object_data->id = isset($data->id) ? $data->id : "";
			$object_data->code = isset($data->code) ? $data->code : "";
			$object_data->name = isset($data->name) ? $data->name : "";
			$arr_data[] = $object_data;
		}
		return $arr_data;
	}
	private function getDataProvinces($id_nation){
		$this->db->select('*');
		$this->db->from('sih_list_provinces');
		$this->db->where('id_nation', $id_nation);
		$query=$this->db->get();
		return $query->result();
	}
}
