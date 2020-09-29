<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit Profil</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         
                        <form id="demo-form2" class="form-horizontal form-label-left" action="<?=base_url()?>perusahaan/updateprofil" method="post">
                        
<input type="hidden" name="id" value="<?=$id?>">
<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Nama <span class="required">*</span>
  </label>
  <div class="col-md-10 col-sm-10 ">
    <input type="text" id="nama" name="nama" value="<?=$nama?>" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Email
  </label>
  <div class="col-md-10 col-sm-10 ">
    <input type="email" id="email" name="email" value="<?=$email?>" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Website
  </label>
  <div class="col-md-10 col-sm-10 ">
    <input type="text" id="website" name="website" value="<?=$website?>" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Telp. 
  </label>
  <div class="col-md-10 col-sm-10 ">
    <input type="text" id="hp" name="hp" value="<?=$hp?>" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Kota
  </label>
  <div class="col-md-10 col-sm-10 ">
    <input type="text" id="kota" name="kota" value="<?=$kota?>" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Alamat
  </label>
  <div class="col-md-10 col-sm-10 ">
    <input type="text" id="alamat" name="alamat" value="<?=$alamat?>" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Kodepos
  </label>
  <div class="col-md-10 col-sm-10 ">
    <input type="text" id="kodepos" name="kodepos" value="<?=$kodepos?>" class="form-control ">
  </div>
</div>



<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Jenis
  </label>
  <div class="col-md-10 col-sm-10 ">
  <select name="jp" id="jp" class="form-control">

  <option value="">-Pilih-</option>
    <?php
    foreach ($jp as $data){
      ?>
          <option value="<?=$data['jp_id']?>" <?=$jenis==$data['jp_id'] ? "selected" : "";?>><?=$data['jp_name']?></option>
      <?php
    }
    ?>
  </select>

  </div>
</div>

<div class="item form-group">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Deskripsi profil*
  </label>
  <div class="col-md-10 col-sm-10 ">
<textarea name="deskripsi" id="summernote" class="form-control" required><?=isset($deskripsi)? $deskripsi : "";?></textarea>
  </div>
</div>
                   


                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        </form>
                    </div>
                  </div>

