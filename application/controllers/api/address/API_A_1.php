<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class API_A_1 extends CI_Controller
{
	public function get($id_nation){
		$data = $this->nation($id_nation);
		$this->printJson($data,null);
	}

	public function getList(){
		$data = $this->nations();
		$this->printJson($data,null);
	}

	private function nation($id_nation){
		$data_nation = $this->getDataNation($id_nation);

		if(!empty($data_nation)){
			$object_data = new stdClass();
			$object_data->id = isset($data_nation->id) ? $data_nation->id : "";
			$object_data->code = isset($data_nation->code) ? $data_nation->code : "";
			$object_data->name = isset($data_nation->name) ? $data_nation->name : "";

			return $object_data;
		}
	}

	private function nations(){
		$data_nation = $this->getDataNations();
		$arr_data = array();

		foreach ($data_nation as $data){
			$object_data = new stdClass();
			$object_data->id = isset($data->id) ? $data->id : "";
			$object_data->code = isset($data->code) ? $data->code : "";
			$object_data->name = isset($data->name) ? $data->name : "";
			$arr_data[] = $object_data;
		}
		return $arr_data;
	}

	private function getDataNation($id_nation){
		$this->db->select('*');
		$this->db->from('sih_list_nations');
		$this->db->where('id', $id_nation);
		$query=$this->db->get();
		return $query->row();
	}
	private function getDataNations(){
		$this->db->select('*');
		$this->db->from('sih_list_nations');
		$query=$this->db->get();
		return $query->result();
	}
}
