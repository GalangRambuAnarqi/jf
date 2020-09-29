<!-- Bootstrap -->
<link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
<div class="col-md-12">
<table id="listlamar" class="table" style="width=100% !important;">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      if(empty($lamar)){
        echo "<tr><td>#</td><td>Anda Belum Melamar</td><td>#</td></tr>";
      }
      else{
        foreach ($lamar as $data){
          ?>
            <tr>
            <td><?=$no++?></td>
            <td><?=$data['name']?></td>
            <td><a href="#" onclick="if (confirm('Apa anda yakin membatalkan lamaran di <?=$data['name']?>?')) window.location.href='<?=base_url()?>peserta/hapuslamar/<?=$data['id']?>';" class="btn btn-info"><h5>Batal</h5></a></td>
            </tr>
          <?php
        }
      }
      ?>
    </tbody>
</table>
</div>