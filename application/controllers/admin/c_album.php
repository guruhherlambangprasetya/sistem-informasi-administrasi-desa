<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_album extends CI_Controller {
	function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_album');
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
		$colModel['id_gambar'] = array('ID',30,TRUE,'center',2);
        $colModel['gambar'] = array('GAMBAR',250,TRUE,'left',2);
        $colModel['keterangan'] = array('KETERANGAN',150,TRUE,'left',2);
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

        $grid_js = build_grid_js('flex1',site_url('admin/c_album/load_data'),$colModel,'id_gambar','asc',$gridParams,$buttons);
		
		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'Gallery / Album';		
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('album/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

     function load_data() 
	{
        $this->load->library('flexigrid');
		$valid_fields = array('id_gambar','gambar','keterangan');
		//$valid_fields = array('id_gambar');
		$this->flexigrid->validate_post('id_gambar','asc',$valid_fields);
		$records = $this->m_album->get_album_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();	
		foreach ($records['records']->result() as $row)
		{
			$record_items[] = array(
				$row->id_gambar,
                $row->id_gambar,
				$row->gambar,
				$row->keterangan,		
			'<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_album(\''.$row->id_gambar.'\')"/>
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
			
			$data['page_title'] = 'Tambah Gallery / Album';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('album/v_tambah', $data, TRUE);		
			
			$this->load->view('utama', $data);
		}else
			redirect('c_login','refresh');
    }

    function simpan_album() {

		$gambar = $this->input->post('gambar', TRUE);
		$keterangan = $this->input->post('keterangan', TRUE);

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
    	$generate= substr(sha1(uniqid(rand(), true)), 0, 3);

		//UPLOAD GAMBAR
		$config['upload_path']   =   "./uploads/web/gambar/";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['file_name'] = 'gambar_'.$generate;	
		$config['overwrite'] = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config); 
		if(!$this->upload->do_upload('gambar'))
		{         
			$path_gambar = $path_gambar = "uploads/web/gambar/defaultGambar.jpg";    
		}
		else
		{
		  	$upload_gambar = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $upload_gambar['full_path'];
			$config['maintain_ratio'] = TRUE;
			$config['width']     = 570;
			$config['height']   = 225;
			$this->load->library('image_lib', $config); 
			$path_gambar = "uploads/web/gambar/".$upload_gambar['file_name'];
		}
		//END UPLOAD GAMBAR
		
			$dataAlbum = array(
				'gambar' =>  $path_gambar,
				'keterangan' => $keterangan 
				);			
			$this->m_album->insertAlbum($dataAlbum);
				
			redirect('admin/c_album','refresh');
        }
		else $this->add();
    }

   function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['id_gambar'] = $id;
			
			/* $gambar = $this->m_album->getAlbumByIdGambar($id);
			
			$gambar = str_replace('uploads/web/gambar/','', $gambar);
			
			$data['gambar'] = $gambar;
			 */
			
			$data['page_title'] = 'UBAH GALLER / ALBUM';
			$data['hasil'] = $this->m_album->getAlbumByIdGambar($id);
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('album/v_ubah', $data, TRUE);

			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
    }
	
    function update_album()
    {
    	$id_gambar = $this->input->post('id_gambar', TRUE);
		$gambar = $this->input->post('gambar', TRUE);
		$keterangan = $this->input->post('keterangan', TRUE);

		$gambar = $this->m_album->getAlbumByIdGambar($id_gambar);
		
		$gambar = str_replace('uploads/web/gambar/','', $gambar);
		
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			
		//UPLOAD GAMBAR
		$config['upload_path']   =   "./uploads/web/gambar/";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['file_name'] = $gambar;	
		$config['overwrite'] = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config); 
		if(!$this->upload->do_upload('gambar'))
		{         
			$path_gambar = $path_gambar = "uploads/web/gambar/".$gambar;    
		}
		else
		{
		  	$upload_gambar = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $upload_gambar['full_path'];
			$config['maintain_ratio'] = TRUE;
			$config['width']     = 200;
			$config['height']   = 125;
			$this->load->library('image_lib', $config); 
			$path_gambar = "uploads/web/gambar/".$upload_gambar['file_name'];
		}
		//END UPLOAD GAMBAR
		
		$dataAlbum = array(
				'id_gambar' => $id_gambar,
				'gambar' =>  $path_gambar,
				'keterangan' => $keterangan
				);	
		$this->m_album->updateAlbum(array('id_gambar' => $id_gambar), $dataAlbum);
		redirect('admin/c_album','refresh');
		}
		else $this->edit($id_gambar);
    }

    function delete()   
    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_album->deletealbum($id);
            $sucess++;
        }
		
        redirect('admin/c_album', 'refresh');
    }
}