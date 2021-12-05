<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_posbindu extends CI_Controller {
	function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_posbindu');
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
		$colModel['id_struktur'] = array('ID',30,TRUE,'center',2);
        $colModel['judul_struktur'] = array('JUDUL STRUKTUR',300,TRUE,'left',2);
		$colModel['isi_struktur'] = array('ISI STRUKTUR',300,TRUE,'left',2);
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_posbindu/load_data'),$colModel,'id_struktur','asc',$gridParams,$buttons);
		
		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'STRUKTUR KADER POSBINDU';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('posbindu/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

     function load_data() 
	{
        $this->load->library('flexigrid');
		$valid_fields = array('id_struktur','judul_struktur','isi_struktur');
		//$valid_fields = array('id_struktur');
		$this->flexigrid->validate_post('id_struktur','asc',$valid_fields);
		$records = $this->m_posbindu->get_posbindu_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();	
		foreach ($records['records']->result() as $row)
		{
			$record_items[] = array(
				$row->id_struktur,
                $row->id_struktur,
				$row->judul_struktur,
				$row->isi_struktur,		
			'<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_posbindu(\''.$row->id_struktur.'\')"/>
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
			
			$data['page_title'] = 'Tambah Struktur Kader posbindu';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('posbindu/v_tambah', $data, TRUE);		
			
			$this->load->view('utama', $data);
		}else
			redirect('c_login','refresh');
    }

    function simpan_posbindu() {

		$judul_struktur = $this->input->post('judul_struktur', TRUE);
		$isi_struktur = $this->input->post('isi_struktur', TRUE);

		$this->form_validation->set_rules('judul_struktur', 'Judul Struktur', 'required');
		$this->form_validation->set_rules('isi_struktur', 'Isi Struktur', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
		
			$dataPosbindu = array(
				'judul_struktur' =>  $judul_struktur,
				'isi_struktur' => $isi_struktur 
				);			
			$this->m_posbindu->insert_posbindu($dataPosbindu);
				
			redirect('admin/c_posbindu','refresh');
        }
		else $this->add();
    }

   function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_struktur'] = $id;
			
			$data['page_title'] = 'UBAH STRUKTUR KADER POSBINDU';
			$data['hasil'] = $this->m_posbindu->getPosbinduByIdStruktur($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('posbindu/v_ubah', $data, TRUE);

			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
    }
	
    function update_posbindu()
    {
    	$id_struktur = $this->input->post('id_struktur', TRUE);
    	$judul_struktur = $this->input->post('judul_struktur', TRUE);
		$isi_struktur = $this->input->post('isi_struktur', TRUE);

		$gambar = $this->m_posbindu->getPosbinduByIdStruktur($id_struktur);
		
		$gambar = str_replace('uploads/struktur kader /','', $gambar);
		
		$this->form_validation->set_rules('isi_struktur', 'Isi Struktur', 'required');
		$this->form_validation->set_rules('isi_struktur', 'Isi Struktur', 'required');

		if ($this->form_validation->run() == TRUE)
		{
		
		$dataPosbindu = array(
				'id_struktur' => $id_struktur,
				'judul_struktur' => $judul_struktur,
				'isi_struktur' => $isi_struktur
				);	
		$this->m_posbindu->update_posbindu(array('id_struktur' => $id_struktur), $dataPosbindu);
		redirect('admin/c_posbindu','refresh');
		}
		else $this->edit($id_struktur);
    }

    function delete()   
    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_posbindu->delete_posbindu($id);
            $sucess++;
        }
		
        redirect('admin/c_posbindu', 'refresh');
    }
}