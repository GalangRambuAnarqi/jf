
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cari Kerja</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Coming Soon</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
                    <center><h5><u>Countdown</u></h5><h1><div id="demo"></div></h1>
                    Segera, tanggal 12 - 16 Oktober 2020 . Anda dapat melihat daftar lowongan dan melamar perusahaan pada halaman ini. Terimakasih
                    <img src="<?=base_url()?>assets/img/tutor_vjf.png" class="img-fluid" >
                    </center>
                  </div>

                  <script>
// Set the date we're counting down to
var countDownDate = new Date("Oct 12, 2020 07:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Mohon Tunggu, Akan segera muncul";
  }
}, 1000);
</script>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
