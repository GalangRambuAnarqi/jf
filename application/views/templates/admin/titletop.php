
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title?></h3>
              </div>
              <div class="title_right">
            
            <div class="pull-right top_search">
            <center>Pilih Job Fair</center>
            <?php
    if(array_key_exists('button1', $_POST)) { 
        button1(); 
    } 
    function button1() { 
        $jfke=$_POST['jfke'];
        $_SESSION["adm_jfid"] = $jfke;
        header('Location: '.$_SERVER['REQUEST_URI']);
    } 
?> 

            <form method="post"> 
              <div class="input-group">
             
              <select id="jfke" name="jfke" class="form-control" required>
            <?php
            $jfid=$this->session->userdata['adm_jfid'];
            $jfke=$this->ADM->getData('jf_ke');
              foreach($jfke as $data){
                ?>
              <option value="<?=$data['id']?>"
              <?=$data['id']==$jfid? "selected" : "";?>
              >Jobfair Ke <?=$data['ke']?> (<?=$data['tipe']?> - <?=mediumdate_indo($data['tanggal_mulai'])?> sd (<?=mediumdate_indo($data['tanggal_selesai'])?>)</option>
            <?php
            }
            ?>
              </select>
              <span class="input-group-btn">
                  <button class="btn btn-secondary" class="SubmitButton" type="submit" name="button1" value="Button1"><small style="color:white">Go
                  <i class="fa fa-arrow-right"></i></small></button>
                </span>
               
              </div>
              </form>

            </div>
          </div>
          </div>