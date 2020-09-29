<div class="navbar nav_title" style="border: 0;">
<?php
    if(isset($this->session->userdata['adm_role'])&&$this->session->userdata['adm_role']=='perusahaan'){
      echo "<a href=".base_url('perusahaan')." class=site_title>";    
    }else{
      echo "<a href=".base_url('admin')." class=site_title>";  
    }
    ?>
            
              <img src="<?=base_url()?>assets/img/logoucc.png" alt="" width="40px">
              
    <?php
    if(isset($this->session->userdata['adm_role'])&&$this->session->userdata['adm_role']=='perusahaan'){
    echo "<span>Perusahaan JF</span>";    
    }else{
    echo "<span>Internal JF</span>";   
    }
    ?>
              
              </a>
            </div>