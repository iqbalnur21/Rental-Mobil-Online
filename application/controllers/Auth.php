<?php
class Auth extends CI_Controller
{
    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/Header');
            $this->load->view('Login_Form');
        } else {
            $username           = $this->input->post('username');
            $password           = md5($this->input->post('password'));

            $cek = $this->Model_App->cek_login($username, $password);

            if ($cek == FALSE) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username atau Password Salah!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
                redirect('Auth/login');
            } else {
                $this->session->set_userdata('id_customer', $cek->id_customer);
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('nama', $cek->nama);

                switch ($cek->role_id) {
                    case 1:
                        redirect('admin/Dashboard');
                        break;
                    case 2:
                        redirect('customer/Dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('customer/Dashboard');
    }
    public function ganti_password()
    {
        $this->load->view('templates_admin/Header');
        $this->load->view('Ganti_Password');
    }
    public function ganti_password_aksi()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/Header');
            $this->load->view('Ganti_Password');
        } else {
            $data = array('password' => md5($pass_baru));
            $id = array('id_customer' => $this->session->userdata('id_customer'));
            $this->Model_App->update_password($id, $data, 'customer');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Password Berhasil Diupdate, Silahkan Login!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('Auth/login');
        }
    }
	public function reset_password(){
		$data = array('password' => MD5("12345"));
        $id = array('id_customer' => $this->session->userdata('id_customer'));
        $this->Model_App->update_password($id, $data, 'customer');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Password Berhasil Direset ke "12345"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/Data_Customer');
	}
}
