<?php
class M_sambutan extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='sambutan';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_Sambutan_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_sambutan) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insert_sambutan($data){
		$this->db->insert($this->_table, $data);
	}
	
	function update_sambutan($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function delete_sambutan($id){
		$this->db->where('id_sambutan', $id);
		$this->db->delete($this->_table);
	}
	
	function getSambutanByIdsambutan($id)
	{	
		return $this->db->get_where($this->_table,array('id_sambutan' => $id))->row();
	}
	
	function getSambutanByIdISambutan($id_sambutan)
	{
		
		$this->db->select('nama_sambutan');
		$this->db->where('id_sambutan', $id_sambutan);
		$q = $this->db->get('sambutan');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['nama_sambutan']);
	}
	
	public function getSambutan(){
		return $this->db->get('sambutan')->result();
	}
	

}
?>