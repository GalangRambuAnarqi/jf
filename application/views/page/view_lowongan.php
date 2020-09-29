  <div class="row">
            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel">
                <div class="x_content">
                <center>
                <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
                <a href=".base_url()."dokumen><img width=80% style='padding:5%;' class=img-responsive avatar-view src="<?=base_url()."assets/uploads/perusahaan/logo/".$perusahaan[0]['logo']?>" alt=Avatar title=Change the avatar></a>
                    
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
                <p><?=$lowongan[0]['penempatan']?></p>
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
            <a class="btn btn-primary" href="<?=base_url()?>admin/perusahaan/lowongan"><i class="fa fa-upload m-right-xs"></i> Kembali</a>
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
                <div class="x_content" style="color:black">

                <?=$lowongan[0]['isi_low']?>

                </div>
              </div>
            </div>
</div>




