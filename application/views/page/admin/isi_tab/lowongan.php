    <?php
    if(isset($_GET['act'])&&$_GET['act']=="view"){
        $id=$_GET['id'];
        $data['lowongan']=$this->ADM->select_data('*','lowongan_JF',array('id'=>$id,'status'=>'aktif'),$sortby="",$order="");   
        $data['perusahaan']=$this->ADM->select_data('*','perusahaan_JF',array('id'=>$data['lowongan'][0]['id_perusahaan']),$x="",$x="");
        ?>
        <div class="x_title">
        <h2>Preview Lowongan : <?=$data['lowongan'][0]['judul_low']?></h2>
        <div class="clearfix"></div>
        </div>
        <?php
        $this->load->view('page/admin/page/view_lowongan',$data);
        }
      else if(isset($_GET['act'])&&$_GET['act']=="pelamar"){
          $id=$_GET['id'];
          $data['pelamar']=$this->ADM->select_data('*','pelamarJF',array('low_id'=>$id),$sortby="",$order="");
          // echo print_r($lowongan);
          ?>
          <div class="x_title">
          <h2>Daftar Pelamar</h2>
          <div class="clearfix"></div>
            </div>
              <?php
          $this->load->view('page/admin/tabel/pelamar',$data);
        }
    else if(isset($_GET['act'])&&$_GET['act']=="edit"){
      $id=$_GET['id'];
      $lowongan=$this->ADM->select_data('*','lowongan_JF',array('id'=>$id),$sortby="",$order="");
      // echo print_r($lowongan);
      $data['edit_id']=$lowongan[0]['id'];
      $data['edit_judul']=$lowongan[0]['judul_low'];
      $data['edit_perusahaan']=$lowongan[0]['id_perusahaan'];

      $myString = $lowongan[0]['pendidikan'];
      $ppd = explode(',', $myString);

      // echo print_r($ppd);

      $data['edit_ppd']=$ppd;
      $data['edit_bid']=$lowongan[0]['bidang_kerja'];
      $data['edit_penempatan']=$lowongan[0]['penempatan'];
      $data['edit_jml']=$lowongan[0]['jml_pekerja'];
      $data['edit_isi']=$lowongan[0]['isi_low'];
      $data['edit_status']=$lowongan[0]['status'];

      ?>
      <div class="x_title">
      <h2>Edit Lowongan</h2>
      <div class="clearfix"></div>
        </div>
          <?php
      $data['perusahaan']=$listperusahaan;
      $data['bidang']=$bidang;
      $this->load->view('page/admin/form/form_lowongan',$data);
    }else{
      ?>
  <div class="x_title">
  <h2>Daftar Lowongan</h2>
  <div class="clearfix"></div>
    </div>
        <!-- isi tab sudah mengisi -->
        <?=$this->session->flashdata('tambahlowongan');?>
        <?=$this->session->flashdata('hapuslowongan');?>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".lowongan">Tambah Lowongan</button>
      <div class="modal fade lowongan" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
      <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Form Lowongan</h4>
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
      </button>
      </div>
      <div class="modal-body">
      
      <?php
      // echo print_r($bidang);
      $data['perusahaan']=$listperusahaan;
      $data['bidang']=$bidang;
      $this->load->view('page/admin/form/form_lowongan',$data);?>
      </div>
      </div>
      </div>
      </div>


      <?php
      $this->load->view('page/admin/tabel/lowongan',$lowongan);
      ?>  

  </div>



      <?php
    }
    ?>


  