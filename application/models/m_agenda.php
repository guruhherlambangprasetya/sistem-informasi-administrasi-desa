<?php
class M_agenda extends CI_Model {

  function __construct(){
		parent::__construct();
		$this->_table='tbl_agenda';
	
		//get instance
		$this->CI = get_instance();
	}
	public function get_agenda_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_agenda) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insertAgenda($data){
		$this->db->insert($this->_table, $data);
	}
	
	function updateAgenda($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
	
	function deleteAgenda($id){
		$this->db->where('id_agenda', $id);
		$this->db->delete($this->_table);
	}
	
	function getAgendaByIdagenda($id)
	{	
		return $this->db->get_where($this->_table,array('id_agenda' => $id))->row();
	}
	
	function getAgendaByIdIdagenda($id_agenda)
	{
		$this->db->select('tanggal');
		$this->db->where('id_agenda', $id_agenda);
		$q = $this->db->get('tbl_agenda');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['tanggal']);
	}
	
	public function getAgenda(){
		return $this->db->get('tbl_agenda')->result();
	}
	

}
?>