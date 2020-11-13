
 <?php
if(isset($_GET['act'])&&$_GET['act']=="edit"){
      $id=$_GET['id'];
      $perusahaan=$this->ADM->select_data('*','perusahaan_JF',array('id'=>$id),$sortby="",$order="");
      // echo print_r($perusahaan);
      $data['edit_id']=$perusahaan[0]['id'];
      $data['edit_logo']=$perusahaan[0]['logo'];
      $data['edit_nama']=$perusahaan[0]['nama'];
      $data['edit_nick']=$perusahaan[0]['nick'];
      $data['edit_pass']=$perusahaan[0]['password'];
      $data['edit_deskripsi']=$perusahaan[0]['deskripsi'];
      $data['edit_status']=$perusahaan[0]['status'];

     
      ?>
      <div class="x_title">
      <h2>Edit perusahaan</h2>
      <div class="clearfix"></div>
        </div>
          <?php
      $this->load->view('page/admin/form/form_perusahaan',$data);
    
    }else if(isset($_GET['act'])&&$_GET['act']=="pelamar"){
      $id=$_GET['id'];
      $data['pelamar']=$this->ADM->selectpelamarbycomp($id);
      // echo print_r($data['pelamar']);
      $data['idperusahaan']=$_GET['id'];
      ?>
      <div class="x_title">
      <h2>Daftar Pelamar</h2>
      <div class="clearfix"></div>
        </div>
          <?php
      $this->load->view('page/admin/tabel/pelamar',$data);
    }
    else if(isset($_GET['act'])&&$_GET['act']=="lowongan"){
      $id=$_GET['id'];
    	$data['lowongan']=$this->ADM->getlistlowcomp($id);
      // echo print_r($lowongan);
      ?>
      <div class="x_title">
      <h2>Daftar Lowongan</h2>
      <div class="clearfix"></div>
        </div>
          <?php
      $this->load->view('page/admin/tabel/lowongan',$data);
    }
    else{
    
?>
 <div class="x_title">
        <h2>Daftar Perusahaan</h2>
 
        <div class="clearfix"></div>
      </div>
           <!-- isi tab sudah mengisi -->
           <?=$this->session->flashdata('tambahperusahaan');?>
           <?=$this->session->flashdata('updateperusahaan');?>
           <?=$this->session->flashdata('hapusperusahaan');?>
           <?=$this->session->flashdata('logoupload');?>

           <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".perusahaan">Tambah Perusahaan</button>
          <div class="modal fade perusahaan" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Form Perusahaan</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          </div>
          <div class="modal-body">
          
          <?php
       
          $this->load->view('page/admin/form/form_perusahaan');?>
          </div>
          </div>
          </div>
          </div>


                <div class="card-box table-responsive">

          <table id="tabelku" class="table" style="width:100%">
                      <thead>
                        <tr>
                        <th>No</th>
                          <th>Logo</th>
                          <th>Nama Perusahaan</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Deskripsi</th>
                          <th>JmlLowongan (click)</th>
                          <th>JmlPelamar (click)</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                      $no=1;
                      foreach($listperusahaan as $data){
                        $jmlpelamar=$this->ADM->getpelamarjfpercomp($data['id']);
                        $jmllowongan=$this->ADM->getlowonganperusahaan($data['id']);
                      ?>
                      <tr>
                      
                      <td><?=$no++?></td>
                      <td><?php
                        if(!file_exists('assets/uploads/perusahaan/logo/'.$data['logo'])||$data['logo']==''){
                          echo "-";
                        }else{
                          echo "<img width='50px' height='50px' src=".base_url()."assets/uploads/perusahaan/logo/".$data['logo'].">";
                        }?></td>
                      <td><?=$data['nama']?></td>
                      <td><?=$data['nick']?></td>
                      <td><?=$data['password']?></td>
                      <td width=50%>
                      <center>
                      <a data-toggle="collapse" href="#collapseExample<?=$data['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                      <i class="fa fa-plus-circle"></i> Show Profile</a>
                      </a>
                      </center>
                      <div class="collapse" id="collapseExample<?=$data['id']?>">
                      <div class="card card-body">
                      <?=$data['deskripsi']?>
                      </div>
                      </div>
                      </td>
                      <td> <a href="<?=base_url()?>admin/perusahaan/listperusahaan/?act=lowongan&id=<?=$data['id']?>"><font color=blue><?=$jmllowongan[0]['jml']?> lowongan</font></a></td>
                      <td>
                      <a href="<?=base_url()?>admin/perusahaan/listperusahaan/?act=pelamar&id=<?=$data['id']?>"><font color=blue><?=$jmlpelamar?> pelamar</font></a>
                      </td>
                      <td><?=$data['status']=='aktif'? "<font color=green>Aktif<font>" : "<font color=red>Non Aktif<font>";?></td>
                      <td>

                       <a href='<?=base_url()?>admin/perusahaan/listperusahaan/?act=edit&id=<?=$data['id']?>' onclick="return confirm('Ingin mengubah <?=$data['nama']?>?')"><i class="fa fa-pencil-square-o">Edit</i></a><br>

                     <a href="<?=base_url()?>admin/hapus_perusahaan/<?=$data['id']?>"  onclick="return confirm('Anda yakin hapus <?=$data['nama']?>?')"><font color=red><i class="fa fa-trash-o">Hapus</i></font></a>
            
                  
                    
                       <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".perusahaan">Edit</button> -->

                      </td>
                      </tr>

                      <?php
                      }
                      ?>
                       </tbody> 
                       </table>
</div>
      </div>

      <?php
    }
    ?>