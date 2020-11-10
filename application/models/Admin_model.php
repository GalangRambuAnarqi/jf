<?php
	class Admin_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        /*PENDAFTARAN JOBFAIR*/
        public function get_univ(){
            $query = $this->db->query('SELECT * FROM daftar_univ order by id');
            return $query->result_array();
        }

        public function count_perday($kolom="",$tabel="",$kondisi="",$group_by="",$limit="",$sortby="",$order=""){
            $this->db->select($kolom);            
            $this->db->from($tabel);

            if(!empty($limit)){
                $this->db->limit($limit);
            }

            if(!empty($kondisi)){
                $this->db->where($kondisi);
            }

            if(!empty($group_by)){
                $this->db->group_by($group_by);
            }

            if(!empty($sortby)&&!empty($order)){
                $this->db->order_by($sortby,$order);
            }
            
            return $this->db->get()->result_array();
        }

        function getWhereRow($col,$table,$where){
            return $data = $this->db->select($col)
                  ->get_where($table, $where)
                  ->row();
        }

        function getallcomp(){
            return $this->db->select('*')
            ->from('perusahaan_JF')
            ->where('status','aktif')
            ->get()
            ->result_array();
        } 
        
        function visperday(){
            return $this->db->select('date(a.waktu) as tgl, COUNT(distinct a.id) total')
            ->from('log a')
            ->join('partisipasi_JF b', 'b.id_registrasi = a.id', 'left')
            ->where('a.status','login')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->group_by('date(a.waktu)')
            ->order_by('date(a.waktu)','DESC')
            ->limit(10)
            ->get()
            ->result_array();
        } 

       
        function regperday(){
            return $this->db->select('tanggal, COUNT(a.iduser) total')
            ->from('registrasiJF a')
            ->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->group_by('a.tanggal')
            ->order_by('a.tanggal','DESC')
            ->limit(10)
            ->get()
            ->result_array();
        }


        public function getkunjunganumum(){
            $jf=$this->getWhereRow('*','jf_ke',array('id'=>$this->session->userdata['adm_jfid']));
            // return $jf->tanggal_mulai;
            return $this->db->select("a.id")
            ->from("registrasiJF as b")
            ->where('b.golongan', 'UMUM')
            ->where("date(a.waktu) between '".$jf->tanggal_mulai."' and '".$jf->tanggal_selesai."'")
            ->where("a.status",'login')
            ->join('log as a', 'a.id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi=b.iduser')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->get()->num_rows();
        }

        public function getkunjunganudinus(){
            $jf=$this->getWhereRow('*','jf_ke',array('id'=>$this->session->userdata['adm_jfid']));
            // return $jf->tanggal_mulai;
            return $this->db->select("a.id")
            ->from("registrasiJF as b")
            ->where('b.golongan', 'UDINUS')
            ->where("date(a.waktu) between '".$jf->tanggal_mulai."' and '".$jf->tanggal_selesai."'")
            ->where("a.status",'login')
            ->join('log as a', 'a.id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi=b.iduser')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->get()->num_rows();
        }

        public function getvisitorudinus(){
            $jf=$this->getWhereRow('*','jf_ke',array('id'=>$this->session->userdata['adm_jfid']));
            // return $jf->tanggal_mulai;
            return $this->db->distinct()
            ->select("a.id")
            ->from("registrasiJF as b")
            ->where('b.golongan', 'UDINUS')
            ->where("date(a.waktu) between '".$jf->tanggal_mulai."' and '".$jf->tanggal_selesai."'")
            ->where("a.status",'login')
            ->join('log as a', 'a.id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi=b.iduser')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->get()->num_rows();
        }

        public function getvisitorumum(){
            $jf=$this->getWhereRow('*','jf_ke',array('id'=>$this->session->userdata['adm_jfid']));
            // return $jf->tanggal_mulai;
            return $this->db->distinct()
            ->select("a.id")
            ->from("registrasiJF as b")
            ->where('b.golongan', 'UMUM')
            ->where("date(a.waktu) between '".$jf->tanggal_mulai."' and '".$jf->tanggal_selesai."'")
            ->where("a.status",'login')
            ->join('log as a', 'a.id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi=b.iduser')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->get()->num_rows();
        }

        public function getvisitor($distinct="",$golongan=""){
            if($distinct=='distinct'){
            $this->db->distinct();
            }
            $this->db->select("a.id");
            $this->db->from("registrasiJF as b");
            $this->db->where('b.golongan', $golongan);
            $this->db->where("date(a.waktu) between '2020-10-12' and '2020-10-22'");
            $this->db->where("a.status",'login');
            $this->db->join('log as a', 'a.id = b.id', 'inner');
            return $this->db->get()->num_rows();
        }


        function totpelamarudinus(){
            return $this->db->select("a.registrasi_id")
            ->from("registrasiJF as b")
            ->join('pelamarJF as a', 'a.registrasi_id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi = b.iduser', 'inner')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->where('b.golongan', 'UDINUS')
            ->get()->num_rows();
        }


        function totpelamarumum(){
            return $this->db->select("a.registrasi_id")
            ->from("registrasiJF as b")
            ->join('pelamarJF as a', 'a.registrasi_id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi = b.iduser', 'inner')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->where('b.golongan', 'UMUM')
            ->get()->num_rows();
        }

        function getpelamarudinus(){
            return $this->db->distinct()
            ->select("a.registrasi_id")
            ->from("registrasiJF as b")
            ->join('pelamarJF as a', 'a.registrasi_id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi = b.iduser', 'inner')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->where('b.golongan', 'UDINUS')
            ->get()->num_rows();
        }

        function getpelamarumum(){
            return $this->db->distinct()
            ->select("a.registrasi_id")
            ->from("registrasiJF as b")
            ->join('pelamarJF as a', 'a.registrasi_id = b.iduser', 'inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi = b.iduser', 'inner')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->where('b.golongan', 'UMUM')
            ->get()->num_rows();
        }

        public function getpelamar($distinct="",$golongan=""){
            if($distinct=='distinct'){
                $this->db->distinct();
            }
            $this->db->select("a.registrasi_id");
            $this->db->from("registrasiJF as b");
            $this->db->where('b.golongan', $golongan);
            $this->db->join('pelamarJF as a', 'a.registrasi_id = b.id', 'inner');
            return $this->db->get()->num_rows();
        }

        public function getitemlamar($idperusahaan="",$idpeserta="",$tb=""){
            $this->db->select("a.judul_low");
            $this->db->from("pelamarJF".$tb." as b");
            $this->db->where('b.registrasi_id', $idpeserta);
            $this->db->where('a.id_perusahaan', $idperusahaan);
            $this->db->join('lowongan_JF'.$tb.' as a', 'a.id = b.low_id', 'inner');
            return $this->db->get()->result_array();
        }


        public function getperusahaanjf(){
            $jfke=$this->session->userdata['adm_jfid'];
            $this->db->select("a.*");
            $this->db->from("perusahaan_JF as a");
            $this->db->join('partisipasi_comp_JF b', 'a.id = b.id_perusahaan', 'inner');
            $this->db->where('a.status', 'aktif');
            $this->db->where('b.id_jf',$jfke);
            $this->db->order_by('a.id', 'DESC');
            return $this->db->get()->result_array();
        }

        function checkinboxperusahaan($sesid){
            $this->db->select('senderid');
            $this->db->from('chat');
            $this->db->group_by('senderid');
            $this->db->where('receiverid',$sesid);
            $this->db->where('role','user');
            $this->db->where('status_receiver','unread');
            return $this->db->get()->num_rows();
        }

        function checkinboxadmin($sesid){
            $this->db->select('senderid');
            $this->db->from('chat');
            $this->db->group_by('senderid');
            $this->db->where('receiverid','admin');
            $this->db->where('status_receiver','unread');
            return $this->db->get()->num_rows();
        }

        public function getpelamarperusahaan($distinct="",$where=""){
            if($distinct=='distinct'){
                $this->db->distinct();
            }
            $this->db->select("a.registrasi_id");
            $this->db->from("registrasiJF as b");
            $this->db->where($where);
            $this->db->join('pelamarJF as a', 'a.registrasi_id = b.id', 'inner');
            return $this->db->get()->num_rows();
        }

        function pelamarudinusbycomp($idcomp){
            return $this->db->select('count(distinct a.registrasi_id) as jml')
            ->from('pelamarJF as a')
            ->join('registrasiJF as b','a.registrasi_id=b.iduser','inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi=b.iduser')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->where('b.golongan','UDINUS')
            ->where('a.perusahaan_id',$idcomp)->get()->result_array();
        }

        function pelamarumumbycomp($idcomp){
            return $this->db->select('count(distinct a.registrasi_id) as jml')
            ->from('pelamarJF as a')
            ->join('registrasiJF as b','a.registrasi_id=b.iduser','inner')
            ->join('partisipasi_JF as c', 'c.id_registrasi=b.iduser')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->where('b.golongan','UMUM')
            ->where('a.perusahaan_id',$idcomp)->get()->result_array();
        }

        public function get2join($select,$tableA,$tableB,$on,$where){
            $this->db->select($select);
            $this->db->from($tableA);
            $this->db->where($where);
            $this->db->join($tableB, $on, 'inner');
            return $this->db->get()->result_array();
        }

       
        function getlowonganperusahaan($idperusahaan){
            return $this->db->select('count(a.id) as jml')
            ->from('lowongan_JF a')
            ->join('partisipasi_comp_JF as c', 'c.id_perusahaan=a.id_perusahaan')
            ->where('c.id_jf',$this->session->userdata['adm_jfid'])
            ->where('a.id_perusahaan',$idperusahaan)
            ->where('a.id_jf',$this->session->userdata['adm_jfid'])
            ->get()->result_array();
        }


        
        function getlowonganjf(){
            return $this->db->select('*')
            ->from('lowongan_JF')
            ->where('id_jf',$this->session->userdata['adm_jfid'])
            ->order_by('id','DESC')
            ->get()->result_array();
        }

        // select_data('count(id) as jml','lowongan_JF',array('id_perusahaan'=>$data['id'])

        function totaljob($idcomp){
            return $this->db->select('count(id) as jml')
            ->from('lowongan_JF')
            ->where('id_jf',$this->session->userdata['ses_idjf'])
            ->where('id_perusahaan',$idcomp)
            ->get()->result_array();
        }


        function select_data($kolom="",$tabel="",$kondisi="",$sortby="",$order=""){
            
            $this->db->select($kolom);
            
            $this->db->from($tabel);

            if(!empty($kondisi)){
                $this->db->where($kondisi);
            }

            if(!empty($sortby)&&!empty($order)){
                $this->db->order_by($sortby,$order);
            }
            
            return $this->db->get()->result_array();
        }


        function count_data($kolom="",$tabel="",$kondisi="",$sortby="",$order=""){
            
            $this->db->select($kolom);
            $this->db->from($tabel);

            if(!empty($kondisi)){
                $this->db->where($kondisi);
            }

            if(!empty($sortby)&&!empty($order)){
                $this->db->order_by($sortby,$order);
            }
            
            return $this->db->get()->num_rows();
        }



        function pendaftarperhari(){
            return $this->db->select('a.tanggal, COUNT(a.iduser) total')
            ->from('registrasiJF a')
            ->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->group_by('tanggal')
            ->get()
            ->result_array();
        }

        function udinusperhari(){
            return $this->db->select('a.tanggal, COUNT(a.iduser) total')
            ->from('registrasiJF a')
            ->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left')
            ->where('a.golongan','UDINUS')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->group_by('tanggal')
            ->get()
            ->result_array();
        }

        function umumperhari(){
            return $this->db->select('a.tanggal, COUNT(a.iduser) total')
            ->from('registrasiJF a')
            ->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left')
            ->where('a.golongan','UMUM')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->group_by('tanggal')
            ->get()
            ->result_array();
        }

        function totperusahaan(){
            return $this->db->select('a.id')
            ->from('perusahaan_JF a')
            ->join('partisipasi_comp_JF b', 'b.id_perusahaan = a.id', 'left')
            ->where('a.status','aktif')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->get()
            ->num_rows();
        }
     
        function totlowongan(){
            return $this->db->select('a.id')
            ->from('lowongan_JF a')
            ->where('a.id_jf',$this->session->userdata['adm_jfid'])
            ->where('a.status','aktif')
            ->get()
            ->num_rows();
        }


        function totlamaran(){
            return $this->db->select('a.id')
            ->from('pelamarJF a')
            ->join('partisipasi_JF b', 'b.id_registrasi = a.registrasi_id', 'left')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->get()
            ->num_rows();
        }

        function totalpendaftarudinus(){
            $this->db->select('a.iduser');
            $this->db->from('registrasiJF a');
            $this->db->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left');
            $this->db->where('a.golongan','UDINUS');
            $this->db->where('b.id_jf',$this->session->userdata['adm_jfid']);
            return $this->db->get()->num_rows();
        }
        
        function totalpendaftarumum(){
            $this->db->select('a.id');
            $this->db->from('registrasiJF a');
            $this->db->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left');
            $this->db->where('a.golongan','UMUM');
            $this->db->where('b.id_jf',$this->session->userdata['adm_jfid']);
            return $this->db->get()->num_rows();
        }
        
       
        function totalfilelengkap(){
            $this->db->select('COUNT(a.id) AS jml');
            $this->db->from('registrasiJF a');
            $this->db->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left');
            $this->db->where('a.foto !=',NULL);
            $this->db->where('a.ktp !=',NULL);
            $this->db->where('a.cv !=',NULL);
            $this->db->where('a.ijazah !=',NULL);
            $this->db->where('a.transkrip !=',NULL);
            $this->db->where('b.id_jf',$this->session->userdata['adm_jfid']);
            return $this->db->get()->result_array();;
        }


        function totalloggedin(){
            return $this->db->distinct()
            ->select('a.id')
            ->from('log a')
            ->join('partisipasi_JF b','b.id_registrasi=a.id','left')
            ->where('a.status','login')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->get()
            ->num_rows();
        }

        // select_distinct('registrasi_id','pelamarJF',$where="",$sortby="",$order="")->num_rows()
        function totalpelamar(){
            return $this->db->distinct()
            ->select('b.id_registrasi')
            ->from('pelamarJF a')
            ->join('partisipasi_JF b','b.id_registrasi=a.registrasi_id','left')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->get()
            ->num_rows();
        }

        // select_distinct('registrasi_id','pelamarJF',array('low_id'=>$data['id']),$sortby="",$order="")->num_rows()

        function getpelamarjfpercomp($idcomp){
            return $this->db->distinct()
            ->select('a.id')
            ->from('pelamarJF a')
            ->join('lowongan_JF b','a.low_id=b.id','inner')
            ->where('a.perusahaan_id',$idcomp)
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            // ->where('a.id_jf',$this->session->userdata['adm_jfid'])
            ->get()->num_rows();
        }

        function getpelamarjfperlow($idlow){
            return $this->db->select('id')
            ->from('pelamarJF')
            ->where('low_id',$idlow)
            // ->where('a.id_jf',$this->session->userdata['adm_jfid'])
            ->get()->num_rows();
        }

        // select_distinct('registrasi_id','pelamarJF',array('perusahaan_id'=>$id),$sortby="",$order="")->result_array();


        function selectpelamarbycomp($idcomp){
            return $this->db->distinct()
            ->select('a.registrasi_id')
            ->from('pelamarJF a')
            ->join('lowongan_JF b','b.id=a.low_id','inner')
            ->where('b.id_jf',$this->session->userdata['adm_jfid'])
            ->where('a.perusahaan_id',$idcomp)
            ->get()
            ->result_array();
        }

        function select_distinct($kolom="",$tabel="",$kondisi="",$sortby="",$order=""){
            $this->db->distinct();
            $this->db->select($kolom);
            $this->db->from($tabel);

            if(!empty($kondisi)){
                $this->db->where($kondisi);
            }

            if(!empty($sortby)&&!empty($order)){
                $this->db->order_by($sortby,$order);
            }
            
            return $this->db->get();
        }



        function hapus_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }


        public function cek_email($email){
            $this->db->where('email', $email);  
            $query = $this->db->get("registrasiJF")->num_rows();
            return $query;
        }

        public function cek_nim($nim){
            $this->db->where('kd_prodi', $nim);  
            $query = $this->db->get("prodi")->num_rows();
            return $query;
        }


        function jumlahpendaftar(){
            $this->db->select("id");
            $this->db->from("registrasiJF");
            $read =  $this->db->get()->result_array();
            return count($read);
        }

        function create($tabel,$create){
            $this->db->insert($tabel, $create);
            return $this->db->insert_id();
        }

        public function newID(){
            $conn = mysqli_connect("cc.dinus.ac.id","cc","AlphardGanteng","cc_tiket_jobfair");
            $query = "SELECT max(id) as maxID FROM registrasiJF";
            $hasil = mysqli_query($conn,$query);
            $data  = mysqli_fetch_array($hasil);
            $idMax = $data['maxID'];
            $noUrut = (int) substr($idMax, 6, 10);
            $noUrut++;
            $id = 'VJF_' . sprintf("%05s", $noUrut);
            return $id;
        }

        public function insertspe($table,$data){
            return $this->db->insert($table,$data);
        }

        public function data_univ($lulusan){
            $this->db->select("b.nama_univ as Nama_univ");
            $this->db->from("daftar_univ as b");
            $this->db->where('a.lulusan', $this->session->userdata('lulusan'));
            $this->db->join('registrasiJF as a', 'b.id = a.lulusan', 'inner');
            return $this->db->get()->result_array();
        }

        public function profil($id){
            $this->db->select("*");
            $this->db->from("registrasiJF");
            $this->db->where("id = '$id'");
            return $this->db->get()->result_array();
        }

        public function date_univ($lulusan){
            $this->db->select("b.nama_univ as Nama_univ");
            $this->db->from("daftar_univ as b");
            $this->db->where('a.lulusan', $lulusan);
            $this->db->join('registrasiJF as a', 'b.id = a.lulusan', 'inner');
            return $this->db->get()->result_array();
        }

        

        //PESERTA

        public function GetWhere($table,$where){
            return $this->db->get_where($table,$where);
        }

        public function GetWhereDesc($table,$where,$by,$order){
            $query = $this->db->order_by($by, $order)->get_where($table, $where);
            return $query->result_array();
        }

        public function GetWhereDescRow($table,$where,$by,$order){
            $query = $this->db->order_by($by, $order)->get_where($table, $where);
            return $query->row();
        }
        

        

        public function update_data($table,$set,$where){
            $this->db->set($set)
                     ->where($where)
                     ->update($table);
        }


        function update_datas($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
            return true;
        }      

        public function getData($table){
            return $this->db->get($table)->result_array(); 
        }


        public function getperusahaan($where){
            $this->db->select("b.name,a.id");
            $this->db->from("pelamarJF as a");
            $this->db->order_by('a.timestamp', 'DESC');
            $this->db->where('a.registrasi_id', $where);
            $this->db->join('user_JF as b', 'a.perusahaan_id = b.username', 'inner');
            return $this->db->get()->result_array();
        }

        function delete($table,$col,$id)
            {
                $this->db->where($col,$id);
                $this->db->delete($table);
                return;//onsuccess
            }

        //END OF PESERTA
        
    }
?>