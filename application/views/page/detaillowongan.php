 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
          <?php $this->load->view('templates/titlehead',$judul); ?>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?=base_url()?>lowongan/<?=$perusahaan[0]['id']?>"><?=$perusahaan[0]['nama']?></a> <small> / <?=$lowongan[0]['judul_low']?> / <a href="<?=base_url()?>findjob">Daftar Perusahaan</a> </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <?=$this->session->flashdata('statuslamar');?>
                  <div class="x_content">


                  <div class="row">
            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel">
                <div class="x_content">
                <center>
                <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
               <img width=80% style='padding:5%;' class=img-responsive avatar-view src="<?=base_url()."assets/uploads/perusahaan/logo/".$perusahaan[0]['logo']?>" alt=Avatar title=Change the avatar>
                    
                <!-- / Current avatar -->
              </div>
            </div>
            <h3><?=$perusahaan[0]['nama']?></h3>
            
            </center>                
            <table class="table">
              <tr>
              <td> 
              <div class="project_detail">
                <p class="title">Lowongan</p>
                <p><?=$lowongan[0]['judul_low']?></p>
                </div>
                </td>
              <td> 
              <div class="project_detail">
                <p class="title">Jenjang Pendidikan</p>
                <p><?=$lowongan[0]['pendidikan']?></p>
              </td>
              </div>
              <tr>
              <td> 
              <div class="project_detail">
                <p class="title">Jabatan</p>
                <?php
                $bidang=$this->ADM->select_data('bid_name','bidang_JF',array('bid_id'=>$lowongan[0]['bidang_kerja']),$x="",$x="");?>
                <p><?=$bidang[0]['bid_name']?></p>
                </div>
              </td>
              <td> 
              <div class="project_detail">
                <p class="title">Penempatan Kota</p>
                <p><?=!empty($lowongan[0]['penempatan'])?$lowongan[0]['penempatan']:"N/A";?></p>
                </div>
                </td>
              </tr>
              
              </table>

            <!-- <ul class="list-unstyled user_data">        
            <div class="project_detail">
                <p class="title">Judul Lowongan</p>
                <p><?=$lowongan[0]['judul_low']?></p>
                <p class="title">Jenjang Pendidikan</p>
                <p><?=$lowongan[0]['pendidikan']?></p>
                <p class="title">Jabatan</p>
                <?php
                $bidang=$this->ADM->select_data('bid_name','bidang_JF',array('bid_id'=>$lowongan[0]['bidang_kerja']),$x="",$x="");?>
                <p><?=$bidang[0]['bid_name']?></p>
                <p class="title">Penempatan Kota</p>
                <p><?=$lowongan[0]['penempatan']?></p>  
                </div>
            </ul> -->


            <center>
            <!-- <a href="<?=base_url()?>get_tiket" class="btn btn-success"><font color=white><i class="fa fa-download m-right-xs"></i> Download Tiket</font></a> -->

            <?php
           $userid=$this->session->userdata['ses_id'];
           $sudahlamar=$this->ADM->select_data('id','pelamarJF',array('registrasi_id'=>$userid,'low_id'=>$lowongan[0]['id']),$sortby="",$order="");
          //  echo "<h1>".$sudahlamar[0]['id']."</h1>";
           if(empty($sudahlamar)){
           ?>
           
            <a class="btn btn-primary" href='<?=base_url()?>apply/<?=$lowongan[0]['id_perusahaan']?>/<?=$lowongan[0]['id']?>' onclick="return confirm('Anda yakin ingin melamar <?=$lowongan[0]['judul_low']?>')"><i class="fa fa-briefcase m-right-xs"></i> Lamar</a>

            <!-- <a class="btn btn-primary" href='#' onclick="return confirm('Segera, tanggal 2 Juni 2020')"><i class="fa fa-briefcase m-right-xs"></i> Lamar</a> -->

            <?php
            }else{
              ?>
              <h5><font color=green>Anda sudah melamar di lowongan ini</font></h5>
              <a class="btn btn-danger" href='<?=base_url()?>cabutlamaran/<?=$sudahlamar[0]['id']?>' onclick="return confirm('Anda yakin membatalkan melamar di lowongan <?=$lowongan[0]['judul_low']?>')"><i class="fa fa-trash-o"></i> Batal Melamar</a>
              <?php
            }
            ?>
            
            </center>
          
            <hr>
            <!-- <div class="col-md-7 col-sm-7">
            <i>*Apabila terdapat kekeliruan data / masalah silahkan hubungi kami</i>
            </div>
            <div class="col-md-3 col-sm-3" style="text-align:right">
            <a href="https://wa.me/6285640726824?text=Dear%20admin%20Job%20Fair%20,%20Saya%20ingin%20:%20<sebutkan>" class="btn btn-danger" role="button">Bantuan</a>
            </div> -->


                </div>
              </div>
            </div>





            <div class="col-md-8 col-sm-8 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Isi Lowongan</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="color:black;">

                <?=$lowongan[0]['isi_low']?>

                </div>
              </div>
            </div>
</div>





<!-- endrow -->

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->