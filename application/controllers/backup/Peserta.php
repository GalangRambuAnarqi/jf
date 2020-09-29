<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index()
	{
		if(!$this->isLoggedIn()){
			$data['content']=" Silahkan login dan lengkapi data diri anda";
			$data['isi']="";
			$data['page']="login";
			$this->load->view('layout.php',$data);
		}else{
			redirect(base_url()."home");
		}
	}

	function isLoggedIn(){
		if(!isset($this->session->userdata['ses_status']) || $this->session->userdata['ses_status'] != "login"){
			return false;
		}else{
			return true;
		}
	}

	function login()
	{
		$email=$this->input->post('mail');
		$pass=md5($this->input->post('pass'));
		$where = array(
			'email'=>$email,
			'pass'=>$pass
		);
		
		$dataLogin=$this->DATA->GetWhere('registrasiJF',$where)->row();

		if(!empty($dataLogin)){
			$ses_email=$dataLogin->email;
			$ses_nama=$dataLogin->nama;
			$ses_id=$dataLogin->id;
			// Session
			$data_session=array(
				'ses_status'=>'login',
				'ses_email'=>$ses_email,
				'ses_nama'=>$ses_nama,
				'ses_id'=>$ses_id
			);
			$this->session->set_userdata($data_session);
			// end Session
			// insert log
			
			$ceklist=$this->cekBerkas($dataLogin);
			$isComplete=($ceklist['complete']==7)? 'Y' : 'N';
			$data_log=array(
				'id'=>$this->session->userdata['ses_id'],
				'status'=>'login',
				'complete'=>$isComplete,
				'waktu'=>date('Y-m-d H:i:s')
			);

			$this->db->insert('log',$data_log);
			// end insert log
			redirect(base_url()."peserta",'refresh');
		}else{
			$this->session->set_flashdata(
				'eror','<div class="alert alert-danger"><h4>
				Email/Password Salah!!!</h4></div>'
			);
			redirect(base_url()."peserta");
			// echo "eror";
		}
	}

	// function profil(){
	// 	if($this->isLoggedIn()){
	// 	$data['isi']=$this->get_peserta();
	// 	$data['univ']=$this->DATA->date_univ($data['isi']->lulusan);
	// 	$data['content']="";
	// 	$data['page']="profil";
	// 	$this->load->view("daftar/layout_peserta.php",$data);
	// 	}else{
	// 		redirect(base_url().'login', 'refresh');
	// 	}
	// }


	function scan2apply(){
		if($this->isLoggedIn()){
		$data['isi']=$this->get_peserta();
		$data['cek']="";
		$data['content']="";
		$data['page']="scan2apply";
		$this->load->view("layout.php",$data);
		}else{
			redirect(base_url().'login', 'refresh');
		}
	}

	function lamar(){
		if($this->isLoggedIn()){
		$data['isi']=$this->get_peserta();
		$data['cek']="";
		$data['content']="";
		$data['page']="lamar_online";
		$this->load->view("layout.php",$data);
		}else{
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
		}
	}

	function home(){
		if($this->isLoggedIn()){
		$where=array(
			'role'=>'Perusahaan',
			'status'=>'aktif'
		);
		$data['perusahaan']=$this->DATA->GetWhere('user_JF',$where)->result_array();
		$data['isi']=$this->get_peserta();
		$data['univ']=$this->DATA->date_univ($data['isi']->lulusan);
		$data['page']="home";
		$this->load->view("layout.php",$data);
		}else{
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
		}
	}

	// function about(){
	// 	if($this->isLoggedIn()){
	// 	$data['page']="about";
	// 	$this->load->view("daftar/layout_peserta.php",$data);
	// 	}else{
	// 		redirect(base_url().'login', 'refresh');
	// 	}
	// }

	function dokumen(){
		if($this->isLoggedIn()){
		$data['isi']=$this->get_peserta();
		$data['cek']=$this->cekBerkas($data['isi']);
		$data['content']="";
		$data['page']="dokumen";
		$this->load->view("layout.php",$data);
		}else{
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
		}
	}


	function preview(){
		if($this->isLoggedIn()){
		$pdf = new FPDF();
		$filename='./assets/uploads/ktp/JFU_00001_GALANG_RAMBU_ANARQI_KTP.pdf';
		header("Content-Type: application/pdf");
		$pdf->Output($filename,'I');
		}else{
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
		}
	}


	function feedback(){
		if($this->isLoggedIn()){	
		$data['isi']=$this->get_peserta();
		$data['page']="feedback";
		
		$data['isifeedback']=$this->DATA->GetWhere('feedpesertaJF',array('id'=>$this->session->userdata['ses_id']))->row();
		$data['cekfeedback']=(!empty($data['isifeedback']))? true : false;
		

		$this->load->view("layout.php",$data);
		}else{
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
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
			redirect(base_url().'login', 'refresh');
		}
	}


	function logout(){
		// insert log 
		if($this->isLoggedIn()){	
		$data=$this->get_peserta();
		$ceklist=$this->cekBerkas($data);
		$isComplete=($ceklist['complete']==7)? 'Y' : 'N';
		$data_log=array(
			'id'=>$this->session->userdata['ses_id'],
			'status'=>'logout',
			'complete'=>$isComplete,
			'waktu'=>date('Y-m-d H:i:s')
		);

		$this->db->insert('log',$data_log);
		// end insert log
		$this->session->sess_destroy();
		redirect(base_url()."peserta");
		}else{
			redirect(base_url().'login', 'refresh');
		}
	}

}
