 

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Peserta Job Fair Udinus</title>

    <!-- Bootstrap -->
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- jQuery custom content scroller -->
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

    <!-- dataTables -->
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/datatables.net/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="https://cc.dinus.ac.id/peserta_JF/assets/build/css/custom.css" rel="stylesheet">
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/custom/upload.css" rel="stylesheet">
    <link href="https://cc.dinus.ac.id/peserta_JF/assets/custom/customized.css" rel="stylesheet">




  </head>



<body class="login">
    <div>
    
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

          <form name="form" method="post" action="<?php echo base_url('peserta/update_password'); ?>">
            <h1>Ganti Password</h1>
         
            <?=$this->session->flashdata('gantipass');?>

         <?php
         if(isset($_GET['success'])&&$_GET['success']=='true'){
            echo "Ganti password berhasil, silahkan login, klik disini : <a href=".base_url('peserta').">login</a>";
         }else{
         ?>

              <div>
                <input type="password" id="pass" name="pass" placeholder="Masukkan password baru" class="form-control" required="" />
                <input type="hidden" id="id" name="id" value="<?=$id?>"/>
              </div>
              <div>
             
              <input type="checkbox" onclick="showPass()" id="eye"> Tampilkan password
              <br><br>
              <button class="btn btn-large btn-warning" type="submit">Reset</button>
              </div>

              <div class="clearfix"></div>
              
              <div class="separator">
                 

                <div class="clearfix"></div>
             
                <p>Powered By :</p>
                <div>
                <img src="<?=base_url()?>assets/img/logoucc.png" alt="" width="20%"><br><br>
                  <h5>UDINUS CAREER CENTER</h5>
                  
                  <p>©2020 - UPT Layanan Karir dan Alumni<br>Universitas Dian Nuswantoro</p>
                </div>
              </div>
              <?php
              }
              ?>

            </form>
          </section>
        </div>

        
      </div>
    </div>

        
  </body>

<script language="javascript">
function showPass() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
