<style>
  @media screen and (max-width: 760px){
  .chat_box{ width: 100vw; margin: 0; padding: 0; }
}
</style>
    <link href="<?php echo base_url('assets/build/css/chat.css') ?>" rel="stylesheet">
    <?php
    error_reporting(0);
    $iduser=$this->session->userdata['adm_id'];
    ?>
<div class="chat_box" id="chat">
  <div class="chatheader" onclick='showhidechat()'><i class='fa fa-comments'></i> Chat Helpdesk <?=$this->session->flashdata('pesanchat');?>  &nbsp; <i class='fa fa-caret-down'></i>
  </div>
  <div class="pesan_chat">
  <div id="chat-zone">
   <div class="chat-messages">
   <div class="anyClass" id="messages">
   <div class="message-item moderator">
         <div class="message-bloc">
            <div class="message">Halo, ada yang bisa kami bantu?</div>
            <!-- <div class="date-time">1/12/12, 6:20 PM</div> -->
         </div>
      </div>
   <?php

   $where=array(
      'senderid'=>$iduser,
      'receiverid'=>'admin'
		);
		$data=$this->DATA->GetWhere('chat',$where)->result();


   foreach($data as $res){
      ?>
    <div class="message-item <?=$res->role=='perusahaan'? "customer" : "moderator"?>">
         <div class="message-bloc">
            <div class="message"><?=$res->isi?></div>
            <div class="date-time"><?= date("d/m/Y G:i",strtotime($res->timestamp));?></div>
         </div>
      </div>
   <?php
   $laststatus=$res->status_sender;
   $lastrole=$res->role;
   $lastid=$res->id;
   }
   if(isset($laststatus)&&$laststatus=='unread'&&$lastrole=='admin'){
    $this->ADM->update_data('chat',array('status_sender'=>'read'),array('id'=>$lastid));
    $this->session->set_flashdata('pesanchat','<span class="badge badge-light blink_me"><strong>Pesan baru</strong></span>');
   }
   ?>
   
    </div>

      <div class="message-item">
      <div class="row" style="width:100%; padding-top:3%;">
         <div class="col-12">
         <form action="<?=base_url('sendchat')?>" method="post">
         <tr>
        <table style="width:100%">
        <td>
         <input type="hidden" name="iduser" value="<?=$iduser?>">
         <input type="hidden" name="receiverid" value="admin">
         <input type="hidden" name="role" value="<?=$this->session->userdata['adm_role']?>">
         <textarea name="isichat" rows="1" cols="40" placeholder="ketik pesan anda" style="width:100%"></textarea>
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

      <!-- <div class="message-item">
    <div class="row" style="width:100%; padding-top:1%;">
       <div class="col-11">
       <form action="<?=base_url('admin/sendchat')?>" method="post">
       <input type="hidden" name="iduser" value="<?=$id?>">
       <input type="hidden" name="receiverid" value="admin">
       <textarea name="isichat" rows="1" placeholder="ketik pesan anda" style="width:100%"></textarea>
        </div>
        <div class="col-1">
        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
      </div>
        </form>
    </div> -->





   </div>
</div>

  </div>
</div>

<script>
function showhidechat(){
  var o=document.getElementById("chat");"0px"!==o.style.bottom?o.style.bottom="0px":o.style.bottom="-460px"

  const messages = document.getElementById('messages');
  function scrollToBottom() {
    messages.scrollTop = messages.scrollHeight;
  }
  scrollToBottom();
  $(".blink_me").hide(500);
  }
  function popup(o){
    var t=650,n=400,e=(screen.width-t)/2,i=(screen.height-n)/2,s="width="+t+", height="+n;return s+=", top="+i+", left="+e,s+=", directories=no",s+=", location=no",s+=", menubar=no",s+=", resizable=no",s+=", scrollbars=no",s+=", status=no",s+=", toolbar=no",newwin=window.open(o,"windowname5",s),window.focus&&newwin.focus(),!1
  };
</script>