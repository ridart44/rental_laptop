<?php 
/**
 * 
 */
class Model_laptop extends CI_Model
{
	
	public function tampil_data()
	{
		return $this->db->get('laptop');
	}
	public function tambah_laptop($data,$table)
	{
		$this->db->insert($table,$data);
	}
	public function edit_laptop($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);

	}
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function find($id)
	{
		$result = $this->db->where('id_laptop',$id)
						   ->limit(1)
						   ->get('laptop');

		if($result->num_rows() > 0)
		{
			return $result->row();
		}
		else 
		{
			return array();
		}					   
	}
	public function detail_laptop($id_laptop)
	{
		$result = $this->db->where('id_laptop',$id_laptop)->get('laptop');
		if($result->num_rows()>0)
		{
			return $result->result();
		}
		else
		{
			return false;
		}
	}

}
 ?>