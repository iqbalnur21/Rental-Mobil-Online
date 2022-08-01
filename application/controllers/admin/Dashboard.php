<?php 

class Dashboard extends CI_Controller{
    public function index(){

        $data['jumlah_customer'] = $this->Model_App->get_data('customer')->num_rows();
        $data['jumlah_mobil'] = $this->Model_App->get_data('mobil')->num_rows();
        $data['jumlah_transaksi'] = $this->Model_App->get_data('transaksi')->num_rows();
        $data['pendapatan'] = $this->db->query('SELECT (sum(harga)+sum(total_denda)) FROM transaksi AS totalUntung')->result_array()[0]['(sum(harga)+sum(total_denda))'];
        $data['mobil'] = $this->Model_App->get_data('mobil')->result();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Dashboard', $data);
        $this->load->view('templates_admin/Footer');
    }
}
