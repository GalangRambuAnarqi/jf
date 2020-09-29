 <!-- page content -->
 <div class="right_col" role="main">
 <h3>Profil</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$this->session->userdata['adm_nama']?></h2>
                    
                    <!-- <?=print_r($profil)?> -->
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                  <?=$this->session->flashdata('updateprofil')?>
                  <div class="row">
            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel">
                <div class="x_content">
                <center>
                <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
               <img width=80% style='padding:5%;' class=img-responsive avatar-view src="<?=base_url()."assets/uploads/perusahaan/logo/".$profil[0]['logo']?>" alt=Avatar title=Change the avatar>
                    
                <!-- / Current avatar -->
              </div>
            </div>
       
            <h3><?=$profil[0]['nama']?></h3>
        
            
            </center>
            <table class="table">

              <tr>
              <td> 
              <div class="project_detail">
                <p class="title">Website</p>
                <p><?=!empty($profil[0]['website'])?$profil[0]['website']:"<i>-</i>";?></p>
                </div>
              </td>
              <td> 
              <div class="project_detail">
                <p class="title">Email</p>
                <p><?=!empty($profil[0]['email'])?$profil[0]['email']:"<small>-</small>";?></p>
                </div>
              </td>
              </tr>
              <tr>
              <td> 
              <div class="project_detail">
                <p class="title">Alamat</p>
                <p><?=!empty($profil[0]['alamat'])?$profil[0]['alamat']:"<small>-</small>";?></p>
                </div>
              </td>
              <td> 
              <div class="project_detail">
                <p class="title">Kota</p> 
                <p><?=!empty($profil[0]['kota'])?$profil[0]['kota']:"<small>-</small>";?></p>
                </div>
                </td>
                
                </tr>
                <tr> 
            
                <td> 
              <div class="project_detail">
                <p class="title">HP</p> 
                <p><?=!empty($profil[0]['hp'])?$profil[0]['hp']:"<small>-</small>";?></p>
                </div>
                </td>
                <td> 
              <div class="project_detail">
                <p class="title">Jenis</p> 
                <?php 
                $jenis=!empty($profil[0]['jenis']) ? $this->ADM->getWhereRow('jp_name','jenis_perusahaanJF',array('jp_id'=>$profil[0]['jenis']))->jp_name : "";
                ?>
                <p><?=!empty($jenis)?$jenis:"<small>-</small>";?></p>
                </div>
                </td>
              </tr>


              <tr> 
            <td> 
          <div class="project_detail">
            <p class="title">Kode Pos</p> 
                <p><?=!empty($profil[0]['kodepos'])?$profil[0]['kodepos']:"<small>-</small>";?></p>
            </div>
            </td>
            <td> 
            
          <div class="project_detail">
          <button type="button" onclick="return confirm('Anda yakin ingin mengubah profil?')" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil m-right-xs"></i> Edit Profil</button>
          <?php
          $data['id']=isset($profil[0]['id'])? $profil[0]['id']:""; 
            $data['nama']=isset($profil[0]['nama'])? $profil[0]['nama']:"";
            $data['email']=isset($profil[0]['email'])? $profil[0]['email'] :"";
            $data['website']=isset($profil[0]['website'])? $profil[0]['website']:"";
            $data['alamat']=isset($profil[0]['alamat'])? $profil[0]['alamat']:"";
            $data['kota']=isset($profil[0]['kota'])? $profil[0]['kota']:"";
            $data['kodepos']=isset($profil[0]['kodepos'])? $profil[0]['kodepos']:"";
           $data['hp']=isset($profil[0]['hp'])? $profil[0]['hp']:"";
            $data['jenis']=isset($profil[0]['jenis'])?$profil[0]['jenis']:"";
            $data['deskripsi']=isset($profil[0]['deskripsi'])? $profil[0]['deskripsi']:"";
            $data['jp']=isset($jp)? $jp:"";
         
            $this->load->view('page/perusahaan/form/edit_profil',$data);
            
            ?>
            </div>
            </td>
          </tr>
              
              </table>
            </center>                
          

                </div>
              </div>
            </div>

            <div class="col-md-8 col-sm-8">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Deskripsi Profil</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="color:black">
                
                <p><?=$profil[0]['deskripsi']?></p>

                
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
   
        <!-- /page content -->