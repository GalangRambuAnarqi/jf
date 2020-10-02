<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit Profil</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         
                        <form id="demo-form2" class="form-horizontal form-label-left" action="<?=base_url()?>peserta/edit_profil" method="post">
                        <!-- $data['nama']=$isi->nama;
            $data['email']=$isi->email;
            $data['hp']=$isi->hp;
            $data['alamat']=$isi->alamat;
            $data['jenjang']=$isi->jenjang;
            $data['jurusan']=$isi->nama;
            $data['ipk']=$isi->ipk; -->

<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="nama" name="nama" value="<?=$nama?>" required="required" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email (Login)<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="email" id="email" name="email" value="<?=$email?>" required="required" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Handphone<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="hp" name="hp" value="<?=$hp?>" required="required" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="alamat" name="alamat" value="<?=$alamat?>" required="required" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenjang & Jurusan <span class="required">*</span>
  </label>
  <div class="col-md-2 col-sm-2 ">
    <input type="text" id="jenjang" name="jenjang" value="<?=$jenjang?>" required="required" class="form-control ">
  </div>
  <div class="col-md-4 col-sm-4 ">
    <input type="text" id="jurusan" name="jurusan" value="<?=$jurusan?>" required="required" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">IPK<span class="required">*</span>
  </label>
  <div class="col-md-3 col-sm-3 ">
    <input type="text" id="ipk" name="ipk" value="<?=$ipk?>" required="required" class="form-control ">
  </div>
</div>
<div class="item form-group">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Perguruan Tinggi/Sekolah<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
  <select name="lulusan" id="lulusan" class="form-control" required>
    <?php
    $lulusan=$this->ADM->select_data('nama_univ,id','daftar_univ',$where="",$sortby="",$order="");
    foreach ($lulusan as $data){
      ?>
          <option value="<?=$data['id']?>" <?=$universitas==$data['id'] ? "selected" : "";?> 
          <?php
          if($golongan!='UDINUS'&&$data['id']==1){
            echo "disabled";
          }else if($golongan=='UDINUS'&&$data['id']!=1){
            echo "disabled";
          } 
          ?> ><?=$data['nama_univ']?></option>
      <?php
    }?>
  </select>
  <!-- <script>
  $(document).ready(function() {
      $("#lulusan option[value='1']").remove();
});
  </script> -->
  </div>
</div>
<hr>
<div class="item form-group" style="text-align:left">
  <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Spesialisasi<span class="required">*</span>
  </label>
  
<?php
$spec=array();
foreach($skill as $dt){
  $spec[]=$dt['spesialis_id'];
}
// echo print_r($spec);
for($i=0;$i<count($spesialisasi);$i+=(count($spesialisasi)/2)){
  echo "<div class='col-md-5 col-sm-5'>";
  for($j=round($i);$j<$i+(count($spesialisasi)/2);$j++){  
?>
  <input type="checkbox" class="spesialisasi" id="spesialisasi" onclick="submit_spesialisasi(this)" name="spesialisasi[]" value="<?=$spesialisasi[$j]['id']?>" <?=in_array($spesialisasi[$j]['id'], $spec)? "checked":"";?>> <?=$spesialisasi[$j]['nama']?><br>
  <?php
    }
  echo "</div>";  
  }
  ?>
  </div>
</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menyimpan perubahan?')">Simpan Perubahan</button>
                        </div>
</form>
                      </div>
                    </div>
                  </div>
<script>



function submit_spesialisasi(val) {
  if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
        alert("Pilih Maksimal 3");
        val.checked = false;
    }
    else{
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>peserta/edit_spec",
        data: { kdspec : val.value},
        success: function(data) {
            alert(data);
        }
    });
  }
}
</script>
