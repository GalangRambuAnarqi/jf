<div class="page-title">
      <div class="title_left">
        <h3><?=$judul?></h3>
      </div>
  
  <div class="title_right">
    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
    <?php
    $jam=date('H:i:s', strtotime('07:30:00'));
    $tgl=$this->DATA->getjfke()->tanggal_mulai;
    $tglselesai=$this->DATA->getjfke()->tanggal_selesai;
    if(strtotime($tglselesai) < strtotime(date('Y-m-d'))){
      echo "<center class='blink_me'><b>Jobfair Berakhir</b></center>";
    }else{
    ?>
    <center><b>Job Fair Dimulai :</u><div id="demo"></div></b>
    <span id="tglend" data-date="<?=date('Y-m-d H:i:s', strtotime("$tgl $jam"))?>"></span>
    </center>
    <!-- <b>Job Fair Telah Berakhir, Terimakasih</b> -->
    <?php
    }
    ?>
    </div>
  </div>
             
              <script>
               var tg = document.getElementById("tglend").getAttribute('data-date');
// Set the date we're counting down to
var countDownDate = new Date(tg).getTime();

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
    document.getElementById("demo").innerHTML = "<span class='blink_me'>Sekarang !</span>";
  }
}, 1000);
</script>

   </div>