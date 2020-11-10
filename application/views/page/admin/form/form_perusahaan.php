
<?php
if(isset($edit_id)){
?>
<div id="tambahcomp" style="display: block;">
<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?=base_url()?>admin/update_perusahaan" method="post">
<?php
}else{
?>
<form class="form-horizontal form-label-left" action="<?=base_url()?>admin/add_joincomp" method="post">
<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Pilih Saja</label>
  <div class="col-md-6 col-sm-6 ">
  <select name="joincomp" onchange="checkadd(this);" class="form-control selectpicker" data-live-search="true" required>
  <option value="">- Pilih -</option>
  <option data-tokens="-1" value="tambah2">+ Tambah</option>
    <?php 
    foreach ($allcomp as $data){
      ?>
          <option data-tokens="<?=$data['id']?>" value="<?=$data['id']?>" <?=isset($edit_perusahaan)&& $edit_perusahaan==$data['id'] ? "selected" : "";?>><?=$data['nama']?></option>
      <?php
    }?>
  </select>
  <button id="btnjoin" type="submit" class="btn btn-primary">Tambah</button>
  </div>
</div>
</form>
<div id="tambahcomp" style="display: none;">
<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?=base_url()?>admin/tambah_perusahaan" method="post">
<?php
}
?>

<hr>
<input type="hidden" name="id" id="id" value="<?=isset($edit_id)? $edit_id : "";?>">
<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Nama Perusahaan</label>
  <div class="col-md-9 col-sm-9 ">
<input type="text" name="nama" value="<?=isset($edit_nama)? $edit_nama : "";?>" class="form-control" placeholder="Ex: PT. Universitas Dian Nuswantoro" required>
  </div>
  <!-- <div class="col-md-3 col-sm-3 ">
  <input type="text" name="nick" value="<?=isset($edit_nick)? $edit_nick : "";?>"  class="form-control" placeholder="Alias, Ex: udinus" required>
  </div> -->
</div>

<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Username & Password</label>
  <div class="col-md-5 col-sm-5 ">
  <input type="text" name="nick" value="<?=isset($edit_nick)? $edit_nick : "";?>"  class="form-control" placeholder="Masukkan Username" required>
  </div>
  <div class="col-md-4 col-sm-4 ">
<input type="text" name="passcomp" value="<?=isset($edit_pass)? $edit_pass : "";?>" class="form-control" placeholder="Masukkan Password" required>
  </div>
</div>

<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Upload Logo</label>
  <div class="col-md-9 col-sm-9 ">
    <input type="file" name="logo">
  </div>
</div>
<input type="hidden" name="logoname" value="<?=isset($edit_logo)? $edit_logo : "";?>"">

<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Profile Singkat</label>
  <div class="col-md-9 col-sm-9 ">
<textarea name="deskripsi" id="summernote" class="form-control" placeholder="(Opsional)"><?=isset($edit_deskripsi)? $edit_deskripsi : "";?></textarea>
  </div>
</div>

<?php
if(isset($edit_id)){
?>
<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Status</label>
  <div class="col-md-9 col-sm-9 ">
  <div class="checkbox">
    <label>
      <input type="radio" name="status" value="aktif" <?=isset($edit_status)&&$edit_status=='aktif'? "checked" : "";?> > Aktif
    </label>
  </div>
  <div class="checkbox">
  <label>
      <input type="radio" name="status" value="non-aktif" <?=isset($edit_status)&&$edit_status=='non-aktif'? "checked" : "";?> > Non Aktif
    </label>
  </div>
  </div>
</div>
<?php
}
?>


<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 "></label>
  <div class="col-md-9 col-sm-9 ">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</div>
</div>


<form>
</div>
<script>
function checkadd(that) {
    if (that.value == "tambah2") {
        document.getElementById("tambahcomp").style.display = "block";
        document.getElementById("btnjoin").style.display = "none";
    } else {
        document.getElementById("tambahcomp").style.display = "none";
        document.getElementById("btnjoin").style.display = "block";
    }
}
</script>
