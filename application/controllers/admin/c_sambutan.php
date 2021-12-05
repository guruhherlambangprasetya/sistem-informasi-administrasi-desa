<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_sambutan extends CI_Controller {
	function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_sambutan');
        $this->load->helper('url');
    }
	
	function index()    
	{
		
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$this->lists();
		}
		else
			redirect('c_login', 'refresh');
    }

    function lists() 
	{
		$colModel['id_sambutan'] = array('ID',30,TRUE,'center',2);
        $colModel['nama_sambutan'] = array('NAMA SAMBUTAN',300,TRUE,'left',2);
		$colModel['isi_sambutan'] = array('ISI SAMBUTAN',300,TRUE,'left',2);
		$colModel['aksi'] = array('AKSI',50,FALSE,'center',2);
		
		//Populate flexigrid buttons..
        
        //$buttons[] = array('Delete Selected Items','delete','btn');
        $buttons[] = array('Select All','check','btn');
		$buttons[] = array('separator');
        $buttons[] = array('DeSelect All','uncheck','btn');
        $buttons[] = array('separator');
		$buttons[] = array('Add','add','btn');
        $buttons[] = array('separator');
        $buttons[] = array('Delete Selected Items','delete','btn');
        $buttons[] = array('separator');
       		
        $gridParams = array(
            'height' => 200,
            'rp' => 10,
            'rpOptions' => '[10,20,30,40]',
            'pagestat' => 'Displaying: {from} to {to} of {total} items.',
            'blockOpacity' => 0.5,
            'title' => '',
            'showTableToggleBtn' => false
			);

        $grid_js = build_grid_js('flex1',site_url('admin/c_sambutan/load_data'),$colModel,'id_sambutan','asc',$gridParams,$buttons);
		
		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'SAMBUTAN RUKUN WARGA 017';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('sambutan/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

     function load_data() 
	{
        $this->load->library('flexigrid');
		$valid_fields = array('id_sambutan','nama_sambutan','isi_sambutan');
		//$valid_fields = array('id_sambutan');
		$this->flexigrid->validate_post('id_sambutan','asc',$valid_fields);
		$records = $this->m_sambutan->get_sambutan_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();	
		foreach ($records['records']->result() as $row)
		{
			$record_items[] = array(
				$row->id_sambutan,
                $row->id_sambutan,
				$row->nama_sambutan,
				$row->isi_sambutan,		
			'<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_sambutan(\''.$row->id_sambutan.'\')"/>
			<i class="fa fa-pencil"></i>
			</button>'
			);  
		}
		//Print please
		
		$this->output->set_output($this->flexigrid->json_build($records['record_count'],$record_items));
    }

    function add()
    {
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$s['cek'] = $this->session->userdata('logged_in');
			
			$data['page_title'] = 'Tambah SAMBUTAN';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('sambutan/v_tambah', $data, TRUE);		
			
			$this->load->view('utama', $data);
		}else
			redirect('c_login','refresh');
    }

    function simpan_sambutan() {

		$nama_sambutan = $this->input->post('nama_sambutan', TRUE);
		$isi_sambutan = $this->input->post('isi_sambutan', TRUE);

		$this->form_validation->set_rules('nama_sambutan', 'nama Sambutan', 'required');
		$this->form_validation->set_rules('isi_sambutan', 'Isi Sambutan', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
		
			$dataSambutan = array(
				'nama_sambutan' =>  $nama_sambutan,
				'isi_sambutan' => $isi_sambutan 
				);			
			$this->m_sambutan->insert_sambutan($dataSambutan);
				
			redirect('admin/c_sambutan','refresh');
        }
		else $this->add();
    }

   function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_struktur'] = $id;
			
			$data['page_title'] = 'UBAH SAMBUTAN RUKUN WARGA 017';
			$data['hasil'] = $this->m_sambutan->getSambutanByIdSambutan($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('sambutan/v_ubah', $data, TRUE);

			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
    }
	
    function update_sambutan()
    {
    	$id_sambutan = $this->input->post('id_sambutan', TRUE);
    	$nama_sambutan = $this->input->post('nama_sambutan', TRUE);
		$isi_sambutan = $this->input->post('isi_sambutan', TRUE);

		$gambar = $this->m_sambutan->getSambutanByIdSambutan($id_sambutan);
		
		$gambar = str_replace('uploads/struktur kader /','', $gambar);
		
		$this->form_validation->set_rules('isi_sambutan', 'Isi Sambutan', 'required');
		$this->form_validation->set_rules('isi_sambutan', 'Isi Sambutan', 'required');

		if ($this->form_validation->run() == TRUE)
		{
		
		$dataSambutan = array(
				'id_sambutan' => $id_sambutan,
				'nama_sambutan' => $nama_sambutan,
				'isi_sambutan' => $isi_sambutan
				);	
		$this->m_sambutan->update_sambutan(array('id_sambutan' => $id_sambutan), $dataSambutan);
		redirect('admin/c_sambutan','refresh');
		}
		else $this->edit($id_sambutan);
    }

    function delete()   
    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_sambutan->delete_sambutan($id);
            $sucess++;
        }
		
        redirect('admin/c_sambutan', 'refresh');
    }
}