
<div class="table-responsive">

          <table id="tabelku" class="table table-hover">
              <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Berkas</th>
                <th>Email</th>
                <th>HP</th>
                <th>Alamat</th>
                <th>Jenjang</th>
                <th>Jurusan</th>
                <th>Lulusan</th>
                <th>IPK</th>
                <th>Spesialisasi</th>
                <th>Gaji Diinginkan</th>
                <?php
                if(isset($idperusahaan)){
                ?>
                  <th>MelamarLowongan</th>
                <?php
                }
                ?>
                
                </tr>
              </thead>
              <tbody>
              <?php
              $no=1;
              foreach($pelamar as $data){
                $datapendaftar=$this->ADM->select_data('*','registrasiJF',array('id'=>$data['registrasi_id']),$sortby="",$order="");
                $lulusan=$this->ADM->select_data('nama_univ','daftar_univ',array('id'=>$datapendaftar[0]['lulusan']),$sortby="",$order="");
                $spesialis=$this->ADM->get2join('a.nama','spesialisJF17 as a','detail_spesialisasiJF as b','a.id=b.spesialis_id',array('registrasi_id'=>$data['registrasi_id']));
                
                if(isset($idperusahaan)){
                $melamar=$this->ADM->getitemlamar($idperusahaan,$data['registrasi_id']);
                $listlamar='';
                  foreach($melamar as $data){
                    $listlamar.=$data['judul_low'].",";
                  }
                }
            
          
                $nmspesialis='';
                foreach($spesialis as $data){
                  $nmspesialis.=$data['nama'].",";
                }
                
                ?>
                <tr>
                <td><?=$no++?></td>
                <td><?=$datapendaftar[0]['nama']?></td>
                <td>
                <a href="<?=base_url()?>peserta/downloadAll/<?=$datapendaftar[0]['id']?>"><font color=green><i class="fa fa-download"> Unduh</i></font></a>
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