<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_agenda extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_agenda');
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_agenda/load_data'),$colModel,'no','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'Agenda';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('agenda/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {	
		$this->load->library('flexigrid');
        $valid_fields = array('id_agenda','tanggal','waktu','tempat','acara');

		$this->flexigrid->validate_post('id_agenda','ASC',$valid_fields);
		$records = $this->m_agenda->get_agenda_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();
		$counter=0;
		foreach ($records['records']->result() as $row)
		{
			$counter++;
			$record_items[] = array(
				$row->id_agenda,
                $counter,
                $row->tanggal,
				$row->waktu,
				$row->tempat,
				$row->acara,
//				'<input type="button" value="Edit" class="ubah" onclick="edit_agenda\''.$row->id_agenda.'\')"/>'
				 '<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_agenda(\''.$row->id_agenda.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah Agenda';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('agenda/v_tambah', $data, TRUE);
							
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
        
    }
	
	function simpanAgenda() {
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
			$this->m_agenda->insertAgenda($data);	
			redirect('admin/c_agenda','refresh');
        }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_agenda'] = $id;
			$data['page_title'] = 'UBAH AGENDA';
			$data['hasil'] = $this->m_agenda->getAgendaByIdagenda($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('agenda/v_ubah', $data, TRUE);
        
			$this->load->view('utama', $data);
		}else
			$this->load->view('c_login',true);
        
    }
	
	function updateAgenda() {	
		$id_agenda = $this->input->post('id_agenda', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$waktu = $this->input->post('waktu', TRUE);
		$tempat = $this->input->post('tempat', TRUE);
		$acara = $this->input->post('acara', TRUE);	
		
		$this->form_validation->set_rules('tempat', 'tempat', 'required');
		$this->form_validation->set_rules('acara', 'Acara', 'required');

		if ($this->form_validation->run() == TRUE)
		{		
			$data = array(
				'id_agenda' => $id_agenda,
				'tanggal' => $tanggal,
				'waktu' => $waktu,
				'tempat' => $tempat,
				'acara' => $acara,
			);
			$this->m_agenda->updateAgenda(array('id_agenda' => $id_agenda), $data);
			redirect('admin/c_agenda','refresh');
        }
		else $this->edit($id_agenda);
		
    }
	
	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_agenda->deleteAgenda($id);
            $sucess++;
        }
	
        redirect('admin/c_agenda', 'refresh');
    }
    
      
}
?>