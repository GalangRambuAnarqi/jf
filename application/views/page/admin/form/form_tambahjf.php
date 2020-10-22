 <!-- Modal -->
 <div class="modal fade" id="tambahjf" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <form action="<?=base_url('admin/newjf')?>" method="post">
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jobfair Ke<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="number" name="ke" required="required" class="form-control ">
    </div>
  </div>
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tipe<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="radio" name="tipe" required="required" value="online"> Online <br>
      <input type="radio" name="tipe" required="required" value="offline"> Offline
    </div>
  </div>
  <div class="item form-group">
    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Mulai</label>
    <div class="col-md-6 col-sm-6 ">
      <input class="form-control" type="date" name="tanggal_mulai">
    </div>
  </div>
  <div class="item form-group">
    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Selesai</label>
    <div class="col-md-6 col-sm-6 ">
      <input class="form-control" type="date" name="tanggal_selesai">
    </div>
  </div>
  <div class="item form-group">
    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Link Registrasi</label>
    <div class="col-md-6 col-sm-6 ">
      <textarea name="link_registrasi" class="form-control">http://</textarea>
    </div>
  </div>
      
   
        <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>