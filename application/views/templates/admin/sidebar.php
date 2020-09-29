<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <!-- <center><a href="<?=base_url()?>peserta/logout"><font color="white"><b><i class="fa fa-power-off fa-lg"></i><br>Log Out</b></font></a></center> -->
    <div class="menu_section">
     
      <!-- <h3>General</h3> -->
      <ul class="nav side-menu">
      <?php
      if(isset($this->session->userdata['adm_role'])&&$this->session->userdata['adm_role']=='perusahaan'){
        if($this->session->userdata['adm_stat']=='non-aktif'){
          ?>
        <li><a href="<?=base_url()?>perusahaan/pelamar"><i class="fa fa-briefcase"></i> Pelamar </a>
        </li>
        <li><a href="<?=base_url()?>perusahaan/logout"><i class="fa fa-power-off"></i> Log Out</a>
      </li>
        <?php 
        }else{
      ?>
      <li><a href="<?=base_url()?>perusahaan/home"><i class="fa fa-home"></i> Dashboard </a>
      </li>
      <li><a href="<?=base_url()?>perusahaan/comprof"><i class="fa fa-user"></i> Profil </a>
      </li>
      <li><a href="<?=base_url()?>perusahaan/pelamar"><i class="fa fa-briefcase"></i> Pelamar </a>
      </li>
      <li><a href="<?=base_url()?>perusahaan/chat"><i class="fa fa-comments-o"></i> Layanan</a>
      </li>
      <li><a href="<?=base_url()?>perusahaan/logout"><i class="fa fa-power-off"></i> Log Out</a>
      </li>
      <?php
        }
      }else{
      ?>
      <li><a href="<?=base_url()?>admin/home"><i class="fa fa-home"></i> Dashboard </a>
      </li>
      <li><a href="<?=base_url()?>admin/perusahaan"><i class="fa fa-briefcase"></i> Manajemen Perusahaan </a>
      </li>
      <li><a href="<?=base_url()?>admin/users"><i class="fa fa-briefcase"></i> Manajemen User </a>
      </li>
      <li><a href="<?=base_url()?>admin/chat"><i class="fa fa-comments-o"></i> Layanan </a>
      </li>
      <li><a href="<?=base_url()?>admin/logout"><i class="fa fa-power-off"></i> Log Out</a>
      </li>
      <?php
      }
      ?>

      

<!-- JOBFAIR OFFLINE -->
      <!-- <li><a href="<?=base_url()?>scan2apply"><i class="fa fa-search"></i> Lamar </a>
      </li>
      <li><a href="<?=base_url()?>feedback"><i class="fa fa-comments-o"></i> Feedback </a>
      </li> -->
<!-- /JOBFAIR OFFLINE -->  
      
   
      
      
        <!-- <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#level1_1">Level One</a>
            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="level2.html">Level Two</a>
                </li>
                <li><a href="#level2_1">Level Two</a>
                </li>
                <li><a href="#level2_2">Level Two</a>
                </li>
          </ul>
        </li>
        <li><a href="#level1_2">Level One</a>
        </li> -->
            
      </ul>
    </div>

  </div>
            <!-- /sidebar menu -->
