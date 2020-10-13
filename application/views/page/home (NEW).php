<!-- page content -->
<div class="right_col" role="main">
<div class="">
<?php $this->load->view('templates/titlehead',$judul); ?>
  </div>
  
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
      <!-- judul -->
        <div class="x_title">
          <h2>Selamat Datang !</h2>
          <div class="clearfix"></div>
        </div>
      <!-- /judul -->
        <div class="x_content">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


        <div class="modal fade in bs-example-modal-lg" id="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" onload="countdown()">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Modal title</h4>
</button>
</div>
<div class="modal-body">
<h4>Text in a modal</h4>
<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
<button id="tutup" onclick="" style="display:none;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<span id="detikan"></span>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModalLabel').modal('show');
       
        countdown();
    });
    
    var timer=3;
    // setTimeout(function(){
    //   // $('#myModalLabel').modal('hide')
    //   // $("#tutup").show();
     
    //   timer=timer-1;
    //   },1000
    //   );

    function countdown(){
      if(timer>=0){
        document.getElementById('detikan').innerHTML=timer;
      }else{
        $("#tutup").show();
        $("#detikan").hide();
      }
      timer-=1;
      var timer2=setTimeout("countdown()",1000);
      return;
    }
</script>



        <?=$this->session->flashdata('updateprofil');?>

          <div class="col-md-3 col-sm-3  profile_left">

          <center>
            <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->

                <?php
                $gb=$isi->foto;
                if (!file_exists('assets/uploads/foto/'.$gb)||$gb==''){
                  echo "<a href=".base_url()."dokumen><img width=80% style='border:5px outset #000' class=img-responsive avatar-view src=assets/img/unknown.jpg alt=Avatar title=Change the avatar></a>";
                }else{
                  echo "<a href=".base_url()."dokumen><img width=80% style='border:5px outset #000' class=img-responsive avatar-view src=assets/uploads/foto/$gb alt=Avatar title=Change the avatar></a>";
                }
                ?>
                
                <!-- / Current avatar -->
              </div>
            </div>
            <h3><?=$isi->nama;?></h3>
            (<?php echo $isi->id;?> -
            <?php echo $isi->golongan;?>)
            </center>              
            <br>
            <ul class="list-unstyled user_data">        

              <li>
                <i class="fa fa-map-marker user-profile-icon"></i> <?=$isi->alamat?>
              </li>

              <li>
                <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $isi->jenjang." - ".$isi->jurusan?>
              </li>

              <li class="m-top-xs">
                <i class="fa fa-university user-profile-icon"></i>
                <?=$univ[0]['Nama_univ'];?>
              </li>

              <li>
                <i class="fa fa-envelope user-profile-icon"></i> <?=$isi->email?>
              </li>

              <li>
                <i class="fa fa-phone-square user-profile-icon"></i> <?=$isi->hp?>
              </li>

              <li>
              <i class="fa fa-wrench" aria-hidden="true"></i>

                <?php
                $spec=array();
                foreach($skill as $dt){
                  $spec[]=$dt['spesialis_id'];
                }

                foreach($spesialisasi as $data){
                 echo (in_array($data['id'],$spec))? $data['nama'].". " : "";
                }
             
                ?>

              </li>
            </ul>

            <center>
            <!-- <a href="<?=base_url()?>get_tiket" class="btn btn-success"><font color=white><i class="fa fa-download m-right-xs"></i> Download Tiket</font></a> -->
            <button type="button" onclick="return confirm('Anda yakin ingin mengubah profil?')" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil m-right-xs"></i> Edit Profil</button>

            <a class="btn btn-primary" href="<?=base_url()?>dokumen"><i class="fa fa-upload m-right-xs"></i> Unggah Berkas</a>
            
            <?php
            $data['nama']=$isi->nama;
            $data['email']=$isi->email;
            $data['hp']=$isi->hp;
            $data['alamat']=$isi->alamat;
            $data['jenjang']=$isi->jenjang;
            $data['jurusan']=$isi->jurusan;
            $data['ipk']=$isi->ipk;
            $data['universitas']=$isi->lulusan;
            $data['golongan']=$isi->golongan;
            ?>
            <?php $this->load->view('page/form/edit_form',$data);?>  
            
          
            </center>
          
            <hr>
            <div class="col-md-7 col-sm-7">
            <i>*Apabila mengalami masalah / kendala sistem silahkan hubungi kami</i>
            </div>
            <div class="col-md-3 col-sm-3" style="text-align:right">
            <a href="https://wa.me/6285640726824?text=Dear%20admin%20Job%20Fair%20,%20Saya%20ingin%20:%20<sebutkan>" class="btn btn-danger" role="button">Bantuan</a>
            </div>
          </div>
      
          <div class="col-md-9 col-sm-9 ">

            <div class="profile_title">
              <div class="col-md-6">
                <h2>Panduan Job Fair</h2>
              </div>
              <div class="col-md-6">
              </div>
            </div>
              <!-- Smart Wizard -->
          <p>Mohon bagi para Jobseeker untuk dapat memperhatikan beberapa hal berikut.</p>
          <div id="wizard" class="form_wizard wizard_horizontal">
            <ul class="wizard_steps">
              <li>
                <a href="#step-1">
                  <span class="step_no">1</span>
                  <span class="step_descr">
                    INFO 1<br/>
                <small>Upload</small>
                </span>
                </a>
              </li>
              <li>
                <a href="#step-2">
                  <span class="step_no">2</span>
                  <span class="step_descr">
                    INFO 2<br />
                  <small>Lowongan</small>
                  </span>
                </a>
              </li>
              <!-- <li>
                <a href="#step-3">
                  <span class="step_no">3</span>
                  <span class="step_descr">
                    INFO 3<br />
                  <small>Lokasi</small>
                  </span>
                </a>
              </li> -->
			        <!-- <li>
                <a href="#step-4">
                  <span class="step_no">3</span>
                  <span class="step_descr">
                  INFO 3<br />
                  <small>Apply</small>
                  </span>
                </a>
              </li> -->
            </ul>

            <div id="step-1">
              <h2 class="StepTitle">Unggah Dokumen</h2>
              <p>
              Unggah perlengkapan dokumen seperti Foto, KTP, Ijazah, Transkrip Nilai, Surat Lamaran, CV, dan dokumen pendukung lainnya di Halaman Unggah Berkas. Anda diwajibkan melengkapi unggah berkas untuk dapat melamar pekerjaan.<br><a href="<?=base_url()?>dokumen"> > Klik Disini (Ke Halaman Unggah Berkas)</a>
              </p>
            </div>

            <div id="step-2">
              <h2 class="StepTitle">Cek Daftar Lowongan</h2>
              Daftar lowongan perusahaan jobfair bisa anda lihat di halaman <a href="<?=base_url()?>findjob/perusahaan">Cari Kerja (Klik)</a>
              Pantau sosial media kami untuk melihat event terupdate :
           
           <li>Instagram : <a href="https://www.instagram.com/udinuscareercenter/">@udinuscareercenter (Klik)</a></li>
           <li>Twitter : <a href="https://twitter.com/dinus_career">@dinus_career (Klik)</a></li>
           <li>Facebook : <a href="https://www.facebook.com/udinuscc">Udinus Career Center (Klik)</a></li>
             
            </div>


            <!-- <div id="step-3">
              <h2 class="StepTitle">Datang Ke Job Fair</h2>
              <p>
              Job Fair akan dilaksanakan di Gedung E, Aula Lt. 3 Kompleks Udinus Jl. Nakula I/ No. 5 – 11 Semarang 50131. <br>Download, cetak, dan bawa <b>tiket Job Fair</b> Anda, tiket tersebut digunakan untuk checking peserta dan mengunjungi stand perusahaan pada saat Job Fair berlangsung. 
              </p>
            </div> -->

            <!-- <div id="step-4">
            <h2 class="StepTitle">Cara Apply</h2>
              <p>
              Nomor ID tiket pada tiket Job Fair digunakan untuk melamar di stand perusahaan. Misal ID Tiket Anda <b><?=$isi->id?></b> maka ID yang akan anda gunakan adalah <b><?=substr($isi->id, -5)?></b> <i>(5 digit angka terakhir pada nomor ID).</i> Atau anda dapat melamar dengan cara scan QR. Lihat tutorialnya selengkapnya di halaman Lamar. <br><a href="<?=base_url()?>scan2apply">> Klik Disini (Ke Halaman Lamar)</a>
            </div> -->

            
           
            

          </div>
          <!-- End SmartWizard Content -->

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
             <!-- tabs -->
             <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"></i>INFO</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">TUTORIAL</a>
                      </li>
                      
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                   
                     

                      <div class="col-md-12">

                      <H3>Perusahaan Peserta <small>(Live Update)</small></H3>
                      <div class="table-responsive">
                      <table id="perusahaan" class="table table-bordered table-hover">
                          <thead>
                            <tr align=center>
                              <th width=5%>No</th>
                              <th>Perusahaan</th>
                              <!-- <th>Lowongan Masuk</th> -->
                            </tr>
                          </thead>
                      <tbody>
                      <?php
                       $no=1;
                         foreach ($perusahaan as $row) {
                          $totaljob=$this->ADM->select_data('count(id) as jml','lowongan_JF',array('id_perusahaan'=>$row['id']),$sortby="",$order="");
                            // echo "<li>".$row['name']."</li>";
                            ?>
                            <tr>
                            <td><?=$no++?></td>
                            <td><?=$row['nama']?></td>
                            <!-- <td><center><a href="<?=base_url()?>lowongan/<?=$row['id']?>"><?=$totaljob[0]['jml']?></a></center></td>  -->
                            <!-- <td><center><?=$totaljob[0]['jml']?></center></td>  -->
                            </tr>
                            <!-- <TR>
                            <TD>#</TD>
                            <td>Daftar lowongan perusahaan jobfair bisa anda lihat di website ini pada tanggal 11 Oktober 2020 (H-1 Job Fair) dimulai.</td></TR> -->
                          <?php
                          }
                          ?>  
                          </tbody>
                          </table>
                          </div>
                          <br><br>
                        </div>
                        <!-- <div class="col-md-6"> -->
                          <!-- <H3>Keterangan</H3>
                        Perusahaan yang telah terdaftar akan mengikuti Job Fair pada hari Sabtu dan Minggu, sehingga perusahaan yang hadir pada kedua hari tersebut adalah sama. 
                        Untuk informasi lowongan dan posisi, terus pantau updatenya di <b><a href="https://www.instagram.com/udinuscareercenter/">IG Udinus Career Center</a></b> atau <b><a href="http://cc.dinus.ac.id/jobfair/">UDINUS JOBFAIR.</a></b><br><br> -->

                        <!-- <H3>Timeline Acara</H3>
                        <ul class="list-unstyled timeline">
                      <li>
                        <div class="block">
                          <div class="tags">
                            <a href="#" class="tag">
                              <span>Segment 1</span>
                            </a>
                          </div>
                          <div class="block_content">
                            <h2 class="title">
                              <a>09.00 - 12.00 WIB</a>
                            </h2>
                            <p class="excerpt">Acara Job Fair dimulai
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="tags">
                            <a href="#" class="tag">
                              <span>Istirahat</span>
                            </a>
                          </div>
                          <div class="block_content">
                            <h2 class="title">
                              <a>12.00 - 13.00 WIB</a>
                            </h2>
                            <p class="excerpt">Istirahat, Sholat, Makan (Expo Makanan Tersedia)
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="tags">
                            <a href="#" class="tag">
                              <span>Segment 2</span>
                            </a>
                          </div>
                          <div class="block_content">
                            <h2 class="title">
                              <a>13.00 - 16.00 WIB</a>
                            </h2>
                            <p class="excerpt">Acara Job Fair dilanjutkan
                            </p>
                            </div>
                          </div>
                        </li>
                    </ul> -->
                        <!-- </div> -->
                        </div>
                      <!-- isi tab2 -->
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                   
                        <img src="<?=base_url()?>assets/img/tutor_vjf.png" class="img-fluid" >
                       
                      </div>
                     <!-- end tab 2 -->
                    </div>
                    <br>

                  
                  <!-- /tabs -->


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->


