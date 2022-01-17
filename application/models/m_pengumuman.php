<?php
class M_pengumuman extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='tbl_pengumuman';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_pengumuman_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_pengumuman) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insertpengumuman($data){
		$this->db->insert($this->_table, $data);
	}
	
	function updatepengumuman($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function deleteAgenda($id){
		$this->db->where('id_agenda', $id);
		$this->db->delete($this->_table);
	}
	
	function getpengumumanByIdpengumuman($id)
	{	
		return $this->db->get_where($this->_table,array('id_pengumuman' => $id))->row();
	}
	
	function getpengumumanByIdIdpengumuman($id_pengumuman)
	{
		$this->db->select('tanggal');
		$this->db->where('id_pengumuman', $id_pengumuman);
		$q = $this->db->get('tbl_pengumuman');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['tanggal']);
	}
	
	public function getpengumuman(){
		return $this->db->get('tbl_pengumuman')->result();
	}
	

}
?>