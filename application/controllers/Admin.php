<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if((!$this->session->userdata('username')) && ($this->session->userdata('role_id') != 1)) {
            redirect('auth');
        }

        $this->load->model('M_admin');
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function index(){
        $produk = $this->db->get('produk')->num_rows();
        $transaksi = $this->db->get('invoices')->num_rows();
        $user = $this->db->get('user')->num_rows();
        $data['produk'] = $produk;
        $data['transaksi'] = $transaksi;
        $data['user'] = $user;
        $this->load->view('templates/admin_header');
        $this->load->view('admin/home', $data);
        $this->load->view('templates/admin_footer');
    }
        
    public function produk() {
        $data['produk'] = $this->M_admin->getProdukAll();
        $data['kategori'] = $this->M_admin->getKategori();
        $this->load->view('templates/admin_header');
        $this->load->view('admin/produk', $data);
        $this->load->view('templates/admin_footer');
    }

    public function produk_add() {
        
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('kateogri', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('stok', 'stok', 'required|trim');
        
        if($this->form_validation->run() != false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('admin/produk');
        } else {
            
            $config = [
                'file_name' => date('d-m-Y').'-img',
                'upload_path' => './assets/gambar/uploaded/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
              ];
            $this->load->library('upload',$config);
    
            if($this->upload->do_upload('gambar')) {
                $file = $this->upload->data();
                $data = [
                    'nama_produk' => $this->input->post('nama_produk', true),
                    'kategori' => $this->input->post('kategori', true),
                    'berat' => $this->input->post('berat', true),
                    'harga' => $this->input->post('harga', true),
                    'keterangan' => $this->input->post('keterangan', true),
                    'stok' => $this->input->post('stok', true),
                    
                    'gambar' => $file['file_name'],
                ];
                $this->M_admin->addProduk($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/produk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/produk');
            }
        }

    }

    public function produk_del($id) {
        $this->_deteleImage($id);
        $this->M_admin->delProduk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
        redirect('admin/produk');
    }    

    public function produk_edit($id) {
        $data['produk'] = $this->M_admin->getProdukByID($id);
        $data['kategori'] = $this->M_admin->getKategori();

        $this->load->view('templates/admin_header');
        $this->load->view('admin/produk_edit', $data);
        $this->load->view('templates/admin_footer');
        

    }

    public function produk_edit_act() {
        if(empty($_FILES['gambar']['name'])) {
            $data = [
                'nama_produk' => $this->input->post('nama_produk', true),
                'kategori' => $this->input->post('kategori', true),
                'berat' => $this->input->post('berat', true),
                'harga' => $this->input->post('harga', true),
                'keterangan' => $this->input->post('keterangan', true),
                'stok' => $this->input->post('stok', true),
           
            ];
            $this->M_admin->editProduk($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('admin/produk');
        } else {
            $this->_deteleImage($id);
            $config = [
                'file_name' => date('d-m-Y').'-img',
                'upload_path' => './assets/gambar/uploaded/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
              ];
            $this->load->library('upload',$config);
    
            if($this->upload->do_upload('gambar')) {
                $file = $this->upload->data();
                $data = [
                    'nama_produk' => $this->input->post('nama_produk', true),
                    'kategori' => $this->input->post('kategori', true),
                    'berat' => $this->input->post('berat', true),
                    'harga' => $this->input->post('harga', true),
                    'keterangan' => $this->input->post('keterangan', true),
                    'stok' => $this->input->post('stok', true),
                    
                    'gambar' => $file['file_name'],
                ];
                $this->M_admin->editProduk($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/produk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/produk');
            }
        }
    }

    public function transaksi() {
        $data['invoices'] = $this->M_admin->getInvoices();
   
        $this->load->view('templates/admin_header');
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templates/admin_footer');
    }

    public function transaksi_detail($id) {
        $id_user = $this->uri->segment(4);
        $data['detail'] = $this->M_user->getTransaksiByUserByID($id_user, $id);
        $data['user'] = $this->M_user->getInfo($id_user);
        $this->load->view('templates/admin_header');
        $this->load->view('admin/detail_transaksi', $data);
        $this->load->view('templates/admin_footer');
    }

    public function paid($id) {
        $this->M_admin->paid($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
        redirect('admin/transaksi');
    }

    public function user() {
        $data['user'] = $this->M_admin->getUserAll();
        $data['role_id'] = $this->M_admin->getRoleID();
        $data['regional'] = $this->M_admin->getRegional();
        $this->load->view('templates/admin_header');
        $this->load->view('admin/user', $data);
        $this->load->view('templates/admin_footer');
    }

    public function user_add() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required|trim');
        $this->form_validation->set_rules('id_regional', 'Regional', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/user');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'id_regional' => $this->input->post('id_regional'),
                'alamat' => $this->input->post('alamat'),

            ];
            $this->M_admin->addUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('admin/user');
        }
    }

    public function user_del($id) {
        $this->M_admin->delUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect('admin/user');
    }

    public function user_edit($id) {
        $data['user'] = $this->M_admin->getUserById($id);
        $data['role_id'] = $this->M_admin->getRoleID();
        $data['regional'] = $this->M_admin->getRegional();
        $data['gender'] = ['l','p'];
        $this->load->view('templates/admin_header');
        $this->load->view('admin/user_edit', $data);
        $this->load->view('templates/admin_footer');
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
            redirect('admin/user');
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
            redirect('admin/user');
        }

    }


    public function changepassword($id) {
        $data['user'] = $this->M_admin->getUserById($id);

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/admin_header');
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/admin_footer');
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
            redirect('admin/user');
                }
            }
        }

    }

    public function cetak() {
        $this->load->library('Pdf');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required|trim');
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('admin/transaksi');
        } else {

            $waktu = $this->input->post('waktu');
            $data['transaksi'] = $this->M_admin->cetak($waktu);
            $this->load->view('admin/report', $data);
        }

    }

    public function cetak_detail($id) {
        $this->load->library('Pdf');
        $id_user = $this->uri->segment(4);
        $data['detail'] = $this->M_user->getTransaksiByUserByID($id_user, $id);
        $data['user'] = $this->M_user->getInfo($id_user);
        $this->load->view('admin/cetak_detail', $data);
    }

    public function transaksi_del($id) {
        $this->M_user->deleteTransaksi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect('admin/transaksi');
    }

    private function _deteleImage($id) {
        $img = $this->M_admin->getProdukByID($id);
        $filename = explode('.', $img['gambar'])[0];
        return array_map('unlink', glob(FCPATH."./assets/gambar/uploaded/$filename.*"));
    }

  
}
        
    /* End of file  admin.php */
        
                             