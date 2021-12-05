<?php
class M_album extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->_table='album';

		//get instance
		$this->CI = get_instance();
	}
	
	public function get_album_flexigrid()
    {
        //Build contents query
		
		$this->db->select('*')->from($this->_table);
		
		$this->CI->flexigrid->build_query();
		
        //Get contents
         $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_gambar) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count; 
		
        //Return all
        return $return;
    }
  
	function insertAlbum($data)
	{
		$this->db->insert($this->_table, $data);
	}
	
	function updateAlbum($where, $data)
	{
		$this->db->where($where);
		$this->db->update('album', $data);
		return $this->db->affected_rows();
	}	
	
	function deleteAlbum($id)
	{
		$this->db->where('id_gambar', $id);
		$this->db->delete($this->_table);
	}
	
	function getAlbumByIdGambar($id)
	{
		return $this->db->get_where('album',array('id_gambar' => $id))->row();
	}

	public function getAlbum(){
		return $this->db->get('album')->result();
	}
	
	public function getAlbumRow(){

		return $this->db->count_all_results('album');
	}
	
	function getGambarByIdGambar($id_gambar)
	{
		$this->db->select('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$q = $this->db->get('album');
		//if id is unique we want just one row to be returned
		$data = array_shift($q->result_array());
		return ($data['gambar']);
	}
}
?>
