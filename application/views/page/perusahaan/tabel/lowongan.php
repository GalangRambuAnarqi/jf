<div class="table-responsive">

<table id="tabelku" class="table" style="width:100%">
            <thead>
              <tr>
              <th>No</th>
                <!-- <th>Perusahaan</th> -->
                <th>Judul Lowongan</th>
                <th>Pendidikan</th>
                <th>Bidang</th>
                <th>Penempatan</th>
                <!-- <th>JmlPekerja</th> -->
                <th>Jmlpelamar (click)</th>
               
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
            // $nama=$this->ADM->select_data('nama','perusahaan_JF',array('id'=>$data['id_perusahaan']),$x="",$x="");
            $bidang=$this->ADM->select_data('bid_name','bidang_JF',array('bid_id'=>$data['bidang_kerja']),$x="",$x="");
            $jmlpelamar=$this->ADM->select_distinct('registrasi_id','pelamarJF'.$tb,array('low_id'=>$data['id']),$sortby="",$order="")->num_rows();
            ?>
          
            <!-- <td><?=$nama['0']['nama']?></td> -->
            <td><?=$data['judul_low']?></td>
            <td><?=$data['pendidikan']?></td>
            <td><?=$bidang['0']['bid_name']?></td>
            <td><?=$data['penempatan']?></td>
            <!-- <td><?=$data['jml_pekerja']?></td> -->
        
            <td>
            <a href="<?=base_url()?>perusahaan/pelamar/?act=vp&cdl=<?=urlencode(base64_encode($data['id']))?>"><?=$jmlpelamar?> pelamar</a>
              
        
            </tr>

            <?php
            }
            ?>
              </tbody> 
              </table>

</div>
<br><br>