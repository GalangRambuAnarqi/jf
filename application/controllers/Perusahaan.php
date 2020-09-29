<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index()
	{
		if(!$this->isLoggedIn()){
			$this->load->view('perusahaan_login.php');
		}else{
			if($this->isAktif()){
				redirect(base_url()."perusahaan/home");
			}
			else{
				redirect(base_url()."perusahaan/pelamar");
			}
		}
	}

	function isLoggedIn(){
		if(!isset($this->session->userdata['adm_status']) || $this->session->userdata['adm_status'] != "login"){
			return false;
		}else{
			if($this->session->userdata['adm_role']=='perusahaan'){
				return true;
			}else{
				return false;
			}
		}
	}


	function login()
	{
		$usn=$this->input->post('usn');
		$pass=$this->input->post('pass');
		$where = array(
			'nick'=>$usn,
			'password'=>$pass
		);
		
		$dataLogin=$this->DATA->GetWhere('perusahaan_JF',$where)->row();

		if(!empty($dataLogin)){
			$ses_usn=$dataLogin->nick;
			$ses_nama=$dataLogin->nama;
			$ses_id=$dataLogin->id;
			$stat=$dataLogin->status;
			$jfid=$dataLogin->kd_jf;
			// Session
			$data_session=array(
				'adm_status'=>'login',
				'adm_role'=>'perusahaan',
				'adm_usn'=>$ses_usn,
				'adm_nama'=>$ses_nama,
				'adm_id'=>$ses_id,
				'adm_stat'=>$stat,
				'adm_jfid'=>$jfid
			);
			$this->session->set_userdata($data_session);
			redirect(base_url()."perusahaan");
		}else{
			$this->session->set_flashdata(
				'logineror','<div class="alert alert-danger alert-dismissable"><h4>
				Username/Password Salah!!!</h4></div>'
			);
			redirect(base_url()."perusahaan");
			// echo "eror";
		}
	}

	function isAktif(){
		$status=$this->session->userdata['adm_stat'];
		if($status=='aktif'){
			return true;
		}else{
			return false;
		}
	}

	function home(){
		if($this->isLoggedIn()){
		$data['cek']="";
		$data['content']="";
		$id=$this->session->userdata['adm_id'];
		$data['page']="perusahaan/home";
		$data['totallowongan']=$this->ADM->count_data('id','lowongan_JF',array('id_perusahaan'=>$id,'status'=>'aktif'),$sortby="",$order="");
		$data['pelamarudinus']=$this->ADM->getpelamarperusahaan('distinct',array('golongan'=>'UDINUS','perusahaan_id'=>$id));
		$data['pelamarumum']=$this->ADM->getpelamarperusahaan('distinct',array('golongan'=>'UMUM','perusahaan_id'=>$id));
		$data['totpelamar']=$this->ADM->select_distinct('registrasi_id','pelamarJF',array('perusahaan_id'=>$id),$sortby="",$order="")->num_rows();
		$data['totlamaran']=$this->ADM->count_data('id','pelamarJF',array('perusahaan_id'=>$id),$sortby="",$order="");
		$data['lowongan']=$this->ADM->select_data('id,judul_low','lowongan_JF',array('id_perusahaan'=>$id,'status'=>'aktif'),'id','ASC');
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function comprof(){
		if($this->isLoggedIn()){
		$data['cek']="";
		$data['content']="";
		$id=$this->session->userdata['adm_id'];
		$data['page']="perusahaan/profil";
		$data['jp']=$this->ADM->select_data('*','jenis_perusahaanJF',$where="",$sort="",$by="");
		$data['profil']=$this->ADM->select_data('*','perusahaan_JF',array('id'=>$id,'status'=>'aktif'),'id','ASC');
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url('perusahaan'), 'refresh');
		}
	}

	function chat(){
		if($this->isLoggedIn()){
		$data['cek']="";
		$data['content']="";
		$data['page']="perusahaan/chat";
		$data['userchat']=$this->ADM->select_data('*','chat',array('receiverid'=>$this->session->userdata('adm_id')),'id','desc');
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
			'role'=>'perusahaan'
		);
		$this->DATA->insertspe('chat',$data);
		$this->session->set_flashdata('pesanchat3','<span class="badge badge-light blink_me"><strong>Terkirim</strong></span>');
		redirect($_SERVER['HTTP_REFERER']);
	}


	function updateprofil(){
		if($this->isLoggedIn()){
			$nama=$this->input->post('nama');
			$email=$this->input->post('email');
			$website=$this->input->post('website');
			$alamat=$this->input->post('alamat');
			$kodepos=$this->input->post('kodepos');
			$kota=$this->input->post('kota');
			$hp=$this->input->post('hp');
			$jenis=$this->input->post('jp');
			$deskripsi=$this->input->post('deskripsi');
			$id=$this->input->post('id');
			$isi_update=array(
				'nama'=>$nama,
				'email'=>$email,
				'website'=>$website,
				'alamat'=>$alamat,
				'kota'=>$kota,
				'kodepos'=>$kodepos,
				'hp'=>$hp,
				'jenis'=>$jenis,
				'deskripsi'=>$deskripsi
			);
			$where=array(
				'id'=>$id
			);
			$res = $this->ADM->update_data('perusahaan_JF',$isi_update,$where);

			$this->session->set_flashdata('updateprofil','<div class="alert alert-success alert-dismissable">
								<strong>Berhasil Diubah</strong>
							</div>');
			redirect(base_url()."perusahaan/comprof");
		}else{
			redirect(base_url('perusahaan'), 'refresh');
		}
	}
	

	function downloadAll($id,$idlamar=''){
		if($this->isAktif()){
			$tb='';
		}else{
			$tb=$this->session->userdata['adm_jfid'];;
		}
		if(!empty($idlamar)&&$this->isAktif()){
			$cekstatus=$this->DATA->getWhereRow('status','pelamarJF'.$tb,array('id'=>$idlamar));
			if(($cekstatus->status)==1){
			$datalamar=$this->getLowDetail($idlamar);
			$this->mailStatus(2,$datalamar['mail'],$datalamar['namaperusahaan'],$datalamar['lowname']);
			$this->updatepelamar(2,$idlamar);
			}
		}
		
		$this->load->library('zip');
		$where=array(
			'id'=>$id
		);
		$data=$this->DATA->GetWhere('registrasiJF'.$tb,$where)->row();
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

	function getLowDetail($idlamar){
		$getidperusahaan=$this->DATA->getWhereRow('perusahaan_id','pelamarJF',array('id'=>$idlamar));
		$perusahaanid=$getidperusahaan->perusahaan_id;
		$lowongan=$this->DATA->getWhereRow('low_id','pelamarJF',array('id'=>$idlamar));
		$lowid=$lowongan->low_id;
		$getid=$this->DATA->getWhereRow('registrasi_id','pelamarJF',array('id'=>$idlamar));
		$idpelamar=$getid->registrasi_id;
		
		$getlow=$this->DATA->getWhereRow('judul_low','lowongan_JF',array('id'=>$lowid));
		$getmail=$this->DATA->getWhereRow('email','registrasiJF',array('id'=>$idpelamar));
		$perusahaan=$this->DATA->getWhereRow('nama','perusahaan_JF',array('id'=>$perusahaanid));
		$data['namaperusahaan']=$perusahaan->nama;
		$data['mail']=$getmail->email;
		$data['lowname']=$getlow->judul_low;
		return $data;
	}

	function statuspelamar($idstats,$idlamar){
		if($this->isLoggedIn()){
			$res=$this->updatepelamar($idstats,$idlamar);

			$datalamar=$this->getLowDetail($idlamar);
			$this->mailStatus($idstats,$datalamar['mail'],$datalamar['namaperusahaan'],$datalamar['lowname']);

			if ($res) {
				$this->session->set_flashdata('statuspelamar','<div class="alert alert-danger alert-dismissable">
					<strong>Gagal Diubah</strong>
				</div>');
			}else{
				$this->session->set_flashdata('statuspelamar','<div class="alert alert-success alert-dismissable">
					<strong>Berhasil Diubah</strong>
				</div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect(base_url('perusahaan'), 'refresh');
		}
	}

	function mailStatus($idstats,$mail,$namaperusahaan,$lowname){

		if($idstats==2){
			$status="Diperiksa";
		}else if($idstats==3){
			$status="Dipanggil";
		}else if($idstats==4){
			$status="Diterima";
		}

		$timestamp=date("d-m-Y H:i:s");
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: JOBFAIR UDINUS <career@cc.dinus.ac.id>'. "\r\n";
	
		$pesan = "
				<html>
				<head>
				<title>Pemberitahuan Status Lamaran Anda</title>
				</head>
				<body>
				<table>
				<tr><td>Status lamaran anda {$lowname} pada perusahaan {$namaperusahaan} : <b>{$status}</b> , Silahkan tunggu respon perusahaan selanjutnya</td></tr>
				<tr><td><i><small>Timestamp {$timestamp} from cc.dinus.ac.id/konseling</small></i></td></tr>
				</table>
				</body>
				</html>
				";

		// proses mengirim email dengan attachment
		mail($mail, "Pemberitahuan status lamaran {$lowname} - {$namaperusahaan}", $pesan, $headers);
	}

	function updatepelamar($idstats,$idlamar){
		$isi_update=array(
			'status' =>$idstats
		);

		$where=array(
			'id'=>$idlamar
		);

		$res = $this->ADM->update_data('pelamarJF',$isi_update,$where);
		return $res;
	}

	function pelamar($tabs=""){
		if($this->isLoggedIn()){
		$data['cek']="";
		$data['content']="";
		$data['page']="perusahaan/pelamar";
		$data['tabs']=empty($tabs)? "bylowongan" : $tabs;

		if($this->isAktif()){
			$data['tb']='';
		}else{
			$data['tb']=$this->session->userdata['adm_jfid'];
		}

		$data['lowongan']=$this->ADM->select_data('*','lowongan_JF'.$data['tb'],array('id_perusahaan'=>$this->session->userdata['adm_id']),'id','DESC');
		
	
		$this->load->view("adm_layout.php",$data);
		}else{
			redirect(base_url(), 'refresh');
		}
	}

	function logout(){
		// insert log 
		if($this->isLoggedIn()){	
		$this->session->sess_destroy();
		redirect(base_url()."perusahaan");
		}else{
			redirect(base_url().'perusahaan', 'refresh');
		}
	}


// OLD





}
