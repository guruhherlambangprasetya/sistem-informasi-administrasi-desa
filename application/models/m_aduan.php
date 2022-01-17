<?php
class M_aduan extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->_table = 'tbl_aduan';

    //get instance
    $this->CI = get_instance();
  }
  public function get_aduan_flexigrid()
  {
    //Build contents query
    $this->db->select('*')->from($this->_table);
    $this->CI->flexigrid->build_query();

    //Get contents
    $return['records'] = $this->db->get();

    //Build count query
    $this->db->select("count(id_aduan) as record_count")->from($this->_table);
    $this->CI->flexigrid->build_query(FALSE);
    $record_count = $this->db->get();
    $row = $record_count->row();

    //Get Record Count
    $return['record_count'] = $row->record_count;

    //Return all
    return $return;
  }

  function insertAduan($data)
  {
    $this->db->insert($this->_table, $data);
  }

  function deleteAduan($id)
  {
    $this->db->where('id_aduan', $id);
    $this->db->delete($this->_table);
  }

  function getAduanById($id)
  {
    return $this->db->get_where($this->_table, array('id_aduan' => $id))->result();
  }
  function getGambarByIdAduan($id_aduan)
  {
    $this->db->select('gambar');
    $this->db->where('id_aduan', $id_aduan);
    $q = $this->db->get('tbl_aduan');
    //if id is unique we want just one row to be returned
    $data = array_shift($q->result_array());
    return ($data['gambar']);
  }
}
?>