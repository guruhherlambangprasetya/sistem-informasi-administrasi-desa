<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class C_kwt extends CI_Controller {

    public function  __construct()
    {
		parent::__construct();
		$this->load->model('m_logo');
		$this->load->model('m_kwt');
		
    }
	
	function index()
    {		
     	$data['konten_logo'] = $this->m_logo->getLogo();
		$data['kwt'] = $this->m_kwt->getKwt();
		$data['base_url'] = $this->config->item('base_url');
		$data['logo'] = $this->load->view('v_logo', $data, TRUE);
		$data['menu'] = $this->load->view('v_navbar', $data, TRUE);
		$data['content'] = $this->load->view('web/kader_kwt',$data,TRUE);
		$temp['footer'] = $this->load->view('v_footer',$data,TRUE);
		$this->load->view('templateHome',$temp);
	}
	
}
?>