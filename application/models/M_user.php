<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_user extends CI_Model {
                        
    public function getProduk() {
        return $this->db->get('produk')->result_array();
    }                
    
    public function search($keyword) {
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('kategori', $keyword);
        return $this->db->get('produk')->result_array();
    }
    

    public function getProdukByID($id) {
        return $this->db->get_where('produk',['id_produk' => $id])->row_array();
    } 
    
   public function getTransaksiByUser($id_user) {
       $sql = "SELECT *, DAY(date) as tgl, MONTH(date) as bln, YEAR(date) as thn, TIME(date) as waktu FROM invoices   
       WHERE id_user='$id_user'";
       return $this->db->query($sql)->result_array();
   }

   public function getTransaksiByUserByID($id_user, $id) {
        $sql = "SELECT *, DAY(date) as tgl, MONTH(date) as bln, YEAR(date) as thn, TIME(date) as waktu,
        (produk.harga*transaksi.jml)+regional.biaya as subtotal
        FROM invoices   
        LEFT JOIN transaksi ON invoices.id=transaksi.id_invoices
        LEFT JOIN produk ON transaksi.id_produk=produk.id_produk
        LEFT JOIN user ON invoices.id_user=user.id_user
        LEFT JOIN regional ON user.id_regional=regional.id_regional
        WHERE invoices.id_user='$id_user' AND id='$id'";
        return $this->db->query($sql)->result_array();
    }

   public function deleteTransaksi($id) {
       $this->db->where('id', $id);
       $this->db->delete('invoices');

       $this->db->where('id_invoices', $id);
       $this->db->delete('transaksi');

       
   }

   public function getInfo($id_user) {
       $sql = "SELECT * FROM user
       LEFT JOIN regional ON user.id_regional = regional.id_regional
       WHERE id_user=$id_user";
       return $this->db->query($sql)->row_array();
   }
}
                        
/* End of file M_user.php */
    
                        