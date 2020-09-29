   <!-- page content -->

<link href="<?php echo base_url('assets/build/css/chat.css') ?>" rel="stylesheet">
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Layanan</h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Chat</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
                  $arrchat = array();
                  foreach($userchat as $data){
                    $arrchat[$data['senderid']][] = $data;
                  }
                  // echo print_r($arrchat);
                  $nama=array_keys($arrchat);
                  ?>
                   <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        <!-- <a href="#" id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</a> -->
             
                        <table id="inbox" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <td>Pesan Peserta</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        foreach ($nama as $data){
                      // echo print_r($arrchat[$data])."<br><br>";
                          // echo print_r($arrchat[$data][0]['status'])."<br><br>";
                          ?>
                        <tr>
                        <td <?=$arrchat[$data][0]['status_receiver']=='unread' ? "style='background-color:lightyellow'":"";?>>
                        <a href="<?=base_url()?>perusahaan/chat/?read=<?=$data?>">
                          <div class="mail_list">
                            <div class="left">
                            <?=$arrchat[$data][0]['status_receiver']=='sent' ? "<i class='fa fa-check'></i>":"<i class='fa fa-clock-o'></i>";?>
                            </div>
                            <div class="right">
                              <h3><?=$data?></h3>
                              <p><?=$this->DATA->getWhereRow('nama','registrasiJF',array('id'=>$data))->nama;?>
                              </p>
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
  // $where=array(
  //    'senderid'=>$id
  //  );
  //  $data=$this->DATA->GetWhere('chat',$where)->result();
  //  $this->ADM->update_data('chat','status'=>'read','id'=>$id);
  $data=array_reverse($arrchat[$id]);

?>
  <div class="col-sm-9 mail_view">
 <div class="inbox-body">

 <div class="mail_heading row">

  <div class="col-md-12">
    <h5><?=$this->DATA->getWhereRow('nama','registrasiJF',array('id'=>$id))->nama;?></h5>
  </div>
</div>


<center><b><?=$this->session->flashdata('pesanchat3');?></b></center>

<div class="pesan_chat">
<div id="chat-zone">
 <div class="chat-messages">
 <div class="anyClass" id="messages">

 <?php

 foreach($data as $res){
    ?>
  <div class="message-item <?=$res['role']=='perusahaan'? "customer" : "moderator"?>">
       <div class="message-bloc">
          <div class="message"><?=$res['isi']?></div>
          <div class="date-time" style="color:#000"><?= date("d/m/Y G:i",strtotime($res['timestamp']));?></div>
       </div>
    </div>
 <?php
 if($res['role']=='user'){
    $lastid=$res['id'];
  }
 }
//  ganti status read
 $this->ADM->update_data('chat',array('status_receiver'=>'read'),array('id'=>$lastid));
 ?>
 
  </div>

    <div class="message-item">
    <div class="row" style="width:100%; padding-top:1%;">
       <div class="col-12">
       <form action="<?=base_url('perusahaan/sendchat')?>" method="post">
       <input type="hidden" name="iduser" value="<?=$id?>">
       <input type="hidden" name="receiverid" value="<?=$this->session->userdata('adm_id')?>">

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
<script>
$(document).ready(function (){
    var table = $('#inbox').DataTable({
		"dom": '<lf<t>ip>',
    "aaSorting": [],
		pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Semua']]
    });
});
</script>