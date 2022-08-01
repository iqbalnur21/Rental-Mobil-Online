<?php 

class Data_Type extends CI_Controller{

	public function index()
	{
		$data['type'] = $this->Model_App->get_data('type')->result();
		$this->load->view('templates_admin/Header');
		$this->load->view('templates_admin/Sidebar');
		$this->load->view('admin/Data_Type',$data);
		$this->load->view('templates_admin/Footer');
	}


	public function tambah_type()
	{
		$this->load->view('templates_admin/Header');
		$this->load->view('templates_admin/Sidebar');
		$this->load->view('admin/Form_Tambah_Type');
		$this->load->view('templates_admin/Footer');
	}

	public function tambah_type_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE ) {
			$this->tambah_type();
		}else{
			$kode_type			= $this->input->post('kode_type');
			$nama_type			= $this->input->post('nama_type');

			$data = array(
				'kode_type'			=> $kode_type,
				'nama_type'			=> $nama_type,
			);

			$this->Model_App->insert_data($data,'type');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Type Berhasil Ditambahkan!.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/Data_Type');
		}
	}

	public function update_type($id){
		$where = array('id_type' =>$id);
		$data['type'] = $this->db->query("SELECT * FROM type WHERE id_type='$id'")->result();
		$this->load->view('templates_admin/Header');
		$this->load->view('templates_admin/Sidebar');
		$this->load->view('admin/Form_Update_Type',$data);
		$this->load->view('templates_admin/Footer');

	}

	public function update_type_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}else{
			$id            		  = $this->input->post('id_type');
			$kode_type            = $this->input->post('kode_type');
			$nama_type            = $this->input->post('nama_type');

			$data = array (
				'kode_type' => $kode_type,
				'nama_type' => $nama_type
			);

			$where = array(
				'id_type' => $id
			);

			$this->Model_App->update_data('type', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Type Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/Data_Type');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_type', 'Kode Tipe', 'required');
		$this->form_validation->set_rules('nama_type', 'Nama Tipe', 'required');
	}

	public function delete_type($id)
	{
		$where = array('id_type' => $id);
		$this->Model_App->delete_data($where, 'type');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Type Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/Data_Type');
	}
}
?>