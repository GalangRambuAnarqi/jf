<body class="login">
    <div>
    
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <form name="form" method="post" action="<?php echo base_url('peserta/login'); ?>">
            <h1>PESERTA JOBFAIR</h1>
         
              <?=$this->session->flashdata('eror');?>
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
                    <a href="https://wa.me/6285640726824?text=Dear%20admin%20Job%20Fair%20,%20Saya%20memiliki%20masalah%20:%20<sebutkan>" class="btn btn-danger" role="button">Lapor Masalah</a><a href="http://cc.dinus.ac.id/vjf_udinus" class="btn btn-info" role="button">Daftar Job Fair</a>
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
