<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Melamar di Perusahaan</h3>
      </div>
    </div>
  </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Scan QR & Tiket ID</h2>
            <div class="clearfix"></div>
          </div>

          <!-- tabs -->
            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"></i> Anda Melamar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tutorial</a>
              </li>
              
            </ul>
            <!-- isitab -->
            <div class="tab-content" id="myTabContent">
              <!-- tab1 -->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">  
                <div id="list">
                  <!-- list perusahaan -->
                </div>
                <i>*scroll kebawah</i>
              </div>
            <!-- end tab1 -->
            <!-- tab2 -->
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              
              <div class="col-md-6">
              <h5>1. Menggunakan SCAN QR</h5>
                <ul>
                  <li>
                  Scan QR Code yang terdapat pada setiap stand perusahaan yang anda datangi.
                  </li>
                  <li>
                  Gunakan smartphone yang terkoneksi dengan internet untuk menggunakan fitur ini.
                  </li>
                  <li>
                  Kunjungi <a href="https://cc.dinus.ac.id/peserta_JF">https://cc.dinus.ac.id/peserta_JF</a> , pilih menu Lamar, dan izinkan akses kamera ponsel
                  </li>
                  <br>
                  <!-- table gambar -->
                  <div class="table-responsive"> 
                    <table class="table" width="100%">
                  <tr>
                    <td><img src="<?=base_url()?>assets/img/tutorial.png" style="max-width: 100%; min-width: 200px; float:left">
                    <i>*Tampilan Menu (QR code dan input ID Tiket) diatas akan anda temui di setiap laptop/stand milik perusahaan saat acara berlangsung</i>  
                  </td>
                    <td rowspan="2"> <img src="<?=base_url()?>assets/img/tutor_scan.jpg" style="max-width: 100%; min-width: 200px; floar:right">
                    <i>*Arahkan kamera ponsel ke QR code milik perusahaan</i>  
                    </td>
                  </tr>
                  <tr>
                    <td><img src="<?=base_url()?>assets/img/tutorial-izinkan.jpg" style="max-width: 100%; min-width: 200px; float:left">
                    <i>*Ijinkan akses kamera</i>  
                    </td>
                  </tr>
                    </table>
                  </div>
                     <!-- end table gambar -->
                  <li>
                  Sorot kamera ponsel anda ke QR code seperti contoh gambar diatas.
                  </li>
                </ul>
              </div>

              <!-- kanan -->
              <div class="col-md-6">

              <!-- <img src="<?=base_url()?>assets/img/tutorial.png" style=" max-width: 100%; min-width: 300px;">
              <br><i>*Tampilan Menu diatas akan anda temui di setiap laptop/stand milik perusahaan</i><br><br>
               -->
              <h5>2. Atau menggunakan ID TIKET</h5>
                <ul>
                  <li>
                  Gunakan 5 digit belakang ID Tiket anda. Misal ID Tiket Anda <b><?=$this->session->userdata('ses_id');?></b> maka ID yang akan anda gunakan adalah <b><?=substr($this->session->userdata('ses_id'), -5)?></b> <i>(5 digit angka terakhir pada nomor ID).</i>
                  </li>
                  <li>
                  Klik icon search lalu simpan.
                  </li>
                  <li>
                  Seperti contoh dibawah ini :
                  </li>
                  <br>
                  <img src="<?=base_url()?>assets/img/tutor_id.png" style="max-width: 100%; min-width: 200px;">
                  <i style="color:black">*Tampilan input ID Tiket diatas akan anda temui di setiap laptop/stand milik perusahaan saat acara berlangsung</i> 
                </ul>
                  </div>
                <!-- end kanan -->
              </div>
              <!-- end tab2 -->
            </div>
            <!-- end tab -->
      
            <!-- block kamera -->
            <br>
            <div class="col-md-12">
       
              <div id="app">
                <div class="row">
                        <div class="col-lg-4">
                        <section class="cameras">
                          <h2>QR Scanner (Gunakan Browser Smartphone)</h2>
                          <ul>
                            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                            <li v-for="camera in cameras">
                              <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
                              <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                                <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
                              </span>
                            </li>
                          </ul>
                          </section>
                        </div>
                        <div class="col-lg-8">
                            <video width="100%" id="preview"></video>
                        </div>
                  </div>
              </div>
            </div>
            <!-- end block kamera -->
          </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<script>
var qr = '';
var app = new Vue({
el: '#app',
data: {
scanner: null,
activeCameraId: null,
cameras: [],
scans: []
},

mounted: function () {
// $('#list').load("<?=base_url('peserta/applied')?>");
document.getElementById("list").innerHTML='<object width="100%" height="200px" type="text/html" data="<?=base_url('peserta/applied')?>" ></object>';

var self = this;
self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror: false, scanPeriod: 3 ,});
self.scanner.addListener('scan', function (content, image) {
self.scans.unshift({ date: +(Date.now()), content: content });
qr = content;
kirim(qr);
});
Instascan.Camera.getCameras().then(function (cameras) {
self.cameras = cameras;
if (cameras.length > 0) {
self.activeCameraId = cameras[1].id;
self.scanner.start(cameras[1]);
}
else {
console.error('No cameras found.');
}
}).catch(function (e) {
console.error(e);
});
},
methods: {
formatName: function (name) {
return name || 'Camera Ready To Scan!';
},
selectCamera: function (camera) {
this.activeCameraId = camera.id;
this.scanner.start(camera);
}
}
});

function kirim(qr)
{
$('#form')[0].reset(); // reset form on modals
$('.form-group').removeClass('has-error'); // clear error class
$('.help-block').empty(); // clear error string

//Ajax Load data from ajax
$.ajax({
url : "<?php echo base_url('peserta/readqr')?>/" + qr,
type: "GET",
dataType: "JSON",
success: function(data)
{
    if(data == "gagal"){
        alert("ANDA SUDAH MELAMAR DIPERUSAHAAN INI");
    }else if(data == "notregistered"){
        alert("MAAF ANDA BELUM TEREGISTRASI, SILAHKAN HUBUNGI PANITIA JOBFAIR");
    }else{
    $('[name="nama"]').val(data.name);
      $('#modal_form').modal('show'); // show bootstrap modal when complete loaded 

    document.getElementById("list").innerHTML='<object width="100%" height="200px" type="text/html" data="<?=base_url('peserta/applied')?>" ></object>';

    setTimeout(function(){
                    $('#modal_form').modal('hide'); // show bootstrap modal when complete loaded 
            }, 3000);
    }
},
error: function (jqXHR, textStatus, errorThrown)
{
    alert('GAGAL AMBIL DATA, ULANGI LAGI!!!');
}
});
}
</script>

<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h3>Sukses Melamar</h3>
    </div>
    <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
            <div class="form-body">
                
                <div class="form-group">
                    <label class="control-label col-md-3">NAMA PERUSAHAAN</label>
                    <div class="col-md-9">
                        <input name="nama" class="form-control" type="text" disabled>
                        <span class="help-block"></span>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->