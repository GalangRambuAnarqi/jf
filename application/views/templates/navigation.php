 <!-- top navigation -->
 <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      
                    <?php
                          $gb=$isi->foto;
                          if (!file_exists('assets/uploads/foto/'.$gb)||$gb==''){
                            ?>
                            <img src="<?=base_url()?>assets/img/unknown.jpg" alt="">
                            <?php
                          }else{
                            ?>
                            <img src="<?=base_url()?>assets/uploads/foto/<?=$gb?>" alt="">
                            <?php
                          }
                          ?>
                      
                      <?=ucwords($this->session->userdata['ses_nama']);?>
                    
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                     
                      <a class="dropdown-item"  href="<?=base_url()?>peserta/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>

                <!-- notif -->
                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a href="<?=base_url()?>dokumen" class="dropdown-item">
                          <!-- <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span> -->
                          <span>
                            <span><b>Upload Data</b></span>
                            <!-- <span class="time">3 mins ago</span> -->
                          </span>
                          <span class="message">
                           Bagi para peserta Job Fair diharapkan agar melengkapi dokumen lamar. 
                            <a href="<?=base_url()?>dokumen">Klik Disini</a>
                          </span>
                        </a>
                      </li>
                      
                    </ul>
                  </li>
                  <!-- end notif -->

                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->