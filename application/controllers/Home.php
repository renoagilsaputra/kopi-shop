<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->model('M_admin');
		$data['regional'] = $this->M_admin->getRegional();
		$this->load->view('templates/header');
		$this->load->view('beranda', $data);
		$this->load->view('templates/footer');
	}
	
	public function tentang()
	{
		$this->load->view('templates/header');
		$this->load->view('tentang');
		$this->load->view('templates/footer');
	}

	public function produk()
	{
		$this->load->model('M_admin');
		$data['produk'] = $this->M_admin->getProdukAll();
	
		$this->load->view('templates/header');
		$this->load->view('menu', $data);
		$this->load->view('templates/footer');
	}
	public function toko()
	{
		$this->load->view('templates/header');
		$this->load->view('toko');
		$this->load->view('templates/footer');
	}


	
	

}