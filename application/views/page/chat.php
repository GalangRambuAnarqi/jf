   <!-- page content -->

<link href="<?php echo base_url('assets/build/css/chat.css') ?>" rel="stylesheet">
   <div class="right_col" role="main">
          <div class="">
          <?php $this->load->view('templates/titlehead',$judul); ?>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Chat dengan perusahaan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
                  //  echo print_r($perusahaan);
                  $chatlist = array();
                  foreach($userchat as $data){
                    $chatlist[$data['receiverid']][] = $data;
                  }
                
                  $nmchatlist=array_keys($chatlist);
                  // echo print_r($chatlist);
                  ?>
                   <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        <!-- <a href="#" id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</a> -->
             
                        <table id="inbox" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <td>Nama Perusahaan</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        foreach ($perusahaan as $data){
                          // echo print_r($chatlist[$data['id']][0]['status_sender'])."<br><br>";
                          // echo print_r($arrchat[$data][0]['status'])."<br><br>";
                          ?>
                        <tr>
                        <td <?=!empty($chatlist)&&$chatlist[$data['id']][0]['status_sender']=='unread' ? "style='background-color:lightyellow'":"";?>>
                        <a href="<?=base_url()?>chat/?read=<?=$data['id']?>">
                          <div class="mail_list">
                            <div class="left">
                            <?=!empty($chatlist)&&$chatlist[$data['id']][0]['status_sender']=='sent' ? "<i class='fa fa-check'></i>":"<i class='fa fa-clock-o'></i>";?>
                            </div>
                            <div class="right">
                              <h3><?=$data['nama']?></h3>
                            </div>
                          </div>
                        </a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        </table>
                      

                      </div>
                      <!-- /MAIL LIST -->

<?php
if(isset($_GET['read'])){
  $id=$_GET['read'];

  //  $this->ADM->update_data('chat','status'=>'read','id'=>$id);
  $chatcomp=!empty($chatlist)? array_reverse($chatlist[$id]) : "";

?>
 <div class="col-sm-9 mail_view">
 <div class="inbox-body">

 <div class="mail_heading row">

  <div class="col-md-12">
    <h5><?=$this->DATA->getWhereRow('nama','perusahaan_JF',array('id'=>$id))->nama;?></h5>
  </div>
</div>


<center><b><?=$this->session->flashdata('pesanchat2');?></b></center>

<div class="pesan_chat">
<div id="chat-zone">
 <div class="chat-messages">
 <div class="anyClass" id="messages">
 <div class="message-item moderator">
      <div class="message-bloc">
        <div class="message">- Tips "Gunakan bahasa yang sopan dan komunikatif saat berbincang dengan personalia Perusahaan"</div>
        <!-- <div class="date-time">1/12/12, 6:20 PM</div> -->
      </div>
  </div>

 <?php
// $userchat=$this->ADM->select_data('*','chat',array('senderid'=>$this->session->userdata['ses_id'],'receiverid'=>$id),'id','asc');
if(!empty($chatcomp)){
 foreach($chatcomp as $res){
    ?>
  <div class="message-item <?=$res['role']=='user'? "customer" : "moderator"?>">
       <div class="message-bloc">
          <div class="message"><?=$res['isi']?></div>
          <div class="date-time" style="color:#000"><?= date("d/m/Y G:i",strtotime($res['timestamp']));?>
          </div>
       </div>
    </div>
 <?php
 if($res['role']=='perusahaan'){
    $lastid=$res['id'];
  }
 }
  if(!empty($lastid))
  $this->ADM->update_data('chat',array('status_sender'=>'read'),array('id'=>$lastid));
}
 ?>
 
  </div>

    <div class="message-item">
    <div class="row" style="width:100%; padding-top:1%;">
       <div class="col-12">
       <form action="<?=base_url('sendchat')?>" method="post">
       <input type="hidden" name="iduser" value="<?=$this->session->userdata('ses_id')?>">
       <input type="hidden" name="receiverid" value="<?=$id?>">
       <input type="hidden" name="role" value="user">
       <table style="width:100%">
        <tr>
        <td>
        <textarea name="isichat" rows="1" cols=100% placeholder="ketik pesan anda" style="width:100%"></textarea>
        </td>
        <td>
         <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </td>
          </tr> 
        </table>


        </div>
       
      </div>
        </form>
    </div>
 </div>
</div>

</div>
</div>
</div>
<?php
}else{
  ?>
  <!-- CONTENT MAIL -->
  <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8 text-left">
                            <?=date("d-m-Y G:i:s")?>
                            </div>
                            <div class="col-md-12">
                              <h4><< Klik / pilih pesan disamping</h4>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <!-- <div class="col-md-12">
                                <strong>KJ</strong>
                                <span>(jon.doe@gmail.com)</span> to
                                <strong>me</strong>
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div> -->
                            </div>
                          </div>
                          <div class="view-mail">
                            <h2>Pesan akan muncul disini</h2>
                          </div>
                       
                  
                        </div>

                      </div>
  <?php
}
    ?>
                      <!-- /CONTENT MAIL -->
                    </div>
   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<script>
//  $(document).ready(function (){
  const messages = document.getElementById('messages');
  function scrollToBottom() {
    messages.scrollTop = messages.scrollHeight;
  }
  scrollToBottom();
// });
</script>
