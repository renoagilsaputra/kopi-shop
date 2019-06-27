<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
function __construct(){
	parent::__construct();
}

	public function index()
	{
		$this->load->view('login');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('pwd');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('pwd','Password','trim|required');

		if($this->form_validation->run() != false){
			$where = array('username'=>$username, 'password'=>md5($pwd));

			$data = $this->mkopi->edit_data($where,'admin');
			$d = $this->mkopi->edit_data($where,'admin')->row();
			$cek = $data->num_rows();

			if($cek > 0)
			{
				$session = array('id' => $d->id_admin,'nama' => $d->nama_admin,'status' =>'login');
				$this->session->set_userdata($session);
				redirect(base_url().'admin');
			}
			else{
				$dt = $this->mkopi->edit_data($where, 'user');
				$hasil = $this->mkopi->edit_data($where, 'user')->row();
				$proses = $dt->num_rows();

				if($proses > 0){
					$session = array('id_agt' => $hasil->id_user, 'nama_user' => $hasil->nama_user, 'status' => 'login');
					$this->session->set_userdata($session);
					redirect(base_url().'member');
				}
			else
			{
				$this->session->set_flashdata('alert','Login Gagal! Username atau Password Salah');
				redirect(base_url());
			}
		}
	}
		else{
				$this->session->set_flashdata('alert','Anda Belum mengisi username atau password');
				$this->load->view('login');
			}
		}
}