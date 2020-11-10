
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          <?php 
          $this->load->view('templates/titlehead',$judul); 
          $status=array(
            '1'=>'Belum Diperiksa',
            '2'=>'Diperiksa',
            '3'=>'Dipanggil',
            '4'=>'Diterima'
          );
          $statuscolor=array(
            '1'=>'black',
            '2'=>'darkorange',
            '3'=>'blue',
            '4'=>'green'
          );

          ?>             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Lamaran Anda <small>/ <a href="<?=base_url()?>findjob/perusahaan">Cari Kerja</a></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?=$this->session->flashdata('statuslamar');?>

                  Berikut daftar lowongan yang Anda telah lamar. Semua berkas lamaran dan proses seleksi akan kami serahkan ke perusahaan masing-masing setelah hari terakhir Job Fair. Untuk selanjutnya, silahkan Anda menunggu dan berdoa agar perusahaan merespon lamaran yang telah Anda masukkan ke perusahaan. Semoga melalui Job Fair ini Anda bisa segera mendapatkan pekerjaan sesuai dengan passion.<br><br>

                  <div class="table-responsive">
          <table id="listlamaran" class="table table-hover">
              <thead>
                <tr>
                <th>No</th>
                <th>Perusahaan</th>
                <th>Judul Lamaran</th>
                <th>Jabatan</th>
                <th>Pendidikan</th>
                <th>Penempatan</th>
                <th>Status</th>
                <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if(!empty($listlamar)){
                $no=1;
                foreach($listlamar as $data){
                  $lowongan=$this->ADM->select_data('*','lowongan_JF',array('id'=>$data['low_id']),$sortby="",$order="");
                  $perusahaan=$this->ADM->select_data('*','perusahaan_JF',array('id'=>$data['perusahaan_id']),$sortby="",$order="");
                  $bidang=$this->ADM->select_data('*','bidang_JF',array('bid_id'=>$lowongan[0]['bidang_kerja']),$sortby="",$order="");

                  $compjf=$this->DATA->is_comp_join_jf($data['perusahaan_id']);
                ?>
                <tr>
                <td><?=$no++?></td>
                <td><?=$perusahaan[0]['nama']?></td> 
                 <td><?=$lowongan[0]['judul_low']?></td>
                 <td><?=$bidang[0]['bid_name']?></td>     
                 <td><?=$lowongan[0]['pendidikan']?></td> 
                 <td><?=!empty($lowongan[0]['penempatan'])?$lowongan[0]['penempatan'] : "N/A";?></td> 
                 <td><font color=<?=$statuscolor[$data['status']]?>><?=$status[$data['status']]?></font></td> 
                 <td> 
                 <?php
                 if(!empty($compjf)){
                 ?>
                 <a href='<?=base_url()?>detail_low/<?=$data['perusahaan_id']?>/<?=$data['low_id']?>'><font color=blue><i class="fa fa-desktop">Lihat</i></font></a><br>
                 <a href='<?=base_url()?>cabutlamaran/<?=$data['id']?>' onclick="return confirm('Anda yakin membatalkan melamar di lowongan <?=$lowongan[0]['judul_low']?>')"><font color=red><i class="fa fa-trash-o">Batal Melamar</i></font></a>
                <?php
                 }else{
                   echo "<b><font color=red>Expired</font></b>";
                 }
                ?>

                 </td> 
                         
                </tr>
                <?php
                }
              }else{
                echo "<tr>
                <td colspan=8><center>Anda belum melamar loker apapun, klik <a href=".base_url('findjob/perusahaan').">disini</a> untuk mencari dan melamar kerja</center></td>
                
                </tr>";
              }
                ?>

                </tbody>
                </table>


                  </div>
                  <br><br>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
