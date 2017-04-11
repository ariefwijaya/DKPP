<?php
class Web_model extends CI_Model 
{
	function __construct()
    {
         parent::__construct();
    }

    public function insert($data,$table)
	{
		
		$this->db->insert($table,$data);

		$affected_rows = $this->db->affected_rows();
		
		return $affected_rows;

	}
	public function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
		
		return $this->db->affected_rows();
	}


	function login($nip,$password)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('jabatan j','j.id_jabatan=p.id_jabatan'); 
		$this->db->where('p.nip', $nip); 
		$this->db->where('p.password', $password);  
		$q = $this->db->get();
		return $q;
	}
	function data_pengguna($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('jabatan j','j.id_jabatan=p.id_jabatan'); 
		$this->db->where('p.id_pengguna', $id_pengguna);  
		$q = $this->db->get();
		return $q;
	}


public function get_all_explicit_user($id)
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_explicit e');
		$this->db->join('pengguna p','e.id_pengguna=p.id_pengguna','left');
		$this->db->join('kategori k','e.id_kategori=k.id_kategori','left');
		$this->db->where('a.id_pengguna',$id);
		$hasil=$this->db->get();

		//echo $this->db->last_query();
		return $hasil;

	}

	public function get_all_user_except_this_user($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('hak_akses  != ','3');
		$this->db->where('id_pengguna  != ',$id);
		
		$hasil=$this->db->get();

		//echo $this->db->last_query();
		return $hasil;
	}

	public function get_last_insert_id_tacit($where)
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_tacit');
		$this->db->where($where);		
		$hasil=$this->db->get();

		//echo $this->db->last_query();
		
		foreach ($hasil->result() as $a) {
			return $a->id_tacit;
		}
	}

	public function get_last_insert_id_explicit($where)
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_explicit');
		$this->db->where($where);		
		$hasil=$this->db->get();

		//echo $this->db->last_query();
		
		foreach ($hasil->result() as $a) {
			return $a->id_explicit;
		}
	}

	public function get_jumlah_tag_tacit($id)
	{
		$this->db->select('*');
		$this->db->from('tag_tacit');
		$this->db->where('id_tacit',$id);
		$hasil = $this->db->get();

		return $hasil->num_rows();

	}

	public function get_jumlah_tag_explicit($id)
	{
		$this->db->select('*');
		$this->db->from('tag_explicit');
		$this->db->where('id_explicit',$id);
		$hasil = $this->db->get();

		return $hasil->num_rows();

	}

	public function get_all_tacit_taged_user($id)
	{
		$this->db->select('*,tt.id_pengguna as id_pengguna');
		$this->db->from('tag_tacit tt');
		$this->db->join('pengguna p','tt.id_pengguna=p.id_pengguna','left');
		$this->db->where('tt.id_tacit',$id);
		$hasil = $this->db->get();

		return $hasil;
	}

	public function get_all_explicit_taged_user($id)
	{
		$this->db->select('*,te.id_pengguna as id_pengguna');
		$this->db->from('tag_explicit te');
		$this->db->join('pengguna p','te.id_pengguna=p.id_pengguna','left');
		$this->db->where('te.id_explicit',$id);
		$hasil = $this->db->get();

		return $hasil;
	}

	public function get_all_user_except_this_user_and_tagged_tacit_user($id_pengguna,$id)
	{
		$this->db->select('*,tt.id_pengguna as id_pengguna');
		$this->db->from('tag_tacit tt');
		$this->db->join('pengguna p','tt.id_pengguna=p.id_pengguna','left');
		$this->db->where('tt.id_tacit',$id);
		$hasil = $this->db->get();

		if($hasil->num_rows()>0){

				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->where('hak_akses  != ','3');
				$this->db->where('id_pengguna  != ',$id_pengguna);
				
				foreach ($hasil->result() as $a) {
					$this->db->where('id_pengguna  != ',$a->id_pengguna);
				}

				$hasil1=$this->db->get();

				//echo $this->db->last_query();
				return $hasil1;

		}else{
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->where('hak_akses  != ','3');
				$this->db->where('id_pengguna  != ',$id_pengguna);
				
				$hasil1=$this->db->get();

				//echo $this->db->last_query();
				return $hasil1;
		}		
	}

	public function get_all_user_except_this_user_and_tagged_explicit_user($id_pengguna,$id)
	{
		$this->db->select('*,te.id_pengguna as id_pengguna');
		$this->db->from('tag_explicit te');
		$this->db->join('pengguna p','te.id_pengguna=p.id_pengguna','left');
		$this->db->where('te.id_explicit',$id);
		$hasil = $this->db->get();

		if($hasil->num_rows()>0){

				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->where('hak_akses  != ','3');
				$this->db->where('id_pengguna != ',$id_pengguna);
				
				foreach ($hasil->result() as $a) {
					$this->db->where('id_pengguna  != ',$a->id_pengguna);
				}

				$hasil1=$this->db->get();

				//echo $this->db->last_query();
				return $hasil1;

		}else{
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->where('hak_akses  != ','3');
				$this->db->where('id_pengguna  != ',$id_pengguna);
				
				$hasil1=$this->db->get();

				//echo $this->db->last_query();
				return $hasil1;
		}		
	}
	public function get_checked_new_tags($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('tag_tacit tt');
		$this->db->join('pengetahuan_tacit t','t.id_tacit=p.id_tacit','left');
		$this->db->where('tt.id_pengguna',$id_pengguna);
		$this->db->where('tt.status','N');
		$this->db->where('t.validasi_tacit', '1'); 

		$q1=$this->db->get();
		
		$this->db->select('*');
		$this->db->from('tag_explicit te');
		$this->db->join('pengetahuan_explicit e','e.id_explicit=p.id_explicit','left');
		$this->db->where('te.id_pengguna',$id_pengguna);
		$this->db->where('te.status','N');
		$this->db->where('e.validasi_explicit', '1'); 
		$q2=$this->db->get();

		$result1 = $q1->num_rows();
		$result2 = $q2->num_rows();

		$total = $result1 + $result2;
		return $total; 
		
	}

	public function get_count_new_tags_tacit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('tag_tacit tt');
		$this->db->join('pengetahuan_tacit t','t.id_tacit=p.id_tacit','left');
		$this->db->where('tt.id_pengguna',$id_pengguna);
		$this->db->where('tt.status','N');
		$this->db->where('t.validasi_tacit', '1'); 
		$q1=$this->db->get();
	
		return $q1->num_rows();		
	}

	public function get_count_new_tags_explicit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('tag_explicit te');
		$this->db->join('pengetahuan_explicit e','e.id_explicit=p.id_explicit','left');
		$this->db->join('kategori k','k.id_kategori=e.id_kategori','LEFT'); 
		$this->db->where('te.id_pengguna',$id_pengguna);
		$this->db->where('te.status','N');
		$this->db->where('e.validasi_explicit', '1'); 
		$q2=$this->db->get();
	
		return $q2->num_rows();
	
	}

	public function get_all_shared_tacit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('tag_tacit tt');
		$this->db->join('pengetahuan_tacit t','tt.id_tacit=t.id_tacit','left');
		$this->db->join('kategori k','t.id_kategori=k.id_kategori','left');
		$this->db->join('pengguna p','t.id_pengguna=p.id_pengguna','left');
		$this->db->where('tt.id_pengguna',$id_pengguna);
		$this->db->where('t.validasi_tacit', '1'); 
		$q1=$this->db->get();
	
		return $q1;		
	}	
	public function get_all_shared_explicit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('tag_explicit te');
		$this->db->join('pengetahuan_explicit e','te.id_explicit=e.id_explicit','left');
		$this->db->join('kategori k','t.id_kategori=k.id_kategori','left');
		$this->db->join('pengguna p','t.id_pengguna=p.id_pengguna','left');
		$this->db->where('te.id_pengguna',$id_pengguna);
		$this->db->where('e.validasi_explicit', '1'); 
		$q1=$this->db->get();
	
		return $q1;		
	}	
	function input_tag_tacit($data)
	{
		$q= $this->db->insert('tag_tacit', $data);
		return $q;
	}
	function tag_explicit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('e.id_explicit as id_explicit');
		$this->db->select('e.id_pengguna as id_pengguna');
		$this->db->select('count(k.id_explicit) as komentar');
		$this->db->from('tag_explicit le'); 
		$this->db->join('pengetahuan_explicit e','e.id_explicit=le.id_explicit'); 
		$this->db->join('pengguna p','p.id_pengguna=e.id_pengguna'); 
		$this->db->join('komentar_explicit k','k.id_explicit=e.id_explicit','left'); 
		$this->db->where('e.validasi_explicit', '1');  
		$this->db->where('le.id_pengguna',$id_pengguna); 
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$this->db->group_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}	
	function Ajax_hapus_tags_tacit($id_pengguna,$id)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_tacit',$id);
		$this->db->delete('id_pengguna');
	}

	function input_masalah_solusi($data)
	{
		$q= $this->db->insert('pengetahuan_tacit', $data);
		return $q;
	}
	function daftar_tacit()
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->where('t.validasi_tacit','1');  
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function validasi_tacit()
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori k','k.id_kategori=t.id_kategori'); 
		//$this->db->where('t.validasi_tacit','0');  
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function data_tacit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori k','k.id_kategori=t.id_kategori','LEFT'); 
		$this->db->where('t.id_pengguna', $id_pengguna);  
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function tacit($id_tacit,$id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->where('t.id_tacit', $id_tacit);  
		$this->db->where('t.id_pengguna', $id_pengguna);  
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function update_masalah_solusi($data,$id)
	{
		$this->db->where('id_tacit', $id);
		$this->db->update('pengetahuan_tacit', $data);
	}
	function hapus_tacit($id_tacit)
	{
		$this->db->where('id_tacit',$id_tacit);
		$this->db->delete('pengetahuan_tacit');
	}
	function input_dokumen($data)
	{
		$q= $this->db->insert('pengetahuan_explicit', $data);
		return $q;
	}
	function data_explicit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori k','k.id_kategori=e.id_kategori','LEFT'); 
		$this->db->where('e.id_pengguna', $id_pengguna);  
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function explicit($id_explicit,$id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->where('e.id_explicit', $id_explicit);  
		$this->db->where('e.id_pengguna', $id_pengguna);  
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function update_dokumen($data,$id)
	{
		$this->db->where('id_explicit', $id);
		$this->db->update('pengetahuan_explicit', $data);
	}
	function hapus_dokumen($id_explicit)
	{
		$this->db->where('id_explicit',$id_explicit);
		$this->db->delete('pengetahuan_explicit');
	}
	function input_istilah($data)
	{
		$q= $this->db->insert('kamus_istilah', $data);
		return $q;
	}
	function data_jabatan()
	{
		$this->db->select('*');
		$this->db->from('jabatan');  
		$this->db->order_by('id_jabatan', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function input_pengguna($data)
	{
		$q= $this->db->insert('pengguna', $data);
		return $q;
	}
	function daftar_pengguna()
	{
		$this->db->select('*');
		$this->db->from('pengguna p');  
		$this->db->join('jabatan j','j.id_jabatan=p.id_jabatan');  
		$this->db->order_by('p.id_pengguna', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function edit_pengguna($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna p');  
		$this->db->where('p.id_pengguna', $id); 
		$q = $this->db->get();
		return $q;
	}
	function edit_profil($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('pengguna p');  
		$this->db->where('p.id_pengguna', $id_pengguna); 
		$q = $this->db->get();
		return $q;
	}
	function update_pengguna($data,$id)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $data);
	}
	function hapus_pengguna($id)
	{
		$this->db->where('id_pengguna',$id);
		$this->db->delete('pengguna');
	}
	function reset_password($id,$data)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $data);
	}
	function tacit_validasi($data,$id)
	{
		$this->db->where('id_tacit', $id);
		$this->db->update('pengetahuan_tacit', $data);
	}
	function daftar_explicit()
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->where('e.validasi_explicit', '1');  
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function validasi_explicit()
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori k','k.id_kategori=e.id_kategori');
		//$this->db->where('e.validasi_explicit', '0');  
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function explicit_validasi($data,$id)
	{
		$this->db->where('id_explicit', $id);
		$this->db->update('pengetahuan_explicit', $data);
	}
	function detail_masalah($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori kt','kt.id_kategori=t.id_kategori','LEFT');
		$this->db->where('t.id_tacit', $id);
		$q = $this->db->get();
		return $q;
	}
	function detail_dokumen($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori kt','kt.id_kategori=e.id_kategori','LEFT');
		$this->db->where('e.id_explicit', $id);
		$q = $this->db->get();
		return $q;
	}
	function input_revisi_pakar_t($r)
	{
		$q= $this->db->insert('revise_tacit', $r);
		return $q;
	}
	function revisi_pakar_t()
	{
		$this->db->select('*');
		$this->db->from('revise_tacit');
		$this->db->order_by('id_revise','DESC');
		$q = $this->db->get();
		return $q;
	}
	function hapus_revisi_pakar_t($id)
	{
		$this->db->where('id_tacit',$id);
		$this->db->delete('revise_tacit');
	}
	function kode_gejala()
	{
		$this->db->select('urut');
		$this->db->from('gejala'); 
		$this->db->order_by('urut', 'DESC');
		$this->db->limit('1');
		$q = $this->db->get();
		return $q;
	}
	function input_gejala($data)
	{
		$q= $this->db->insert('gejala', $data);
		return $q;
	}
	function gejala()
	{
		$this->db->select('*');
		$this->db->from('gejala g'); 
		$this->db->join('bagian_lumbung b','b.id_bagian=g.id_bagian','LEFT'); 
		$this->db->order_by('g.id_gejala', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function edit_gejala($id)
	{
		$this->db->select('*');
		$this->db->from('gejala'); 
		$this->db->where('id_gejala', $id);
		$q = $this->db->get();
		return $q;
	}
	function update_gejala($data,$id)
	{
		$this->db->where('id_gejala', $id);
		$this->db->update('gejala', $data);
	}
	function hapus_gejala($id)
	{
		$this->db->where('id_gejala',$id);
		$this->db->delete('gejala');
	}
	function kode_kasus()
	{
		$this->db->select('urut');
		$this->db->from('solusi'); 
		$this->db->order_by('urut', 'DESC');
		$this->db->limit('1');
		$q = $this->db->get();
		return $q;
	}
	function daftar_gejala()
	{
		$this->db->select('*');
		$this->db->from('gejala g'); 
		$this->db->join('bagian_lumbung b','b.id_bagian=g.id_bagian'); 
		$this->db->order_by('g.id_gejala', 'ASC');
		$q = $this->db->get();
		return $q;
	}
	function input_solusi($data)
	{
		$q= $this->db->insert('solusi', $data);
		return $q;
	}
	function input_kasus($rows)
	{
		$q= $this->db->insert('kasus', $rows);
		return $q;
	}
	function daftar_kasus()
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->order_by('id_solusi', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function gejala_masalah()
	{
		$this->db->select('*');
		$this->db->from('kasus k'); 
		$this->db->join('gejala g','g.id_gejala=k.id_gejala'); 
		$this->db->join('bagian_lumbung b','b.id_bagian=g.id_bagian','LEFT'); 
		$this->db->order_by('k.id_gejala', 'ASC');
		$q = $this->db->get();
		return $q;
	}
	function delete_gejala($id_solusi,$id_gejala)
	{
		$this->db->where('id_gejala',$id_gejala);
		$this->db->where('id_solusi',$id_solusi);
		$this->db->delete('kasus');
	}
	function hapus_solusi($id)
	{
		$this->db->where('id_solusi',$id);
		$this->db->delete('solusi');
	}
	function edit_solusi($id)
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->where('id_solusi', $id);
		$q = $this->db->get();
		return $q;
	}
	function update_solusi($data,$id)
	{
		$this->db->where('id_solusi', $id);
		$this->db->update('solusi', $data);
	}
	function cari_solusi($rows)
	{
		$q= $this->db->insert('tmp_gejala', $rows);
		return $q;
	}
	function kasus_cari()
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->order_by('id_solusi', 'ASC');
		$q = $this->db->get();
		return $q;
	}
	function tmp_gejala($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('tmp_gejala t'); 
		$this->db->join('gejala g','g.id_gejala=t.id_gejala'); 
		$this->db->where('t.id_pengguna',$id_pengguna);
		$this->db->order_by('t.id_tmp_gejala', 'ASC');
		$q = $this->db->get();
		return $q;
	}
	function perbandingan()
	{
		$this->db->select('*');
		$this->db->from('kasus k'); 
		$this->db->join('gejala g','g.id_gejala=k.id_gejala'); 
		$this->db->order_by('k.id_gejala', 'ASC');
		$q = $this->db->get();
		return $q;
	}
	function input_nilai($h)
	{
		$q= $this->db->insert('hasil', $h);
		return $q;
	}
	function solusi_problem($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('hasil h'); 
		$this->db->join('solusi s','s.id_solusi=h.id_solusi'); 
		$this->db->where('h.id_pengguna',$id_pengguna);
		$this->db->order_by('h.nilai','DESC');
		$this->db->limit(1);
		$q = $this->db->get();
		return $q;
	}
	function solusi_problem70($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('hasil h'); 
		$this->db->join('solusi s','s.id_solusi=h.id_solusi'); 
		$this->db->where('h.id_pengguna',$id_pengguna);
		$this->db->order_by('h.nilai','DESC');
		$this->db->limit(1);
		$q = $this->db->get();
		return $q;
	}
	function solusi_kasus($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('hasil h'); 
		$this->db->join('solusi s','s.id_solusi=h.id_solusi'); 
		$this->db->where('h.id_pengguna',$id_pengguna);
		$this->db->where('h.selisih >=','0');
		$this->db->order_by('h.nilai','DESC');
		$this->db->order_by('h.selisih','ASC');
		$this->db->limit('1');
		$q = $this->db->get();
		return $q;
	}
	function hitung_gejala()
	{
		$this->db->select('*');
		$this->db->select('count(k.id_solusi) as jml');
		$this->db->from('kasus k'); 
		$this->db->join('gejala g','g.id_gejala=k.id_gejala'); 
		$this->db->group_by('k.id_solusi');
		$q = $this->db->get();
		return $q;
	}
	function hitung_tmp_gejala($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(t.id_pengguna) as jml');
		$this->db->from('tmp_gejala t'); 
		$this->db->where('t.id_pengguna',$id_pengguna);
		$this->db->group_by('t.id_pengguna');
		$q = $this->db->get();
		return $q;
	}
	function reset_gejala($id_pengguna)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->delete('tmp_gejala');
	}
	function reset_solusi($id_pengguna)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->delete('hasil');
	}
	function input_kasus_revise($r)
	{
		$q= $this->db->insert('solusi', $r);
		return $q;
	}
	function input_gejala_revise($g)
	{
		$q= $this->db->insert('kasus', $g);
		return $q;
	}
	function kon_solusi($id_kondisi)
	{
		$this->db->select('id_solusi');
		$this->db->from('solusi'); 
		$this->db->where('id_solusi =', $id_kondisi);
		$q = $this->db->get();
		return $q;
	}
	function count_fitur($id_pengguna)
	{
		$this->db->select('count(*) as hitung');
		$this->db->from('tmp_gejala t'); 
		$this->db->where('t.id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function count_gejala($id_solusi)
	{
		$this->db->select('count(*) as hitung_gejala');
		$this->db->from('kasus k'); 
		$this->db->where('k.id_solusi',$id_solusi);
		$q = $this->db->get();
		return $q;
	}
	function revisi_solusi($data,$id)
	{
		$this->db->where('id_solusi', $id);
		$this->db->update('solusi', $data);
	}
	function detail_solusi($id)
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->where('id_solusi =', $id);
		$q = $this->db->get();
		return $q;
	}
	function daftar_kasus_revise()
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->where('validasi','1');
		$this->db->or_where('validasi','3');
		$this->db->order_by('id_solusi', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function daftar_kasus1()
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->where('validasi','0');
		$this->db->order_by('id_solusi', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function input_komentar_tacit($data)
	{
		$q= $this->db->insert('komentar_tacit', $data);
		return $q;
	}
	function komentar_tacit($id)
	{
		$this->db->select('*');
		$this->db->from('komentar_tacit k'); 
		$this->db->join('pengguna p','p.id_pengguna=k.id_pengguna'); 
		$this->db->where('id_tacit', $id);
		$this->db->order_by('id_komentar_tacit', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function hapus_komentar_tacit($id)
	{
		$this->db->where('id_komentar_tacit',$id);
		$this->db->delete('komentar_tacit');
	}
	function komentar_explicit($id)
	{
		$this->db->select('*');
		$this->db->from('komentar_explicit k'); 
		$this->db->join('pengguna p','p.id_pengguna=k.id_pengguna'); 
		$this->db->where('id_explicit', $id);
		$this->db->order_by('id_komentar_explicit', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function input_komentar_explicit($data)
	{
		$q= $this->db->insert('komentar_explicit', $data);
		return $q;
	}
	function hapus_komentar_explicit($id)
	{
		$this->db->where('id_komentar_explicit',$id);
		$this->db->delete('komentar_explicit');
	}
	function data_tacit_validasi($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('t.id_tacit as id_tacit');
		$this->db->select('count(k.id_tacit) as komentar');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->join('komentar_tacit k','k.id_tacit=t.id_tacit','left'); 
		$this->db->where('t.id_pengguna', $id_pengguna);  
		$this->db->where('t.validasi_tacit', '1');  
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$this->db->group_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function data_explicit_validasi($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('e.id_explicit as id_explicit');
		$this->db->select('count(k.id_explicit) as komentar');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->join('komentar_explicit k','k.id_explicit=e.id_explicit','left'); 
		$this->db->where('e.id_pengguna', $id_pengguna);  
		$this->db->where('e.validasi_explicit', '1');  
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$this->db->group_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function daftar_data_tacit()
	{
		$this->db->select('*');
		$this->db->select('t.id_tacit as id_tacit');
		$this->db->select('t.id_pengguna as id_pengguna');
		$this->db->select('count(k.id_tacit) as komentar');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori kt','kt.id_kategori=t.id_kategori','LEFT');
		$this->db->join('komentar_tacit k','k.id_tacit=t.id_tacit','left'); 
		$this->db->where('t.validasi_tacit', '1');  
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$this->db->group_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function daftar_data_tacit_k($id)
	{
		$this->db->select('*');
		$this->db->select('t.id_tacit as id_tacit');
		$this->db->select('t.id_pengguna as id_pengguna');
		$this->db->select('count(k.id_tacit) as komentar');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_tacit t','t.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori kt','kt.id_kategori=t.id_kategori','LEFT');
		$this->db->join('komentar_tacit k','k.id_tacit=t.id_tacit','left'); 
		$this->db->where('t.validasi_tacit', '1');  
		$this->db->where('kt.id_kategori', $id);  
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$this->db->group_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function kat($id)
	{
		$this->db->select('*');
		$this->db->from('kategori');   
		$this->db->where('id_kategori', $id);  
		$this->db->limit(1); 
		$q = $this->db->get();
		return $q;
	}
	function tacit_like($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('t.id_tacit as id_tacit');
		$this->db->select('t.id_pengguna as id_pengguna');
		$this->db->select('count(k.id_tacit) as komentar');
		$this->db->from('like_tacit lt'); 
		$this->db->join('pengetahuan_tacit t','t.id_tacit=lt.id_tacit'); 
		$this->db->join('pengguna p','p.id_pengguna=t.id_pengguna'); 
		$this->db->join('komentar_tacit k','k.id_tacit=t.id_tacit','left');  
		$this->db->where('t.validasi_tacit', '1');  
		$this->db->where('lt.id_pengguna',$id_pengguna); 
		$this->db->order_by('t.id_tacit', 'DESC'); 
		$this->db->group_by('t.id_tacit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function like_explicit($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('e.id_explicit as id_explicit');
		$this->db->select('e.id_pengguna as id_pengguna');
		$this->db->select('count(k.id_explicit) as komentar');
		$this->db->from('like_explicit le'); 
		$this->db->join('pengetahuan_explicit e','e.id_explicit=le.id_explicit'); 
		$this->db->join('pengguna p','p.id_pengguna=e.id_pengguna'); 
		$this->db->join('komentar_explicit k','k.id_explicit=e.id_explicit','left'); 
		$this->db->where('e.validasi_explicit', '1');  
		$this->db->where('le.id_pengguna',$id_pengguna); 
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$this->db->group_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function daftar_data_explicit()
	{
		$this->db->select('*');
		$this->db->select('e.id_explicit as id_explicit');
		$this->db->select('e.id_pengguna as id_pengguna');
		$this->db->select('count(k.id_explicit) as komentar');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori kt','kt.id_kategori=e.id_kategori','LEFT');
		$this->db->join('komentar_explicit k','k.id_explicit=e.id_explicit','left'); 
		$this->db->where('e.validasi_explicit', '1');  
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$this->db->group_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function daftar_data_explicit_k($id)
	{
		$this->db->select('*');
		$this->db->select('e.id_explicit as id_explicit');
		$this->db->select('e.id_pengguna as id_pengguna');
		$this->db->select('count(k.id_explicit) as komentar');
		$this->db->from('pengguna p'); 
		$this->db->join('pengetahuan_explicit e','e.id_pengguna=p.id_pengguna'); 
		$this->db->join('kategori kt','kt.id_kategori=e.id_kategori','LEFT');
		$this->db->join('komentar_explicit k','k.id_explicit=e.id_explicit','left'); 
		$this->db->where('e.validasi_explicit', '1');  
		$this->db->where('kt.id_kategori', $id); 
		$this->db->order_by('e.id_explicit', 'DESC'); 
		$this->db->group_by('e.id_explicit', 'DESC'); 
		$q = $this->db->get();
		return $q;
	}
	function cek_user($id,$id_pengguna)
	{
		$this->db->select('count(*)');
		$this->db->from('like_tacit'); 
		$this->db->where('id_tacit', $id);
		$this->db->where('id_pengguna', $id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function cek_user_e($id,$id_pengguna)
	{
		$this->db->select('count(*)');
		$this->db->from('like_explicit'); 
		$this->db->where('id_explicit', $id);
		$this->db->where('id_pengguna', $id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function total_like($id)
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_tacit'); 
		$this->db->where('id_tacit',$id);
		$q = $this->db->get();
		return $q;
	}
	function total_like_e($id)
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_explicit'); 
		$this->db->where('id_explicit',$id);
		$q = $this->db->get();
		return $q;
	}
	function result()
	{
		$this->db->select('*');
		$this->db->from('facebook_collapsed_posts'); 
		$this->db->order_by('p_id', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function like_ip($p_id,$userip)
	{
		$this->db->select('count(*)');
		$this->db->from('facebook_collapsed_ip'); 
		$this->db->where('post_id', $p_id);
		$this->db->where('userip', $userip);
		$q = $this->db->get();
		return $q;
	}
	function total_likes($p_id)
	{
		$this->db->select('*');
		$this->db->from('facebook_collapsed_likes'); 
		$this->db->where('post_id',$p_id);
		$q = $this->db->get();
		return $q;
	}
	function update_like($data,$postId)
	{
		$this->db->where('post_id', $postId);
		$this->db->update('facebook_collapsed_likes', $data);
	}
	function update_like_tacit($data,$id)
	{
		$this->db->where('id_tacit', $id);
		$this->db->update('pengetahuan_tacit', $data);
	}
	function update_like_explicit($data,$id)
	{
		$this->db->where('id_explicit', $id);
		$this->db->update('pengetahuan_explicit', $data);
	}
	function insert_like_tacit($d)
	{
		$q= $this->db->insert('like_tacit', $d);
		return $q;
	}
	function insert_like_explicit($d)
	{
		$q= $this->db->insert('like_explicit', $d);
		return $q;
	}
	function insert_like($d)
	{
		$q= $this->db->insert('facebook_collapsed_ip', $d);
		return $q;
	}
	function delete_like_tacit($id,$id_pengguna)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_tacit',$id);
		$this->db->delete('like_tacit');
	}
	function delete_like_explicit($id,$id_pengguna)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_explicit',$id);
		$this->db->delete('like_explicit');
	}
	function update_password($data,$id)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $data);
	}
	function input_notifikasi($s)
	{
		$q= $this->db->insert('notifikasi', $s);
		return $q;
	}
	function hapus_notifikasi($id,$kategori)
	{
		$this->db->where('id_posting',$id);
		$this->db->where('kategori',$kategori);
		$this->db->delete('notifikasi');
	}
	function lihat_poin($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('pengguna'); 
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function update_poin($p,$id_pengguna)
	{
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $p);
	}
	function kandidat_reward()
	{
		$this->db->select('*');
		$this->db->from('pengguna p'); 
		$this->db->join('jabatan j','j.id_jabatan=p.id_jabatan'); 
		$this->db->where('p.poin >=','0');
		$this->db->order_by('p.poin','DESC');
		$q = $this->db->get();
		return $q;
	}
	function input_reward($data)
	{
		$q= $this->db->insert('reward', $data);
		return $q;
	}
	function notif($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('notifikasi n'); 
		$this->db->join('pengguna p','p.id_pengguna=n.id_pengguna','LEFT');
		$this->db->where('n.id_penerima',$id_pengguna);
		$this->db->where('n.id_pengguna !=',$id_pengguna);
		$this->db->order_by('n.id_notifikasi','DESC');
		$q = $this->db->get();
		return $q;
	}
	function cek($id_pengguna)
	{
		$this->db->select('count(id_notifikasi) as jml');
		$this->db->from('notifikasi');
		$this->db->where('id_penerima',$id_pengguna);
		$this->db->where('id_pengguna !=',$id_pengguna);
		$this->db->where('status','N');
		$q = $this->db->get();
		return $q;
	}
	function cek_validasi_t()
	{
		$this->db->select('count(id_tacit) as jml');
		$this->db->from('pengetahuan_tacit');
		$this->db->where('validasi_tacit','0');
		$q = $this->db->get();
		return $q;
	}
	function cek_validasi_e()
	{
		$this->db->select('count(id_explicit) as jml');
		$this->db->from('pengetahuan_explicit');
		$this->db->where('validasi_explicit','0');
		$q = $this->db->get();
		return $q;
	}
	function cek_revisi()
	{
		$this->db->select('count(id_solusi) as jml');
		$this->db->from('solusi');
		$this->db->where('validasi','1');
		$this->db->or_where('validasi','3');
		$q = $this->db->get();
		return $q;
	}
	function update_notif($id_pengguna)
	{
		$data = array(
               'status' => 'Y',
            );
		$this->db->where('id_penerima', $id_pengguna);
		$this->db->where('id_pengguna !=',$id_pengguna);
		$this->db->update('notifikasi', $data);
	}
	function penerima_reward()
	{
		$this->db->select('*');
		$this->db->from('reward r'); 
		$this->db->join('pengguna p','p.id_pengguna=r.id_pengguna'); 
		$this->db->join('jabatan j','j.id_jabatan=p.id_jabatan'); 
		$this->db->order_by('r.id_reward','DESC');
		$q = $this->db->get();
		return $q;
	}
	function my_reward($id_pengguna)
	{
		$this->db->select('*');
		$this->db->from('reward r'); 
		$this->db->join('pengguna p','p.id_pengguna=r.id_pengguna'); 
		$this->db->join('jabatan j','j.id_jabatan=p.id_jabatan'); 
		$this->db->where('r.id_pengguna',$id_pengguna);
		$this->db->order_by('r.id_reward','DESC');
		$q = $this->db->get();
		return $q;
	}
	function bulanan1($tahun)
	{
		$this->db->select('*');
		$this->db->select('count(id_tacit) as jml');
		$this->db->from('pengetahuan_tacit');
		$this->db->group_by('bulan','ASC');
		$this->db->where('validasi_tacit','1');
		$this->db->where('tahun',$tahun);
		$q = $this->db->get();
		return $q;
	}
	function bulanan2($tahun)
	{
		$this->db->select('*');
		$this->db->select('count(id_explicit) as jml');
		$this->db->from('pengetahuan_explicit');
		$this->db->group_by('bulan','ASC');
		$this->db->where('validasi_explicit','1');
		$this->db->where('tahun',$tahun);
		$q = $this->db->get();
		return $q;
	}
	function valid_t($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(id_tacit) as v_t');
		$this->db->from('pengetahuan_tacit');
		$this->db->where('validasi_tacit','1');
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function nvalid_t($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(id_tacit) as v_t');
		$this->db->from('pengetahuan_tacit');
		$this->db->where('validasi_tacit','0');
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function valid_e($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(id_explicit) as v_e');
		$this->db->from('pengetahuan_explicit');
		$this->db->where('validasi_explicit','1');
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function nvalid_e($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(id_explicit) as v_e');
		$this->db->from('pengetahuan_explicit');
		$this->db->where('validasi_explicit','0');
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function disukai_t($id_pengguna)
	{
		$this->db->select('sum(t.like) as jml');
		$this->db->from('pengetahuan_tacit t');
		$this->db->where('t.validasi_tacit','1');
		$this->db->where('t.id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function disukai_e($id_pengguna)
	{
		$this->db->select('sum(e.like) as jml');
		$this->db->from('pengetahuan_explicit e');
		$this->db->where('e.validasi_explicit','1');
		$this->db->where('e.id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function total_reward($id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(id_pengguna) as jml');
		$this->db->from('reward');
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function bulan_t($tahun,$id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(id_tacit) as jml');
		$this->db->from('pengetahuan_tacit');
		$this->db->group_by('bulan','ASC');
		$this->db->where('validasi_tacit','1');
		$this->db->where('tahun',$tahun);
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function bulan_e($tahun,$id_pengguna)
	{
		$this->db->select('*');
		$this->db->select('count(id_explicit) as jml');
		$this->db->from('pengetahuan_explicit');
		$this->db->group_by('bulan','ASC');
		$this->db->where('validasi_explicit','1');
		$this->db->where('tahun',$tahun);
		$this->db->where('id_pengguna',$id_pengguna);
		$q = $this->db->get();
		return $q;
	}
	function tacit_nama($id)
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_tacit'); 
		$this->db->where('id_tacit', $id); 
		$q = $this->db->get();
		return $q;
	}
	function explicit_nama($id)
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_explicit'); 
		$this->db->where('id_explicit', $id); 
		$q = $this->db->get();
		return $q;
	}
	function delete_notifikasi($id_pengguna,$id_penerima,$id_posting,$kategori)
	{
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_penerima',$id_penerima);
		$this->db->where('id_posting',$id_posting);
		$this->db->where('kategori',$kategori);
		$this->db->delete('notifikasi');
	}
	function search_t()
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_tacit');
		$this->db->where('validasi_tacit','1');
		$q = $this->db->get();
		return $q;
	}
	function search_e()
	{
		$this->db->select('*');
		$this->db->from('pengetahuan_explicit');
		$this->db->where('validasi_explicit','1');
		$q = $this->db->get();
		return $q;
	}
	function input_revisi_pengguna($r)
	{
		$q= $this->db->insert('revise', $r);
		return $q;
	}
	function revisi_pengguna()
	{
		$this->db->select('*');
		$this->db->from('revise');
		$this->db->order_by('id_revise','DESC');
		$q = $this->db->get();
		return $q;
	}
	function hapus_revisi_pengguna($id)
	{
		$this->db->where('id_solusi',$id);
		$this->db->delete('revise');
	}
	function kode_bagian()
	{
		$this->db->select('urut');
		$this->db->from('bagian_lumbung'); 
		$this->db->order_by('urut', 'DESC');
		$this->db->limit('1');
		$q = $this->db->get();
		return $q;
	}
	function bagian()
	{
		$this->db->select('*');
		$this->db->from('bagian_lumbung'); 
		$this->db->order_by('id_bagian', 'ASC');
		$q = $this->db->get();
		return $q;
	}
	function input_bagian($data)
	{
		$q= $this->db->insert('bagian_lumbung', $data);
		return $q;
	}
	function edit_bagian($id)
	{
		$this->db->select('*');
		$this->db->from('bagian_lumbung'); 
		$this->db->where('id_bagian', $id);
		$q = $this->db->get();
		return $q;
	}
	function update_bagian($data,$id)
	{
		$this->db->where('id_bagian', $id);
		$this->db->update('bagian_lumbung', $data);
	}
	function hapus_bagian($id)
	{
		$this->db->where('id_bagian',$id);
		$this->db->delete('bagian_lumbung');
	}
	function update_dilihat($l,$id)
	{
		$this->db->where('id_solusi', $id);
		$this->db->update('solusi', $l);
	}
	function laporan_problem_solving()
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->order_by('dilihat','DESC');
		$this->db->limit(10);
		$q = $this->db->get();
		return $q;
	}
	function input_riwayat($r)
	{
		$q= $this->db->insert('riwayat', $r);
		return $q;
	}
	function riwayat()
	{
		$this->db->select('*');
		$this->db->select('count(id_solusi) as jumlah_riwayat');
		$this->db->from('riwayat'); 
		$this->db->group_by('id_solusi');
		$q = $this->db->get();
		return $q;
	}
	function daftar_kasus_riwayat($id)
	{
		$this->db->select('*');
		$this->db->from('solusi'); 
		$this->db->where('id_solusi', $id);
		$this->db->order_by('id_solusi', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function daftar_kasus_riwayat1($id)
	{
		$this->db->select('*');
		$this->db->from('riwayat'); 
		$this->db->where('id_solusi', $id);
		$this->db->order_by('id_riwayat', 'DESC');
		$q = $this->db->get();
		return $q;
	}
	function kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori'); 
		$this->db->order_by('id_kategori');
		$q = $this->db->get();
		return $q;
	}
}