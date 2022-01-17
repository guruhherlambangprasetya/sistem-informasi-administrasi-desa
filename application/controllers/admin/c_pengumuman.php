<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
setlocale(LC_TIME, 'IND');

class C_pengumuman extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_pengumuman');
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
        $colModel['tanggal'] = array('Tanggal',150,TRUE,'center',2);
		$colModel['waktu'] = array('Waktu',200,TRUE,'center',2);
		$colModel['tempat'] = array('Tempat',200,TRUE,'center',2);
		$colModel['acara'] = array('Acara',200,TRUE,'center',2);
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_pengumuman/load_data'),$colModel,'no','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'Pengumuman';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('pengumuman/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {	
		$this->load->library('flexigrid');
        $valid_fields = array('id_pengumuman','tanggal','waktu','tempat','acara');

		$this->flexigrid->validate_post('id_pengumuman','ASC',$valid_fields);
		$records = $this->m_pengumuman->get_pengumuman_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();
		$counter=0;
		foreach ($records['records']->result() as $row)
		{
			$counter++;
			$record_items[] = array(
				$row->id_pengumuman,
                $counter,
                $row->tanggal,
				$row->waktu,
				$row->tempat,
				$row->acara,
//				'<input type="button" value="Edit" class="ubah" onclick="edit_pengumuman\''.$row->id_pengumuman.'\')"/>'
				 '<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_pengumuman(\''.$row->id_pengumuman.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah Pengumuman';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('pengumuman/v_tambah', $data, TRUE);
							
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
        
    }
	
	function simpanpengumuman() {
		$tanggal = $this->input->post('tanggal', TRUE);
		$waktu = $this->input->post('waktu', TRUE);
		$tempat = $this->input->post('tempat', TRUE);
		$acara = $this->input->post('acara', TRUE);	
		
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('acara', 'Acara', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'tanggal' => $tanggal,
				'waktu' => $waktu,
				'tempat' => $tempat,
				'acara' => $acara,
			);
			$this->m_pengumuman->insertpengumuman($data);	
			redirect('admin/c_pengumuman','refresh');
        }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_pengumuman'] = $id;
			$data['page_title'] = 'UBAH PENGUMUMAN';
			$data['hasil'] = $this->m_pengumuman->getpengumumanByIdpengumuman($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('pengumuman/v_ubah', $data, TRUE);
        
			$this->load->view('utama', $data);
		}else
			$this->load->view('c_login',true);
        
    }
	
	function updatepengumuman() {	
		$id_pengumuman = $this->input->post('id_pengumuman', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$waktu = $this->input->post('waktu', TRUE);
		$tempat = $this->input->post('tempat', TRUE);
		$acara = $this->input->post('acara', TRUE);	
		
		$this->form_validation->set_rules('tempat', 'tempat', 'required');
		$this->form_validation->set_rules('acara', 'Acara', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'id_pengumuman' => $id_pengumuman,
				'tanggal' => $tanggal,
				'waktu' => $waktu,
				'tempat' => $tempat,
				'acara' => $acara,
			);
			$this->m_pengumuman->updatepengumuman(array('id_pengumuman' => $id_pengumuman), $data);
			redirect('admin/c_pengumuman','refresh');
        }
		else $this->edit($id_pengumuman);
		
    }
	
	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_pengumuman->deletepengumuman($id);
            $sucess++;
        }
	
        redirect('admin/c_pengumuman', 'refresh');
    }
    
      
}
?>