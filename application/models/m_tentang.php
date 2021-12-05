<?php
class M_tentang extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='tentang';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_tentang_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_tentang) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function inserttentang($data){
		$this->db->insert($this->_table, $data);
	}
	
	function updatetentang($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function deletetentang($id){
		$this->db->where('id_tentang', $id);
		$this->db->delete($this->_table);
	}
	
	function gettentangByIdTentang($id)
	{	
		return $this->db->get_where($this->_table,array('id_tentang' => $id))->row();
	}
	
	function getTentangById_Tentang($id_tentang)
	{
		$this->db->select('isi_tentang');
		$this->db->where('id_tentang', $id_tentang);
		$q = $this->db->get('tentang');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['isi_tentang']);
	}
	
	public function getTentang(){
		return $this->db->get('tentang')->result();
	}
	

}
?>