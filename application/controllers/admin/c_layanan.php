<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_layanan extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_layanan');
    }

    function index()    {
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$this->lists();
		}else
			redirect('c_login', 'refresh');
        	
    }

    function lists() {
        $colModel['no'] = array('No',30,TRUE,'center',2);
        $colModel['judul_layanan'] = array('Judul Layanan',150,TRUE,'center',2);
		$colModel['isi_layanan'] = array('Isi Layanan',200,TRUE,'center',2);
        $colModel['aksi'] = array('AKSI',60,FALSE,'center',2);
		
		//Populate flexigrid buttons..
        $buttons[] = array('Select All','check','btn');
		$buttons[] = array('separator');
        $buttons[] = array('DeSelect All','uncheck','btn');
        $buttons[] = array('separator');
		$buttons[] = array('Add','add','btn');
        $buttons[] = array('separator');
        $buttons[] = array('Delete Selected Items','delete','btn');
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_layanan/load_data'),$colModel,'no','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'Jenis Layanan';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('layanan/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {	
		$this->load->library('flexigrid');
        $valid_fields = array('id_layanan','judul_layanan','isi_layanan');

		$this->flexigrid->validate_post('id_layanan','ASC',$valid_fields);
		$records = $this->m_layanan->get_jenislayanan_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();
		$counter=0;
		foreach ($records['records']->result() as $row)
		{
			$counter++;
			$record_items[] = array(
				$row->id_layanan,
                $counter,
                $row->judul_layanan,
				$row->isi_layanan,
//				'<input type="button" value="Edit" class="ubah" onclick="edit_layanan(\''.$row->id_layanan.'\')"/>'
				 '<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_layanan(\''.$row->id_layanan.'\')"/>
				 <i class="fa fa-pencil"></i></button>'
			);  
		}
		//Print please
		$this->output->set_output($this->flexigrid->json_build($records['record_count'],$record_items));
    }
    
    function add(){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['page_title'] = 'Tambah Jenis Layanan';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('layanan/v_tambah', $data, TRUE);
							
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
        
    }
	
	function simpan_layanan() {
		$judul_layanan = $this->input->post('judul_layanan', TRUE);
		$isi_layanan = $this->input->post('isi_layanan', TRUE);	
		
		$this->form_validation->set_rules('judul_layanan', 'Judul Layanan', 'required');
		$this->form_validation->set_rules('isi_layanan', 'Isi Layanan', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'judul_layanan' => $judul_layanan,
				'isi_layanan' => $isi_layanan,
			);
			$this->m_layanan->insertJenislayanan($data);	
			redirect('admin/c_layanan','refresh');
        }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_layanan'] = $id;
			$data['page_title'] = 'UBAH JENIS LAYANAN';
			$data['hasil'] = $this->m_layanan->getJenislayananByIdlayanan($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('layanan/v_ubah', $data, TRUE);
        
			$this->load->view('utama', $data);
		}else
			$this->load->view('c_login',true);
        
    }
	
	function update_layanan() {	
		$id_layanan = $this->input->post('id_layanan', TRUE);
		$judul_layanan = $this->input->post('judul_layanan', TRUE);
		$isi_layanan = $this->input->post('isi_layanan', TRUE);	
		
		$this->form_validation->set_rules('judul_layanan', 'Judul Layanan', 'required');
		$this->form_validation->set_rules('isi_layanan', 'Isi Layanan', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$dataLayanan = array(
				'judul_layanan' => $judul_layanan,
				'isi_layanan' => $isi_layanan,
			);
			$this->m_layanan->update_layanan(array('id_layanan' => $id_layanan), $dataLayanan);
			redirect('admin/c_layanan','refresh');
        }
		else $this->edit($id_layanan);
		
    }
	
	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_layanan->deleteJenislayanan($id);
            $sucess++;
        }
	
        redirect('admin/c_layanan', 'refresh');
    }
    
      
}
?>