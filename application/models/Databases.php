<?php
	class Databases extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        /*PENDAFTARAN JOBFAIR*/
        public function get_univ(){
            $query = $this->db->query('SELECT * FROM daftar_univ order by id');
            return $query->result_array();
        }

        // public function cek_email($email){
        //     $this->db->where('email', $email);  
        //     $query = $this->db->get("registrasiJF")->num_rows();
        //     return $query;
        // }

        public function cek_email($email){
            $jfke=$this->getjfke();
            $idjf=$jfke->id;

            // $regid=$this->getRowBy('registrasiJF',array('email'=>$email))->iduser;
       
            // $this->db->where('email', $email);  
            // $this->db->where('jf_id', $idjf);  
            // $query = $this->db->get("registrasiJF")->num_rows();
            // return $query;

            $this->db->select('a.*');
            $this->db->from('registrasiJF a');
            $this->db->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left'); 
            $this->db->where('a.email', $email);  
            $this->db->where('b.id_jf', $idjf);  
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function cek_nim($nim){
            $this->db->where('kd_prodi', $nim);  
            $query = $this->db->get("prodi")->num_rows();
            return $query;
        }

        public function getperusahaanjf(){
            $jfke=$this->session->userdata['ses_idjf'];
            $this->db->select("a.*");
            $this->db->from("perusahaan_JF as a");
            $this->db->join('partisipasi_comp_JF b', 'a.id = b.id_perusahaan', 'inner');
            $this->db->where('a.status', 'aktif');
            $this->db->where('b.id_jf',$jfke);
            $this->db->order_by('a.id', 'DESC');
            return $this->db->get()->result_array();
        }


        function jumlahpendaftar(){
            $this->db->select("id");
            $this->db->from("registrasiJF");
            $read =  $this->db->get()->result_array();
            return count($read);
        }

        function is_comp_join_jf($idcomp){
            $jfke=$this->session->userdata['ses_idjf'];
            return $this->db->select("id")
                ->from("partisipasi_comp_JF")
                ->where('id_perusahaan',$idcomp)
                ->where('id_jf',$jfke)
                ->get()->row();
        }
        
        public function getjfke(){
            return $this->db->select("*")
                     ->from("jf_ke")
                     ->order_by('id','DESC')
                     ->get()->row();
        }

        function cekLogin(){
            $jfke=$this->getjfke();
            $idjf=$jfke->id;
            $email=$this->input->post('mail');
            $pass=md5($this->input->post('pass'));
            
            $this->db->select('a.*,b.id_jf as idjf,b.kode_registrasi as kdjf');
            $this->db->from('registrasiJF a');
            $this->db->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left'); 
            $this->db->where('a.email', $email);  
            $this->db->where('a.pass', $pass);  
            $this->db->where('b.id_jf', $idjf);  
            $query = $this->db->get();
            return $query->row();
        }

        function cekLoginLama(){
            // $jfke=$this->getjfke();
            // $idjf=$jfke->id;
            
            $email=$this->input->post('mail');
            $pass=md5($this->input->post('pass'));

            return $this->db->select('*')
            ->from('registrasiJF')
            ->where('email', $email)
            ->where('pass', $pass)
            ->get()
            ->row();
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
            $id = 'VJF_01' . sprintf("%05s", $noUrut);
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

        function getWhereRow($col,$table,$where){
            return $data = $this->db->select($col)
                  ->get_where($table, $where)
                  ->row();
        }

        function getpesertabymail($email){
            $jfke=$this->getjfke();
            $idjf=$jfke->id;
            
            $this->db->select('a.*');
            $this->db->from('registrasiJF a');
            $this->db->join('partisipasi_JF b', 'b.id_registrasi = a.iduser', 'left'); 
            $this->db->where('a.email', $email);  
            $this->db->where('b.id_jf', $idjf);  
            $query = $this->db->get();
            return $query->row();
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

        public function getSpesialisasi($id){
            $this->db->select('id,spesialis_id');
            $this->db->from("detail_spesialisasiJF");
            $this->db->where('registrasi_id', $id);
            return $this->db->get()->result_array();
        }

        public function listSpesialisasi(){
            $this->db->select('*');
            $this->db->from("spesialisJF17");
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

    
        function getlowpercomp($idperusahaan){
            $this->db->select('*');
            $this->db->from('lowongan_JF');
            $this->db->where('status','aktif');
            $this->db->where('id_jf',$this->session->userdata['ses_idjf']);
            $this->db->where('id_perusahaan',$idperusahaan);
            return $this->db->get()->result_array();
        }

        function select_data($kolom,$tabel,$kondisi){
            $this->db->select($kolom);
            $this->db->from($tabel);
            $this->db->where($kondisi);
            return $this->db->get()->result_array();
        }

        function checkinbox($sesid){
            $this->db->select('receiverid');
            $this->db->from('chat');
            $this->db->group_by('receiverid');
            $this->db->where('senderid',$sesid);
            $this->db->where('role','perusahaan');
            $this->db->where('status_sender','unread');
            return $this->db->get()->num_rows();
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
                return $this->db->delete($table);
            }

        //END OF PESERTA
        
    }
?>