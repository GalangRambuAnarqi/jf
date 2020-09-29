<!DOCTYPE html>
<html lang="en">
  
<?php $this->load->view('templates/admin/head.php'); ?>

<?php
if($page=='adm_login'){
 $this->load->view('adm_login.php');
}else{
?>
  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
          <?php $this->load->view('templates/admin/title.php'); ?>

            <div class="clearfix"></div>

            <?php $this->load->view('templates/admin/profile.php'); ?>
            <?php $this->load->view('templates/admin/sidebar.php'); ?>
            <?php $this->load->view('templates/admin/footersidebar.php'); ?>

          </div>
        </div>

        <?php $this->load->view('templates/admin/navigation.php'); ?>
        <?php $this->load->view('page/'.$page.'.php');?>  
        <?php 
        if($this->session->userdata['adm_role']=='perusahaan'){
          $this->load->view('templates/admin/chat.php');
        }else{
          $this->load->view('templates/admin/footer.php');
        }
        ?>
      </div>
    </div>
  </body>
  <?php 
  $this->load->view('templates/admin/jscript.php');
  $this->load->view('templates/admin/script_tambahan.php');
  $this->load->view('templates/admin/script_upload.php');
  $this->load->view('templates/admin/script_feedback.php');
  }
  ?>

  </html>
