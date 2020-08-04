<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class API_A_4 extends CI_Controller
{
	public function getList($id_district){
		$data = $this->wards($id_district);
		$this->printJson($data,null);
	}

	private function wards($id_district){
		$data_wards = $this->getDataWards($id_district);
		$arr_data = array();

		foreach ($data_wards as $data){
			$object_data = new stdClass();
			$object_data->id = isset($data->id) ? $data->id : "";
			$object_data->name = isset($data->name) ? $data->name : "";
			$object_data->code = isset($data->code) ? $data->code : "";
			$arr_data[] = $object_data;
		}

		return $arr_data;
	}

	private function getDataWards($id_district){
		$this->db->select('*');
		$this->db->from('sih_list_wards');
		$this->db->where('id_district', $id_district);
		$query=$this->db->get();
		return $query->result();
	}
}
