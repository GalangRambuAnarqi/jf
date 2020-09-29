<!-- menu profile quick info -->
<div class="profile clearfix">
              <div class="profile_pic">
             <?php
              if(isset($this->session->userdata['adm_role'])&&$this->session->userdata['adm_role']=='perusahaan'){
                $foto=$this->ADM->select_data('logo','perusahaan_JF',array('id'=>$this->session->userdata['adm_id']),$sortby="",$order="");
              ?>
             <img src="<?=base_url()?>assets/uploads/perusahaan/logo/<?=$foto[0]['logo']?>" alt="..." class="img-circle profile_img">
             <?php
             }else{
               ?>
              <img src="<?=base_url()?>assets/img/logoucc.png" alt="..." class="img-circle profile_img">
               <?php
             }
            ?>

              </div>
              <div class="profile_info">
                <span>Halo,</span>
                <h2><?=ucwords($this->session->userdata['adm_nama']);?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->