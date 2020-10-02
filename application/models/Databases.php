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