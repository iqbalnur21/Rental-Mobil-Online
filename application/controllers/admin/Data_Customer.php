<?php 

class Data_customer extends CI_Controller{

	public function index()
	{
		$data['customer'] = $this->Model_App->get_data('customer')->result();
		$this->load->view('templates_admin/Header');
		$this->load->view('templates_admin/Sidebar');
		$this->load->view('admin/Data_Customer',$data);
		$this->load->view('templates_admin/Footer');
	}

	public function tambah_customer()
	{
		$this->load->view('templates_admin/Header');
		$this->load->view('templates_admin/Sidebar');
		$this->load->view('admin/Form_Tambah_Customer');
		$this->load->view('templates_admin/Footer');
	}

	public function tambah_customer_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		}else {
			$nama    				= $this->input->post('nama');
			$username    				= $this->input->post('username');
			$alamat    				= $this->input->post('alamat');
			$gender    				= $this->input->post('gender');
			$no_telepon    				= $this->input->post('no_telepon');
			$no_ktp    				= $this->input->post('no_ktp');
			$password    				= md5('12345');

			$data = array(
				'nama' 					=> $nama,
				'username' 				=> $username,
				'alamat' 				=> $alamat,
				'gender' 				=> $gender,
				'no_telepon'			=> $no_telepon, 
				'no_ktp' 				=> $no_ktp,
				'password' 				=> $password

			);

			$this->Model_App->insert_data($data,'customer');
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			Data Customer Berhasil Ditambahkan!.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			redirect('admin/Data_Customer');
		}
	}

	public function update_customer($id)
	{
		$where = array('id_customer' => $id);
		$data['customer'] = $this->db->query("SELECT * FROM customer Where id_customer = '$id'")->result();
		$this->load->view('templates_admin/Header');
		$this->load->view('templates_admin/Sidebar');
		$this->load->view('admin/Form_Update_Customer',$data);
		$this->load->view('templates_admin/Footer');

	}

	public function update_customer_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		}else {
			$id 					= $this->input->post('id_customer');
			$nama    				= $this->input->post('nama');
			$username    			= $this->input->post('username');
			$alamat    				= $this->input->post('alamat');
			$gender    				= $this->input->post('gender');
			$no_telepon    			= $this->input->post('no_telepon');
			$no_ktp    				= $this->input->post('no_ktp');
			$password    			= md5($this->input->post('password'));

			$data = [
				'nama' 					=> $nama,
				'username' 				=> $username,
				'alamat' 				=> $alamat,
				'gender' 				=> $gender,
				'no_telepon'			=> $no_telepon, 
				'no_ktp' 				=> $no_ktp,
				'password' 				=> $password

			];

			$where = array(
				'id_customer' => $id
			);

			$this->Model_App->update_data('customer',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Customer Berhasil Diupdate!.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/Data_Customer');
		}

	}

	public function delete_customer($id)
	{
		$where = array('id_customer' => $id);
		$this->Model_App->delete_data($where, 'customer');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Customer Berhasil Dihapus!.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/Data_Customer');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('no_telepon','No. Telepon','required');
		$this->form_validation->set_rules('no_ktp','No. KTP','required');
		$this->form_validation->set_rules('password','Password','required');
	}
}

 ?>