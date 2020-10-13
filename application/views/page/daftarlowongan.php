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
                    <h2><a href="<?=base_url()?>findjob/perusahaan">Cari Perusahaan</a> <small>/ <?=$perusahaan[0]['nama']?></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>

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
           
            <div class="x_title">
            <h3><?=$perusahaan[0]['nama']?></h3>
            </div>
            <a data-toggle="collapse" href="#collapseExample<?=$perusahaan[0]['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                      <i class="fa fa-plus-circle"></i> Lihat Profil Perusahaan</a>
                      </a>
                      </center>
                      <div class="collapse" id="collapseExample<?=$perusahaan[0]['id']?>">
                      <div class="card card-body">
                      <?=$perusahaan[0]['deskripsi']?>
                      </div>
                      </div>
            
            </center>                
          

                </div>
              </div>
            </div>

            <div class="col-md-8 col-sm-8">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Daftar Lowongan</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="color:black">
                

                <div class="table-responsive">

                <table id="lowongan" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th>No</th>
                      <th>Judul</th>
                      <th>Pendidikan</th>
                      <th>Bidang</th>
                      <th>Penempatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                      <tbody>
                      <?php
                  $no=1;
                  foreach($lowongan as $data){
                  ?>
                  <tr>
                  <td><?=$no++?></td>
                  <?php 
             
                  $bidang=$this->ADM->select_data('bid_name','bidang_JF',array('bid_id'=>$data['bidang_kerja']),$x="",$x="");?>
                
                  <td><?=$data['judul_low']?></td>
                  <td><?=$data['pendidikan']?></td>
                  <td><?=$bidang['0']['bid_name']?></td>
                  <td><?=!empty($data['penempatan'])?$data['penempatan']:"N/A";?></td>
                    <td>
                    
                    <a target="_blank" href='<?=base_url()?>detail_low/<?=$data['id_perusahaan']?>/<?=$data['id']?>'><font color=blue><i class="fa fa-desktop">Lihat</i></font></a><br>
                    

                    <?php
                    $userid=$this->session->userdata['ses_id'];
                    $sudahlamar=$this->ADM->select_data('id','pelamarJF',array('registrasi_id'=>$userid,'low_id'=>$data['id']),$sortby="",$order="");
                    if(empty($sudahlamar)){
                    ?>
                      <!-- <a href='#' onclick="return confirm('Segera, tanggal 12 Oktober 2020')"><font color=red><i class="fa fa-briefcase">Lamar</i></font></a> -->

                      <a href='<?=base_url()?>apply/<?=$data['id_perusahaan']?>/<?=$data['id']?>' onclick="return confirm('Anda yakin ingin melamar <?=$data['judul_low']?>')"><font color=red><i class="fa fa-briefcase">Lamar</i></font></a>
                      
                      <br>
                      <?php
                      }
                      ?>

                  </td>
                  </tr>

                  <?php
                  }
                  ?>
                      </tbody>
                  </table>

                  </div>
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