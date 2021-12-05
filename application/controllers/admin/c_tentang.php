<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_tentang extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_tentang');
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
        $colModel['isi_tentang'] = array('Isi Tentang',300,TRUE,'center',2);
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_tentang/load_data'),$colModel,'no','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'Tentang Portal RW 017';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('tentang/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {	
		$this->load->library('flexigrid');
        $valid_fields = array('id_tentang','isi_tentang');

		$this->flexigrid->validate_post('id_tentang','ASC',$valid_fields);
		$records = $this->m_tentang->get_tentang_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();
		$counter=0;
		foreach ($records['records']->result() as $row)
		{
			$counter++;
			$record_items[] = array(
				$row->id_tentang,
                $counter,
                $row->isi_tentang,
//				'<input type="button" value="Edit" class="ubah" onclick="edit_tentang\''.$row->id_tentang.'\')"/>'
				 '<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edittentang(\''.$row->id_tentang.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah Tentang';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('tentang/v_tambah', $data, TRUE);
							
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
        
    }
	
	function simpantentang() {
		$isi_tentang = $this->input->post('isi_tentang', TRUE);
		
		$this->form_validation->set_rules('isi_tentang', 'Isi Tentang', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'isi_tentang' => $isi_tentang,
			);
			$this->m_tentang->inserttentang($data);	
			redirect('admin/c_tentang','refresh');
        }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_tentang'] = $id;
			$data['page_title'] = 'UBAH Tentang';
			$data['hasil'] = $this->m_tentang->gettentangByIdtentang($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('tentang/v_ubah', $data, TRUE);
        
			$this->load->view('utama', $data);
		}else
			$this->load->view('c_login',true);
        
    }
	
	function updatetentang() {	
		$id_tentang = $this->input->post('id_tentang', TRUE);
		$isi_tentang = $this->input->post('isi_tentang', TRUE);

		$this->form_validation->set_rules('id_tentang', 'Id Tentang', 'required');
		$this->form_validation->set_rules('isi_tentang', 'Isi Tentang', 'required');


		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'id_tentang' => $id_tentang,
				'isi_tentang' => $isi_tentang
			);
			$this->m_tentang->updatetentang(array('id_tentang' => $id_tentang), $data);
			redirect('admin/c_tentang','refresh');
        }
		else $this->edit($id_tentang);
		
    }
	
	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_tentang->deletetentang($id);
            $sucess++;
        }
	
        redirect('admin/c_tentang', 'refresh');
    }
    
      
}
?>