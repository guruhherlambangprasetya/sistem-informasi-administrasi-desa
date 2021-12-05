<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_ibadah extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_ibadah');
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
        $colModel['nama_ibadah'] = array('Nama Ibadah',300,TRUE,'center',2);
		$colModel['nomor_rt'] = array('Nomor RT',60,TRUE,'center',2);
		$colModel['alamat'] = array('Alamat',120,TRUE,'center',2);
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_ibadah/load_data'),$colModel,'no','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'Tempat Ibadah';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('ibadah/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {	
		$this->load->library('flexigrid');
        $valid_fields = array('id_ibadah','nama_ibadah','alamat');

		$this->flexigrid->validate_post('id_ibadah','ASC',$valid_fields);
		$records = $this->m_ibadah->get_ibadah_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();
		$counter=0;
		foreach ($records['records']->result() as $row)
		{
			$counter++;
			$record_items[] = array(
				$row->id_ibadah,
                $counter,
                $row->nama_ibadah,
				$row->id_rt,
				$row->alamat,
//				'<input type="button" value="Edit" class="ubah" onclick="edit_ibadah\''.$row->id_ibadah.'\')"/>'
				 '<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="editibadah(\''.$row->id_ibadah.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah Ibadah';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('ibadah/v_tambah', $data, TRUE);
							
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
        
    }
	
	function simpanibadah() {
		$nama_ibadah = $this->input->post('nama_ibadah', TRUE);
		$id_rt = $this->input->post('id_rt', TRUE);
		$alamat = $this->input->post('alamat', TRUE);
		
		$this->form_validation->set_rules('nama_ibadah', 'Nama Ibadah', 'required');
		$this->form_validation->set_rules('id_rt', 'RT', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'nama_ibadah' => $nama_ibadah,
				'alamat' => $alamat,
			);
			$this->m_ibadah->insertibadah($data);	
			redirect('admin/c_ibadah','refresh');
        }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_ibadah'] = $id;
			$data['page_title'] = 'UBAH NAMA IBADAH';
			$data['hasil'] = $this->m_ibadah->getibadahByIdibadah($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('ibadah/v_ubah', $data, TRUE);
        
			$this->load->view('utama', $data);
		}else
			$this->load->view('c_login',true);
        
    }
	
	function updateibadah() {	
		$id_ibadah = $this->input->post('id_ibadah', TRUE);
		$nama_ibadah = $this->input->post('nama_ibadah', TRUE);
		$id_rt = $this->input->post('id_rt', TRUE);
		$alamat = $this->input->post('alamat', TRUE);

		$this->form_validation->set_rules('nama_ibadah', 'Nama Ibadah', 'required');
		$this->form_validation->set_rules('id_rt', 'RT', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');


		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'nama_ibadah' => $nama_ibadah,
				'id_rt' => $id_rt,
				'alamat' => $alamat,
			);
			$this->m_ibadah->updateibadah(array('id_ibadah' => $id_ibadah), $data);
			redirect('admin/c_ibadah','refresh');
        }
		else $this->edit($id_ibadah);
		
    }
	
	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_ibadah->deletetbl_ibadah($id);
            $sucess++;
        }
	
        redirect('admin/c_ibadah', 'refresh');
    }
    
      
}
?>