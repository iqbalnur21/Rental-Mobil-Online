<?php
class Transaksi extends CI_Controller
{
    public function index()
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer ct 
                                               WHERE tr.id_mobil=mb.id_mobil 
                                               AND tr.id_customer=ct.id_customer")->result();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Data_Transaksi', $data);
        $this->load->view('templates_admin/Footer');
    }
    public function pembayaran($id)
    {
        $where = array('id_rental' => $id);
        $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Konfirmasi_Pembayaran', $data);
        $this->load->view('templates_admin/Footer');
    }
    public function cek_pembayaran()
    {
        $id = $this->input->post('id_rental');
        $status_pembayaran = $this->input->post('status_pembayaran');

        $data = array(
            'status_pembayaran' => $status_pembayaran
        );
        $where = array(
            'id_rental' => $id
        );
        $this->Model_App->update_data('transaksi', $data, $where);
        redirect('admin/Transaksi');
    }
    public function download_pembayaran($id)
    {
        $this->load->helper('download');
        $file_pembayaran = $this->Model_App->download_pembayaran($id);
        $file = './assets/upload/' . $file_pembayaran['bukti_pembayaran'];
        force_download($file, NULL);
    }
    public function transaksi_selesai($id)
    {
        $where = array('id_rental' => $id);
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Transaksi_Selesai', $data);
        $this->load->view('templates_admin/Footer');
    }
    public function transaksi_selesai_aksi()
    {
        $id                             = $this->input->post('id_rental');
        $tanggal_pengembalian           = $this->input->post('tanggal_pengembalian');
        $status_rental                  = $this->input->post('status_rental');
        $status_pengembalian            = $this->input->post('status_pengembalian');
        $tanggal_kembali                = $this->input->post('tanggal_kembali');
        $denda                          = $this->input->post('denda');

        $x                              = strtotime($tanggal_pengembalian);
        $y                              = strtotime($tanggal_kembali);
        $selisih                              = abs($x - $y)/(60*60*24);
        $total_denda                    = $selisih * $denda;

        $data = array(
            'id_rental' => $id,
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'status_rental' => $status_rental,
            'status_pengembalian' => $status_pengembalian,
            'total_denda' => $total_denda,

        );
        $where = array('id_rental' => $id);
        $this->Model_App->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Transaksi Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        redirect('admin/transaksi');
    }
}
