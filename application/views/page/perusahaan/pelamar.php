
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pelamar</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
<?php
      if(isset($_GET['act'])&&$_GET['act']=="vp"){
      $id=base64_decode(urldecode($_GET['cdl']));
      $data['pelamar']=$this->ADM->select_data('*','pelamarJF'.$tb,array('low_id'=>$id),$sortby="",$order="");
      $judul=$this->ADM->select_data('judul_low','lowongan_JF'.$tb,array('id'=>$id),$sortby="",$order="");
      ?>
      <div class="x_title">
      <h2><a href="<?=base_url('perusahaan/pelamar')?>">
      Daftar Lowongan</a> /  <font size=2em><?=$judul[0]['judul_low']?></font></h2> 
      <div class="clearfix"></div>
        </div>
        <script>
        document.title = "Pelamar (<?=$judul[0]['judul_low']?>)";
        </script>
          <?php
      $this->load->view('page/perusahaan/tabel/pelamar',$data);
    }else{
      ?>
                  <div class="x_title">
                    <h2><?=$this->session->userdata['adm_nama']?> 
                    &nbsp;&nbsp;-&nbsp;&nbsp; <a href="<?=$_SERVER['REQUEST_URI']?>">refresh <i class="fa fa-refresh" aria-hidden="true"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                         
      <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link<?=($tabs=="bylowongan")? " active":"";?>" id="data1-tab" href="<?=base_url('perusahaan/pelamar/bylowongan')?>" role="tab" aria-controls="data1" aria-selected="true">By Lowongan</a>
          </li>        
          <li class="nav-item">
            <a class="nav-link<?=($tabs=="bypelamar")? " active":"";?>" id="data1-tab" href="<?=base_url('perusahaan/pelamar/bypelamar')?>" role="tab" aria-controls="data2" aria-selected="true">By Pelamar</a>
          </li>           
        </ul>

        <?php
        if($tabs=='bylowongan'){
          $data['lowongan']=$lowongan;
          $data['idperusahaan']=$this->session->userdata['adm_id'];
         $this->load->view('page/perusahaan/tabel/lowongan',$data);
         ?>
         <script>
         document.title = "Daftar Lowongan (<?=$this->session->userdata['adm_nama']?>)";
         </script>
         <?php
        }else if($tabs=='bypelamar'){
          $data['idperusahaan']=$this->session->userdata['adm_id'];
          $data['pelamar']=$this->ADM->select_distinct('registrasi_id','pelamarJF'.$tb,array('perusahaan_id'=>$data['idperusahaan']),$sortby="",$order="")->result_array();
           $this->load->view('page/perusahaan/tabel/pelamar',$data);
           ?>
        <script>
        document.title = "Seluruh Pelamar (<?=$this->session->userdata['adm_nama']?>)";
        </script>
        <?php
        }
        ?>

                  </div>
<?php
}
?>

                </div>
<!-- end xpanel -->

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
