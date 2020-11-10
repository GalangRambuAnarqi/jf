<?php
$linkregistrasi=$this->DATA->getjfke()->link_registrasi;
?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="modal txt-black" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Lupa Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
        <form action="<?=base_url('gantipassword')?>" method="post">
          <div class="form-group">
            <label for="email">Alamat Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda" required>
            <span id="cekemail"></span>
          </div>
          Kami akan mengirimkan link ke email anda untuk mengganti password akun anda
          <br><br>
           <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>

          
        </form>
      </div>

     
    </div>
  </div>
</div>

<script>  
   $(document).ready(function(){  
        $('#email').change(function(){  
            $('#cekemail').html('<img src="<?php echo base_url() ?>assets/img/loading.gif" width="20" height="20"> checking ...');
             var email = $('#email').val();  
             if(email != '')  
             {  
                  $.ajax({  
                       url:"<?php echo base_url(); ?>peserta/cek_email",  
                       type:"POST",  
                       data:"email=" + email,  
                       success:function(data){
                        if(data == "Notfound"){
                            $("#confirm").val("checked", false);
                            $('#cekemail').html('<img src="assets/img/cross.png"> Maaf, Email anda tidak terdaftar, silahkan coba registrasi jobfair kembali <br><a href="<?=$linkregistrasi?>"><font color=blue>Daftar Sekarang!(Klik)</font></a>');
                            $("#email").val('');
                        }else{
                          $('#cekemail').html(data);
                        } 
                       }  
                  });  
             }  
        });  
   });  
 </script>  

<body class="login">
    <div>
    
      <div class="login_wrapper">
        <div class="animate form login_form">
        <center><h3>Jobfair diperpanjang hingga tanggal 22 Oktober 2020</h3></center>
          <section class="login_content">
          <form name="form" method="post" action="<?php echo base_url('peserta/login'); ?>">
       
            <h1>PESERTA JOBFAIR</h1>
         
              <?=$this->session->flashdata('eror');?>
              <?=$this->session->flashdata('gantipassword');?>
              <div>
                <input type="text" id="mail" name="mail" placeholder="Masukkan email yang sudah anda daftarkan" class="form-control" required="" />
              </div>
              <div>
                <input type="password" id="pass" name="pass" placeholder="Password yang anda daftarkan" class="form-control" required="" />
              </div>
              <div>
             
              <input type="checkbox" onclick="showPass()" id="eye"> Tampilkan password
              <br><br>
              <button class="btn btn-large btn-warning" type="submit">Login</button>
              </div>

              <div class="clearfix"></div>
              
              <div class="separator">
              
                   <p class="change_link">Anda tidak bisa login?<br>
                  <small style="color:yellow">*Bagi peserta jobfair batch lalu, dimohon daftar ulang</small>
                   <a href="#myModal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                      Lupa Password
                    </a>
                    <a href="<?=$linkregistrasi?>" class="btn btn-info" role="button">Daftar Job Fair</a>
                    <a href="https://wa.me/6285640726824?text=Dear%20admin%20Job%20Fair%20,%20Saya%20memiliki%20masalah%20:%20<sebutkan>" class="btn btn-danger" role="button">Lapor Masalah</a>
                  </p>

                <div class="clearfix"></div>
             
                <p>Powered By :</p>
                <div>
                <img src="<?=base_url()?>assets/img/logoucc.png" alt="" width="20%"><br><br>
                  <h5>UDINUS CAREER CENTER</h5>
                  
                  <p>©2020 - UPT Layanan Karir dan Alumni<br>Universitas Dian Nuswantoro</p>
                </div>
              </div>
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
