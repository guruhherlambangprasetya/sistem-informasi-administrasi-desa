<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_alur extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_alur');
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
        $colModel['judul_alur'] = array('Judul Alur Kegiatan Pelayanan',150,TRUE,'center',2);
		$colModel['isi_alur'] = array('Isi Alur Kegiatan Pelayanan',200,TRUE,'center',2);
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_alur/load_data'),$colModel,'no','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'Alur Kegiatan Layanan';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('Alur/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {	
		$this->load->library('flexigrid');
        $valid_fields = array('id_alur','judul_alur','isi_alur');

		$this->flexigrid->validate_post('id_alur','ASC',$valid_fields);
		$records = $this->m_alur->get_alurlayanan_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();
		$counter=0;
		foreach ($records['records']->result() as $row)
		{
			$counter++;
			$record_items[] = array(
				$row->id_alur,
                $counter,
                $row->judul_alur,
				$row->isi_alur,
//				'<input type="button" value="Edit" class="ubah" onclick="edit_alur\''.$row->id_alur.'\')"/>'
				 '<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_alur(\''.$row->id_alur.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah Alur Kegiatan Pelayanan';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('alur/v_tambah', $data, TRUE);
							
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
        
    }
	
	function simpanalur() {
		$judul_alur = $this->input->post('judul_alur', TRUE);
		$isi_alur = $this->input->post('isi_alur', TRUE);	
		
		$this->form_validation->set_rules('judul_alur', 'Judul alur', 'required');
		$this->form_validation->set_rules('isi_alur', 'Isi alur', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'judul_alur' => $judul_alur,
				'isi_alur' => $isi_alur,
			);
			$this->m_alur->insertAlur($data);	
			redirect('admin/c_alur','refresh');
        }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_layanan'] = $id;
			$data['page_title'] = 'UBAH ALUR KEGIATAN PELAYANAN';
			$data['hasil'] = $this->m_alur->getAlurlayananByIdalur($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('alur/v_ubah', $data, TRUE);
        
			$this->load->view('utama', $data);
		}else
			$this->load->view('c_login',true);
        
    }
	
	function updatealur() {	
		$id_alur = $this->input->post('id_alur', TRUE);
		$judul_alur = $this->input->post('judul_alur', TRUE);
		$isi_alur = $this->input->post('isi_alur', TRUE);	
		
		$this->form_validation->set_rules('judul_alur', 'Judul Alur', 'required');
		$this->form_validation->set_rules('isi_alur', 'Isi Alur', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'judul_alur' => $judul_alur,
				'isi_alur' => $isi_alur,
			);
			$this->m_layanan->updatealur(array('id_alur' => $id_alur), $data);
			redirect('admin/c_alur','refresh');
        }
		else $this->edit($id_alur);
		
    }
	
	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_alur->deleteAlurLayanan($id);
            $sucess++;
        }
	
        redirect('admin/c_alur', 'refresh');
    }
    
      
}
?>