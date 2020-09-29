<?=$this->session->flashdata('statuspelamar');?>
<div class="table-responsive">

<table id="tbcollapse" class="table table-hover">
    <thead>
      <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Berkas</th>
      <th class=none>Email</th>
      <th class=none>HP</th>
      <th class=none>Alamat</th>
      <th>Jenjang</th>
      <th>Jurusan</th>
      <th>Lulusan</th>
      <th>IPK</th>
      <th>Spesialisasi</th>
      <th class=none>Gaji Diinginkan</th>
      <?php
      if(isset($idperusahaan)){
      ?>
        <th>MelamarLowongan</th>
      <?php
      }else{
        if($this->session->userdata['adm_stat']=='aktif'){
          echo "<th>Action</th>";
        }
      }
      ?>
      
      
      </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach($pelamar as $data){
      // echo print_r($data);
      $datapendaftar=$this->ADM->select_data('*','registrasiJF'.$tb,array('id'=>$data['registrasi_id']),$sortby="",$order="");
      $lulusan=$this->ADM->select_data('nama_univ','daftar_univ',array('id'=>$datapendaftar[0]['lulusan']),$sortby="",$order="");
      $spesialis=$this->ADM->get2join('a.nama','spesialisJF17 as a','detail_spesialisasiJF'.$tb.' as b','a.id=b.spesialis_id',array('registrasi_id'=>$data['registrasi_id']));
      
      if(isset($idperusahaan)){
      $melamar=$this->ADM->getitemlamar($idperusahaan,$data['registrasi_id'],$tb);
      $listlamar='';
        foreach($melamar as $dt){
          $listlamar.=$dt['judul_low'].",";
        }
      }
  

      $nmspesialis='';
      foreach($spesialis as $dtsp){
        $nmspesialis.=$dtsp['nama'].",";
      }
      
      ?>
      <tr>

      <td><?=$no++?></td>
      <td><?=$datapendaftar[0]['nama']?></td>
      <td>
      <!-- <a href="<?=base_url()?>peserta/downloadAll/<?=$datapendaftar[0]['id']?>"><font color=green><i class="fa fa-download"> Unduh</i></font></a> -->
      <?php
      if(isset($idperusahaan)){
      ?>
      <a href="#" onclick="location.href = '<?=base_url()?>perusahaan/downloadAll/<?=$datapendaftar[0]['id']?>'"><i class="fa fa-download"> Unduh</i></a>
      <?php
      }else{
        ?>
        <a href="#" onclick="location.href = '<?=base_url()?>perusahaan/downloadAll/<?=$datapendaftar[0]['id']?>/<?=$data['id']?>'"><i class="fa fa-download"> Unduh</i></a>
        <?php
      }
      ?>


      </td>
      <td><?=$datapendaftar[0]['email']?></td>
      <td><?=$datapendaftar[0]['hp']?></td>
      <td><?=$datapendaftar[0]['alamat']?></td>
      <td><?=$datapendaftar[0]['jenjang']?></td>
      <td><?=$datapendaftar[0]['jurusan']?></td>
      <td><?=$lulusan[0]['nama_univ']?></td>
      <td><?=$datapendaftar[0]['ipk']?></td>
      <td><?=rtrim($nmspesialis, ',')?></td>
      <td><?=$datapendaftar[0]['gaji']?></td>
      <?php
      if(isset($idperusahaan)){
      ?>
        <td><?=rtrim($listlamar, ',')?></td>
      <?php
      }else{
        if($this->session->userdata['adm_stat']=='aktif'){
        ?>
        <td>
          <select class="form-control" onchange="location = this.value;" style="color:green;font-weight:bold;font-size:13px;">   
          <?php
            if($data['status']==2){
              ?>
          <option value="<?=base_url('perusahaan/statuspelamar')?>/2/<?=$data['id']?>" <?=($data['status']==2)? "selected": ""?>>Diperiksa</option> 
          <option value="<?=base_url('perusahaan/statuspelamar')?>/3/<?=$data['id']?>" <?=($data['status']==3)? "selected": ""?>>Dipanggil</option>
          <option value="<?=base_url('perusahaan/statuspelamar')?>/4/<?=$data['id']?>" <?=($data['status']==4)? "selected": ""?> readonly>Diterima</option>
              <?php
            }else if($data['status']==3){
              ?>
            <option value="<?=base_url('perusahaan/statuspelamar')?>/3/<?=$data['id']?>" <?=($data['status']==3)? "selected": ""?>>Dipanggil</option>
            <option value="<?=base_url('perusahaan/statuspelamar')?>/4/<?=$data['id']?>" <?=($data['status']==4)? "selected": ""?>>Diterima</option>
              <?php
            }else if($data['status']==4){
              ?>
              <option value="<?=base_url('perusahaan/statuspelamar')?>/4/<?=$data['id']?>" <?=($data['status']==4)? "selected": ""?>>Diterima</option>
              <?php
            }
            else{
              ?>
          <option value="#">- Pilih -</option>   
          <option value="<?=base_url('perusahaan/statuspelamar')?>/2/<?=$data['id']?>" <?=($data['status']==2)? "selected": ""?>>Diperiksa</option>  
          <option value="<?=base_url('perusahaan/statuspelamar')?>/3/<?=$data['id']?>" <?=($data['status']==3)? "selected": ""?>>Dipanggil</option>
          <option value="<?=base_url('perusahaan/statuspelamar')?>/4/<?=$data['id']?>" <?=($data['status']==4)? "selected": ""?>>Diterima</option>
            <?php
            }
          ?>
          
          </select>
        </td>
        <?php
        }
      }
      ?>
     
      
      </tr>
     <?php
     }
     ?>


      </tbody>
      </table>
</div>
<br><br>