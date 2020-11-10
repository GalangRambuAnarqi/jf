   <!-- page content -->
   <div class="right_col" role="main">
          <div class="">
          <?php $this->load->view('templates/admin/titletop',$title); ?>
           

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar User</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="card-box table-responsive">
                 
                  <table id="tabelku" class="table" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Level</th>
                          <td>Status</td>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                      foreach($users as $data){
                      ?>
                      <tr>
                      <td><?=$data['name']?></td>
                      <td><?=$data['username']?></td>
                      <td><?=$data['role']?></td>
                      <td><?=$data['status']?></td>
                      </tr>

                      <?php
                      }
                      ?>
                       </tbody> 
                       </table>
                       </div>

   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        