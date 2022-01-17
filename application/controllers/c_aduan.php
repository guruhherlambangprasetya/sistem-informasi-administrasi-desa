<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_aduan extends CI_Controller
{

	public function  __construct()
	{
		parent::__construct();
		//Load flexigrid helper and library
		$this->load->helper('flexigrid_helper');
		$this->load->library('flexigrid');
		$this->load->helper('form');
		$this->load->model('m_aduan');
		$this->load->helper('text');
		$this->load->helper('url');
	}

	function index()
	{
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if ($this->session->userdata('logged_in') and $role == 'Administrator') {
			$this->lists();
		} else
			$this->load->view('v_login', true);
	}

	function lists()
	{
		$colModel['no'] = array('No', 50, TRUE, 'left', 0);
		$colModel['tgl_kejadian'] = array('Tanggal Kejadian', 150, TRUE, 'left', 2);
		$colModel['nama_aduan'] = array('Nama Aduan', 150, TRUE, 'left', 2);
		$colModel['judul_kejadian'] = array('Judul Kejadian', 150, TRUE, 'center', 2);
		$colModel['aksi'] = array('AKSI', 60, FALSE, 'center', 0);

		//Populate flexigrid buttons..
		$buttons[] = array('Select All', 'check', 'btn');
		$buttons[] = array('separator');
		$buttons[] = array('DeSelect All', 'uncheck', 'btn');
		$buttons[] = array('separator');
		$buttons[] = array('Delete Selected Items', 'delete', 'btn');
		$buttons[] = array('separator');

		$gridParams = array(
			'height' => 300,
			'rp' => 10,
			'rpOptions' => '[10,20,30,40]',
			'pagestat' => 'Displaying: {from} to {to} of {total} items.',
			'blockOpacity' => 0.5,
			'title' => '',
			'showTableToggleBtn' => false
		);

		$grid_js = build_grid_js('flex1', site_url('c_aduan/load_data'), $colModel, 'id_aduan', 'desc', $gridParams, $buttons);

		$data['js_grid'] = $grid_js;

		$data['page_title'] = 'DATA PENGADUAN WARGA';
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
		$data['content'] = $this->load->view('aduan/v_list', $data, TRUE);
		$this->load->view('utama', $data);
	}


	function load_data()
	{

		$this->load->library('flexigrid');
		$valid_fields = array('id_aduan', 'tgl_kejadian', 'nama_aduan', 'judul_kejadian');

		$this->flexigrid->validate_post('id_aduan', 'ASC', $valid_fields);
		$records = $this->m_aduan->get_aduan_flexigrid();

		$this->output->set_header($this->config->item('json_header'));

		$record_items = array();
		$counter = 0;
		foreach ($records['records']->result() as $row) {
			$counter++;

			$record_items[] = array(
				$row->id_aduan,
				$counter,
				$row->tgl_kejadian,
				$row->nama_aduan,
				$row->judul_kejadian,
				'<button type="submit" class="btn btn-info btn-xs" title="Lihat Data Pengaduan Warga" onclick="tampil_aduan(\'' . $row->id_aduan . '\')"/><i class="fa fa-eye"></i></button>'
			);
		}
		//Print please
		$this->output->set_output($this->flexigrid->json_build($records['record_count'], $record_items));
	}

	function tampil_aduan($id)
	{
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if ($this->session->userdata('logged_in') and $role == 'Administrator') {
			//Atribut Aduan
			$data['id_aduan'] = $id;
			$data['page_title'] = 'Tampil Data Pengaduan Warga';
			$data['aduan'] = $this->m_aduan->getAduanById($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('aduan/v_detil', $data, TRUE);

			$this->load->view('utama', $data);
		} else
			$this->load->view('v_login', true);
	}

	function simpan_aduan()
	{

		$tgl_kejadian = $this->input->post('tgl_kejadian', TRUE);
		$email_aduan = $this->input->post('email_aduan', TRUE);
		$nama_aduan = $this->input->post('nama_aduan', TRUE);
		$judul_kejadian = $this->input->post('judul_kejadian', TRUE);
		$dan_lainnya = $this->input->post('dan_lainnya', TRUE);

		$ciri_ciri = $this->input->post('ciri_ciri', TRUE);
		$isi_kejadian = $this->input->post('isi_kejadian', TRUE);
		$alamat_kejadian = $this->input->post('alamat_kejadian', TRUE);

		$realPerson = $this->input->post('aunt', TRUE);
		$realPersonHash = $this->input->post('auntHash', TRUE);

		$this->form_validation->set_rules('nama_aduan', 'Nama Aduan', 'required');
		$this->form_validation->set_rules('isi_kejadian', 'Isi Kejadian', 'required');

		if ($this->form_validation->run() == TRUE) {
			
		
			if ($this->rpHash($realPerson) == $realPersonHash) {
				$email2 = $this->cekNull($email_aduan);
				$data = array(
					'tgl_kejadian' => $tgl_kejadian,
					'email_aduan' => $email2,
					'nama_aduan' => $nama_aduan,
					'judul_kejadian' => $judul_kejadian,
					'dan_lainnya' => $dan_lainnya,
					'ciri_ciri' => $ciri_ciri,
					'isi_kejadian' => $isi_kejadian,
					'alamat_kejadian' => $alamat_kejadian
				);

				$this->m_aduan->insertAduan($data);
				echo true;
				//echo "bener";
			} else {
				echo false;
				//echo "salah";
			}
		} else {
			redirect('web/c_home', 'refresh');
			return false;
		}
	}

	function cekNull($parameter)
	{
		if ($parameter == NULL) {
			return ' ';
		} else return $parameter;
	}

	function delete()
	{
		$post = explode(",", $this->input->post('items'));
		array_pop($post);
		$sucess = 0;
		foreach ($post as $id) {
			$this->m_aduan->deleteAduan($id);
			$sucess++;
		}
		if ($sucess > 0) {
			//echo 'Success delete '.$sucess.' item(s).';
		} else {
			//echo 'No delete items';
		}
		redirect('c_aduan', 'refresh');
	}

	function rpHash($value)
	{
		$hash = 5381;
		$value = strtoupper($value);
		for ($i = 0; $i < strlen($value); $i++) {
			$hash = (($hash << 5) + $hash) + ord(substr($value, $i));
		}
		return $hash;
	}

	/*******PHP 64 BIT/*******/
	/*
	function rpHash($value) { 
    $hash = 5381; 
    $value = strtoupper($value); 
    for($i = 0; $i < strlen($value); $i++) { 
        $hash = (leftShift32($hash, 5) + $hash) + ord(substr($value, $i)); 
    } 
    return $hash; 
	} 
 
	// Perform a 32bit left shift 
	function leftShift32($number, $steps) { 
		// convert to binary (string) 
		$binary = decbin($number); 
		// left-pad with 0's if necessary 
		$binary = str_pad($binary, 32, "0", STR_PAD_LEFT); 
		// left shift manually 
		$binary = $binary.str_repeat("0", $steps); 
		// get the last 32 bits 
		$binary = substr($binary, strlen($binary) - 32); 
		// if it's a positive number return it 
		// otherwise return the 2's complement 
		return ($binary{0} == "0" ? bindec($binary) : 
			-(pow(2, 31) - bindec(substr($binary, 1)))); 
	} */
	/*******END OF PHP 64 BIT/*******/
}
