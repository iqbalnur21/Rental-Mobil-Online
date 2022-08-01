<?php 

class Data_Mobil extends CI_Controller{
    public function index(){
		$data['mobil'] = $this->Model_App->get_data('mobil')->result();
        $this->load->view('templates_customer/Header'); 
        $this->load->view('customer/Data_Mobil', $data);
        $this->load->view('templates_customer/Footer');
    }
    public function detail_mobil($id){
        $data['detail'] = $this->Model_App->ambil_id_mobil($id);
        $this->load->view('templates_customer/Header'); 
        $this->load->view('customer/Detail_Mobil', $data);
        $this->load->view('templates_customer/Footer');
    }
}

?>