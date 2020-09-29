
<?php
if(isset($edit_id)){
?>
<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?=base_url()?>admin/update_perusahaan" method="post">
<?php
}else{
?>
<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?=base_url()?>admin/tambah_perusahaan" method="post">
<?php
}
?>

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
