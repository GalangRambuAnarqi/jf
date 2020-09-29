<link href="<?php echo base_url('assets/custom/perusahaan.css') ?>" rel="stylesheet">
<!DOCTYPE html>
<html>
    
<head>
	<title>Perusahaan Virtual Jobfair</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100" style="color:white;">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?=base_url('assets/img/logoucc.png')?>" class="brand_logo" alt="Logo">
					</div>
				</div>
      
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="<?=base_url('perusahaan/login')?>">
          <div class="mb-3">
							<Center><b><H5>Login VJF Perusahaan</H5></b>
              <?=$this->session->flashdata('logineror');?>
              </center>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="usn" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" id="pass" class="form-control input_pass" value="" placeholder="password">
						</div>
            <div class="input-group mb-2">
            </div>
						<input type="checkbox" onclick="showPass()" id="eye"> Tampilkan password
              

							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
			
			</div>
		</div>
	</div>
</body>
</html>

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

