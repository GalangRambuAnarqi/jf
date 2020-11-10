<div class="right_col" role="main">
  <div class="">
  <?php $this->load->view('templates/titlehead',$judul); ?>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
        <!-- subjudul2 -->
          <div class="x_title">
          <h2>Lengkapilah Data Anda</h2>
          <div class="clearfix"></div>
          </div>
        <!-- /subjudul2 -->

         <!-- progressbar -->
          <div class="progress">
          <?php $presentase=($cek['complete']/7)*100?>
            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$presentase?>"></div>
            </div>
            <h3><?=round($presentase)?>% Complete</h3>
          <!-- /progressbar -->

          <div class="x_content">
          <!-- tabs -->
          <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"></i> Petunjuk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Informasi</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <ul>Silahkan unggah dokumen sesuai dengan <b>deskripsi</b> dan pastikan ukuran file <b>sesuai dengan aturan berikut</b></ul>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <ul>
                <li>Dokumen yang anda unggah akan dapat diunduh oleh setiap perusahaan yang anda lamar. Sehingga akan memudahkan bagi anda untuk dapat melamar dan bagi Perusahaan untuk dapat menyeleksi pelamar.</li>
                <li>Data / dokumen yang anda unggah / isi akan <b>tersimpan</b> pada database server kami dan <b>aman</b> dari oknum/pihak yang tidak berkepentingan untuk dapat meminta / menggunakan / mencuri data anda.</li>
                <li>Data / dokumen anda <b>digunakan hanya</b> untuk kepentingan terkait dengan Job Fair UDINUS.</li>
                </ul>
              </div>
            </div>
            <br>
          <!-- /tabs -->
          
          <!-- table -->
          <?=$this->session->flashdata('cekdokumen');?>
          <div class="table-responsive">
          <table class="table table-hover">
              <thead>
                <tr>
                <th>No</th>
                <th width=15%>Jenis</th>
                <th>Deskripsi</th>
                <th>Preview</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>1.</td>
                  <td><b>Pas Foto</b><br><i>JPG/PNG <BR>Ukuran File < 1Mb</i></td>   
                  <td>Pas foto ukuran 3x4 atau 4x6 (Wajib Upload)</td>   
                 
                  <td>
                  <?=($cek['exist_foto'])?
                  "<a href='peserta/download/foto'>
                  <img src=assets/uploads/foto/$isi->foto width=50px>
                  </a>" : "-";
                  ?>
                  </td>
                  <td>
                  <?=($cek['exist_foto']) ? "<font color=green>Sudah Diunggah</font>" : "<font color=red>Belum Diunggah</font>"?>
                  </td>
                  <td>
                  <input type="file" class="dokumen" name="foto" id="foto" />
                  <label for="foto" class="custom-file-upload">
                  <i class="fa fa-upload"></i> 
                  <?=($cek['exist_foto']) ? "Ubah" : "Unggah"; ?>
                  </label>
                  <span id="uploaded_foto"></span>
                  <?=$this->session->flashdata('alert-foto');?>
                  </td>
                </tr>
                
                <tr>
                  <td>2.</td>
                  <td><b>KTP</b><br><i>PDF <BR>Ukuran File < 1Mb</i></td>   
                  <td>Scan KTP dalam bentuk PDF (Wajib Upload)</td>   
                  <!-- <td><b>Wajib Upload</b></td>   -->
                  <td>
                  <?=($cek['exist_ktp'])?
                  "<a href='peserta/download/ktp'>
                  <img src=assets/img/pdf_icon.png width=50px>Unduh
                  </a>" : "-";
                  ?>
                  </td>
                  <td>
                  <?=($cek['exist_ktp']) ? "<font color=green>Sudah Diunggah</font>" : "<font color=red>Belum Diunggah</font>"?>
                  </td>
                  <td>
                  <input type="file" class="dokumen" name="ktp" id="ktp" />
                  <label for="ktp" class="custom-file-upload">
                  <i class="fa fa-upload"></i> 
                  <?=($cek['exist_ktp'])? "Ubah" : "Unggah"; ?>
                  </label>
                  <span id="uploaded_ktp"></span>
                  <?=$this->session->flashdata('alert-ktp');?>
                  </td>
                </tr>

                <tr>
                  <td>3.</td>
                  <td><b>Surat Lamaran</b><i><br>PDF <BR>Ukuran File < 1Mb</i></td>  
                  <td>Surat lamaran secara umum yang dapat digunakan untuk melamar di berbagai perusahaan</td>   
                  
                  <td>
                  <?=($cek['exist_lamaran']) ?
                  "<a href='peserta/download/lamaran'>
                  <img src=assets/img/pdf_icon.png width=50px>Unduh
                  </a>" : "-";
                  ?>
                  </td>
                  <td>
                  <?=($cek['exist_lamaran']) ? "<font color=green>Sudah Diunggah</font>" : "<font color=red>Belum Diunggah</font>"?>
                  </td>
                  <td>
                  <input type="file" class="dokumen" name="lamaran" id="lamaran" />
                  <label for="lamaran" class="custom-file-upload">
                  <i class="fa fa-upload"></i> 
                  <?=($cek['exist_lamaran']) ? "Ubah" : "Unggah"; ?>
                  </label>
                  <span id="uploaded_lamaran"></span>
                  <?=$this->session->flashdata('alert-lamaran');?>
                  </td>
                </tr>

                <tr>
                  <td>4.</td>
                  <td><b>Curriculum Vitae</b><br><i>PDF <BR>Ukuran File < 1Mb</i></td>     
                  <td><p class="wrap">CV atau Resume berisi biodata, pengalaman pendidikan / pekerjaan, kemampuan / skill, dll (Wajib Upload)</p></td>  
                  <!-- <td><b>Wajib Upload</b></td>       -->
                  <td>
                  <?=($cek['exist_cv'])?
                  "<a href='peserta/download/cv'>
                  <img src=assets/img/pdf_icon.png width=50px>Unduh
                  </a>" : "-";
                  ?>
                  </td>
                  <td>
                  <?=($cek['exist_cv']) ? "<font color=green>Sudah Diunggah</font>" : "<font color=red>Belum Diunggah</font>"?>
                  </td>
                  <td>
                  <input type="file" class="dokumen" name="cv" id="cv" />
                  <label for="cv" class="custom-file-upload">
                  <i class="fa fa-upload"></i> 
                  <?=($cek['exist_cv'])? "Ubah" : "Unggah"; ?>
                  </label>
                  <span id="uploaded_cv"></span>
                  <?=$this->session->flashdata('alert-cv');?>
                  </td>
                </tr>
        
                <tr>
                  <td>5.</td>
                  <td><b>Ijazah</b><br><i>PDF <BR>Ukuran File < 1Mb</i></td>   
                  <td>Scan Ijazah terakhir asli / surat keterangan lulus bila ijazah belum muncul (Wajib Upload)</td>     
                  <!-- <td><b>Wajib Upload</b></td>   -->
                  <td>
                  <?=($cek['exist_ijazah'])?
                  "<a href='peserta/download/ijazah'>
                  <img src=assets/img/pdf_icon.png width=50px>Unduh
                  </a>" : "-";
                  ?>
                  </td>
                  <td>
                  <?=($cek['exist_ijazah']) ? "<font color=green>Sudah Diunggah</font>" : "<font color=red>Belum Diunggah</font>"?>
                  </td>
                  <td>
                  <input type="file" class="dokumen" name="ijazah" id="ijazah" />
                  <label for="ijazah" class="custom-file-upload">
                  <i class="fa fa-upload"></i> 
                  <?=($cek['exist_ijazah']) ? "Ubah" : "Unggah"; ?>
                  </label>
                  <span id="uploaded_ijazah"></span>
                  <?=$this->session->flashdata('alert-ijazah');?>
                  </td>
                </tr>


              <tr>
                <td>6.</td>
                <td><b>Transkrip Nilai</b><br><i>PDF <BR>Ukuran File < 1Mb</i></td>
                <td>Scan transkrip nilai terakhir asli / daftar nilai bila transkrip asli belum ada (Wajib Upload)</td>    
                  <!-- <td><b>Wajib Upload</b></td>         -->
                <td>
                <?=($cek['exist_transkrip']) ?
                "<a href='peserta/download/transkrip'>
                <img src=assets/img/pdf_icon.png width=50px>Unduh
                </a>" : "-";
                ?>
                </td>
                <td>
                <?=($cek['exist_transkrip']) ? "<font color=green>Sudah Diunggah</font>" : "<font color=red>Belum Diunggah</font>"?>
                </td>
                <td>
                <input type="file" class="dokumen" name="transkrip" id="transkrip" />
                <label for="transkrip" class="custom-file-upload">
                <i class="fa fa-upload"></i> 
                <?=($cek['exist_transkrip']) ? "Ubah" : "Unggah"; ?>
                </label>
                <span id="uploaded_transkrip"></span>
                <?=$this->session->flashdata('alert-transkrip');?>
                </td>
              </tr>

        
              <tr>
                <td>7.</td>
                <td><b>Berkas Pendukung</b><i><br>PDF/ZIP/RAR <BR>Ukuran File < 5Mb</i></td>   
                <td>Contoh : Akreditasi Universitas / Jurusan, sertifikat kompetensi / bahasa asing, piagam, dll <b>dijadikan satu</b> dalam bentuk file PDF/ZIP/RAR</td>         
                  
                <td>
                <?=($cek['exist_pendukung']) ?
                "<a href='peserta/download/pendukung'>
                <img src=assets/img/pdf_icon.png width=50px>Unduh
                </a>" : "-";
                ?>
                </td>
                <td>
                <?=($cek['exist_pendukung']) ? "<font color=green>Sudah Diunggah</font>" : "<font color=red>Belum Diunggah</font>"?>
                </td>
                <td>
                <input type="file" class="dokumen" name="pendukung" id="pendukung" />
                <label for="pendukung" class="custom-file-upload">
                <i class="fa fa-upload"></i> 
                <?=($cek['exist_pendukung']) ? "Ubah" : "Unggah"; ?>
                </label>
                <span id="uploaded_pendukung"></span>
                <?=$this->session->flashdata('alert-pendukung');?>
                </td>
              </tr>
                
              
            </tbody>
            </table>
            </div>
            <br>
            <center>
            <a href="#" onclick="location.href = 'peserta/downloadAll/<?=$isi->iduser?>'" class="btn btn-info"><h5>Unduh Semua</h5></a>
            </center>
            <br><br>
            <!-- /table -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->