<?php
if(isset($edit_id)){
?>
<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?=base_url()?>admin/edit_lowongan" method="post"> 
<?php
}else{
?>
<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?=base_url()?>admin/tambah_lowongan" method="post">
<?php
}

?>

<input type="hidden" name="id" id="id" value="<?=isset($edit_id)? $edit_id : "";?>">
<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Judul</label>
  <div class="col-md-6 col-sm-6 ">
<input type="text" name="judul" id="judul" value="<?=isset($edit_judul)? $edit_judul : "";?>" class="form-control" placeholder="Ex: Personal Accounting" required>
  </div>
</div>

<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Perusahaan</label>
  <div class="col-md-6 col-sm-6 ">

  <select name="perusahaan" class="form-control selectpicker" data-live-search="true" required>
  <option value="0">- Pilih -</option>
    <?php 
    foreach ($perusahaan as $data){
      ?>
          <option data-tokens="<?=$data['id']?>" value="<?=$data['id']?>" <?=isset($edit_perusahaan)&& $edit_perusahaan==$data['id'] ? "selected" : "";?>><?=$data['nama']?></option>
      <?php
    }?>
  </select>
  </div>
</div>


<!-- <div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Upload Logo</label>
  <div class="col-md-9 col-sm-9 ">
    <input type="file" name="logo">
  </div>
</div> -->


<?php
$pendidikan=array(
  'SMA',
  'SMK',
  'D1',
  'D3',
  'S1',
  'S2',
);
?>
<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Pendidikan</label>
 
  <?php 
  for($j=0;$j<count($pendidikan);$j+=(round(count($pendidikan)/2))){
    $max=$j+round(count($pendidikan)/2);
    echo "<div class='col-md-2 col-sm-2'>";
  for($i=$j;$i<($max);$i++){

    if(isset($edit_ppd)){
      if(in_array($pendidikan[$i], $edit_ppd)){
        $ceked="checked";
      }else{
        $ceked="";
      }
    }

?>  
<div class="checkbox">
<label>
  <input type="checkbox" name="pendidikan[]" value="<?=$pendidikan[$i]?>" <?=isset($ceked)?$ceked : "";?> > <?=$pendidikan[$i]?>
</label>
</div>
<?php
  }
  echo "</div>";
}
?>

<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('pendidikan[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<div class='col-md-2 col-sm-2'>
      <div class="checkbox">
      <label>
      <input type="checkbox" onClick="toggle(this)"> Pilih Semua
      </label>
      </div>
</div>
</div>


<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Bidang</label>
  <div class="col-md-6 col-sm-6 ">

  <select name="bidang" onchange="checkadd(this);" class="form-control selectpicker" data-live-search="true" required>
  <option data-tokens="0" value="0">- Pilih -</option>
  <option data-tokens="-1" value="tambah">+ Tambah</option>
    <?php 
    foreach ($bidang as $data){
      ?>
          <option data-tokens="<?=$data['bid_id']?>" value="<?=$data['bid_id']?>" <?=isset($edit_bid)&& $edit_bid==$data['bid_id'] ? "selected" : "";?>><?=$data['bid_name']?></option>
      <?php
    }?>
  </select>
  <div id="tambahbidang" style="display: none;">
  <input type="text" id="bidang" name="bidang2" class="form-control"/><br />
  </div>
  </div>
</div>
<script>
function checkadd(that) {
    if (that.value == "tambah") {
        document.getElementById("tambahbidang").style.display = "block";
        document.getElementById("bidang").focus();
        document.getElementById("bidang").required; 
    } else {
        document.getElementById("tambahbidang").style.display = "none";
    }
}
</script>

<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Penempatan</label>
  <div class="col-md-6 col-sm-6 ">
<input type="text" name="penempatan" id="penempatan" value="<?=isset($edit_penempatan)? $edit_penempatan : "";?>" class="form-control" placeholder="Ex: Semarang">
  </div>
</div>

<!-- <div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Jml Pekerja</label>
  <div class="col-md-6 col-sm-6 ">
<input type="number" name="jml" id="jml" class="form-control" placeholder="Ex: 3" value="<?=isset($edit_jml)? $edit_jml : "";?>">
  </div>
</div> -->

<div class="form-group row">
  <label class="control-label col-md-3 col-sm-3 ">Isi</label>
  <div class="col-md-9 col-sm-9 ">
  <textarea id="summernote" name="isi" id="isi" required><?=isset($edit_isi)? $edit_isi : "";?></textarea>
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
  <div class="col-md-9 col-sm-9 "><center>
<?php
if(isset($edit_id)){
?>
<a class="btn btn-secondary" href="<?=base_url()?>admin/perusahaan/lowongan">Batal</a>
<?php
}else{
?>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<?php
}
?>
<button type="submit" class="btn btn-primary">Simpan</button>
</center>
  </div>
</div>

</div>

<form>


<script>
$('.selectpicker').selectpicker();
</script>