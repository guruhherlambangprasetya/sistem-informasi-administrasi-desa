<?php
class M_gsi extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='gsi';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_Gsi_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_struktur) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insert_gsi($data){
		$this->db->insert($this->_table, $data);
	}
	
	function update_gsi($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function delete_gsi($id){
		$this->db->where('id_struktur', $id);
		$this->db->delete($this->_table);
	}
	
	function getGsiByIdstruktur($id)
	{	
		return $this->db->get_where($this->_table,array('id_struktur' => $id))->row();
	}
	
	function getGsiByIdIStruktur($id_struktur)
	{
		
		$this->db->select('judul_struktur');
		$this->db->where('id_struktur', $id_struktur);
		$q = $this->db->get('gsi');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['judul_struktur']);
	}
	
	public function getGsi(){
		return $this->db->get('gsi')->result();
	}
	

}
?>