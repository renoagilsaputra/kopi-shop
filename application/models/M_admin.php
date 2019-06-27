<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_admin extends CI_Model {
                        
    public function getProdukAll() {
        return $this->db->get('produk')->result_array();
    }
    
    public function getProdukByID($id) {
        return $this->db->get_where('produk',['id_produk' => $id])->row_array();
      
    }

    public function addProduk($data) {
        $this->db->insert('produk', $data);
    }

    public function delProduk($id) {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    public function editProduk($data) {
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', $data);
    }

    public function getKategori() {
        return $this->db->get('kategori')->result_array();
    }          
 
    public function getRoleID() {
        return $this->db->get('role_id')->result_array();
    }

    public function getUserAll() {
        return $this->db->get('user')->result_array();
    }

    public function getUserById($id) {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function addUser($data) {
        return $this->db->insert('user',$data);
    }

    public function editUser($data) {
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function delUser($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function getRegional() {
        return $this->db->get('regional')->result_array();
    }


    
    public function getInvoices() {
        return $this->db->get('invoices')->result_array();
    }

    public function paid($id) {
        $this->db->set('status', 'paid');
        $this->db->where('id',$id);
        $this->db->update('invoices');
    }

    public function cetak($waktu) {
        $sql = "SELECT *, (produk.harga*transaksi.jml) + regional.biaya as subtotal FROM invoices
        LEFT JOIN transaksi ON invoices.id = transaksi.id_invoices
        LEFT JOIN produk ON transaksi.id_produk = produk.id_produk
        LEFT JOIN user ON invoices.id_user = user.id_user
        LEFT JOIN regional ON user.id_regional = regional.id_regional
        WHERE date = '$waktu'";
        return $this->db->query($sql)->result_array();
    }

    
}
                        
/* End of file m_admin.php */
    
                        