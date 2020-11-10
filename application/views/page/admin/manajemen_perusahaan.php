   <!-- page content -->
   <div class="right_col" role="main">
          <div class="">
           
              <?php $this->load->view('templates/admin/titletop',$title); ?>
           

<!-- page content -->


<div class="clearfix"></div>

<div class="row">

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      
      <div class="x_content">
      
      <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link<?=($tabs=="listperusahaan")? " active":"";?>" id="data1-tab" href="<?=base_url('admin/perusahaan/listperusahaan')?>" role="tab" aria-controls="data1" aria-selected="true">Perusahaan</a>
          </li>        
          <li class="nav-item">
            <a class="nav-link<?=($tabs=="lowongan")? " active":"";?>" id="data1-tab" href="<?=base_url('admin/perusahaan/lowongan')?>" role="tab" aria-controls="data2" aria-selected="true">Lowongan</a>
          </li>           
        </ul>

<?php
if($tabs=='listperusahaan'){
  $this->load->view('page/admin/isi_tab/listperusahaan');
}else{
  $this->load->view('page/admin/isi_tab/lowongan');
}

?>

      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /page content -->
