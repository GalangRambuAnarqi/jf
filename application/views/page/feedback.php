 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Feedback Peserta</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Saran & Kritik</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                   
<?php 
  echo $this->session->flashdata('feedback'); 
  if($cekfeedback==true){
    echo "<div class='alert alert-info'>
    <strong>Terimakasih, Feedback anda sudah kami simpan.</strong>
    </div>";
  }
?>  



<?php
  if($cekfeedback==true){
  ?>
  <form id="formfeedback" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?=base_url()?>peserta/updateFeedback">
  <?php
  } else {?>
  <form id="formfeedback" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?=base_url()?>peserta/submitFeedback">
  <?php 
  }
?>

<div class="item form-group">
<div class="x_panel">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"><b>Sumber informasi acara ini <span class="required">*</span></b>
  </label>
  <div class="col-md-2 col-sm-2 ">
        <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1" name="F1_1" value="1" <?=(!empty($isifeedback->F1_1))? "checked":""; ?> > Koran
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1" name="F1_2" value="1" <?=(!empty($isifeedback->F1_2))? "checked":""; ?> > Radio
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1" name="F1_3" value="1" <?=(!empty($isifeedback->F1_3))? "checked":""; ?> > Spanduk/Baliho
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1" name="F1_4" value="1" <?=(!empty($isifeedback->F1_4))? "checked":""; ?> > Poster
        </label>
      </div>
  
  </div>
  
  <div class="col-md-4 col-sm-4 ">
        <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1" name="F1_5" value="1" <?=(!empty($isifeedback->F1_5))? "checked":""; ?> > Website Udinus
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1" name="F1_6" value="1" <?=(!empty($isifeedback->F1_6))? "checked":""; ?> > Teman
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1" name="F1_7" value="1" <?=(!empty($isifeedback->F1_7))? "checked":""; ?> > Media Sosial : WA, IG, FB
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" class="F1" id="F1_8" name="F1_8" value="1" onclick="myFunction()" <?=(!empty($isifeedback->F1_8))? "checked":""; ?> > Lain Lain :
        </label>
        <input type="text" id="F1_9" name="F1_9" class="form-control" placeholder="Isikan sumber informasi lain" 
        <?php 
        if(!empty($isifeedback->F1_9)){
        echo "value='".$isifeedback->F1_9."'";
        }
        else{
        echo "disabled";
        }
        ?> >
      </div>
      <script>
       function myFunction() {
          var checkBox = document.getElementById("F1_8");
          if (checkBox.checked == true){
            $('#F1_9').attr('disabled', false);
            $('#F1_9').attr('required', true);
          } else {
            $('#F1_9').attr('disabled', true);
            $('#F1_9').attr('required', false);
          }
        }
      </script>
  </div>

</div>
</div>
<div class="item form-group">
<div class="x_panel">
  <label class="col-form-label col-md-3 col-sm-3 label-align" id="feedquestion2"><b>Alasan ikut acara ini <span class="required">*</span></b>
  </label>
  <div class="col-md-6 col-sm-6 ">
        <div class="checkbox">
        <label>
          <input type="checkbox" id="F2" class="F2" name="F2_1" value="1" <?=(!empty($isifeedback->F2_1))? "checked":""; ?> > Reputasi dari perusahaan peserta jobfair
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="F2" class="F2" name="F2_2" value="1" <?=(!empty($isifeedback->F2_2))? "checked":""; ?> > Memperoleh pekerjaan
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="F2" class="F2" name="F2_3" value="1" <?=(!empty($isifeedback->F2_3))? "checked":""; ?> > Hanya mencoba
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="F2" class="F2" name="F2_4" value="1" <?=(!empty($isifeedback->F2_4))? "checked":""; ?> > Diajak teman
        </label>
      </div>
  </div>
  </div>
</div>

<div class="item form-group">
<div class="x_panel">
  <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"><b>Apakah acara jobfair semacam ini sangat membantu dalam mencari pekerjaan ?</b></label>
  <div class="col-md-6 col-sm-6 ">
    <div class="radio">
      <label>
        <input type="radio" class="F3" id="F3" name="F3" value="1" <?=(!empty($isifeedback->F3)&&$isifeedback->F3==1)? "checked":""; ?> > Ya
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" class="F3" id="F3" name="F3" value="2" <?=(!empty($isifeedback->F3)&&$isifeedback->F3==2)? "checked":""; ?> > Tidak
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" class="F3" id="F3" name="F3" value="3" <?=(!empty($isifeedback->F3)&&$isifeedback->F3==3)? "checked":""; ?> > Belum tahu
      </label>
    </div>
  </div>
  </div>
</div>

<div class="item form-group">
<div class="x_panel">
  <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"><b>Berapa kali anda mengikuti jobfair UDINUS ?</b></label>
  <div class="col-md-6 col-sm-6 ">
  <input id="F4" name="F4" size="10" type="number" min="1" max="26" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onchange="limiter(this);" value="<?=(!empty($isifeedback->F4))? $isifeedback->F4 : ''; ?>" required><label> &nbsp;Kali</label>
  </div>
  </div>
</div>
<script>
function limiter(input) {
   if (input.value <= 0) input.value = 1;
   if (input.value > 26) input.value = 26;
}
</script>


<div class="item form-group">
<div class="x_panel">
  <label class="col-form-label col-md-3 col-sm-3 label-align"><b>Berikan pendapat anda tentang acara jobfair UDINUS ini <span class="required">*</span></b></label>
  <div class="col-md-6 col-sm-6 ">
  <div class="table-responsive"> 
    <table class="table table-hover">
      <thead>
        <tr>
          <th rowspan="2" class="text-center align-middle">No</th>
          <th rowspan="2" class="text-center align-middle">Pernyataan</th>
          <th colspan="2" class="text-center align-middle" style="width: 20%"><font color=red>Sangat Tidak Memuaskan</font></th>
          <th style="width: 10%"></th>
          <th colspan="2" class="text-center align-middle" style="width: 20%"><font color=green>Sangat Memuaskan</font></th>
        </tr>
        <tr>
          <th class="text-center align-middle">1</th>
          <th class="text-center align-middle">2</th>
          <th class="text-center align-middle">3</th>
          <th class="text-center align-middle">4</th>
          <th class="text-center align-middle">5</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th class="text-center align-top" scope="row">1.</th>
          <td>Pengaturan ruang dan acara</td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_1" id="F5_1" name="F5_1" value="1" <?=(!empty($isifeedback->F5_1)&&$isifeedback->F5_1==1)? "checked":""; ?> >
            </div>
          </td>
       
          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_1" id="F5_1" name="F5_1" value="2" <?=(!empty($isifeedback->F5_1)&&$isifeedback->F5_1==2)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_1" id="F5_1" name="F5_1" value="3" <?=(!empty($isifeedback->F5_1)&&$isifeedback->F5_1==3)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_1" id="F5_1" name="F5_1" value="4" <?=(!empty($isifeedback->F5_1)&&$isifeedback->F5_1==4)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_1" id="F5_1" name="F5_1" value="5" <?=(!empty($isifeedback->F5_1)&&$isifeedback->F5_1==5)? "checked":""; ?> >
            </div>
          </td>
        </tr>

        <tr>
          <th class="text-center align-top" scope="row">2.</th>
          <td>Fasilitas & kenyamanan ruangan</td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_2" id="F5_2" name="F5_2" value="1" <?=(!empty($isifeedback->F5_2)&&$isifeedback->F5_2==1)? "checked":""; ?> >
            </div>
          </td>
       
          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_2" id="F5_2" name="F5_2" value="2" <?=(!empty($isifeedback->F5_2)&&$isifeedback->F5_2==2)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_2" id="F5_2" name="F5_2" value="3" <?=(!empty($isifeedback->F5_2)&&$isifeedback->F5_2==3)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_2" id="F5_2" name="F5_2" value="4" <?=(!empty($isifeedback->F5_2)&&$isifeedback->F5_2==4)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_2" id="F5_2" name="F5_2" value="5" <?=(!empty($isifeedback->F5_2)&&$isifeedback->F5_2==5)? "checked":""; ?> >
            </div>
          </td>
        </tr>

        <tr>
          <th class="text-center align-top" scope="row">3.</th>
          <td>Sikap & pelayanan panitia</td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_3" id="F5_3" name="F5_3" value="1" <?=(!empty($isifeedback->F5_3)&&$isifeedback->F5_3==1)? "checked":""; ?> >
            </div>
          </td>
       
          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_3" id="F5_3" name="F5_3" value="2" <?=(!empty($isifeedback->F5_3)&&$isifeedback->F5_3==2)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_3" id="F5_3" name="F5_3" value="3" <?=(!empty($isifeedback->F5_3)&&$isifeedback->F5_3==3)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_3" id="F5_3" name="F5_3" value="4" <?=(!empty($isifeedback->F5_3)&&$isifeedback->F5_3==4)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_3" id="F5_3" name="F5_3" value="5" <?=(!empty($isifeedback->F5_3)&&$isifeedback->F5_3==5)? "checked":""; ?> >
            </div>
          </td>
        </tr>

        <tr>
          <th class="text-center align-top" scope="row">4.</th>
          <td>Waktu & durasi acara</td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_4" id="F5_4" name="F5_4" value="1" <?=(!empty($isifeedback->F5_4)&&$isifeedback->F5_4==1)? "checked":""; ?> >
            </div>
          </td>
       
          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_4" id="F5_4" name="F5_4" value="2" <?=(!empty($isifeedback->F5_4)&&$isifeedback->F5_4==2)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_4" id="F5_4" name="F5_4" value="3" <?=(!empty($isifeedback->F5_4)&&$isifeedback->F5_4==3)? "checked":""; ?> 
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_4" id="F5_4" name="F5_4" value="4" <?=(!empty($isifeedback->F5_4)&&$isifeedback->F5_4==4)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_4" id="F5_4" name="F5_4" value="5" <?=(!empty($isifeedback->F5_4)&&$isifeedback->F5_4==5)? "checked":""; ?> >
            </div>
          </td>
        </tr>

        <tr>
          <th class="text-center align-top" scope="row">5.</th>
          <td>Jumlah perusahaan peserta</td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_5" id="F5_5" name="F5_5" value="1" <?=(!empty($isifeedback->F5_5)&&$isifeedback->F5_5==1)? "checked":""; ?> >
            </div>
          </td>
       
          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_5" id="F5_5" name="F5_5" value="2" <?=(!empty($isifeedback->F5_5)&&$isifeedback->F5_5==2)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_5" id="F5_5" name="F5_5" value="3" <?=(!empty($isifeedback->F5_5)&&$isifeedback->F5_5==3)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_5" id="F5_5" name="F5_5" value="4" <?=(!empty($isifeedback->F5_5)&&$isifeedback->F5_5==4)? "checked":""; ?> >
            </div>
          </td>

          <td class="text-center align-middle">
            <div class="radio">
              <input type="radio" class="F5_5" id="F5_5" name="F5_5" value="5" <?=(!empty($isifeedback->F5_5)&&$isifeedback->F5_5==5)? "checked":""; ?> >
            </div>
          </td>
        </tr>

      </tbody>
    </table>
    </div>
  </div>
  </div>
</div>

<div class="item form-group">
<div class="x_panel">
  <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"><b>Kesan atas acara Jobfair ini <span class="required">*</span></b></label>
  <div class="col-md-6 col-sm-6 ">
    <textarea id="F6" name="F6" required="required" class="form-control"><?=(!empty($isifeedback->F6))? $isifeedback->F6 :""; ?></textarea>
  </div>
  </div>
</div>

<div class="item form-group">
<div class="x_panel">
  <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"><b>Masukan untuk perbaikan jobfair yang akan datang <span class="required">*</span></b></label>
  <div class="col-md-6 col-sm-6 ">
    <textarea id="F7" name="F7" required="required" class="form-control"><?=(!empty($isifeedback->F7))? $isifeedback->F7 :""; ?></textarea>
  </div>
  </div>
</div>


<div class="ln_solid"></div>
<div class="item form-group">
  <div class="col-md-6 col-sm-6 offset-md-3">
  <center>
    
    <button class="btn btn-primary" type="reset">Reset</button>
    <?php
    if($cekfeedback==true){
      echo "<input id='no' name='no' value='".$isifeedback->no."' type='hidden'>";
       echo "<button type='submit' class='btn btn-success' id='submitbtn'>Update</button>";
    }else{
       echo "<button type='submit' class='btn btn-success' id='submitbtn'>Submit</button>";
    }?>

    </center>
    <br><br>
  </div>
</div>

</form>

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->