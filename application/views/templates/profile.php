<!-- menu profile quick info -->
<div class="profile clearfix">
              <div class="profile_pic">
              <?php
              $gb=$isi->foto;
              if (!file_exists('assets/uploads/foto/'.$gb)||$gb==''){
                ?><img src="<?=base_url()?>assets/img/unknown.jpg" alt="..." class="img-circle profile_img">
                <?php
              }else{
                ?><img src="<?=base_url()?>assets/uploads/foto/<?=$gb?>" alt="..." class="img-circle profile_img">
                <?php
              }
              ?>
               
              </div>
              <div class="profile_info">
                <span>Halo,</span>
                <h2><?=ucwords($this->session->userdata['ses_nama']);?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->