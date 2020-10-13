<!-- page content -->
<div class="right_col" role="main">
          <div class="">
          <?php $this->load->view('templates/titlehead',$judul); ?>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
      
              <div class="x_panel">
                  <div class="x_content">
                
                  <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                     
                  <li class="nav-item">
                        <a class="nav-link<?=($tabs=="perusahaan")? " active":"";?>" id="data1-tab" href="<?=base_url('findjob/perusahaan')?>" role="tab" aria-controls="data1" aria-selected="true">Perusahaan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link<?=($tabs=="quickfind")? " active":"";?>" id="data2-tab" href="<?=base_url('findjob/quickfind')?>" role="tab" aria-controls="data2" aria-selected="true">Cari Cepat</a>
                      </li>    

                    </ul>
         
<?php
if($tabs=='perusahaan'){
  
                  foreach($perusahaan as $data){
                  $totaljob=$this->ADM->select_data('count(id) as jml','lowongan_JF',array('id_perusahaan'=>$data['id']),$sortby="",$order="");
                  
                  ?>
          
          <div class="col-md-55">
                        <div class="x_panel ui-ribbon-container">
                          <div class="ui-ribbon-wrapper">
                            <div class="ui-ribbon">
                            <?=$totaljob[0]['jml']?> Jobs
                            </div>
                          </div>
                          <div class="x_title" style="height:60px;">
                         <a href="<?=base_url()?>lowongan/<?=$data['id']?>"> <b class=green><?=$data['nama']?></b></a>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                            <div class="image view view-first" style="-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none; height:100px;">
                             <a href="<?=base_url()?>lowongan/<?=$data['id']?>"><img style="width: 100%; display: block; height:100px" src="<?=base_url()?>assets/uploads/perusahaan/logo/<?=$data['logo']?>" /></a>
                            
                          </div>
                            </div>
                 
                            <div class="divider"></div>

                            <a href="<?=base_url()?>lowongan/<?=$data['id']?>" class="btn btn-primary btn-block" role="button">Lihat Lowongan</a>
                            

                            


                          </div>
                        </div>
                      </div>


             <?php
                  }
                }else if($tabs=='quickfind'){

          
             ?>
 
<div class="table-responsive">

<table id="lowongan" class="table" style="width:100%">
<thead>
    <tr>
    <th>No</th>
    <th>Logo</th>
      <th>Perusahaan</th>
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

  $bidang=$this->ADM->select_data('bid_name','bidang_JF',array('bid_id'=>$data['bidang_kerja']),$x="",$x="");
  $perusahaan=$this->ADM->select_data('id,logo,nama,deskripsi','perusahaan_JF',array('id'=>$data['id_perusahaan'],'status'=>'aktif'),$x="",$x="");?>

<td><?php
if(!file_exists('assets/uploads/perusahaan/logo/'.$perusahaan[0]['logo'])||$perusahaan[0]['logo']==''){
  echo "-";
}else{
  echo "<img width='50px' height='50px' src=".base_url()."assets/uploads/perusahaan/logo/".$perusahaan[0]['logo'].">";
}?></td>

  <td>
  <!-- <a data-toggle="collapse" href="#collapseExample<?=$data['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample"> -->
  <?=$perusahaan[0]['nama']?>
  <!-- </a> -->
  <!-- <div class="collapse" id="collapseExample<?=$data['id']?>">
  <div class="card card-body">
  <?=$perusahaan[0]['deskripsi']?>
  </div>
  </div> -->
  </td>
  <td><?=$data['judul_low']?></td>
  <td><?=$data['pendidikan']?></td>
  <td><?=$bidang['0']['bid_name']?></td>
  <td><?=!empty($data['penempatan'])? $data['penempatan'] : "N/A"?></td>
    <td>
    
    <a target="_blank" href='<?=base_url()?>detail_low/<?=$data['id_perusahaan']?>/<?=$data['id']?>'><font color=blue><i class="fa fa-desktop">Lihat</i></font></a><br>
    

    <?php
    $userid=$this->session->userdata['ses_id'];
    $sudahlamar=$this->ADM->select_data('id','pelamarJF',array('registrasi_id'=>$userid,'low_id'=>$data['id']),$sortby="",$order="");
    if(empty($sudahlamar)){
    ?>
      <a href='<?=base_url()?>apply/<?=$data['id_perusahaan']?>/<?=$data['id']?>' onclick="return confirm('Anda yakin ingin melamar <?=$data['judul_low']?>')"><font color=red><i class="fa fa-briefcase">Lamar</i></font></a>
      
      <!-- <a href='#' onclick="return confirm('Segera, tanggal 12 Oktober 2020')"><font color=red><i class="fa fa-briefcase">Lamar</i></font></a> -->
      
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

<?php
}
?>
  

                    
               
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br><br><br>
        <!-- /page content -->