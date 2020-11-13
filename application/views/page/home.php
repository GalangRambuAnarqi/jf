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
        <?=$this->session->flashdata('updateprofil');?>
<?php
if($lihatiklan==0){
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="modal fade in bs-example-modal-xl" id="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" onload="countdown()">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Modal title</h4>
</button>
</div>
<div class="modal-body">
<!-- <p><iframe frameborder="0" src="//www.youtube.com/embed/UEYF76dIa7Y?autoplay=1&mute=1&enablejsapi=1" style="position:fixed; left:5%; right:5%; top:2%; bottom:0; width:90%; height:90%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;pointer-events:auto;" class="note-video-clip" allowfullscreen></iframe><br></p> -->
<p><iframe frameborder="0" src="//www.youtube.com/embed/fjdyXkvMuok?autoplay=1&mute=1&enablejsapi=1" style="position:fixed; left:5%; right:5%; top:2%; bottom:0; width:90%; height:90%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;pointer-events:auto;" class="note-video-clip" allowfullscreen></iframe><br></p>


<button id="simak" onclick="location.href='<?=base_url('peserta/lihatiklan/?id='.base64_encode($this->session->userdata['ses_id']))?>'" style="background-color:lightblue; color:black; position:fixed; top:85%; left:40%; bottom:0; border:none; height:10%; margin:0; overflow:hidden; z-index:999999;" type="button" class="btn btn-info btn-lg">Pembukaan Udinus Virtual Jobfair 2 | (<span id="detikan"></span>s) Skip</button>

<button id="tutup" onclick="location.href='<?=base_url('peserta/lihatiklan/?id='.base64_encode($this->session->userdata['ses_id']))?>'" style="display:none;background-color:yellow; color:black; position:fixed; top:85%; left:40%; bottom:0; border:none; height:10%; margin:0; overflow:hidden; z-index:999999;" type="button" class="btn btn-info btn-lg">Mulai Job Fair</button>
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

var timer=5;
// var timer=8;
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
$("#simak").hide();
}
timer-=1;
var timer2=setTimeout("countdown()",1000);
return;
}
</script>
<?php
}
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <div class="modal fade in" id="peringatan" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false"  style="display: none; z-index:999999;"> 
        <div class="modal-dialog"> 
        <div class="modal-content"> 
        <div class="modal-body"> 

        <img src="<?=base_url()?>assets/img/peringatan.jpg" class="img-fluid">

<div class="modal-footer">
<button class="btn btn-default" type="button" data-dismiss="modal"></button></div> 
</div>
</div>
</div> 
</div> 

<script>
// $(window).on('load',function(){
// if (Cookies.get('tes') == 'undefined'){ 
// $('#peringatan').modal('show');
// Cookies.set('peringatan', 'yes', { expires: 365 });
// }
// });

$(document).ready(function() {
const expirationDuration = 1000 * 60 * 60 * 168; // 7*24 hours
// const expirationDuration = 1000 * 15// 7*24 hours

const prevAccepted = localStorage.getItem("popupku");
const currentTime = new Date().getTime();

const notAccepted = prevAccepted == undefined;
const prevAcceptedExpired = prevAccepted != undefined && currentTime - prevAccepted > expirationDuration;
if (notAccepted || prevAcceptedExpired) {
  $('#peringatan').modal('show');
  localStorage.setItem("popupku", currentTime);
  setTimeout(function(){
  $('#peringatan').modal('hide');
   },7000
  );
}


// var ispopup = localStorage.getItem('popup')
// if (!ispopup) {
//     $(window).load(function(){
//        $('#peringatan').modal('show');
//        localStorage.setItem('popup', 1);
//     });
// }
});


</script>

 
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
            (<?php echo $this->session->userdata('ses_kdjf');?> -
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
            <button type="button" onclick="return confirm('Anda yakin ingin mengubah profil?')" class="btn btn-success" data-toggle="modal" data-target=".editprofile"><i class="fa fa-pencil m-right-xs"></i> Edit Profil</button>

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
                        <a class="nav-link active" id="pengumuman-tab" data-toggle="tab" href="#pengumuman" role="tab" aria-controls="pengumuman" aria-selected="true"></i>Pengumuman</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"></i>INFO</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">TUTORIAL</a>
                      </li> -->
                      
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
                   
                        <img src="<?=base_url()?>assets/img/pengumuman.png" class="img-fluid" >
                        
                      </div>
                    
                      <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                   
                     

                      <div class="col-md-12">

                      <H3>Perusahaan Peserta <small>(Live Update)</small></H3>
                      <div class="table-responsive">
                      <table id="perusahaan" class="table table-bordered table-hover">
                          <thead>
                            <tr align=center>
                              <th width=5%>No</th>
                              <th>Perusahaan</th>
                              <th>Jumlah Lowongan</th>
                            </tr>
                          </thead>
                      <tbody>
                      <?php
                       $no=1;
                         foreach ($perusahaan as $row) {
                          $totaljob=$this->ADM->totaljob($row['id']);
                            // echo "<li>".$row['name']."</li>";
                            ?>
                            <tr>
                            <td><?=$no++?></td>
                            <td><?=$row['nama']?></td>
                            <td><center><a class="btn btn-sm btn-warning" style="color:black" href="<?=base_url()?>lowongan/<?=$row['id']?>"><?=$totaljob[0]['jml']?> <i class="fa fa-sign-in" aria-hidden="true"></i></center></td> 
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


