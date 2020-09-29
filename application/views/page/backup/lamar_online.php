<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Find Job</h3>
              </div>


              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cari Perusahaan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
              
                  <?php
                  
                  foreach($perusahaan as $data){
                  $totaljob=$this->ADM->select_data('count(id) as jml','lowongan_JF',array('id_perusahaan'=>$data['id']),$sortby="",$order="");
                  
                  ?>
          
                      <div class="col-md-55">

                          <div class="pricing ui-ribbon-container">
                            <div class="ui-ribbon-wrapper">
                              <div class="ui-ribbon">
                              <?=$totaljob[0]['jml']?> Jobs
                              </div>
                            </div>
                            <div class="title" style="padding-top:10%;padding-left:1%; padding-right:1%;">
                              <!-- <h2></h2> -->
                               <span>Perusahaan</span>
                              <h2><?=$data['nama']?></h2>
                              <!-- <span>Monthly</span> -->
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div style="height:23vh;">
                                 <div class="image view view-first" style="-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;">
                            <img style="width: 100%; display: block;" src="<?=base_url()?>assets/uploads/perusahaan/logo/<?=$data['logo']?>" />
                            
                          </div>
                                </div>
                              </div>
                              <div style="position:relative">
                                <a href="<?=base_url()?>lowongan/<?=$data['id']?>" class="btn btn-primary btn-block" role="button">Lihat Lowongan</a>
                           
                              </div>
                            </div>
                          </div>

                      </div>
             <?php
                  }
             ?>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->