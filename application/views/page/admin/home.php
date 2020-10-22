   <!-- page content -->
   <div class="right_col" role="main">
        
       <?php

    //  $day=array_reverse($day);
      //  $total=array_reverse($total);

       ?>
       
       <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Pendaftar</span>
              <div class="count green"><?=$pendaftarudinus+$pendaftarumum?></div>
              <span class="count_bottom">Avg. <i class="green"><?=round(($pendaftarudinus+$pendaftarumum)/count($pendaftarperhari))?> </i> Reg/hr</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Reg. Udinus</span>
              <div class="count red"><?=$pendaftarudinus?><sub><font size=2>(<?=round(($pendaftarudinus/($pendaftarudinus+$pendaftarumum))*100)?>%)</font></sub></div>
              <span class="count_bottom">Avg. <i class="green"><?=round(($pendaftarudinus)/count($udinusperhari))?> </i> Reg/hr</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Reg. Umum</span>
              <div class="count blue"><?=$pendaftarumum?><sub><font size=2>(<?=round(($pendaftarumum/($pendaftarudinus+$pendaftarumum))*100)?>%)</font></sub></div>
              <span class="count_bottom">Avg. <i class="green"><?=round(($pendaftarumum)/count($umumperhari))?> </i> Reg/hr</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> File Lengkap</span>
              <div class="count"><?=$komplit[0]['jml']?><sub><font size=2>(<?=round(($komplit[0]['jml']/($pendaftarudinus+$pendaftarumum))*100)?>%)</font></sub></div>
              <span class="count_bottom">Peserta</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-exchange"></i> Logged In</span>
              <div class="count purple"><?=$pengunjung?><sub><font size=2>(<?=round(($pengunjung/($pendaftarudinus+$pendaftarumum))*100)?>%)</font></sub></div>
              <!-- <span class="count_bottom"><i class="green"><?=round(array_sum($total)/count($visperday))?> </i> Log/day</span> -->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-institution"></i> <?=$totperusahaan?> Company</span>
              <div class="count dark"><?=$totlowongan?><sub><font size=2>(loker)</font></sub></div>
              <span class="count_bottom"><i class="green"><?=$totlamaran?></i> Lamaran</span><br>
              <span class="count_bottom"><i class="green"><?=$totpelamar?></i> Pelamar</span>
              
              </div>
            
            </div>
          </div>
  
  
          <?php $this->load->view('page/admin/form/form_tambahjf.php'); ?>
  
      
          <div class="x_panel">
        
        <div class="x_content">
        <?php echo $this->session->userdata('tambahjobfair'); 
          $this->session->set_userdata('tambahjobfair','');
        ?>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#tambahjf">New Job Fair</button>
    
      <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link<?=($tabs=="trafik")? " active":"";?>" id="data1-tab" href="<?=base_url('admin/home/trafik')?>" role="tab" aria-controls="data1" aria-selected="true">Trafik</a>
          </li>       
          <li class="nav-item">
            <a class="nav-link<?=($tabs=="jobfair")? " active":"";?>" id="data1-tab" href="<?=base_url('admin/home/jobfair')?>" role="tab" aria-controls="data1" aria-selected="true">Job Fair</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link<?=($tabs=="distribusi")? " active":"";?>" id="data1-tab" href="<?=base_url('admin/home/distribusi')?>" role="tab" aria-controls="data2" aria-selected="true">Distribusi</a>
          </li>           
        </ul>

        
       <?php   

if($tabs=='trafik'){

function getLastNDays($days, $format = 'd/m'){
  $m = date("m"); $de= date("d"); $y= date("Y");
  $dateArray = array();
  for($i=0; $i<=$days-1; $i++){
      $dateArray[] = date($format, mktime(0,0,0,$m,($de-$i),$y)); 
  }
  return array_reverse($dateArray);
}

       $sum=0;
       $total=array();
       $day=array();
       foreach($visperday as $data){
          // $total[]=$data['total'];
         $formtg=date("d F Y", strtotime($data['tgl']));
          $total[$formtg]=$data['total'];
        }

        foreach($regperday as $data){
          // $total[]=$data['total'];
         $ftg=date("d F Y", strtotime($data['tanggal']));
          $totalreg[$ftg]=$data['total'];
        }
    
      $tanggal = getLastNDays(10, 'd F Y');
      $jumlah=array();
      for($i=0;$i<count($tanggal);$i++){
        if(isset($total[$tanggal[$i]])){
          $jumlah[]=$total[$tanggal[$i]];
        }
        else{
          $jumlah[]=0;
        }
      }

      for($i=0;$i<count($tanggal);$i++){
        if(isset($totalreg[$tanggal[$i]])){
          $jumlahreg[]=$totalreg[$tanggal[$i]];
        }
        else{
          $jumlahreg[]=0;
        }
      }

?>

   <div class="row">
   
          <div class="col-md-12 col-sm-12">
          <div class="x_panel">
                <div class="x_title">
                  <h2>Trafik Pengunjung & Pendaftar</h2>
                  <div class="clearfix"></div>
                </div>
          <div class="x_content" style="width:100%">
          <canvas id="lineChart" style="width:100%"></canvas>
          <div class="tiles">
                        <div class="col-md-5 tile">
                          <span>Rata-rata Pendaftar</span>
                          <h2><?=round(array_sum($jumlahreg)/10)?> pendaftar/hari</h2>
                        </div>
                        <div class="col-md-5 tile">
                          <span>Rata-rata Pengunjung JF</span>
                          <h2><?=round(array_sum($jumlah)/10)?> pengunjung/hari</h2>
                        </div>
                      </div>
        <center><button id="save">Save</button></center>
          <br>
          </div>
                   </div>
              </div>

            </div>
    </div>

<script>
                //line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: <?php echo json_encode($tanggal); ?>,
datasets: [
{
label: "Registrasi cc.dinus.ac.id/vjf_udinus (<?php echo array_sum($jumlahreg) ; ?>org/10hari)",
data:  <?php echo json_encode($jumlahreg); ?>,
backgroundColor: [
'rgba(0, 137, 132, .2)',
],
borderColor: [
'rgba(0, 10, 130, .7)',
],
borderWidth: 2
},  
{
label: "Pengunjung Job Fair (<?php echo array_sum($jumlah) ; ?>org/10hari)",
data: <?php echo json_encode($jumlah); ?>,
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
}
]
},
options: {
responsive: true,
scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
        }
      }]
    },
    plugins: {
      datalabels: {
        anchor: 'end',
        align: 'top',
        formatter: Math.round,
        font: {
          weight: 'bold'
        }
      }
    }
}
});

$("#save").click(function() {
  $("#lineChart").get(0).toBlob(function(blob) {
    saveAs(blob, "trafikpengunjung");
  });
});


</script>


<?php
}else if($tabs=='jobfair'){
?> 
  
  <div class="row">
  <div class="col-md-12 col-sm-12">
          <div class="x_panel">
                <div class="x_title">
                  <h2>Pengunjung & Pelamar Saat Jobfair</h2>
                
                  <div class="clearfix"></div>
                </div>
          <div class="x_content">
          <canvas id="pengunjung"></canvas><br>

        <center><button id="save2">Save</button></center>
          <div class="tiles">
                        <div class="col-md-3 tile">
                          <span>Kunjungan UDINUS</span>
                          <h2><?=$kunjunganudinus?> Kali</h2>
                        </div>
                        <div class="col-md-3 tile">
                          <span>Kunjungan UMUM</span>
                          <h2><?=$kunjunganumum?> Kali</h2>
                        </div>
                        <div class="col-md-3 tile">
                          <span>Total Lamaran UDINUS</span>
                          <h2><?=$lamaranudinus?> lamaran</h2>
                        </div>
                        <div class="col-md-3 tile">
                          <span>Total Lamaran UMUM</span>
                          <h2><?=$lamaranumum?> lamaran</h2>
                        </div>
           </div>
         
          </div>
        </div>
    </div>
    </div>

<script>
var ctxD2 = document.getElementById("pengunjung").getContext('2d');
var myLineChart = new Chart(ctxD2, {
type: 'doughnut',
data: {

datasets: [
{
data: [<?php echo $visumum;?>,<?php echo $visudinus;?>,0,0],
backgroundColor: ["#00ff00","#33ccff","#ffff1a","#ff66ff"],
hoverBackgroundColor: ["#00e600", "#3399ff", "#cc33ff","#ff66a3"],
label: 'Pengunjung'
},
{
data: [<?php echo $pelamarumum;?>,<?php echo $pelamarudinus;?>],
backgroundColor: ["#ffff1a","#ff66ff"],
hoverBackgroundColor: ["#ffd11a", "#cc00cc"],
label: 'Pelamar'
}
],
labels: ["PENGUNJUNG UMUM", "PENGUNJUNG UDINUS","PELAMAR UMUM" , "PELAMAR UDINUS"]
},
options: {
responsive: true,
tooltips: {
         enabled: false
    }
}
});
$("#save2").click(function() {
  $("#pengunjung").get(0).toBlob(function(blob) {
    saveAs(blob, "pengunjung");
  });
});

</script>

<?php
}else if($tabs=='distribusi'){
?>

            <div class="row">
          <div class="col-md-12 col-sm-12">
          <div class="x_panel">
                <div class="x_title">
                  <h2>Distribusi Pelamar</h2>
                 
                  <div class="clearfix"></div>
                </div>
          <div class="x_content">
        
          <?php
          $nmperusahaan=array();
          // $totpelamarperusahaan=array();
          $pelamar=array();
          $bgcolorA=array();
          $bgcolorB=array();
          // $bgcolorC=array();
          foreach ($perusahaan as $data){
            // $jmlpelamar=$this->ADM->count_data('id','pelamarJF',array('perusahaan_id'=>$data['id']),$sortby="",$order="");
            // $pelamarperusahaan=$this->ADM->count_data('id','pelamarJF',array('perusahaan_id'=>$data['id']),$sortby="",$order="");
            
            // $totpelamarperusahaan[]=$pelamarperusahaan;
            $jmlpelamarudinus=$this->ADM->get2join('count(distinct a.registrasi_id) as jml','pelamarJF as a','registrasiJF as b','a.registrasi_id=b.id',array('b.golongan'=>'UDINUS','a.perusahaan_id'=>$data['id']));
            $jmlpelamarumum=$this->ADM->get2join('count(distinct a.registrasi_id) as jml','pelamarJF as a','registrasiJF as b','a.registrasi_id=b.id',array('b.golongan'=>'UMUM','a.perusahaan_id'=>$data['id']));
            
            $nmperusahaan[]=$data['nama'];
            $peludinus[]=$jmlpelamarudinus[0]['jml'];
            $pelumum[]=$jmlpelamarumum[0]['jml'];
         
            $bgcolorA[]='rgba(54, 162, 235, 0.2)';
            $bgcolorB[]='rgba(255, 159, 64, 0.2)';
            // $bgcolorC[]='rgba(255, 255, 0, 0.2)';
            $borderA[]='rgba(54, 162, 235, 1)';
            $borderB[]='rgba(255, 159, 64, 1)';
            // $borderC[]='rgba(255, 255, 0, 1)';
          }
          // echo print_r($totpelamarperusahaan);

          ?>
          <canvas id="distribusilamar"></canvas>
          <center><button id="save3">Save</button></center>
          </div>
         
        </div>
        </div>
        </div>

<script>

var ctxB = document.getElementById("distribusilamar").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels:  <?php echo json_encode($nmperusahaan); ?>,
datasets: [
{
label: 'Pelamar UDINUS',
// data: <?php echo json_encode($pelamar); ?>,
data: <?php echo json_encode($peludinus); ?>,
backgroundColor: <?php echo json_encode($bgcolorA); ?>,
borderColor: <?php echo json_encode($borderA); ?>,
borderWidth: 1
},
{
label: 'Pelamar UMUM',
// data: <?php echo json_encode($pelamar); ?>,
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


<?php
}
?>

          </div>
     

