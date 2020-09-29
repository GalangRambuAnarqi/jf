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
        
        public function getvisitor($distinct="",$golongan=""){
            if($distinct=='distinct'){
            $this->db->distinct();
            }
            $this->db->select("a.id");
            $this->db->from("registrasiJF as b");
            $this->db->where('b.golongan', $golongan);
            $this->db->where("date(a.waktu) between '2020-10-12' and '2020-10-16'");
            $this->db->where("a.status",'login');
            $this->db->join('log as a', 'a.id = b.id', 'inner');
            return $this->db->get()->num_rows();
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

        public function get2join($select,$tableA,$tableB,$on,$where){
            $this->db->select($select);
            $this->db->from($tableA);
            $this->db->where($where);
            $this->db->join($tableB, $on, 'inner');
            return $this->db->get()->result_array();
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