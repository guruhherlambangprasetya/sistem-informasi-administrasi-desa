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
	function insertPengumuman($data){
		$this->db->insert($this->_table, $data);
	}
	
	function deletePengumuman($id){
		$this->db->where('id_pengumuman', $id);	
		$this->db->delete($this->_table);
	}
	  
	function updatePengumuman($where, $data){
		$this->db->where($where);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}
  
    function getPengumumanByIdpengumuman($id)
	{	
		 $this->db->select('tbl_pengumuman.*,tbl_pengguna.nama_pengguna as nama_pengguna')->from($this->_table);
		 $this->db->join('tbl_pengguna','tbl_pengumuman.id_pengguna = tbl_pengguna.id_pengguna ');
		 $this->db->where('tbl_pengumuman.id_pengumuman', $id);
		 return  $this->db->get()->row();
		//return $this->db->get_where($this->_table,array('id_pengumuman' => $id))->row();
	}
 
	public function get_recent_pengumuman(){
		$this->db->order_by("waktu", "desc");
		return $this->db->get('tbl_pengumuman',4,0)->result();
	}
	
	public function get_recent_pengumuman_all(){
		 $this->db->select('tbl_pengumuman.*,tbl_pengguna.nama_pengguna as nama_pengguna')->from($this->_table);
		 $this->db->join('tbl_pengguna','tbl_pengumuman.id_pengguna = tbl_pengguna.id_pengguna ');
		$this->db->order_by("waktu", "desc");
		return $this->db->get()->result();
	}
	
	public function pengumuman_all(){
		 $this->db->select('tbl_pengumuman.id_pengumuman, 
		 tbl_pengumuman.gambar, 
		 tbl_pengumuman.judul_pengumuman, 
		 tbl_pengumuman.isi_pengumuman, 
		 tbl_pengumuman.waktu, 
		 tbl_pengguna.nama_pengguna as nama_pengguna')->from($this->_table);
		 $this->db->join('tbl_pengguna','tbl_pengumuman.id_pengguna = tbl_pengguna.id_pengguna ');
		 $this->db->order_by('tbl_pengumuman.waktu','desc');
		
	}
	
	public function pengumuman_all_numrows(){
		 $this->db->select('tbl_pengumuman.id_pengguna, 
		 tbl_pengumuman.gambar, 
		 tbl_pengumuman.judul_pengumuman, 
		 tbl_pengumuman.isi_pengumuman, 
		 tbl_pengumuman.waktu, 
		 tbl_pengguna.nama_pengguna as nama_pengguna')->from($this->_table);
		 $this->db->join('tbl_pengguna','tbl_pengumuman.id_pengguna = tbl_pengguna.id_pengguna ');
		 $this->db->order_by('tbl_pengumuman.waktu','desc');
		return $this->db->get()->num_rows();
	}
}
?>