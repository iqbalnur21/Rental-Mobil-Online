<?php 
class Rental extends CI_Controller{
    public function tambah_rental($id){
        $data['detail'] = $this->Model_App->ambil_id_mobil($id);
        $this->load->view('templates_customer/Header'); 
        $this->load->view('customer/Tambah_Rental', $data);
        $this->load->view('templates_customer/Footer');
    }
    public function tambah_rental_aksi(){
        $id_customer                = $this->session->userdata('id_customer');
        $id_mobil                   = $this->input->post('id_mobil');
        $tanggal_rental             = $this->input->post('tanggal_rental');
        $tanggal_kembali            = $this->input->post('tanggal_kembali');
        $denda                      = $this->input->post('denda');
        $harga                      = $this->input->post('harga');

        $x                          = strtotime($tanggal_rental);
        $y                          = strtotime($tanggal_kembali);
        $selisih                    = abs($x - $y)/(60*60*24);
        $total_harga                = $selisih * $harga;

        $data = array (
            'id_customer'           => $id_customer,
            'id_mobil'              => $id_mobil,
            'tanggal_rental'        => $tanggal_rental,
            'tanggal_kembali'       => $tanggal_kembali,
            'denda'                 => $denda,
            'harga'                 => $total_harga,
            'tanggal_pengembalian'  => '-',
            'status_rental'         => 'Belum Selesai',
            'status_pengembalian'   => 'Belum Kembali',
            'total_denda'           => '0'
        );
        $this->Model_App->insert_data($data, 'transaksi');
        $status = array(
            'status' => '0'
        );
        $id = array(
            'id_mobil' => $id_mobil
        );
        $this->Model_App->update_data('mobil', $status, $id);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Transaksi Berhasil, Silahkan Checkout!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('customer/Data_Mobil');

    }
}
