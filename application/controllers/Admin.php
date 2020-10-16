<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index()
	{
		if(!$this->isLoggedIn()){
			$data['content']=" Silahkan login dan lengkapi data diri anda";
			$data['isi']="";
			$data['page']="adm_login";
			$this->load->view('adm_layout.php',$data);
		}else{
			redirect(base_url()."admin/home");
			// echo "test";
		}
	}

	function isLoggedIn(){
		if(!isset($this->session->userdata['adm_status']) || $this->session->userdata['adm_status'] != "login"){
			return false;
		}else{
			if($this->session->userdata['adm_role']=='admin'){
				return true;
			}else{
				return false;
			}
		}
	}

	function login()
	{
		$usn=$this->input->post('usn');
		$pass=md5($this->input->post('pass'));
		$where = array(
			'username'=>$usn,
			'role'=>'Admin',
			'password'=>$pass
		);
		
		$dataLogin=$this->DATA->GetWhere('user_JF',$where)->row();

		if(!empty($dataLogin)){
			$ses_usn=$dataLogin->username;
			$ses_nama=$dataLogin->name;
			$ses_id=$dataLogin->id;
			// Session
			$data_session=array(
				'adm_status'=>'login',
				'adm_role'=>'admin',
				'adm_usn'=>$ses_usn,
				'adm_nama'=>$ses_nama,
				'adm_id'=>$ses_id
			);
			$this->session->set_userdata($data_session);
			// end Session
			// insert log
			
			// $ceklist=$this->cekBerkas($dataLogin);
			// $isComplete=($ceklist['complete']==7)? 'Y' : 'N';
			// $data_log=array(
			// 	'id'=>$this->session->userdata['ses_id'],
			// 	'status'=>'login',
			// 	'complete'=>$isComplete,
			// 	'waktu'=>date('Y-m-d H:i:s')
			// );

			// $this->db->insert('log',$data_log);
			// end insert log
			redirect(base_url()."admin",'refresh');
		}else{
			$this->session->set_flashdata(
				'eror','<div class="alert alert-danger"><h4>
				Username/Password Salah!!!</h4></div>'
			);
			redirect(base_url()."admin");
			// echo "eror";
		}
	}

	function newjf(){
		$ke=$this->input->post('ke');
		$tipe=$this->input->post('tipe');

		if($tipe=='online'){
			$kode='VJF_'.str_pad($ke, 2, '0', STR_PAD_LEFT);
		}else{
			$kode='JF_'.str_pad($ke, 2, '0', STR_PAD_LEFT);
		}
		

		$tanggal_mulai=$this->input->post('tanggal_mulai');
		$tanggal_selesai=$this->input->post('tanggal_selesai');
		$data=array(
			'ke'=>$ke,
			'kode'=>$kode,
			'tipe'=>$tipe,
			'tanggal_mulai'=>$tanggal_mulai,
			'tanggal_selesai'=>$tanggal_selesai
		);
		// echo print_r($data);
	
		$res = $this->db->insert('jf_ke', $data);	
		if($res){
			$this->session->set_userdata('tambahjobfair', '<div class="alert alert-success alert-dismissable">
			<strong>Berhasil buat jobfair baru</strong>
			</div>');
			
		}else{
			$this->session->set_userdata('tambahjobfair', '<div class="alert alert-danger alert-dismissable">
			<strong>Gagal</strong>
			</div>');
		}
		redirect(base_url()."admin");
		
	}

	// function profil(){
	// 	if($this->isLoggedIn()){
	// 	$data['isi']=$this->get_peserta();
	// 	$data['univ']=$this->DATA->date_univ($data['isi']->lulusan);
	// 	$data['content']="";
	// 	$data['page']="profil";
	// 	$this->load->view("daftar/layout_peserta.php",$data);
	// 	}else{
	// 		redirect(base_url(), 'refresh');
	// 	}
	// }
	function users(){
		if($this->isLoggedIn()){
		$data['cek']="";
		$data['content']="";
		$data['page']="admin/user_management";
		$data['users']=$this->ADM->select_data('*','user_JF',array('status'=>'aktif'),$sortby="",$order="");
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function chat(){
		if($this->isLoggedIn()){
		$data['cek']="";
		$data['content']="";
		$data['page']="admin/chat";
		$data['userchat']=$this->ADM->select_data('*','chat',array('receiverid'=>'admin'),'id','desc');
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function sendchat(){
		$data=array(
			'isi'=>$this->input->post('isichat'),
			'senderid'=>$this->input->post('iduser'),
			'receiverid'=>$this->input->post('receiverid'),
			'status_sender'=>'unread',
			'status_receiver'=>'sent',
			'role'=>'admin'
		);
		$this->DATA->insertspe('chat',$data);
		$this->session->set_flashdata('pesanchat','<span class="badge badge-light blink_me"><strong>Terkirim</strong></span>');
		redirect($_SERVER['HTTP_REFERER']);
	}



	function perusahaan($tabs=""){
		if($this->isLoggedIn()){
		$data['cek']="";
		$data['content']="";
		$data['page']="admin/manajemen_perusahaan";
		$data['tabs']=!empty($tabs)? $tabs : "listperusahaan";
		
		if($data['tabs']=='listperusahaan'){
		$data['listperusahaan']=$this->ADM->select_data('*','perusahaan_JF',array('status'=>'aktif'),'id','DESC');
		}
		if($data['tabs']=='lowongan'){
			$data['listperusahaan']=$this->ADM->select_data('id,nama','perusahaan_JF',array('status'=>'aktif'),'id','DESC');
			$data['bidang']=$this->ADM->select_data('*','bidang_JF',$where="",$sort="",$by="");
			$data['lowongan']=$this->ADM->select_data('*','lowongan_JF',$where="",'id','DESC');
		}

		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function tambah_perusahaan(){
		if($this->isLoggedIn()){	
		$data = array(
			'nama' =>$this->input->post('nama'),
			'nick' =>$this->input->post('nick'),
			'password' =>$this->input->post('passcomp'),
			'deskripsi' =>$this->input->post('deskripsi')
			);

			$config['upload_path'] = 'assets/uploads/perusahaan/logo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = TRUE;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			// load library upload
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('logo')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
					$this->session->set_flashdata(
						'logoupload','<div class="alert alert-danger alert-dismissable">
						<strong>Gagal diupload</strong>
					</div>'.$error
					);
				} else {
					$file=$this->upload->data();
					$namafile=md5($data['nama']);
					$new_filename=$namafile.date("H:i:s").$file['file_ext'];
					$new_path=$file['file_path'].$new_filename;
					rename($file['full_path'], $new_path);
					
					$data['logo']=$new_filename;
					$this->session->set_flashdata(
						'logoupload','<div class="alert alert-success alert-dismissable">
						<strong>Berhasil upload</strong>
					</div>'
					);
				}

				$res = $this->db->insert('perusahaan_JF', $data);
	
			if (!$res) {
				$this->session->set_flashdata('tambahperusahaan','<div class="alert alert-danger alert-dismissable">
					<strong>Gagal disimpan</strong>
				</div>');
			}else{
				$this->session->set_flashdata('tambahperusahaan','<div class="alert alert-success alert-dismissable">
					<strong>Berhasil disimpan</strong>
				</div>');
			}
			redirect(base_url().'admin/perusahaan', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function hapus_perusahaan($id=""){
		if($this->isLoggedIn()){

			$gb=$this->ADM->select_data('logo','perusahaan_JF',array('id'=>$id),$sortby="",$order="");

			$path = FCPATH.'assets/uploads/perusahaan/logo/';
			$get_file = $path.$gb[0]['logo'];
			if(file_exists($get_file)){
			   unlink($get_file);
			}
			
			$where = array('id' => $id);
			$res=$this->ADM->hapus_data($where,'perusahaan_JF');


			$this->session->set_flashdata('hapusperusahaan','<div class="alert alert-success alert-dismissable"><strong>Berhasil dihapus</strong></div>');
			redirect(base_url().'admin/perusahaan', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function tambah_lowongan(){
		if($this->isLoggedIn()){	

		$pendidikan='';
		if(isset($_POST['pendidikan'])){
			foreach($_POST['pendidikan'] as $val){ 
			$pendidikan .=$val.","; 
			}
		}

		$bid=$this->input->post('bidang');
		$bid2=$this->input->post('bidang2');
		if(!empty($bid2)){
			// $cek=$this->ADM->getWhereRow('bid_id','bidang_JF',array('bid_id'=>$bid));
			// if(empty($cek)){
			$this->db->insert('bidang_JF', array('bid_name'=>$bid2));
			$bid=$this->ADM->getWhereRow('bid_id','bidang_JF',array('bid_name'=>$bid2))->bid_id;
			// }
		}

		$data = array(
			'judul_low' =>$this->input->post('judul'),
			'id_perusahaan' =>$this->input->post('perusahaan'),
			'pendidikan' =>rtrim($pendidikan, ','),
			'bidang_kerja' =>$bid,
			'penempatan' =>$this->input->post('penempatan'),
			// 'jml_pekerja' =>$this->input->post('jml'),
			'isi_low' =>$this->input->post('isi'),
			'status' =>'aktif'
			);

			$res = $this->db->insert('lowongan_JF', $data);
	
			if (!$res) {
				$this->session->set_flashdata('tambahlowongan','<div class="alert alert-danger alert-dismissable">
					<strong>Gagal disimpan</strong>
				</div>');
			}else{
				$this->session->set_flashdata('tambahlowongan','<div class="alert alert-success alert-dismissable">
					<strong>Berhasil disimpan</strong>
				</div>');
			}
			redirect(base_url().'admin/perusahaan/lowongan', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function edit_lowongan(){
		if($this->isLoggedIn()){	

			$pendidikan='';
			if(isset($_POST['pendidikan'])){
				foreach($_POST['pendidikan'] as $val){ 
				$pendidikan .=$val.","; 
				}
			}

			$bid=$this->input->post('bidang');
			$bid2=$this->input->post('bidang2');
			if(!empty($bid2)){
				// $cek=$this->ADM->getWhereRow('bid_id','bidang_JF',array('bid_id'=>$bid));
				// if(empty($cek)){
				$this->db->insert('bidang_JF', array('bid_name'=>$bid2));
				$bid=$this->ADM->getWhereRow('bid_id','bidang_JF',array('bid_name'=>$bid2))->bid_id;
				// }
			}


			$isi_update=array(
				'judul_low' =>$this->input->post('judul'),
				'id_perusahaan' =>$this->input->post('perusahaan'),
				'pendidikan' =>rtrim($pendidikan, ','),
				'bidang_kerja' =>$bid,
				'penempatan' =>$this->input->post('penempatan'),
				// 'jml_pekerja' =>$this->input->post('jml'),
				'isi_low' =>$this->input->post('isi'),
				'status' =>$this->input->post('status')
				);
		
			$where=array(
				'id'=>$this->input->post('id')
			);

			$res = $this->ADM->update_data('lowongan_JF',$isi_update,$where);
	
			if ($res) {
				$this->session->set_flashdata('updatelowongan','<div class="alert alert-danger alert-dismissable">
					<strong>Gagal Diubah</strong>
				</div>');
			}else{
				$this->session->set_flashdata('updatelowongan','<div class="alert alert-success alert-dismissable">
					<strong>Berhasil Diubah</strong>
				</div>');
			}
			redirect(base_url().'admin/perusahaan/lowongan/?act=view&id='.$this->input->post('id'), 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}



	function update_perusahaan(){
		if($this->isLoggedIn()){	
			$isi_update=array(
				'nama' =>$this->input->post('nama'),
				'nick' =>$this->input->post('nick'),
				'password' =>$this->input->post('passcomp'),
				'deskripsi' =>$this->input->post('deskripsi'),
				'status' =>$this->input->post('status')
				);
			
				if(!empty($_FILES['logo']['name'])){
						
				$logoold=$this->input->post('logoname');
				$path = FCPATH.'assets/uploads/perusahaan/logo/';
				$get_file = $path.$logoold;
				if(file_exists($get_file)){
				unlink($get_file);
				}

				$config['upload_path'] = 'assets/uploads/perusahaan/logo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = TRUE;
				$this->upload->initialize($config);
					if (!$this->upload->do_upload('logo')) {
						$error = $this->upload->display_errors();
						// menampilkan pesan error
						$this->session->set_flashdata(
							'logoupload','<div class="alert alert-danger alert-dismissable">
							<strong>Gagal upload</strong>
						</div>'.$error
						);
					} else {
						$file=$this->upload->data();
						$namafile=md5($isi_update['nama']);
						$new_filename=$namafile.date("H:i:s").$file['file_ext'];
					
						$new_path=$file['file_path'].$new_filename;
						rename($file['full_path'], $new_path);
						
						$isi_update['logo']=$new_filename;
						$this->session->set_flashdata(
							'logoupload','<div class="alert alert-success alert-dismissable">
							<strong>Berhasil upload</strong>
						</div>'
						);
					}
			}
		
			$where=array(
				'id'=>$this->input->post('id')
			);

			$res = $this->ADM->update_data('perusahaan_JF',$isi_update,$where);
	
			if ($res) {
				$this->session->set_flashdata('updateperusahaan','<div class="alert alert-danger alert-dismissable">
					<strong>Gagal Diubah</strong>
				</div>');
			}else{
				$this->session->set_flashdata('updateperusahaan','<div class="alert alert-success alert-dismissable">
					<strong>Berhasil Diubah</strong>
				</div>');
			}
			redirect(base_url().'admin/perusahaan', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}



	function hapus_lowongan($id=""){
		if($this->isLoggedIn()){
			$where = array('id' => $id);
			$res=$this->ADM->hapus_data($where,'lowongan_JF');
			$this->session->set_flashdata('hapuslowongan','<div class="alert alert-success alert-dismissable"><strong>Berhasil dihapus</strong></div>');
			redirect(base_url().'admin/perusahaan/lowongan', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}



	function uploadimg_lowongan(){
		if(isset($_FILES["image"]["name"])){
			$config['upload_path'] = 'assets/uploads/perusahaan/lowongan/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('image')){
				$this->upload->display_errors();
				return FALSE;
			}else{
				$data = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']='assets/uploads/perusahaan/lowongan/'.$data['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= TRUE;
				$config['quality']= '60%';
				$config['width']= 800;
				$config['height']= 800;
				$config['new_image']= 'assets/uploads/perusahaan/lowongan/'.$data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url().'assets/uploads/perusahaan/lowongan/'.$data['file_name'];
			}
		}
	}

	function deleteimg_lowongan(){
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
			echo 'File Delete Successfully';
		}
	}

	function scan2apply(){
		if($this->isLoggedIn()){
		$data['isi']=$this->get_peserta();
		$data['cek']="";
		$data['content']="";
		$data['page']="scan2apply";
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function applied(){
		if($this->isLoggedIn()){
		$where=array(
				'registrasi_id'=>$this->session->userdata['ses_id']
			);
	
		$data['lamar']=$this->DATA->getperusahaan($this->session->userdata['ses_id']);
		$data['cek']="";
		$data['content']="";
		$data['page']="";
		$this->load->view("page/listDilamar.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	
	function home($tabs=''){
		if($this->isLoggedIn()){
		$data['page']="admin/home";

		$data['tabs']=empty($tabs)? "trafik" : $tabs;

		$data['pendaftarudinus']=$this->ADM->count_data('id','registrasiJF',array('golongan'=>'UDINUS'),$sortby="",$order="");
		$data['pendaftarumum']=$this->ADM->count_data('id','registrasiJF',array('golongan'=>'UMUM'),$sortby="",$order="");
		$data['pendaftarperhari']=$this->ADM->count_perday('tanggal, COUNT(id) total','registrasiJF',$where="",'tanggal',$limit="",$sortby="",$order="");
		$data['udinusperhari']=$this->ADM->count_perday('tanggal, COUNT(id) total','registrasiJF',array('golongan'=>'UDINUS'),'tanggal',$limit="",$sortby="",$order="");
		$data['umumperhari']=$this->ADM->count_perday('tanggal, COUNT(id) total','registrasiJF',array('golongan'=>'UMUM'),'tanggal',$limit="",$sortby="",$order="");
		$data['komplit']=$this->ADM->select_data('COUNT(id) AS jml','registrasiJF',array('foto !=' => NULL,'ktp !=' => NULL,'cv !=' => NULL,'ijazah !=' => NULL,'transkrip !=' => NULL),$sortby="",$order="");
		$data['pengunjung']=$this->ADM->select_distinct('id','log',array('status'=>'login'),$sortby="",$order="")->num_rows();
		$data['totperusahaan']=$this->ADM->count_data('id','perusahaan_JF',array('status'=>'aktif'),$sortby="",$order="");
		$data['totlowongan']=$this->ADM->count_data('id','lowongan_JF',array('status'=>'aktif'),$sortby="",$order="");
		$data['totlamaran']=$this->ADM->count_data('id','pelamarJF',$where="",$sortby="",$order="");
		$data['totpelamar']=$this->ADM->select_distinct('registrasi_id','pelamarJF',$where="",$sortby="",$order="")->num_rows();
		

		if($data['tabs']=='trafik'){
		$data['visperday']=$this->ADM->count_perday('date(waktu) as tgl, COUNT(distinct id) total','log',array('status'=>'login'),'date(waktu)','10','date(waktu)','DESC');
		$data['regperday']=$this->ADM->count_perday('tanggal, COUNT(id) total','registrasiJF',$where="",'tanggal','10','tanggal','DESC');
		}else if($data['tabs']=='jobfair'){
		$data['pelamarudinus']=$this->ADM->getpelamar('distinct','udinus');
		$data['pelamarumum']=$this->ADM->getpelamar('distinct','umum');
		$data['visudinus']=$this->ADM->getvisitor('distinct','udinus');
		$data['visumum']=$this->ADM->getvisitor('distinct','umum');		
		$data['kunjunganudinus']=$this->ADM->getvisitor($distinct="",'udinus');
		$data['kunjunganumum']=$this->ADM->getvisitor($distinct="",'umum');
		$data['lamaranudinus']=$this->ADM->getpelamar($distinct="",'udinus');
		$data['lamaranumum']=$this->ADM->getpelamar($distinct="",'umum');	
		}else if($data['tabs']=='distribusi'){
		$data['perusahaan']=$this->ADM->select_data('id,nama','perusahaan_JF',array('status'=>'aktif'),'nama','ASC');
		}

		$this->load->view("adm_layout.php",$data);

		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function user(){
		if($this->isLoggedIn()){
		$data['page']="admin/user_management";
		$data['users']=$this->ADM->getData('user_JF');
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function readqr($qr){
		if($this->isLoggedIn()){
			$idpeserta=$this->session->userdata['ses_id'];
			$where=array(
				'qr_perusahaan'=>$qr,
				'registrasi_id'=>$idpeserta
			);
			$isApplied=$this->DATA->GetWhere('pelamarJF',$where)->row();
			$isRegistered=$this->DATA->GetWhere('pengunjungJF',array('registrasi_id'=>$idpeserta))->row();

			$peserta=$this->get_peserta();
			$perusahaan =$this->DATA->GetWhere('user_JF',array('qr_code'=>$qr))->row();

			if($isApplied){
				$error = "gagal";
				echo json_encode($error);
			}else if(empty($isRegistered)){
				$error = "notregistered";
				echo json_encode($error);
			}else{
				$create['registrasi_id'] = $peserta->id;
				$create['perusahaan_id'] = $perusahaan->username;
				$create['qr_code'] = $peserta->qr_code;
				$create['qr_perusahaan'] = $perusahaan->qr_code;
				$this->DATA->create('pelamarJF',$create);
				echo json_encode($perusahaan);
			}
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	// function about(){
	// 	if($this->isLoggedIn()){
	// 	$data['page']="about";
	// 	$this->load->view("daftar/layout_peserta.php",$data);
	// 	}else{
	// 		redirect(base_url(), 'refresh');
	// 	}
	// }

	function dokumen(){
		if($this->isLoggedIn()){
		$data['isi']=$this->get_peserta();
		$data['cek']=$this->cekBerkas($data['isi']);
		$data['content']="";
		$data['page']="dokumen";
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function cekBerkas($isi){
		$data['complete']=0;
        $gb=$isi->foto;
        if(!file_exists('assets/uploads/foto/'.$gb)||$gb==''){
          $data['exist_foto']=false;
        }else{
		  $data['exist_foto']=true;
          $data['complete']+=1;
        }

        $ktp=$isi->ktp;
        if(!file_exists('assets/uploads/ktp/'.$ktp)||$ktp==''){
			$data['exist_ktp']=false;
        }else{
			$data['exist_ktp']=true;
			$data['complete']+=1;
        }

        $cv=$isi->cv;
        if(!file_exists('assets/uploads/cv/'.$cv)||$cv==''){
			$data['exist_cv']=false;
        }else{
			$data['exist_cv']=true;
			$data['complete']+=1;
        }

        $ijazah=$isi->ijazah;
        if(!file_exists('assets/uploads/ijazah/'.$ijazah)||$ijazah==''){
			$data['exist_ijazah']=false;
        }else{
			$data['exist_ijazah']=true;
			$data['complete']+=1;
        }

        $transkrip=$isi->transkrip;
        if(!file_exists('assets/uploads/transkrip/'.$transkrip)||$transkrip==''){
			$data['exist_transkrip']=false;
        }else{
			$data['exist_transkrip']=true;
			$data['complete']+=1;
        }

        $pendukung=$isi->pendukung;
        if(!file_exists('assets/uploads/pendukung/'.$pendukung)||$pendukung==''){
			$data['exist_pendukung']=false;
        }else{
			$data['exist_pendukung']=true;
			$data['complete']+=1;
        }

        $lamaran=$isi->lamaran;
        if(!file_exists('assets/uploads/lamaran/'.$lamaran)||$lamaran==''){
			$data['exist_lamaran']=false;
        }else{
			$data['exist_lamaran']=true;
			$data['complete']+=1;
		}
		return $data;
	}


	function get_peserta(){
		$where=array(
			'id'=>$this->session->userdata['ses_id']
		);
		return $this->DATA->GetWhere('registrasiJF',$where)->row();
	}
	
	function downloadAll($id){
		$this->load->library('zip');
		$where=array(
			'id'=>$id
		);
		$data=$this->DATA->GetWhere('registrasiJF',$where)->row();
		$filename=strtoupper($data->nama." (".$data->id.")");

		if(!empty($data->foto)){
			$filepath[] = 'assets/uploads/foto/'.$data->foto;
		}
		if(!empty($data->ktp)){
			$filepath[] = 'assets/uploads/ktp/'.$data->ktp;
		}
		if(!empty($data->cv)){
			$filepath[] = 'assets/uploads/cv/'.$data->cv;
		}
		if(!empty($data->ijazah)){
			$filepath[] = 'assets/uploads/ijazah/'.$data->ijazah;
		}
		if(!empty($data->transkrip)){
			$filepath[] = 'assets/uploads/transkrip/'.$data->transkrip;
		}
		if(!empty($data->pendukung)){
			$filepath[] = 'assets/uploads/pendukung/'.$data->pendukung;
		}
		if(!empty($data->lamaran)){
			$filepath[] = 'assets/uploads/lamaran/'.$data->lamaran;
		}
		
		foreach($filepath as $file) {
		$this->zip->read_file($file);
		}
		$this->zip->download($filename.'.zip');
	}
	

	function download($tipe){
		if($this->isLoggedIn()){
			$this->load->helper('download');
			$data=$this->get_peserta();
			$filename=$data->$tipe;
			$path='assets/uploads/'.$tipe.'/'.$filename;
			force_download($path,NULL);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function downloadtiket(){
		if($this->isLoggedIn()){
		$id 	= $this->session->userdata['ses_id'];
		$cek 	= $this->DATA->profil($id);
		$read	= $this->DATA->date_univ($cek[0]['lulusan']);
		$pdf = new FPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Image('./assets/img/tiketJF.jpg',5,5,200);
		$pdf->Ln(70);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(30,10,'ID Tiket',0,0,'L');
		$pdf->Cell(5,10,':',0,0,'L');
		$pdf->Cell(100,10,$cek[0]['id'],0,1,'L');
		$pdf->Cell(30,10,'Nama',0,0,'L');
		$pdf->Cell(5,10,':',0,0,'L');
		$pdf->Cell(100,10,$cek[0]['nama'],0,1,'L');
		$pdf->Cell(30,10,'Jurusan',0,0,'L');
		$pdf->Cell(5,10,':',0,0,'L');
		$pdf->Cell(100,10,$cek[0]['jurusan'],0,1,'L');
		$pdf->Cell(30,10,'Lulusan',0,0,'L');
		$pdf->Cell(5,10,':',0,0,'L');
		$pdf->Cell(100,10,$read[0]['Nama_univ'] ,0,1,'L');
		$pdf->Image('../tiket_JF/assets/registrasi/img/qrcode/'.$cek[0]['qr_code'].'.png',10,258,30);
		$pdf->Output();
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function preview(){
		if($this->isLoggedIn()){
		$pdf = new FPDF();
		$filename='./assets/uploads/ktp/VJF_00001_GALANG_RAMBU_ANARQI_KTP.pdf';
		header("Content-Type: application/pdf");
		$pdf->Output($filename,'I');
		}else{
			redirect(base_url(), 'refresh');
		}
	}
	

	function upload($tipe,$obj){
		if($this->isLoggedIn()){
		$nama=strtoupper($this->session->userdata['ses_nama']);
		$id=$this->session->userdata['ses_id'];
		// $tgl = date('m-d-Y h:i:s', time());
		
		$nama_file = str_replace(' ', '_',$id.'_'.$nama.'_'.strtoupper($tipe));
		$config['upload_path'] = 'assets/uploads/'.$tipe.'/';
		
		if($obj=='gambar'){
			$config['allowed_types'] = 'jpg|png';
		}else if($obj=='pdf'){
			$config['allowed_types'] = 'pdf';	
		}else if($obj=='pdfzip'){
			$config['allowed_types'] = 'pdf|zip|rar';	
		}
		
	
		$config['overwrite'] = TRUE;
		// $config['file_name'] = $nama_file;
        // load library upload
		$this->upload->initialize($config);
			if (!$this->upload->do_upload($tipe)) {
				$error = $this->upload->display_errors();
				// menampilkan pesan error
				
				$this->session->set_flashdata(
					'alert-'.$tipe,'<br><font color=red><b>Gagal Diunggah</b></font><br>'.$error
				);

			} else {
				$file=$this->upload->data();
				$new_filename=$nama_file.$file['file_ext'];
				$new_path=$file['file_path'].$new_filename;
				rename($file['full_path'], $new_path);
				
				$isi_update=array(
					$tipe=>$new_filename
					);
			
				$where=array(
					'id'=>$id
				);
				$this->DATA->update_data('registrasiJF',$isi_update,$where);

				$this->session->set_flashdata(
					'alert-'.$tipe,'<br><font color=green><b>Berhasil Diunggah</b></font>'
				);

			}
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function hapuslamar($id){
		if($this->isLoggedIn()){
		$this->DATA->delete('pelamarJF','id',$id);
		
		$where=array(
			'registrasi_id'=>$this->session->userdata['ses_id']
		);
		$data['lamar']=$this->DATA->getperusahaan($this->session->userdata['ses_id']);
		$data['cek']="";
		$data['content']="";
		$data['page']="";
		$this->load->view("page/listDilamar.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function feedback(){
		if($this->isLoggedIn()){	
		$data['isi']=$this->get_peserta();
		$data['page']="feedback";
		
		$data['isifeedback']=$this->DATA->GetWhere('feedpesertaJF',array('id'=>$this->session->userdata['ses_id']))->row();
		$data['cekfeedback']=(!empty($data['isifeedback']))? true : false;
		

		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function submitFeedback(){
		if($this->isLoggedIn()){	
		$data = array(
			'id' => $this->session->userdata['ses_id'],
			'F1_1' =>$this->input->post('F1_1'),
			'F1_2' =>$this->input->post('F1_2'),
			'F1_3' =>$this->input->post('F1_3'),
			'F1_4' =>$this->input->post('F1_4'),
			'F1_5' =>$this->input->post('F1_5'),
			'F1_6' =>$this->input->post('F1_6'),
			'F1_7' =>$this->input->post('F1_7'),
			'F1_8' =>$this->input->post('F1_8'),
			'F1_9' =>$this->input->post('F1_9'),
			'F2_1' =>$this->input->post('F2_1'),
			'F2_2' =>$this->input->post('F2_2'),
			'F2_3' =>$this->input->post('F2_3'),
			'F2_4' =>$this->input->post('F2_4'),
			'F3' =>$this->input->post('F3'),
			'F4' =>$this->input->post('F4'),
			'F5_1' =>$this->input->post('F5_1'),
			'F5_2' =>$this->input->post('F5_2'),
			'F5_3' =>$this->input->post('F5_3'),
			'F5_4' =>$this->input->post('F5_4'),
			'F5_5' =>$this->input->post('F5_5'),
			'F6' =>$this->input->post('F6'),
			'F7' =>$this->input->post('F7')
			);
			$res = $this->db->insert('feedpesertaJF', $data);
			if (!$res) {
				$this->session->set_flashdata('feedback','<div class="alert alert-danger alert-dismissable">
					<strong>Gagal disimpan</strong>
				</div>');
			}
			redirect(base_url().'feedback', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function updateFeedback(){
		if($this->isLoggedIn()){	
		$data = array(
			'F1_1' =>$this->input->post('F1_1'),
			'F1_2' =>$this->input->post('F1_2'),
			'F1_3' =>$this->input->post('F1_3'),
			'F1_4' =>$this->input->post('F1_4'),
			'F1_5' =>$this->input->post('F1_5'),
			'F1_6' =>$this->input->post('F1_6'),
			'F1_7' =>$this->input->post('F1_7'),
			'F1_8' =>$this->input->post('F1_8'),
			'F1_9' =>$this->input->post('F1_9'),
			'F2_1' =>$this->input->post('F2_1'),
			'F2_2' =>$this->input->post('F2_2'),
			'F2_3' =>$this->input->post('F2_3'),
			'F2_4' =>$this->input->post('F2_4'),
			'F3' =>$this->input->post('F3'),
			'F4' =>$this->input->post('F4'),
			'F5_1' =>$this->input->post('F5_1'),
			'F5_2' =>$this->input->post('F5_2'),
			'F5_3' =>$this->input->post('F5_3'),
			'F5_4' =>$this->input->post('F5_4'),
			'F5_5' =>$this->input->post('F5_5'),
			'F6' =>$this->input->post('F6'),
			'F7' =>$this->input->post('F7')
			);
			$where=array(
				'no'=>$this->input->post('no')
			);

			$res = $this->DATA->update_datas($where,$data,'feedpesertaJF');
			if ($res) {
				$this->session->set_flashdata('feedback','<div class="alert alert-success alert-dismissable">
					<strong>Berhasil diubah</strong>
				</div>');
			}else{
				$this->session->set_flashdata('feedback','<div class="alert alert-danger alert-dismissable">
					<strong>Gagal diubah</strong>
				</div>');
			}
			redirect(base_url().'feedback', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
	}


	function logout(){
		// insert log 
		if($this->isLoggedIn()){	
		$this->session->sess_destroy();
		redirect(base_url()."admin");
		}else{
			redirect(base_url().'admin', 'refresh');
		}
	}

}
