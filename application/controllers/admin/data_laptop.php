<?php 
/**
 * 
 */
class Data_laptop extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('role_id') != '1')
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
	public function index()
	{
		$data['laptop'] = $this->model_laptop->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_laptop',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama_laptop = $this->input->post('nama_laptop');
		$merek = $this->input->post('merek');
		$harga = $this->input->post('harga');
		$ketersediaan = $this->input->post('ketersediaan');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar=''){}else{
			$config['upload_path']= './upload';
			$config['allowed_types'] ='jpg|jpeg|png|gif';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('gambar'))
			{
				echo "Gambar Gagal diUpload";
			}else{
				$gambar = $this->upload->data('file_name');
			}
		}/*endif*/

		$data = array(
				'nama_laptop' => $nama_laptop,
				'merek' => $merek,
				'harga' => $harga,
				'ketersediaan' => $ketersediaan,
				'gambar' => $gambar

			);

		$this->model_laptop->tambah_laptop($data,'laptop');
			redirect('admin/data_laptop/index');	
	}/*endtambah_aksi*/

	public function edit($id)
	{
		$where = array('id_laptop' =>$id);
		$data['laptop'] = $this->model_laptop->edit_laptop($where,'laptop')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_laptop',$data);
		$this->load->view('templates_admin/footer');
	
	}/*end edit */


	public function update()
		{
			$id = $this->input->post('id_laptop');
			$nama_laptop = $this->input->post('nama_laptop');
			$merek = $this->input->post('merek');
			$harga = $this->input->post('harga');
			$ketersediaan = $this->input->post('ketersediaan');

			$data = array(
				'nama_laptop' => $nama_laptop,
				'merek' => $merek,
				'harga' => $harga,	
				'ketersediaan' => $ketersediaan
			);

			$where = array(
				'id_laptop' => $id

			);

			$this -> model_laptop->update_data($where,$data,'laptop');
			redirect ('admin/data_laptop/index');

	}/*end update disini woy*/

	public function hapus($id)
	{
		$where = array('id_laptop'=> $id);
		$this->model_laptop->hapus_data($where,'laptop');
		redirect ('admin/data_laptop/index');

	}/*end hapus */
}
	

?>