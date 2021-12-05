<?php
class M_alur extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='alurlayanan';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_alurlayanan_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_alur) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insertalur($data){
		$this->db->insert($this->_table, $data);
	}
	
	function updatealur($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function deletealur($id){
		$this->db->where('id_alur', $id);
		$this->db->delete($this->_table);
	}
	
	function getAlurlayananByIdalur($id)
	{	
		return $this->db->get_where($this->_table,array('id_alur' => $id))->row();
	}
	
	function getAlurLayananByIdIdalur($id_alur)
	{
		$this->db->select('judul_alur');
		$this->db->where('id_alur', $id_alur);
		$q = $this->db->get('alurlayanan');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['judul_alur']);
	}
	
	public function getAlurLayanan(){
		return $this->db->get('Alurlayanan')->result();
	}
	

}
?>