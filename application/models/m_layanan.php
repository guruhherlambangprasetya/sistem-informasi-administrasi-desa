<?php
class M_layanan extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='jenislayanan';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_jenislayanan_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_layanan) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insertJenislayanan($data){
		$this->db->insert($this->_table, $data);
	}
	
	function update_layanan($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function deleteJenislayanan($id){
		$this->db->where('id_layanan', $id);
		$this->db->delete($this->_table);
	}
	
	function getJenislayananByIdlayanan($id)
	{	
		return $this->db->get_where($this->_table,array('id_layanan' => $id))->row();
	}
	
	function getJenislayananByIdIdlayanan($id_layanan)
	{
		$this->db->select('judul_layanan');
		$this->db->where('id_layanan', $id_layanan);
		$q = $this->db->get('jenislayanan');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['judul_layanan']);
	}
	
	public function getJenislayanan(){
		return $this->db->get('jenislayanan')->result();
	}
	

}
?>