<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	function __construct()
	{
		parent:: __construct();	
		$this->load->model('Web_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('date');
	}
	public function index()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Halaman Utama | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['disukai_t']		= $this->Web_model->disukai_t($id_pengguna);
		$data['disukai_e']		= $this->Web_model->disukai_e($id_pengguna);
		$data['reward']			= $this->Web_model->total_reward($id_pengguna);
		$tahun					= '2016';
		$data['tc']				= $this->Web_model->bulan_t($tahun,$id_pengguna);
		$data['ex']				= $this->Web_model->bulan_e($tahun,$id_pengguna);
		$data['content']		= 'home';
		$this->load->view('template',$data);
	}
	public function login()
	{
		$this->load->view('login');
	}
	function masuk()
	{
		$nip			= trim(strip_tags($this->input->post('nip')));
		$password		= md5($this->input->post('password'));
		$hasil 			= $this->Web_model->login($nip,$password);
		if ($hasil->num_rows()==1)
		{
			foreach($hasil->result_array() as $data)
			{
					$session_id			=$data['id_pengguna'];
					$session_nip		=$data['nip'];
					$session_nama		=$data['nama'];
					$session_jabatan	=$data['id_jabatan'];
					$session_nj			=$data['nama_jabatan'];
					$session_userfile	=$data['userfile'];
			}
			$sess_user=array(
							'id_pengguna'=>$session_id,
							'nip'=>$session_nip,
							'nama'=>$session_nama,
							'id_jabatan'=>$session_jabatan,
							'nama_jabatan'=>$session_nj,
							'userfile'=>$session_userfile
						   );
			$this->session->set_userdata($sess_user, true);
			$this->session->set_userdata('login',true);
			redirect(base_url('web'),'refresh');
		}
		else 
		{
			redirect(base_url('web'),'refresh');
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('login');
		redirect(base_url('web'), 'refresh');
	}

	public function cek_tags()
	{
		$id_pengguna 	= $this->get_id_pengguna();

    	$query = $this->Web_model->get_checked_new_tags($id_pengguna);

    }

    public function cek_tags_tacit()
	{
		$id_pengguna 	= $this->get_id_pengguna();

    	$query = $this->Web_model->get_count_new_tags_tacit($id_pengguna);

    	echo $query;
    }

    public function cek_tags_explicit()
	{
		$id_pengguna 	= $this->get_id_pengguna();

    	$query = $this->Web_model->get_count_new_tags_explicit($id_pengguna);

    	echo $query;
    }

    public function Ajax_hapus_tags_tacit()
	{
		$table 				= "tag_tacit";	
		$where['id_tag'] 	= $this->input->post('id_tag');
			
			$row = $this->Web_model->delete($where,$table);
			if($row > 0){
				
				echo "deleted";
			}else{

				echo "failed";
			}
			
	}

	public function Ajax_hapus_tags_explicit()
	{
		$table 				= "tag_explicit";	
		$where['id_tag'] 	= $this->input->post('id_tag');
			
			$row = $this->Web_model->delete($where,$table);
			if($row > 0){
				
				echo "deleted";
			}else{

				echo "failed";
			}
			
	}

	public function tag_masalah_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));

		$data['judul']			= "Pengetahuan Tacit Yang Dibagikan | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']	 		= $this->Web_model->tacit_tag($id_pengguna);
		$data['explicit'] 		= $this->Web_model->tag_explicit($id_pengguna);
		$data['content']		= 'tag_masalah_solusi';
		$this->load->view('template',$data);

			$id_tacit = $this->input->post('id_tacit');

					if($this->input->post('tag') !=''){
							$last_id 	= $id_tacit;
							$list_tag 	= $this->input->post('tag');
							$table1 	= "tag_tacit";

							foreach ($list_tag as $key => $a) {
								$data1['id_tacit'] 	= $last_id;
								$data1['id_pengguna']	= $a;
								$data1['tgl_tag']	= date('Y-m-d');

								$this->Web_model->insert($data1,$table1);
							}
						

						echo "<script>alert('Berhasil Membagikan Pengetahuan Tacit ini Kepada Teman Anda');</script>";
						redirect(base_url('web/lihat_masalah_solusi'), 'refresh');				
					}else{

						echo "<script>alert('Anda Tidak Memasukkan Nama Untuk Dibagikan Pengetahuan Ini!');</script>";
						redirect(base_url('web/lihat_masalah_solusi'), 'refresh');				
					}
	}

	public function tambah_tag_explicit()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));

			$id_tacit = $this->input->post('id_explicit');

					if($this->input->post('tag') !=''){
							$last_id 	= $id_explicit;
							$list_tag 	= $this->input->post('tag');
							$table1 	= "tag_explicit";

							foreach ($list_tag as $key => $a) {
								$data1['id_explicit'] 	= $last_id;
								$data1['id_pengguna']	= $a;
								$data1['tgl_tag']	= date('Y-m-d');

								$this->Web_model->insert($data1,$table1);
							}
						

						echo "<script>alert('Berhasil Membagikan Pengetahuan Explicit ini Kepada Teman Anda');</script>";
						redirect($this->class_name."/lihat_dokumen/".$id_pengguna,'refresh');					
					}else{

						echo "<script>alert('Anda Tidak Memasukkan Nama Untuk Dibagikan Pengetahuan Ini!');</script>";
						redirect($this->class_name."/lihat_dokumen/".$id_explicit,'refresh');					
					}
	}

    public function pengetahuan_dibagikan()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));

		$data['judul']			= "Pengetahuan Yang Dibagikan | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']	 		= $this->Web_model->tacit_tag($id_pengguna);
		$data['explicit'] 		= $this->Web_model->tag_explicit($id_pengguna);
		$data['content']		= 'pengetahuan_dibagikan';
		$this->load->view('template',$data);
	}

	public function pengetahuan_tacit_dibagikan()
    {
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));


					$data['judul']				= "Data Masalah & Solusi Yang Dibagikan | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
					$id_pengguna				= $this->session->userdata('id_pengguna');
					$data['pengguna']			= $this->Web_model->data_pengguna($id_pengguna);
					$data['list_user']			= $this->Web_model->get_all_user_except_this_user($id_pengguna);
					$data['notif']				= $this->Web_model->notif($id_pengguna);
					$data['valid_t']			= $this->Web_model->valid_t($id_pengguna);
					$data['nvalid_t']			= $this->Web_model->nvalid_t($id_pengguna);
					$data['valid_e']			= $this->Web_model->valid_e($id_pengguna);
					$data['nvalid_e']			= $this->Web_model->nvalid_e($id_pengguna);
					$data['tacit']	 			= $this->Web_model->tacit_tag($id_pengguna);
					$data['explicit'] 			= $this->Web_model->tag_explicit($id_pengguna);
					$data['list_shared_tacit']	= $this->Web_model->get_all_shared_tacit($id_pengguna);
					$data['content']			= "pengetahuan_tacit_dibagikan";
					$this->load->view('template',$data);

    }

	public function pengetahuan_explicit_dibagikan()
    {
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));


					$data['judul']					= "Data Dokumen Yang Dibagikan | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
					$id_pengguna					= $this->session->userdata('id_pengguna');
					$data['pengguna']				= $this->Web_model->data_pengguna($id_pengguna);
					$data['list_user']				= $this->Web_model->get_all_user_except_this_user($id_pengguna);
					$data['notif']					= $this->Web_model->notif($id_pengguna);
					$data['valid_t']				= $this->Web_model->valid_t($id_pengguna);
					$data['nvalid_t']				= $this->Web_model->nvalid_t($id_pengguna);
					$data['valid_e']				= $this->Web_model->valid_e($id_pengguna);
					$data['nvalid_e']				= $this->Web_model->nvalid_e($id_pengguna);
					$data['tacit']	 				= $this->Web_model->tacit_tag($id_pengguna);
					$data['explicit'] 				= $this->Web_model->tag_explicit($id_pengguna);
					$data['list_shared_explicit']	= $this->Web_model->get_all_shared_explicit($id_pengguna);
					$data['content']				= "pengetahuan_explicit_dibagikan";
					$this->load->view('template',$data);

    }	
	
	public function input_masalah_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));

		
		$data['judul']			= "Input Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['list_user']		= $this->Web_model->get_all_user_except_this_user($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['kategori']		= $this->Web_model->kategori();
		$data['content']		= 'input_pengetahuan_tacit';

						
		$this->load->view('template',$data);
	}
	function submit_masalah_solusi()
    {	
    	$table 				= "pengetahuan_tacit";
		$data=array();
		$data['id_pengguna']		= $this->session->userdata('id_pengguna');
		$data['id_kategori']		= $this->input->post('id_kategori');
		$data['judul_tacit']		= $this->input->post('judul_tacit');
		$data['masalah']			= $this->input->post('masalah');
		$data['solusi']				= $this->input->post('solusi');
		$data['tgl_post']			= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$data['bulan']				= gmdate('m', time()+60*60*7);
		$data['tahun']				= gmdate('Y', time()+60*60*7);
		$this->form_validation->set_rules('judul_tacit','Judul','required');
		$this->form_validation->set_rules('masalah','Masalah','required');
		$this->form_validation->set_rules('solusi','Solusi','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->input_masalah_solusi();
		}
		else
		{	
			$row = $this->Web_model->insert($data,$table);
			if($row > 0){
				if($this->input->post('tags') != 'NULL'){
							$last_id 	= $this->Web_model->get_last_insert_id_tacit($data);
							$list_tag 	= $this->input->post('tags');
							$table1 	= "tag_tacit";

							foreach ($list_tag as $key => $a) {
								$data1['id_tacit'] 	= $last_id;
								$data1['id_pengguna']	= $a;
								$data1['tgl_tag']	= date('Y-m-d');

								$this->Web_model->insert($data,$table);
							}
						}

			echo "<script> alert('Data Masalah dan Solusi Berhasil disimpan.');</script>";
			redirect(base_url('web/lihat_masalah_solusi'), 'refresh');
			}
		}
    }
	public function lihat_masalah_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']	 		= $this->Web_model->data_tacit($id_pengguna);
		$data['content']		= 'lihat_pengetahuan_tacit';
		$this->load->view('template',$data);
	}
	public function edit_masalah_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_tacit				= $this->uri->segment(3);
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['tacit']	 		= $this->Web_model->tacit($id_tacit,$id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['kategori']		= $this->Web_model->kategori();
		$data['content']		= 'edit_pengetahuan_tacit';
		$this->load->view('template',$data);
	}
	function update_masalah_solusi()
    {	
		$data=array();
		$data['id_pengguna']		= $this->session->userdata('id_pengguna');
		$data['id_kategori']		= $this->input->post('id_kategori');
		$id							= $this->input->post('id_tacit');
		$data['judul_tacit']		= $this->input->post('judul_tacit');
		$data['masalah']			= $this->input->post('masalah');
		$data['solusi']				= $this->input->post('solusi');
		$this->form_validation->set_rules('judul_tacit','Judul','required');
		$this->form_validation->set_rules('masalah','Masalah','required');
		$this->form_validation->set_rules('solusi','Solusi','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->edit_masalah_solusi();
		}
		else
		{
			$this->Web_model->update_masalah_solusi($data,$id);
			echo "<script> alert('Data Masalah dan Solusi Berhasil diupdate.');</script>";
			redirect(base_url('web/lihat_masalah_solusi'), 'refresh');
		}
    }
	function hapus_masalah_solusi()
	{
		$id_tacit				= $this->uri->segment(3);
		$this->Web_model->hapus_tacit($id_tacit);
		redirect(base_url('web/lihat_masalah_solusi'), 'refresh');
	}
	function hapus_masalah_solusi1()
	{
		$id_tacit				= $this->uri->segment(3);
		$this->Web_model->hapus_tacit($id_tacit);
		redirect(base_url('web/validasi_masalah_solusi'), 'refresh');
	}
	public function input_dokumen()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Input Dokumen | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['list_user']		= $this->Web_model->get_all_user_except_this_user($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['kategori']		= $this->Web_model->kategori();
		$data['content']		= 'input_pengetahuan_explicit';
		$this->load->view('template',$data);
	}
	function submit_dokumen()
    {	
		$data=array();
		$config['upload_path'] = './lampiran/explicit/';
		$config['allowed_types'] = 'doc|docx|xls|xlsx|ppt|pptx|pdf';
		$config['max_size']	= '900000000000000';
		$config['remove_spaces']  = FALSE;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload())
		{
			echo $config['upload_path'];
			echo $this->upload->display_errors();
		}
		else 
		{
			$data=array();
			$data['id_pengguna']		= $this->session->userdata('id_pengguna');
			$data['id_kategori']		= $this->input->post('id_kategori');
			$data['judul_explicit']		= $this->input->post('judul_explicit');
			$data['keterangan']			= $this->input->post('keterangan');
			$data['tgl_post']			= gmdate('Y-m-d G:i:s', time()+60*60*7);
			$data['bulan']				= gmdate('m', time()+60*60*7);
			$data['tahun']				= gmdate('Y', time()+60*60*7);
			$data['userfile']			= $_FILES['userfile']['name'];
			$this->form_validation->set_rules('judul_explicit','judul','required');
			$this->form_validation->set_rules('keterangan','keterangan','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->input_dokumen();
			}
			else
			{
				$this->Web_model->input_dokumen($data);
				echo "<script> alert('Data Dokumen Berhasil disimpan.');</script>";
				redirect(base_url('web/lihat_dokumen'), 'refresh');
			}
		}
    }
	public function lihat_dokumen()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Dokumen | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['explicit'] 		= $this->Web_model->data_explicit($this->session->userdata('id_pengguna'));
		$data['content']		= 'lihat_pengetahuan_explicit';
		$this->load->view('template',$data);
	}
	public function edit_dokumen()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Dokumen | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_explicit			= $this->uri->segment(3);
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['explicit'] 		= $this->Web_model->explicit($id_explicit,$id_pengguna);
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['kategori']		= $this->Web_model->kategori();
		$data['content']		= 'edit_pengetahuan_explicit';
		$this->load->view('template',$data);
	}
	function update_dokumen()
    {	
		$data=array();
		$config['upload_path'] = './lampiran/explicit/';
		$config['allowed_types'] = 'doc|docx|xls|xlsx|ppt|pptx|pdf';
		$config['max_size']	= '2000';
		$config['remove_spaces']  = FALSE;
		$this->load->library('upload', $config);
		if(empty($_FILES['userfile']['name']))
		{
			$data=array();
			$data['id_pengguna']		= $this->session->userdata('id_pengguna');
			$data['id_kategori']		= $this->input->post('id_kategori');
			$id							= $this->input->post('id_explicit');
			$data['judul_explicit']		= $this->input->post('judul_explicit');
			$data['keterangan']			= $this->input->post('keterangan');
			//$data['tgl_post']			= gmdate('Y-m-d G:i:s', time()+60*60*7);
			$this->form_validation->set_rules('judul_explicit','judul','required');
			$this->form_validation->set_rules('keterangan','keterangan','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->edit_dokumen();
			}
			else
			{
				$this->Web_model->update_dokumen($data,$id);
				echo "<script> alert('Data Dokumen diupdate.');</script>";
				redirect(base_url('web/lihat_dokumen'), 'refresh');
			}
		}
		else
		{
			if(!$this->upload->do_upload())
			{
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}
			else 
			{
				$data=array();
				$data['id_pengguna']		= $this->session->userdata('id_pengguna');
				$data['id_kategori']		= $this->input->post('id_kategori');
				$id							= $this->input->post('id_explicit');
				$data['judul_explicit']		= $this->input->post('judul_explicit');
				$data['keterangan']			= $this->input->post('keterangan');
				$data['tgl_post']			= gmdate('Y-m-d G:i:s', time()+60*60*7);
				$data['userfile']			= $_FILES['userfile']['name'];
				$this->form_validation->set_rules('judul_explicit','judul','required');
				$this->form_validation->set_rules('keterangan','keterangan','required');
				if($this->form_validation->run() == FALSE)
				{
					$this->edit_dokumen();
				}
				else
				{
					$this->Web_model->update_dokumen($data,$id);
					echo "<script> alert('Data Dokumen diupdate.');</script>";
					redirect(base_url('web/lihat_dokumen'), 'refresh');
				}
			}
		}
    }
	function hapus_dokumen()
	{
		$id_explicit			= $this->uri->segment(3);
		$this->Web_model->hapus_dokumen($id_explicit);
		redirect(base_url('web/lihat_dokumen'), 'refresh');
	}
	function hapus_dokumen1()
	{
		$id_explicit			= $this->uri->segment(3);
		$this->Web_model->hapus_dokumen($id_explicit);
		redirect(base_url('web/validasi_dokumen'), 'refresh');
	}
	
	
	public function input_pengguna()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Input Pengguna | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['jabatan']		= $this->Web_model->data_jabatan();
		$data['content']		= 'input_pengguna';
		$this->load->view('template',$data);
	}
	function submit_data_pengguna()
    {	
		$data=array();
		$data['nip']		= $this->input->post('nip');
		$data['password']		= md5($this->input->post('nip'));
		$data['nama']			= $this->input->post('nama');
		$data['jenis_kelamin']	= $this->input->post('jenis_kelamin');
		$data['tempat_lahir']	= $this->input->post('tempat_lahir');
		$data['tanggal_lahir']	= $this->input->post('tanggal_lahir');
		$data['id_jabatan']		= $this->input->post('id_jabatan');
		$data['hak_akses']		= $this->input->post('hak_akses');
		$this->form_validation->set_rules('nip','no nip','required|is_unique[pengguna.nip]');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
		$this->form_validation->set_rules('id_jabatan','jabatan','required');
		$this->form_validation->set_rules('hak_akses','hak akses','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->input_pengguna();
		}
		else
		{
			$this->Web_model->input_pengguna($data);
			echo "<script> alert('Data Pengguna disimpan.');</script>";
			redirect(base_url('web/daftar_pengguna'), 'refresh');
		}
    }

	public function daftar_pengguna()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Daftar Pengguna | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['pengguna']		= $this->Web_model->daftar_pengguna();
		$data['content']		= 'daftar_pengguna';
		$this->load->view('template',$data);
	}

	public function edit_pengguna()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Pengguna | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['pengguna'] 		= $this->Web_model->edit_pengguna($id);
		$data['nama'] 			= $this->session->userdata('nama');
		$data['jabatan']		= $this->session->userdata('nama_jabatan');
		$data['jabatan']		= $this->Web_model->data_jabatan();
		$data['content']		= 'edit_pengguna';
		$this->load->view('template',$data);
	}

	function update_data_pengguna()
    {	
		$data=array();
		$id						= $this->input->post('id_pengguna');
		$data['nip']		= $this->input->post('nip');
		$data['nama']			= $this->input->post('nama');
		$data['jenis_kelamin']	= $this->input->post('jenis_kelamin');
		$data['tempat_lahir']	= $this->input->post('tempat_lahir');
		$data['tanggal_lahir']	= $this->input->post('tanggal_lahir');
		$data['id_jabatan']		= $this->input->post('id_jabatan');
		$data['hak_akses']		= $this->input->post('hak_akses');
		$this->form_validation->set_rules('nip','no nip','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
		$this->form_validation->set_rules('id_jabatan','jabatan','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->edit_pengguna();
		}
		else
		{
			$this->Web_model->update_pengguna($data,$id);
			echo "<script> alert('Data Pengguna berhasil diupdate.');</script>";
			redirect(base_url('web/daftar_pengguna'), 'refresh');
		}
    }

	function update_profil()
    {	
		$data=array();
		$config['upload_path'] = './photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '3000';
		$config['max_height']  = '4000';
		$config['remove_spaces']  = FALSE;
		$this->load->library('upload', $config);
		if(empty($_FILES['userfile']['name']))
		{
			$data=array();
			$id						= $this->session->userdata('id_pengguna');;
			$data['nip']			= $this->input->post('nip');
			$data['nama']			= $this->input->post('nama');
			$data['jenis_kelamin']	= $this->input->post('jenis_kelamin');
			$data['tempat_lahir']	= $this->input->post('tempat_lahir');
			$data['tanggal_lahir']	= $this->input->post('tanggal_lahir');
			$data['id_jabatan']		= $this->input->post('id_jabatan');
			$this->form_validation->set_rules('nip','no nip','required');
			$this->form_validation->set_rules('nama','nama','required');
			$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
			$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
			$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
			$this->form_validation->set_rules('id_jabatan','jabatan','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->edit_profil();
			}
			else
			{
				$this->Web_model->update_pengguna($data,$id);
				redirect(base_url('web/edit_profil'), 'refresh');
			}
		}
		else
		{
			if(!$this->upload->do_upload())
			{
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}
			else 
			{
				$data=array();
				$id						= $this->session->userdata('id_pengguna');;
				$data['nip']			= $this->input->post('nip');
				$data['nama']			= $this->input->post('nama');
				$data['jenis_kelamin']	= $this->input->post('jenis_kelamin');
				$data['tempat_lahir']	= $this->input->post('tempat_lahir');
				$data['tanggal_lahir']	= $this->input->post('tanggal_lahir');
				$data['id_jabatan']		= $this->input->post('id_jabatan');
				$data['userfile']		= $_FILES['userfile']['name'];
				$this->form_validation->set_rules('nip','no nip','required');
				$this->form_validation->set_rules('nama','nama','required');
				$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
				$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
				$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
				$this->form_validation->set_rules('id_jabatan','jabatan','required');
				if($this->form_validation->run() == FALSE)
				{
					$this->edit_profil();
				}
				else
				{
					$this->Web_model->update_pengguna($data,$id);
					redirect(base_url('web/edit_profil'), 'refresh');
				}
			}
		}
    }

	function reset_password()
	{
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$pengguna				= $this->Web_model->data_pengguna($id_pengguna);
		foreach($pengguna->result_array() as $p){
			$data['password']	= md5($p['nip']);
		}
		$id					= $this->uri->segment(3);
		$this->Web_model->reset_password($id,$data);
		echo "<script> alert('Password berhasil direset.');</script>";
		redirect(base_url('web/daftar_pengguna'), 'refresh');
	}

	function hapus_pengguna()
	{
		$id					= $this->uri->segment(3);
		$this->Web_model->hapus_pengguna($id);
		redirect(base_url('web/daftar_pengguna'), 'refresh');
	}

	public function data_masalah_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']	 		= $this->Web_model->daftar_data_tacit();
		$data['content']		= 'tacit_data';
		$this->load->view('template',$data);
	}

	public function validasi_masalah_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']	 		= $this->Web_model->validasi_tacit();
		$data['content']		= 'daftar_pengetahuan_tacit';
		$this->load->view('template',$data);
	}

	function validasi_tacit()
	{
		$id						= $this->uri->segment(3);
		$id_pengguna			= $this->uri->segment(4);
		$data['validasi_tacit']	= "1";
		$this->Web_model->tacit_validasi($data,$id);
		$lihat_poin				= $this->Web_model->lihat_poin($id_pengguna);
		foreach($lihat_poin->result_array() as $l){
			$poin				= $l['poin'];
		}
		$p['poin']				= $poin+10;
		$this->Web_model->update_poin($p,$id_pengguna);
		$s['id_penerima']				= $id_pengguna;
		$s['id_posting']				= $id;
		$s['kategori']					= "v_tacit";
		$s['tgl_notif']					= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']					= 'N';
		$this->Web_model->input_notifikasi($s);
		redirect(base_url('web/validasi_masalah_solusi'), 'refresh');
	}

	function batal_validasi_tacit()
	{
		$id						= $this->uri->segment(3);
		$id_pengguna			= $this->uri->segment(4);
		$data['validasi_tacit']	= "0";
		$this->Web_model->tacit_validasi($data,$id);
		$lihat_poin				= $this->Web_model->lihat_poin($id_pengguna);
		foreach($lihat_poin->result_array() as $l){
			$poin				= $l['poin'];
		}
		$p['poin']				= $poin-10;
		$this->Web_model->update_poin($p,$id_pengguna);
		$kategori					= "v_tacit";
		$this->Web_model->hapus_notifikasi($id,$kategori);
		redirect(base_url('web/validasi_masalah_solusi'), 'refresh');
	}

	public function data_dokumen()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Dokumen | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['explicit'] 		= $this->Web_model->daftar_data_explicit();
		$data['content']		= 'daftar_pengetahuan_explicit';
		$this->load->view('template',$data);
	}

	public function validasi_dokumen()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Dokumen | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['explicit'] 		= $this->Web_model->validasi_explicit();
		$data['content']		= 'daftar_dokumen';
		$this->load->view('template',$data);
	}

	function validasi_explicit()
	{
		$id						= $this->uri->segment(3);
		$id_pengguna			= $this->uri->segment(4);
		$data['validasi_explicit']	= "1";
		$this->Web_model->explicit_validasi($data,$id);
		$lihat_poin				= $this->Web_model->lihat_poin($id_pengguna);
		foreach($lihat_poin->result_array() as $l){
		$poin					= $l['poin'];
		}
		$p['poin']				= $poin+10;
		$this->Web_model->update_poin($p,$id_pengguna);
		$s['id_penerima']				= $id_pengguna;
		$s['id_posting']				= $id;
		$s['kategori']					= "v_explicit";
		$s['tgl_notif']					= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']					= 'N';
		$this->Web_model->input_notifikasi($s);
		redirect(base_url('web/validasi_dokumen'), 'refresh');
	}

	function batal_validasi_explicit()
	{
		$id						= $this->uri->segment(3);
		$id_pengguna			= $this->uri->segment(4);
		$data['validasi_explicit']	= "0";
		$this->Web_model->explicit_validasi($data,$id);
		$lihat_poin				= $this->Web_model->lihat_poin($id_pengguna);
		foreach($lihat_poin->result_array() as $l){
		$poin					= $l['poin'];
		}
		$p['poin']				= $poin-10;
		$this->Web_model->update_poin($p,$id_pengguna);
		$kategori					= "v_explicit";
		$this->Web_model->hapus_notifikasi($id,$kategori);
		redirect(base_url('web/validasi_dokumen'), 'refresh');
	}

	public function detail_masalah_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['detail']	 		= $this->Web_model->detail_masalah($id);
		$data['komentar'] 		= $this->Web_model->komentar_tacit($id);
		$data['cek_user']		= $this->Web_model->cek_user($id,$id_pengguna);
		$data['total_likes']	= $this->Web_model->total_like($id);
		$data['list_untagged']	= $this->Web_model->get_all_user_except_this_user_and_tagged_tacit_user($id_pengguna,$id);
		$data['list_tagged']	= $this->Web_model->get_all_tacit_taged_user($id);
		$data['content']		= 'detail_masalah_solusi';
		$this->load->view('template',$data);
	}

	public function cek_masalah()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['detail']	 		= $this->Web_model->detail_masalah($id);
		$data['komentar'] 		= $this->Web_model->komentar_tacit($id);
		$data['cek_user']		= $this->Web_model->cek_user($id,$id_pengguna);
		$data['total_likes']	= $this->Web_model->total_like($id);
		$data['list_untagged']	= $this->Web_model->get_all_user_except_this_user_and_tagged_tacit_user($id_pengguna,$id);
		$data['list_tagged']	= $this->Web_model->get_all_tacit_taged_user($id);
		$data['content']		= 'cek_masalah';
		$this->load->view('template',$data);
	}
	public function like()
	{
		$id					= $this->uri->segment(3);
		$total_likes		= $this->Web_model->total_like($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= $tl['like'];
		}
		$data['like']		= $likes+1;
		$update_like		= $this->Web_model->update_like_tacit($data,$id);
		$d['id_tacit']		= $this->uri->segment(3);
		$d['id_pengguna']	= $this->session->userdata('id_pengguna');
		$d['tgl_like']		= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$insert_like		= $this->Web_model->insert_like_tacit($d);
		
		$tacit_nama			= $this->Web_model->tacit_nama($id);
		foreach($tacit_nama->result_array() as $tn)
		{
			$id_penerima	= $tn['id_pengguna'];
		}
		$s['id_pengguna']				= $this->session->userdata('id_pengguna');
		$s['id_penerima']				= $id_penerima;
		$s['id_posting']				= $this->uri->segment(3);
		$s['kategori']					= "like_t";
		$s['tgl_notif']					= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']					= 'N';
		$this->Web_model->input_notifikasi($s);

		$data['total_likes']= $this->Web_model->total_like($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes	= $r['like'];
		}
	}

	public function unlike()
	{
		$id					= $this->uri->segment(3);
		$total_likes		= $this->Web_model->total_like($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= $tl['like'];
		}
		$data['like']		= $likes-1;
		$update_like		= $this->Web_model->update_like_tacit($data,$id);
		$id					= $this->uri->segment(3);
		$id_pengguna		= $this->session->userdata('id_pengguna');
		$delete_like		= $this->Web_model->delete_like_tacit($id,$id_pengguna);
		
		$tacit_nama			= $this->Web_model->tacit_nama($id);
		foreach($tacit_nama->result_array() as $tn)
		{
			$id_penerima	= $tn['id_pengguna'];
		}
		$id_pengguna		= $this->session->userdata('id_pengguna');
		$id_penerima		= $id_penerima;
		$id_posting			= $this->uri->segment(3);
		$kategori			= "like_t";
		$this->Web_model->delete_notifikasi($id_pengguna,$id_penerima,$id_posting,$kategori);
		
		$data['total_likes']= $this->Web_model->total_like($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes	= $r['like'];
		}
	}

	public function like_e()
	{
		$id					= $this->uri->segment(3);
		$total_likes		= $this->Web_model->total_like_e($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= $tl['like'];
		}
		$data['like']		= $likes+1;
		$update_like		= $this->Web_model->update_like_explicit($data,$id);
		$d['id_explicit']	= $this->uri->segment(3);
		$d['id_pengguna']	= $this->session->userdata('id_pengguna');
		$d['tgl_like']		= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$insert_like		= $this->Web_model->insert_like_explicit($d);
		
		$explicit_nama		= $this->Web_model->explicit_nama($id);
		foreach($explicit_nama->result_array() as $tn)
		{
			$id_penerima	= $tn['id_pengguna'];
		}
		$s['id_pengguna']				= $this->session->userdata('id_pengguna');
		$s['id_penerima']				= $id_penerima;
		$s['id_posting']				= $this->uri->segment(3);
		$s['kategori']					= "like_e";
		$s['tgl_notif']					= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']					= 'N';
		$this->Web_model->input_notifikasi($s);
		
		$data['total_likes']= $this->Web_model->total_like_e($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes	= $r['like'];
		}
	}

	public function unlike_e()
	{
		$id					= $this->uri->segment(3);
		$total_likes		= $this->Web_model->total_like_e($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= $tl['like'];
		}
		$data['like']		= $likes-1;
		$update_like		= $this->Web_model->update_like_explicit($data,$id);
		$id					= $this->uri->segment(3);
		$id_pengguna		= $this->session->userdata('id_pengguna');
		$delete_like		= $this->Web_model->delete_like_explicit($id,$id_pengguna);
		
		$explicit_nama		= $this->Web_model->explicit_nama($id);
		foreach($explicit_nama->result_array() as $tn)
		{
			$id_penerima	= $tn['id_pengguna'];
		}
		$id_pengguna		= $this->session->userdata('id_pengguna');
		$id_penerima		= $id_penerima;
		$id_posting			= $this->uri->segment(3);
		$kategori			= "like_e";
		$this->Web_model->delete_notifikasi($id_pengguna,$id_penerima,$id_posting,$kategori);
		
		$data['total_likes']= $this->Web_model->total_like_e($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes	= $r['like'];
		}
	}

	public function detail_dokumen()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['detail']	 		= $this->Web_model->detail_dokumen($id);
		$data['komentar'] 		= $this->Web_model->komentar_explicit($id);
		$data['cek_user']		= $this->Web_model->cek_user_e($id,$id_pengguna);
		$data['total_likes']	= $this->Web_model->total_like_e($id);
		$data['list_untagged']	= $this->Web_model->get_all_user_except_this_user_and_tagged_tacit_user($id_pengguna,$id);
		$data['list_tagged']	= $this->Web_model->get_all_tacit_taged_user($id);
		$data['content']		= 'detail_dokumen';
		$this->load->view('template',$data);
	}

	public function cek_dokumen()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Lihat Masalah dan Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['detail']	 		= $this->Web_model->detail_dokumen($id);
		$data['komentar'] 		= $this->Web_model->komentar_explicit($id);
		$data['cek_user']		= $this->Web_model->cek_user_e($id,$id_pengguna);
		$data['total_likes']	= $this->Web_model->total_like_e($id);
		$data['list_untagged']	= $this->Web_model->get_all_user_except_this_user_and_tagged_explicit_user($id_pengguna,$id);
		$data['list_tagged']	= $this->Web_model->get_all_explicit_taged_user($id);
		$data['content']		= 'cek_dokumen';
		$this->load->view('template',$data);
	}

	public function data_gejala()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Data Gejala | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['kode_gejala']	= $this->Web_model->kode_gejala();
		$data['gejala']			= $this->Web_model->gejala();
		$data['bagian']			= $this->Web_model->bagian();
		$data['content']		= 'data_gejala';
		$this->load->view('template',$data);
	}

	function submit_gejala()
    {	
		$data=array();
		$data['id_gejala']		= $this->input->post('id_gejala');
		$data['nama_gejala']	= $this->input->post('nama_gejala');
		$data['urut']			= $this->input->post('urut');
		$data['bobot_gejala']	= $this->input->post('bobot_gejala');
		$data['id_bagian']		= $this->input->post('id_bagian');
		$this->form_validation->set_rules('id_gejala','id gejala','required');
		$this->form_validation->set_rules('nama_gejala','nama gejala','required');
		$this->form_validation->set_rules('id_bagian','id bagian','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->data_gejala();
		}
		else
		{
			$this->Web_model->input_gejala($data);
			redirect(base_url('web/data_gejala'), 'refresh');
		}
    }

	public function edit_gejala()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Gejala | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['gejala']			= $this->Web_model->gejala();
		$id						= $this->uri->segment(3);
		$data['edit']			= $this->Web_model->edit_gejala($id);
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['bagian']			= $this->Web_model->bagian();
		$data['content']		= 'edit_gejala';
		$this->load->view('template',$data);
	}

	function update_gejala()
    {	
		$data=array();
		$id						= $this->input->post('id_gejala');
		$data['nama_gejala']	= $this->input->post('nama_gejala');
		$data['bobot_gejala']	= $this->input->post('bobot_gejala');
		$data['id_bagian']		= $this->input->post('id_bagian');
		$this->form_validation->set_rules('id_gejala','id gejala','required');
		$this->form_validation->set_rules('nama_gejala','nama gejala','required');
		$this->form_validation->set_rules('id_bagian','id bagian','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->edit_gejala();
		}
		else
		{
			$this->Web_model->update_gejala($data,$id);
			redirect(base_url('web/data_gejala'), 'refresh');
		}
    }

	function hapus_gejala()
	{
		$id					= $this->uri->segment(3);
		$this->Web_model->hapus_gejala($id);
		redirect(base_url('web/data_gejala'), 'refresh');
	}
	
	public function data_kasus()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Data Kasus | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['kode_kasus']		= $this->Web_model->kode_kasus();
		$data['gejala']			= $this->Web_model->daftar_gejala();
		$data['kasus']			= $this->Web_model->daftar_kasus1();
		$data['gejala_masalah']	= $this->Web_model->gejala_masalah();
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['riwayat']		= $this->Web_model->riwayat();
		$data['content']		= 'data_kasus';
		$this->load->view('template',$data);
	}
	
	function submit_kasus()
    {
		$data=array();
		$data['id_solusi']		= $this->input->post('id_solusi');
		$data['nama_solusi']	= $this->input->post('nama_solusi');
		$data['solusi_masalah']	= $this->input->post('solusi_masalah');
		$data['urut']			= $this->input->post('urut');
		$this->form_validation->set_rules('nama_solusi','masalah','required');
		$this->form_validation->set_rules('solusi_masalah','solusi masalah','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->data_kasus();
		}
		else
		{
			$this->Web_model->input_solusi($data);
			foreach($_POST['inp'] as $rows)
			{
				$this->Web_model->input_kasus($rows);
			}
			echo "<script> alert('Data kasus berhasil disimpan');</script>";
			redirect(base_url('web/data_kasus'), 'refresh');
		}
    }
	
	function delete_gejala()
	{
		$id_solusi				= $this->input->post('id_solusi');
		$id_gejala				= $this->input->post('id_gejala');
		$this->Web_model->delete_gejala($id_solusi,$id_gejala);
		?>
		<script>window.location="edit_solusi/<?php echo $id_solusi;?>";</script>;
		<?php
	}
	
	function tambah_gejala()
	{
		$rows['id_solusi']		= $this->input->post('id_solusi');
		$rows['id_gejala']		= $this->input->post('id_gejala');
		$this->Web_model->input_kasus($rows);
		?>
		<script>window.location="edit_solusi/<?php echo $rows['id_solusi'];?>";</script>;
		<?php
	}
	
	function hapus_solusi()
	{
		$id					= $this->uri->segment(3);
		$this->Web_model->hapus_solusi($id);
		redirect(base_url('web/data_kasus'), 'refresh');
	}
	
	public function edit_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['gejala']			= $this->Web_model->daftar_gejala();
		$data['solusi']	 		= $this->Web_model->edit_solusi($id);
		$data['gejala_masalah']	= $this->Web_model->gejala_masalah();
		$data['content']		= 'edit_solusi';
		$this->load->view('template',$data);
	}
	
	function update_solusi()
	{
		$id						= $this->input->post('id_solusi');
		$data['nama_solusi']	= $this->input->post('nama_solusi');
		$data['solusi_masalah']	= $this->input->post('solusi_masalah');
		$this->Web_model->update_solusi($data,$id);
		redirect(base_url('web/data_kasus'), 'refresh');
	}
	
	public function problem_solving()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Problem Solving | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['gejala']			= $this->Web_model->daftar_gejala();
		$data['content']		= 'problem_solving';
		$this->load->view('template',$data);
	}
	
	function cari_solusi()
    {
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$this->Web_model->reset_gejala($id_pengguna);
		$this->Web_model->reset_solusi($id_pengguna);
		//TAHAP 1 = RETRIEVE
		//1. Identifikasi fitur
		foreach($_POST['inp'] as $rows)
		{
			$rows['id_pengguna']	= $this->session->userdata('id_pengguna');
			$this->Web_model->cari_solusi($rows);
		}
		
		$kasus					= $this->Web_model->kasus_cari();//solusi
		$tmp_gejala				= $this->Web_model->tmp_gejala($id_pengguna);
		$h_tmp_gejala			= $this->Web_model->hitung_tmp_gejala($id_pengguna);
		$perbandingan			= $this->Web_model->perbandingan();//kasus gejala
		$hitung_gejala			= $this->Web_model->hitung_gejala();//kasus gejala
		//2. Memulai Pencocokan
		$s=0;
		foreach($tmp_gejala->result_array() as $t)
		{
		$bobot=$t['bobot_gejala'];
		$s=$s+$bobot;//total bobot identifikasi fitur
		}
		
		foreach($kasus->result_array() as $k)//daftar kasus yang tersimpan
		{
			foreach($hitung_gejala->result_array() as $hg)
			if($k['id_solusi']==$hg['id_solusi'])
			{
				$h_gejala	= $hg['jml'];
			}
			$pe=0;
			foreach($tmp_gejala->result_array() as $t)//gejala identifikasi fitur
			{
				foreach($h_tmp_gejala->result_array() as $ht){
					$h_fitur	= $ht['jml'];
				}
				foreach($perbandingan->result_array() as $p)//pencocokan gejala
				if($p['id_solusi']==$k['id_solusi'] && $t['id_gejala']==$p['id_gejala'])
				{	
					$b=$p['bobot_gejala'];
					echo "<br/>";
					$pe=$pe+$b;
				} 
			}
			$h['id_solusi']		= $k['id_solusi'];
			$similarity=$pe/$s;
			$h['nilai']			= $similarity;
			$h['jumlah_gejala']	= $h_gejala;
			$h['jumlah_fitur']	= $h_fitur;
			$h['selisih']		= abs($h_gejala-$h_fitur);
			$h['id_pengguna']	= $id_pengguna;
			$this->Web_model->input_nilai($h);
		}
		//TAHAP 2 = REUSE
		$nilai_similarity		= $this->Web_model->solusi_kasus($id_pengguna);
		foreach($nilai_similarity->result_array() as $n){
			$n_similarity		= $n['nilai'];
			$kd_solusi			= $n['id_solusi'];
			$selisih			= $n['selisih'];	
		}
		//TAHAP 3 = REVISE
		
		//jika nilai similarity 1 tetapi gejala tidak sama	
		if(($n_similarity==1) && ($selisih!=0))
		{
			//membuat kode solusi untuk revise
			$kode_kasus				= $this->Web_model->kode_kasus();
			foreach($kode_kasus->result_array() as $rows){
				$no = @$rows['urut'] + 1;
				if(strlen($no) == '1'){
				  $kd_solusi = "S00".$no;
				}elseif(strlen($no) == '2'){
				  $kd_solusi = "S0".$no;
				}elseif(strlen($no) == '3'){
				  $kd_solusi = "S".$no;
				}
			}
			$data['solusi']			= $this->Web_model->solusi_problem($id_pengguna);
			foreach($data['solusi']->result_array() as $solusi1){
				$r['id_solusi']		= $kd_solusi;
				$r['nama_solusi']	= $solusi1['nama_solusi'];
				$r['solusi_masalah']= $solusi1['solusi_masalah'];
				$r['validasi']		= 1;
				$r['urut']			= $no;
				$this->Web_model->input_kasus_revise($r);//solusi revise
			}
			$data['tmp_gejala']		= $this->Web_model->tmp_gejala($id_pengguna);
			foreach($data['tmp_gejala']->result_array() as $gm){
				$g['id_gejala']	= $gm['id_gejala'];
				$g['id_solusi']	= $kd_solusi;
				$this->Web_model->input_gejala_revise($g);//kasus revise
			}
		}
		if($n_similarity >=0.70 && $n_similarity<1)//jika nilai similarity antara 0,70 sampai 1
		{
			//membuat kode solusi untuk revise
			$kode_kasus				= $this->Web_model->kode_kasus();
			foreach($kode_kasus->result_array() as $rows){
				$no = @$rows['urut'] + 1;
				if(strlen($no) == '1'){
				  $kd_solusi = "S00".$no;
				}elseif(strlen($no) == '2'){
				  $kd_solusi = "S0".$no;
				}elseif(strlen($no) == '3'){
				  $kd_solusi = "S".$no;
				}
			}
			$data['solusi']			= $this->Web_model->solusi_problem($id_pengguna);
			foreach($data['solusi']->result_array() as $solusi1){
				$r['id_solusi']		= $kd_solusi;
				$r['nama_solusi']	= $solusi1['nama_solusi'];
				$r['solusi_masalah']= $solusi1['solusi_masalah'];
				$r['validasi']		= 1;
				$r['urut']			= $no;
				$this->Web_model->input_kasus_revise($r);
			}
			$data['tmp_gejala']		= $this->Web_model->tmp_gejala($id_pengguna);
			foreach($data['tmp_gejala']->result_array() as $gm){
				$g['id_gejala']	= $gm['id_gejala'];
				$g['id_solusi']	= $kd_solusi;
				$this->Web_model->input_gejala_revise($g);
			}
		}
		//jika nilai similarity dibawah 0.70
		if($n_similarity <0.70)
		{
			//membuat kode solusi untuk revise
			$kode_kasus				= $this->Web_model->kode_kasus();
			foreach($kode_kasus->result_array() as $rows){
				$no = @$rows['urut'] + 1;
				if(strlen($no) == '1'){
				  $kd_solusi = "S00".$no;
				}elseif(strlen($no) == '2'){
				  $kd_solusi = "S0".$no;
				}elseif(strlen($no) == '3'){
				  $kd_solusi = "S".$no;
				}
			}
			$r['id_solusi']		= $kd_solusi;
			$r['nama_solusi']	= "Kasus belum ada di database";
			$r['solusi_masalah']= "Rekomendasi solusi belum tersedia";
			$r['validasi']		= 1;
			$r['urut']			= $no;
			$this->Web_model->input_kasus_revise($r);
			
			$data['tmp_gejala']		= $this->Web_model->tmp_gejala($id_pengguna);
			foreach($data['tmp_gejala']->result_array() as $gm){
				$g['id_gejala']	= $gm['id_gejala'];
				$g['id_solusi']	= $kd_solusi;
				$this->Web_model->input_gejala_revise($g);
			}
		}
		//redirect(base_url('web/detail_solusi'), 'refresh');
		?>
		<script>window.location="detail_solusi/<?php echo $kd_solusi;?>";</script>;
		<?php
    }

	public function detail_solusi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Detail Problem Solving | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['solusi']			= $this->Web_model->solusi_kasus($id_pengguna);
		$data['tmp_gejala']		= $this->Web_model->tmp_gejala($id_pengguna);
		$data['detail_solusi']	= $this->Web_model->detail_solusi($id);
		$data['detail_solusi']	= $this->Web_model->detail_solusi($id);
		$data['riwayat']		= $this->Web_model->daftar_kasus_riwayat1($id);
		$jumlah_lihat			= $this->Web_model->detail_solusi($id);
		foreach($jumlah_lihat->result_array() as $lihat){
			$l['dilihat']		= $lihat['dilihat']+1;
		}
		$this->Web_model->update_dilihat($l,$id);
		$data['content']		= 'detail_solusi';
		$this->load->view('template',$data);
	}
	
	function revisi_solusi()
    {	
		$data=array();
		$id						= $this->input->post('id_solusi');
		$data['validasi']		= '3';
		
		$r['id_solusi']			= $this->input->post('id_solusi');
		$r['revisi']			= $this->input->post('revisi');
		$r['id_pengguna']		= $this->input->post('id_pengguna');
		$this->Web_model->revisi_solusi($data,$id);
		$this->Web_model->input_revisi_pengguna($r);
		?>
		<script>window.location="detail_solusi/<?php echo $id;?>";</script>;
		<?php
    }
	
	public function revise()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Data Revisi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['kasus']			= $this->Web_model->daftar_kasus_revise();
		$data['revisi']			= $this->Web_model->revisi_pengguna();
		$data['gejala_masalah']	= $this->Web_model->gejala_masalah();
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['riwayat']		= $this->Web_model->riwayat();
		$data['content']		= 'data_revise';
		$this->load->view('template',$data);
	}
	
	public function edit_revisi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Solusi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['gejala']			= $this->Web_model->daftar_gejala();
		$data['solusi']	 		= $this->Web_model->edit_solusi($id);
		$data['gejala_masalah']	= $this->Web_model->gejala_masalah();
		$data['revisi']			= $this->Web_model->revisi_pengguna();
		$data['content']		= 'edit_revisi';
		$this->load->view('template',$data);
	}
	
	function update_revisi()
	{
		$id						= $this->input->post('id_solusi');
		$data['nama_solusi']	= $this->input->post('nama_solusi');
		$data['solusi_masalah']	= $this->input->post('solusi_masalah');
		$data['validasi']		= '0';
		
		$r['id_solusi']			= $this->input->post('r_id_solusi');
		$r['nama_solusi']		= $this->input->post('r_nama_solusi');
		$r['solusi_masalah']	= $this->input->post('r_solusi_masalah');
		if($r['nama_solusi']!="Kasus belum ada di database"){
		$this->Web_model->input_riwayat($r);
		}
		$this->Web_model->update_solusi($data,$id);
		$this->Web_model->hapus_revisi_pengguna($id);
		redirect(base_url('web/revise'), 'refresh');
	}
	
	function hapus_revisi()
	{
		$id					= $this->uri->segment(3);
		$this->Web_model->hapus_solusi($id);
		redirect(base_url('web/revise'), 'refresh');
	}
	
	function delete_gejala_revise()
	{
		$id_solusi				= $this->input->post('id_solusi');
		$id_gejala				= $this->input->post('id_gejala');
		$this->Web_model->delete_gejala($id_solusi,$id_gejala);
		?>
		<script>window.location="edit_revisi/<?php echo $id_solusi;?>";</script>;
		<?php
	}
	
	function tambah_gejala_revise()
	{
		$rows['id_solusi']		= $this->input->post('id_solusi');
		$rows['id_gejala']		= $this->input->post('id_gejala');
		$this->Web_model->input_kasus($rows);
		?>
		<script>window.location="edit_revisi/<?php echo $rows['id_solusi'];?>";</script>;
		<?php
	}
	
	function submit_komentar_tacit()
    {	
		$data=array();
		$data['id_tacit']			= $this->input->post('id_tacit');
		$data['isi_komentar_tacit']	= $this->input->post('isi_komentar_tacit');
		$data['id_pengguna']		= $this->session->userdata('id_pengguna');
		$data['tgl_komentar']		= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$this->Web_model->input_komentar_tacit($data);
		$s['id_pengguna']			= $this->session->userdata('id_pengguna');
		$s['id_penerima']			= $this->input->post('id_penerima');
		$s['id_posting']			= $this->input->post('id_tacit');
		$s['kategori']				= "tacit";
		$s['tgl_notif']				= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']				= 'N';
		$this->Web_model->input_notifikasi($s);
		?>
		<script>window.location="detail_masalah_solusi/<?php echo $data['id_tacit'];?>";</script>;
		<?php
    }
	
	function hapus_komentar_tacit()
	{
		$id							= $this->input->post('id_komentar_tacit');
		$data['id_tacit']			= $this->input->post('id_tacit');
		$this->Web_model->hapus_komentar_tacit($id);
		?>
		<script>window.location="detail_masalah_solusi/<?php echo $data['id_tacit'];?>";</script>;
		<?php
	}
	
	function submit_komentar_explicit()
    {	
		$data=array();
		$data['id_explicit']			= $this->input->post('id_explicit');
		$data['isi_komentar_explicit']	= $this->input->post('isi_komentar_explicit');
		$data['id_pengguna']			= $this->session->userdata('id_pengguna');
		$data['tgl_komentar']			= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$this->Web_model->input_komentar_explicit($data);
		$s['id_pengguna']				= $this->session->userdata('id_pengguna');
		$s['id_penerima']				= $this->input->post('id_penerima');
		$s['id_posting']				= $this->input->post('id_explicit');
		$s['kategori']					= "explicit";
		$s['tgl_notif']					= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']					= 'N';
		$this->Web_model->input_notifikasi($s);
		?>
		<script>window.location="detail_dokumen/<?php echo $data['id_explicit'];?>";</script>;
		<?php
    }
	
	function hapus_komentar_explicit()
	{
		$id								= $this->input->post('id_komentar_explicit');
		$data['id_explicit']			= $this->input->post('id_explicit');
		$this->Web_model->hapus_komentar_explicit($id);
		?>
		<script>window.location="detail_dokumen/<?php echo $data['id_explicit'];?>";</script>;
		<?php
	}
	
	public function profil()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Profil Pengguna| KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']			= $this->Web_model->data_tacit_validasi($id_pengguna);
		$data['explicit']		= $this->Web_model->data_explicit_validasi($id_pengguna);
		$data['content']		= 'profil';
		$this->load->view('template',$data);
	}
	
	public function edit_profil()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Data Pribadi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['pengguna'] 		= $this->Web_model->edit_profil($id_pengguna);
		$data['nama'] 			= $this->session->userdata('nama');
		$data['jabatan']		= $this->session->userdata('nama_jabatan');
		$data['jabatan']		= $this->Web_model->data_jabatan();
		$data['content']		= 'edit_profil';
		$this->load->view('template',$data);
	}
	
	public function edit_password()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Password | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['pengguna'] 		= $this->Web_model->edit_profil($id_pengguna);
		$data['nama'] 			= $this->session->userdata('nama');
		$data['jabatan']		= $this->session->userdata('nama_jabatan');
		$data['jabatan']		= $this->Web_model->data_jabatan();
		$data['content']		= 'edit_password';
		$this->load->view('template',$data);
	}
	
	function update_password()
	{
		$data=array();
		$id						= $this->session->userdata('id_pengguna');
		$data['password']		= md5($this->input->post('password'));
		$password1				= md5($this->input->post('password1'));
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		$this->form_validation->set_rules('password1','Password','required|min_length[6]');
		if ($data['password'] != $password1)
		{
			echo "<script> alert('Password tidak cocok');</script>";
			$this->edit_password();
		}
		if($this->form_validation->run() == FALSE)
		{
			$this->edit_password();
		}
		else
		{
			$this->Web_model->update_password($data,$id);
			echo "<script> alert('Password berhasil diupdate');</script>";
			redirect(base_url('web'), 'refresh');
		}
	}
	
	public function kandidat_reward()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Kandidat Penerima Reward | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['kandidat'] 		= $this->Web_model->kandidat_reward();
		$data['content']		= 'kandidat_reward';
		$this->load->view('template',$data);
	}
	
	public function input_reward()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Tambah Reward Pengguna | KMS PT Bukit Asam";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id_pengguna			= $this->uri->segment(3);
		$data['data_pengguna']	= $this->Web_model->data_pengguna($id_pengguna);
		$data['content']		= 'input_reward';
		$this->load->view('template',$data);
	}
	
	function tambah_reward()
    {	
		$data=array();
		$id_pengguna				= $this->input->post('id_pengguna');
		$data['id_pengguna']		= $this->input->post('id_pengguna');
		$data['reward']				= $this->input->post('reward');
		$data['keterangan_reward']	= $this->input->post('keterangan_reward');
		$data['tgl_reward']			= gmdate('Y-m-d G:i:s', time()+60*60*7);
		$this->form_validation->set_rules('reward','reward','required');
		$this->form_validation->set_rules('keterangan_reward','keterangan reward','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->input_reward();
		}
		else
		{
			$this->Web_model->input_reward($data);
			$lihat_poin				= $this->Web_model->lihat_poin($id_pengguna);
			foreach($lihat_poin->result_array() as $l){
				$poin				= $l['poin'];
			}
			$p['poin']				= $poin-10;
			$this->Web_model->update_poin($p,$id_pengguna);
			$s['id_penerima']				= $id_pengguna;
			$s['kategori']					= "reward";
			$s['tgl_notif']					= gmdate('Y-m-d G:i:s', time()+60*60*7);
			$s['status']					= 'N';
			$this->Web_model->input_notifikasi($s);
			redirect(base_url('web/kandidat_reward'), 'refresh');
		}
    }
	
	public function pengguna()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Profil Pengguna| KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id_pengguna			= $this->uri->segment(3);
		$data['v_t']			= $this->Web_model->valid_t($id_pengguna);
		$data['v_e']			= $this->Web_model->valid_e($id_pengguna);
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['tacit']			= $this->Web_model->data_tacit_validasi($id_pengguna);
		$data['explicit']		= $this->Web_model->data_explicit_validasi($id_pengguna);
		$data['content']		= 'pengguna';
		$this->load->view('template',$data);
	}
	
	public function penerima_reward()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Penerima Reward | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['reward'] 		= $this->Web_model->penerima_reward();
		$data['content']		= 'penerima_reward';
		$this->load->view('template',$data);
	}
	
	public function my_reward()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Penerima Reward | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['reward'] 		= $this->Web_model->my_reward($id_pengguna);
		$data['content']		= 'my_reward';
		$this->load->view('template',$data);
	}
	
	public function laporan()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Laporan | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		
		$tahun					= '2016';
		$data['t']				= $this->Web_model->bulanan1($tahun);
		$data['e']				= $this->Web_model->bulanan2($tahun);
		$data['lap_ps']			= $this->Web_model->laporan_problem_solving();
		$data['content']		= 'laporan';
		$this->load->view('template',$data);
		//$this->load->view('tes_chart');
	}
	
	public function cek_notif()
	{
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['cek']			= $this->Web_model->cek($id_pengguna);
		$this->load->view('cek_notif',$data);
	}
	
	public function cekpesan()
	{
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		//$data['cek']			= $this->Web_model->cek($id_pengguna);
		//$this->load->view('cek_pesan',$data);
		$data['content']		= 'cek_pesan';
		$this->load->view('template',$data);
	}
	
	function update_notif()
	{
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$this->Web_model->update_notif($id_pengguna);
	}
	
	public function semua_notifikasi()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Semua Notifikasi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['pengguna']		= $this->Web_model->daftar_pengguna();
		$data['content']		= 'semua_notifikasi';
		$this->load->view('template',$data);
	}
	
	public function posting_disukai()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Posting disukai| KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']	 		= $this->Web_model->tacit_like($id_pengguna);
		$data['explicit'] 		= $this->Web_model->like_explicit($id_pengguna);
		$data['content']		= 'posting_disukai';
		$this->load->view('template',$data);
	}
	
	public function cek_validasi()
	{
		$cek_t			= $this->Web_model->cek_validasi_t();
		$cek_e			= $this->Web_model->cek_validasi_e();
		foreach($cek_t->result_array() as $j)
		{
			if($j['jml']!=0)
			{
				$tacit	= $j['jml'];
			} 
		}
		foreach($cek_e->result_array() as $k)
		{
			if($k['jml']!=0)
			{
				$explicit	= $k['jml'];
			} 
		}
		@$hasil =$tacit+$explicit;
		if($hasil!='0'){
			echo $hasil;
		}
	}
	
	public function cek_validasi_t()
	{
		$cek_t			= $this->Web_model->cek_validasi_t();
		foreach($cek_t->result_array() as $j)
		{
			if($j['jml']!=0)
			{
				echo $tacit	= $j['jml'];
			} 
		}
	}
	
	public function cek_validasi_e()
	{
		$cek_e			= $this->Web_model->cek_validasi_e();
		foreach($cek_e->result_array() as $k)
		{
			if($k['jml']!=0)
			{
				echo $explicit	= $k['jml'];
			} 
		}
	}
	
	public function cek_revisi()
	{
		$cek			= $this->Web_model->cek_revisi();
		foreach($cek->result_array() as $c)
		{
			if($c['jml']!=0)
			{
				echo $revisi	= $c['jml'];
			} 
		}
	}
	
	public function search()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Pencarian Pengetahuan| KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['tacit']	 		= $this->Web_model->daftar_data_tacit();
		$data['explicit'] 		= $this->Web_model->daftar_data_explicit();
		$data['cari_tacit']		= $this->Web_model->search_t();
		$data['cari_explicit']	= $this->Web_model->search_e();
		$data['content']		= 'search';
		$this->load->view('template',$data);
	}
	
	public function data_bagian_lumbung()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Data Bagian Mesin | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['kode_bagian']	= $this->Web_model->kode_bagian();
		$data['bagian']			= $this->Web_model->bagian();
		$data['content']		= 'data_bagian_mesin';
		$this->load->view('template',$data);
	}

	function submit_bagian()
    {	
		$data=array();
		$data['id_bagian']		= $this->input->post('id_bagian');
		$data['nama_bagian']	= $this->input->post('nama_bagian');
		$data['urut']			= $this->input->post('urut');
		$this->form_validation->set_rules('id_bagian','id bagian','required');
		$this->form_validation->set_rules('nama_bagian','nama bagian','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->data_bagian_lumbung();
		}
		else
		{
			$this->Web_model->input_bagian($data);
			redirect(base_url('web/data_bagian_lumbung'), 'refresh');
		}
    }

	public function edit_bagian()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Edit Bagian | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['bagian']			= $this->Web_model->bagian();
		$id						= $this->uri->segment(3);
		$data['edit']			= $this->Web_model->edit_bagian($id);
		$data['content']		= 'edit_bagian';
		$this->load->view('template',$data);
	}
	
	function update_bagian()
    {	
		$data=array();
		$id						= $this->input->post('id_bagian');
		$data['nama_bagian']	= $this->input->post('nama_bagian');
		$this->form_validation->set_rules('id_bagian','id bagian','required');
		$this->form_validation->set_rules('nama_bagian','nama bagian','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->edit_bagian();
		}
		else
		{
			$this->Web_model->update_bagian($data,$id);
			redirect(base_url('web/data_bagian_lumbung'), 'refresh');
		}
    }

	function hapus_bagian()
	{
		$id					= $this->uri->segment(3);
		$this->Web_model->hapus_bagian($id);
		redirect(base_url('web/data_bagian_lumbung'), 'refresh');
	}
	public function riwayat()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Riwayat Kasus | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['gejala']			= $this->Web_model->daftar_gejala();
		$data['kasus']			= $this->Web_model->daftar_kasus_riwayat($id);
		$data['riwayat']		= $this->Web_model->daftar_kasus_riwayat1($id);
		$data['gejala_masalah']	= $this->Web_model->gejala_masalah();
		$data['content']		= 'riwayat';
		$this->load->view('template',$data);
	}
	public function tes()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Data Revisi | KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['kasus']			= $this->Web_model->daftar_kasus_revise();
		$data['revisi']			= $this->Web_model->revisi_pengguna();
		$data['gejala_masalah']	= $this->Web_model->gejala_masalah();
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$data['riwayat']		= $this->Web_model->riwayat();
		$data['content']		= 'tes_tab';
		$this->load->view('template',$data);
	}
	public function kategori()
	{
		$data['login']			= $this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('web/login'));
		
		$data['judul']			= "Kategori Pengetahuan| KMS Dinas Ketahanan Pangan dan Peternakan Provinsi Sumsel";
		$id_pengguna			= $this->session->userdata('id_pengguna');
		$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
		$data['notif']			= $this->Web_model->notif($id_pengguna);
		$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
		$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
		$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
		$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
		$id						= $this->uri->segment(3);
		$data['kat']	 		= $this->Web_model->kat($id);
		$data['tacit']	 		= $this->Web_model->daftar_data_tacit_k($id);
		$data['explicit'] 		= $this->Web_model->daftar_data_explicit_k($id);
		$data['cari_tacit']		= $this->Web_model->search_t();
		$data['cari_explicit']	= $this->Web_model->search_e();
		$data['content']		= 'kategori';
		$this->load->view('template',$data);
	}
	function batal_revisi_pengguna()
	{
		$id						= $this->input->post('id_solusi');
		$this->Web_model->hapus_revisi_pengguna($id);
		redirect(base_url('web/revise'), 'refresh');
	}
	
}
