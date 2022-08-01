<?php
class Laporan extends CI_Controller
{
    public function index()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/Header');
            $this->load->view('templates_admin/Sidebar');
            $this->load->view('admin/Filter_Laporan');
            $this->load->view('templates_admin/Footer');
        } else {
            $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer ct 
                                                WHERE tr.id_mobil=mb.id_mobil 
                                                AND tr.id_customer=ct.id_customer
                                                AND date(tanggal_rental) >= '$dari' 
                                                AND date(tanggal_rental) <= '$sampai'")->result();
            $this->load->view('templates_admin/Header');
            $this->load->view('templates_admin/Sidebar');
            $this->load->view('admin/Tampilkan_Laporan', $data);
            $this->load->view('templates_admin/Footer');
        }
    }
    public function print_laporan()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data['title'] = "Print Laporan Transaksi";
        $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer ct 
                                            WHERE tr.id_mobil=mb.id_mobil 
                                            AND tr.id_customer=ct.id_customer
                                            AND date(tanggal_rental) >= '$dari' 
                                            AND date(tanggal_rental) <= '$sampai'")->result();
        $this->load->view('templates_admin/Header', $data);
        $this->load->view('admin/Print_Laporan', $data);
    }
    public function _rules()
    {
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
    }
}
