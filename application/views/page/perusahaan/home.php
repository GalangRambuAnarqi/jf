
        <!-- page content -->
        <div class="right_col" role="main">
    
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>

            </div>

            <div class="clearfix"></div>

       
        <!-- page content -->
          <div class="">
            <div class="row" style="display: inline-block;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-archive"></i></div>
                  <div class="count red"><?=$totallowongan?></div>
                  <h3><small>Lowongan</small></h3>
                  <p>Total Lowongan/Posisi Pekerjaan</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count green"><?=$pelamarudinus?></div>
                  <h3><small>Pelamar</small></h3>
                  <p>Total Pelamar Alumni UDINUS</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count blue"><?=$pelamarumum?></div>
                  <h3><small>Pelamar</small></h3>
                  <p>Total Pelamar Golongan UMUM (Non Alumni)</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-briefcase"></i></div>
                  <div class="count purple"><?=$totlamaran?></div>
                  <h3><small>Lamaran</small></h3>
                  <p>Total Transaksi Lamaran Masuk</p>
                </div>
              </div>
            </div>
            </div>
          
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
              <div class="x_title">
                  <h2>Distribusi Pelamar</h2>
                  <div class="clearfix"></div>
              </div>
          <div class="x_content" style="width:100%;">

<?php
$listlow=array();
$peludinus=array();
$pelumum=array();
foreach($lowongan as $data){
    $listlow[]=$data['judul_low'];
    $pelamarudinus=$this->ADM->get2join('count(distinct a.registrasi_id) as jml','pelamarJF as a','registrasiJF as b','a.registrasi_id=b.id',array('b.golongan'=>'UDINUS','a.low_id'=>$data['id']));
    $peludinus[]=$pelamarudinus[0]['jml'];

    $pelamarumum=$this->ADM->get2join('count(distinct a.registrasi_id) as jml','pelamarJF as a','registrasiJF as b','a.registrasi_id=b.id',array('b.golongan'=>'UMUM','a.low_id'=>$data['id']));
    $pelumum[]=$pelamarumum[0]['jml'];

    $bgcolorA[]='rgba(54, 162, 235, 0.2)';
    $bgcolorB[]='rgba(255, 159, 64, 0.2)';
    // $bgcolorC[]='rgba(255, 255, 0, 0.2)';
    $borderA[]='rgba(54, 162, 235, 1)';
    $borderB[]='rgba(255, 159, 64, 1)';
    
}

?>

          <canvas id="distribusilamar" style="width:100%;"></canvas>
          <center><button id="save3">Save</button></center>
          <br><br>
          </div>
       
          </div>
                </div>
<!-- end xpanel -->

              </div>
            </div>


          </div>

          <script>

var ctxB = document.getElementById("distribusilamar").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels:  <?php echo json_encode($listlow); ?>,
datasets: [
{
label: 'Pelamar UDINUS',
data: <?php echo json_encode($peludinus); ?>,
backgroundColor: <?php echo json_encode($bgcolorA); ?>,
borderColor: <?php echo json_encode($borderA); ?>,
borderWidth: 1
},
{
label: 'Pelamar UMUM',
data: <?php echo json_encode($pelumum); ?>,
backgroundColor: <?php echo json_encode($bgcolorB); ?>,
borderColor: <?php echo json_encode($borderB); ?>,
borderWidth: 1
}
]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});


$("#save3").click(function() {
  $("#distribusilamar").get(0).toBlob(function(blob) {
    saveAs(blob, "distribusipelamar");
  });
});
</script>


        <!-- /page content -->
