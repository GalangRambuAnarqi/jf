<div class="table-responsive">

<table id="tabelku" class="table" style="width:100%">
            <thead>
              <tr>
              <th>No</th>
                <th>Perusahaan</th>
                <th>Judul</th>
                <th>Pendidikan</th>
                <th>Bidang</th>
                <th>Penempatan</th>
                <!-- <th>JmlPekerja</th> -->
                <th>Jmlpelamar (click)</th>
                <th>StatusLow</th>
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
            $nama=$this->ADM->select_data('nama','perusahaan_JF',array('id'=>$data['id_perusahaan']),$x="",$x="");
            $bidang=$this->ADM->select_data('bid_name','bidang_JF',array('bid_id'=>$data['bidang_kerja']),$x="",$x="");
            $jmlpelamar=$this->ADM->select_distinct('registrasi_id','pelamarJF',array('low_id'=>$data['id']),$sortby="",$order="")->num_rows();
            ?>
          
            <td><?=$nama['0']['nama']?></td>
            <td><?=$data['judul_low']?></td>
            <td><?=$data['pendidikan']?></td>
            <td><?=$bidang['0']['bid_name']?></td>
            <td><?=$data['penempatan']?></td>
            <!-- <td><?=$data['jml_pekerja']?></td> -->
        
            <td>
            <a href="<?=base_url()?>admin/perusahaan/lowongan/?act=pelamar&id=<?=$data['id']?>"><?=$jmlpelamar?> pelamar</a>
              
              </td>
              <td><?=$data['status']=='aktif'? 
            "<font color=green>Aktif</font>" :
            "<font color=red>Non Aktif</font>" 
            ?></td>
              <td>
              
              <a href='<?=base_url()?>admin/perusahaan/lowongan/?act=view&id=<?=$data['id']?>'><font color=green><i class="fa fa-desktop"> Lihat</i></font></a><br>


              <a href='<?=base_url()?>admin/perusahaan/lowongan/?act=edit&id=<?=$data['id']?>' onclick="return confirm('Ingin mengubah lowongan <?=$data['judul_low']?>?')"><font color=purple><i class="fa fa-pencil-square-o"> Edit</i></a></a><br>

              <a href="<?=base_url()?>admin/hapus_lowongan/<?=$data['id']?>"  onclick="return confirm('Anda yakin hapus <?=$data['judul_low']?>?')"><font color=red><i class="fa fa-trash-o"> Hapus</i></font></a>

           
          
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".perusahaan">Edit</button> -->

            </td>
            </tr>

            <?php
            }
            ?>
              </tbody> 
              </table>

</div>
<br><br>