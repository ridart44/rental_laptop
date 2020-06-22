<?php 
/**
 * 
 */
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('role_id') != '2')
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Anda Belum Login!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('auth/login');
		}
	}
	
	
	public function tambah_book($id)
	{
		$laptop = $this->model_laptop->find($id);
		$data = array
		(
			'id' 	=> $laptop->id_laptop,
			'qty'	=> 1,
			'price'	=> $laptop->harga,
			'name'	=> $laptop->nama_laptop

		);

		$this->cart->insert($data);
		redirect('welcome');
	}
	public function detail_booking()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('book_list');
		$this->load->view('templates/footer');
	}
	public function hapus_book()
	{
		$this->cart->destroy();
		redirect('welcome/index');
	}
	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}
	public function detail($id_laptop)
	{
		$data['laptop'] = $this->model_laptop->detail_laptop($id_laptop);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_laptop',$data);
		$this->load->view('templates/footer');
	}
	public function proses_bayar()
	{
	
		$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('proses_bayar');
		$this->load->view('templates/footer');
		
	}
}
 ?>