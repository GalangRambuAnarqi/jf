<!DOCTYPE html>
<html lang="en">
  
<?php $this->load->view('templates/head.php'); ?>

<?php
if($page=='login'){
 $this->load->view('login.php');
}else{
?>
  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
          <?php $this->load->view('templates/title.php'); ?>

            <div class="clearfix"></div>

            <?php $this->load->view('templates/profile.php'); ?>
            <?php $this->load->view('templates/sidebar.php'); ?>
            <?php $this->load->view('templates/footersidebar.php'); ?>

          </div>
        </div>

        <?php $this->load->view('templates/navigation.php'); ?>
        <?php $this->load->view('page/'.$page.'.php',$isi);?>
        <?php $this->load->view('templates/chat.php'); ?>
        <?php $this->load->view('templates/footer.php'); ?>
        
      </div>
    </div>
  </body>
  <?php 
  $this->load->view('templates/jscript.php');
  $this->load->view('templates/script_tambahan.php');
  $this->load->view('templates/script_upload.php');
  $this->load->view('templates/script_feedback.php');
  }
  ?>

  </html>
