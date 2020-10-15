<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <!-- <center><a href="<?=base_url()?>peserta/logout"><font color="white"><b><i class="fa fa-power-off fa-lg"></i><br>Log Out</b></font></a></center> -->
    <div class="menu_section">
     
      <!-- <h3>General</h3> -->
      <ul class="nav side-menu">
      <li><a href="<?=base_url()?>home"><i class="fa fa-home"></i> Dashboard </a>
      </li>
      <li><a href="<?=base_url()?>dokumen"><i class="fa fa-briefcase"></i> Unggah Berkas </a>
      </li>
       <li><a href="<?=base_url()?>findjob/perusahaan"><i class="fa fa-search"></i> Cari Kerja <span class="badge badge-light blink_me"><strong>!</strong></span> </a>
      </li>
      <?php
      $notif=$this->DATA->checkinbox($this->session->userdata['ses_id']);
      
      ?>
      
      <li><a href="<?=base_url()?>chat"><i class="fa fa-comments-o"></i> Chat 
      <?=$notif>0? "<span class='badge badge-danger'>".$notif."</span>" : "";?>
      </a>
      </li>
      <li><a href="<?=base_url()?>listlamaran"><i class="fa fa-list"></i> Daftar Lamaran </a>
      </li>
      <!-- <li><a href="<?=base_url()?>scan2apply"><i class="fa fa-search"></i> Lamar </a>
      </li>
      <li><a href="<?=base_url()?>feedback"><i class="fa fa-comments-o"></i> Feedback </a>
      </li> -->
      <li><a href="<?=base_url()?>peserta/logout"><i class="fa fa-power-off"></i> Log Out</a>
      </li>
      
      
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
