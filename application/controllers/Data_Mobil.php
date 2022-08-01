<?php

class Data_Mobil extends CI_Controller
{
    public function index()
    {
        $data['mobil'] = $this->Model_App->get_data('mobil')->result();
        $data['type'] = $this->Model_App->get_data('type')->result();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Data_Mobil', $data);
        $this->load->view('templates_admin/Footer');
    }
    public function tambah_mobil()
    {
        $data['type'] = $this->Model_App->get_data('type')->result();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Form_Tambah_Mobil', $data);
        $this->load->view('templates_admin/Footer');
    }
    public function tambah_mobil_aksi()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $kode_type              = $this->input->post('kode_type');
            $merek                  = $this->input->post('merek');
            $no_plat                = $this->input->post('no_plat');
            $warna                  = $this->input->post('warna');
            $tahun                  = $this->input->post('tahun');
            $status                 = $this->input->post('status');
            $harga                  = $this->input->post('harga');
            $denda                  = $this->input->post('denda');
            $ac                     = $this->input->post('ac');
            $supir                  = $this->input->post('supir');
            $mp3_player             = $this->input->post('mp3_player');
            $central_lock             = $this->input->post('central_lock');
            $gambar                 = $_FILES['gambar']['name'];
            if ($gambar = '') {
            } else {
                $config['upload_path']     = './assets/upload';
                $config['allowed_types']   = 'jpg|jpeg|png|tiff|svg';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Mobil Gagal DiUpload!";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $data = array(
                'kode_type'         => $kode_type,
                'merek'             => $merek,
                'no_plat'           => $no_plat,
                'tahun'             => $tahun,
                'warna'             => $warna,
                'status'            => $status,
                'harga'             => $harga,
                'supir'             => $supir,
                'denda'             => $denda,
                'ac'                => $ac,
                'mp3_player'        => $mp3_player,
                'central_lock'      => $central_lock,
                'gambar'            => $gambar
            );
            $this->Model_App->insert_data($data, 'mobil');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Mobil Berhasil Di Tambahkan!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden ="true">&times;</button>
            </div>');
            redirect('admin/Data_Mobil');
        }
    }
    public function update_mobil($id)
    {
        $where = array('id_mobil' => $id);
        $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, type tp WHERE mb.kode_type=tp.kode_type AND mb.id_mobil='$id'")->result();
        $data['type'] = $this->Model_App->get_data('type')->result();

        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Form_Update_Mobil', $data);
        $this->load->view('templates_admin/Footer');
    }
    public function update_mobil_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id                      = $this->input->post('id_mobil');
            $kode_type               = $this->input->post('kode_type');
            $merek                    = $this->input->post('merek');
            $no_plat                 = $this->input->post('no_plat');
            $warna                   = $this->input->post('warna');
            $tahun                   = $this->input->post('tahun');
            $status                  = $this->input->post('status');
            $harga                  = $this->input->post('harga');
            $denda                  = $this->input->post('denda');
            $ac                     = $this->input->post('ac');
            $supir                  = $this->input->post('supir');
            $mp3_player             = $this->input->post('mp3_player');
            $central_lock             = $this->input->post('central_lock');
            $gambar                  = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['upload_path']     = './assets/upload';
                $config['allowed_types']   = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'kode_type'       => $kode_type,
                'merek'            => $merek,
                'no_plat'         => $no_plat,
                'tahun'           => $tahun,
                'warna'           => $warna,
                'status'          => $status,
                'harga'             => $harga,
                'supir'             => $supir,
                'denda'             => $denda,
                'ac'                => $ac,
                'mp3_player'        => $mp3_player,
                'central_lock'        => $central_lock,
            );

            $where = array(
                'id_mobil' => $id
            );

            $this->Model_App->update_data('mobil', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mobil Berhasil Diupdate!.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
            redirect('admin/Data_Mobil');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_type', 'Type', 'required');
        $this->form_validation->set_rules('merek', 'Merek', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('denda', 'Denda', 'required');
        $this->form_validation->set_rules('ac', 'AC', 'required');
        $this->form_validation->set_rules('supir', 'Supir', 'required');
        $this->form_validation->set_rules('mp3_player', 'MP3 Player', 'required');
        $this->form_validation->set_rules('central_lock', 'Central Lock', 'required');
    }
    public function detail_mobil($id)
    {
        $data['detail'] = $this->Model_App->ambil_id_mobil($id);
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Detail_Mobil', $data);
        $this->load->view('templates_admin/Footer');
    }

    public function delete_mobil($id)
    {
        $where = array('id_mobil' => $id);
        $this->Model_App->delete_data($where, 'mobil');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  Data Mobil Berhasil Dihapus!.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
        redirect('admin/Data_Mobil');
    }
}
