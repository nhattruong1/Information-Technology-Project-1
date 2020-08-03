<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class API_A_3 extends CI_Controller
{
	public function getList($id_province){
		$data = $this->districts($id_province);
		$this->printJson($data,null);
	}

	private function districts($id_province){
		$data_district = $this->getDataDistricts($id_province);
		$arr_data = array();

		foreach ($data_district as $data){
			$object_data = new stdClass();
			$object_data->id = isset($data->id) ? $data->id : "";
			$object_data->name = isset($data->name) ? $data->name : "";
			$object_data->code = isset($data->code) ? $data->code : "";
			$arr_data[] = $object_data;
		}
		return $arr_data;
	}

	private function getDataDistricts($id_province){
		$this->db->select('*');
		$this->db->from('sih_list_districts');
		$this->db->where('id_provinces ', $id_province);
		$query=$this->db->get();
		return $query->result();
	}
}
