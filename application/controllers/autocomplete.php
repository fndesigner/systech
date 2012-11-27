<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('autocomplete');
	}
	function ajax()
	{
		if($buscar = $this->input->get('term'))
		{
			$this->db->select('CODCLI, NOMCLI as value');
			$this->db->like('NOMCLI', $buscar); 
			$this->db->limit(20);
			$query=$this->db->get('cliente');
			if($query->num_rows() > 0)
			{
				foreach ($query->result_array() as $row)
				{
					$result[]= $row;
				}
			}
			echo json_encode($result);
		}
	}

function cidade()
	{
		if($buscar = $this->input->get('term'))
		{
			$this->db->select('CODCID, UFCID, NOMCID as value');
			$this->db->like('NOMCID', $buscar); 
			$this->db->limit(25);
			$query=$this->db->get('cidade');
			if($query->num_rows() > 0)
			{
				foreach ($query->result_array() as $row)
				{
					$result[]= $row;
				}
			}
			echo json_encode($result);
		}
	}	

function produto()
	{
		if($buscar = $this->input->get('term'))
		{
			$this->db->select('CODPRO, PREPRO, DESPRO  as value');
			$this->db->like('DESPRO', $buscar); 
			$this->db->limit(20);
			$query=$this->db->get('produto');
			if($query->num_rows() > 0)
			{
				foreach ($query->result_array() as $row)
				{
					$result[]= $row;
				}
			}
			echo json_encode($result);
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/autocomplete.php */