<?php
class M_ibadah extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='tbl_ibadah';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_ibadah_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_ibadah) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insertibadah($data){
		$this->db->insert($this->_table, $data);
	}
	
	function updateibadah($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function deleteibadah($id){
		$this->db->where('id_ibadah', $id);
		$this->db->delete($this->_table);
	}
	
	function getibadahByIdIbadah($id)
	{	
		return $this->db->get_where($this->_table,array('id_ibadah' => $id))->row();
	}
	
	function getTbl_IbadahByIdIbadah($id_ibadah)
	{
		$this->db->select('alamat');
		$this->db->select('nama_ibadah');
		$this->db->where('id_ibadah', $id_ibadah);
		$q = $this->db->get('tbl_ibadah');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['nama_ibadah']);
	}
	
	public function getIbadah(){
		return $this->db->get('tbl_ibadah')->result();
	}
	

}
?>