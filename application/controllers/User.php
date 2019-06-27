<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if((!$this->session->userdata('username')) && ($this->session->userdata('role_id') != 2)) {
            redirect('auth');
        }

        $this->load->model('M_user');
        $this->load->model('M_admin');

    }

    public function index() {
        
        $this->load->view('templates/user_header');
        $this->load->view('user/beranda');
        $this->load->view('templates/user_footer');
    }

    public function menu() {
        $data['produk'] = $this->M_user->getProduk();
      
        if($this->input->post('search')) {
            $data['produk'] = $this->M_user->search($this->input->post('search'));
        }
        $this->load->view('templates/user_header');
        $this->load->view('user/menu', $data);
        $this->load->view('templates/user_footer');
    }
    
    public function add_cart($produk_id) {
        $produk = $this->M_user->getProdukByID($produk_id);
        $data = [
            'id' => $produk['id_produk'],
            'qty' => 1,
            'price' => $produk['harga'],
            'name' => $produk['nama_produk'],
            
        ];
        $this->cart->insert($data);
        redirect('user/menu');
    }

    public function cart() {
        $this->load->view('templates/user_header');
        $this->load->view('user/cart');
        $this->load->view('templates/user_footer');
    }

    public function clear_cart() {
        $this->cart->destroy();
        redirect('user/cart');
    }

    public function order() {
            foreach($this->cart->contents() as $items) {
                $produk = $this->M_user->getProdukByID($items['id']);
                
                $hasil = $produk['stok'] -  $items['qty'];
                
            }
            
            if($hasil < 0) {
                
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Stok habis!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('user/menu');

            
            } else {
                $invoices = [
                            'date' => date('Y-m-d H:i:s'),
                            'du_date' => date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1, date('Y'))),
                            'status' => 'unpaid',
                            'id_user' => $this->session->userdata('id_user'),
                            
                ];
                $this->db->insert('invoices', $invoices);
                $invoices_id = $this->db->insert_id();
                        
                foreach($this->cart->contents() as $item) {
                    $data = [
                                    'id_invoices' => $invoices_id,
                                    'id_produk' => $item['id'],
                                    'jml' => $item['qty'],
                                    
                                   
                                ];         
                                
                    $produk = $this->M_user->getProdukByID($data['id_produk']);
                                
                    $stok = $produk['stok'];
                    $hasil = $stok - $data['jml'];
                                
                    $this->db->where('id_produk', $produk['id_produk']);
                    $this->db->set('stok', $hasil);
                    $this->db->update('produk');
                                
                    
                    $this->db->insert('transaksi', $data);
            }
            $this->cart->destroy();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('user/menu');
                        
        }

        
    }

    public function transaksi() {
        $data['transaksi'] = $this->M_user->getTransaksiByUser($this->session->userdata('id_user'));
        $this->load->view('templates/user_header');
        $this->load->view('user/transaksi', $data);
        $this->load->view('templates/user_footer');
    }

    public function detail_transaksi($id) {
        $data['detail'] = $this->M_user->getTransaksiByUserByID($this->session->userdata('id_user'), $id);
        $data['user'] = $this->M_user->getInfo($this->session->userdata('id_user'));
        $this->load->view('templates/user_header');
        $this->load->view('user/detail_transaksi', $data);
        $this->load->view('templates/user_footer');
    }

    public function hapus_transaksi($id) {
        $this->M_user->deleteTransaksi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('user/transaksi');
    }

    public function info_user() {
        $data['info'] = $this->M_user->getInfo($this->session->userdata('id_user'));
        $this->load->view('templates/user_header');
        $this->load->view('user/info_user', $data);
        $this->load->view('templates/user_footer');
    }

    public function user_edit($id) {
        $data['user'] = $this->M_admin->getUserById($id);
        $data['role_id'] = $this->M_admin->getRoleID();
        $data['regional'] = $this->M_admin->getRegional();
        $data['gender'] = ['l','p'];
        $this->load->view('templates/user_header');
        $this->load->view('user/user_edit', $data);
        $this->load->view('templates/user_footer');
    }

    public function user_edit_act() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        
        $this->form_validation->set_rules('role_id', 'Role ID', 'required|trim');
        $this->form_validation->set_rules('id_regional', 'Regional', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('user/info_user');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'role_id' => $this->input->post('role_id'),
                'id_regional' => $this->input->post('id_regional'),
                'alamat' => $this->input->post('alamat'),

                ];
            $this->M_admin->editUser($data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(base_url('logout'));
        }

    }


    public function changepassword($id) {
        $data['user'] = $this->M_admin->getUserById($id);

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/user_header');
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/user_footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password1');
            if(!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
                redirect('admin/changepassword/'.$this->input->post('id_user'));
            } else {
                if($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password baru tidak boleh sama dengan Password Lama!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
                redirect('admin/changepassword/'.$this->input->post('id_user'));
                } else {
                    $pass = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $pass);
                    $this->db->where('id_user', $this->input->post('id_user'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('user/info_user');
                }
            }
        }

    }
}
        
    /* End of file  user.php */
        
                            