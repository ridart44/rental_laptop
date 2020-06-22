<?php 
/**
 * 
 */
class Registrasi extends CI_Controller
{
	
	public function index()
	{
		$this->form_validation->set_rules('username','Username','required',['required' => 'Username Wajib Diisi'
		]);
		$this->form_validation->set_rules('password_1','Password','required|matches[password_2]',[
			'required'	=> 'Password Wajib Diisi!',
			'matches'	=> 'Password Tidak Cocok'
		] );
		$this->form_validation->set_rules('password_2','Password','required|matches[password_1]');
		$this->form_validation->set_rules('nama','Nama','required',['required' => 'Nama Wajib Diisi!'
		]);
		$this->form_validation->set_rules('npm','Npm','required',['required' => 'Npm Wajib Diisi!'
		]);
		$this->form_validation->set_rules('jurusan','Jurusan','required',['required' => 'Jurusan Wajib Diisi!'
		]);
		$this->form_validation->set_rules('angkatan','Angkatan','required',['required' => 'Angkatan Wajib Diisi!'
		]);
		$this->form_validation->set_rules('telepon','Telepon','required',['required' => 'Nomor Telepon Wajib Diisi!'
		]);

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('registrasi');
			$this->load->view('templates/footer');
		}
		else
		{
			$data = array
			(
				'user_id' 	=> '',
				'username' 	=> $this->input->post('username'),
				'password'  => $this->input->post('password_1'),
				'role_id'	=> 2,

			);
			$data2 = array 
			(
				'nama' 		=> $this->input->post('nama'),
				'npm'		=> $this->input->post('npm'),
				'jurusan'	=> $this->input->post('jurusan'),
				'angkatan'	=> $this->input->post('angkatan'),
				'telepon'	=> $this->input->post('telepon'),
			);

			$this->db->insert('user',$data);
			$this->db->insert('customer',$data2);
			redirect('auth/login');
		}
		
	}
}
 ?>