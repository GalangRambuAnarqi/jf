 <!-- jQuery -->
 <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js') ?>"></script> 

    <!-- Raphael -->
    <script src="<?php echo base_url('assets/vendors/raphael/raphael.min.js') ?>"></script> 

    <!-- Morris -->
    <script src="<?php echo base_url('assets/vendors/morris.js/morris.min.js') ?>"></script> 

    <!-- progressbar -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script> 
   
     <!-- moment -->
     <script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js') ?>"></script> 

      <!-- dateranger -->
      <script src="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script> 

      <!-- smartWizard -->
    <script src="<?php echo base_url('assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') ?>"></script> 
    
    <!-- malihu -->
    <script src="<?php echo base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') ?>"></script>

     <!-- iCheck -->
    <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js') ?>"></script>

     <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/jquery.hotkeys/jquery.hotkeys.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/google-code-prettify/src/prettify.js') ?>"></script>

    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url('assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js') ?>"></script>

    <!-- Switchery -->
    <script src="<?php echo base_url('assets/vendors/switchery/dist/switchery.min.js') ?>"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url('assets/vendors/select2/dist/js/select2.full.min.js') ?>"></script>

    <!-- Parsley -->
    <script src="<?php echo base_url('assets/vendors/parsleyjs/dist/parsley.min.js') ?>"></script>

    <!-- Autosize -->
    <script src="<?php echo base_url('assets/vendors/autosize/dist/autosize.min.js') ?>"></script>

    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url('assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') ?>"></script>

    <!-- starrr -->
    <script src="<?php echo base_url('assets/vendors/starrr/dist/starrr.js') ?>"></script>



    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js') ?>"></script>

    <!-- datatables -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- select picker -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> -->

<!-- <script>
$(function () {
    $('selectpicker').selectpicker();
});
</script> -->

<!-- /select -->

<!-- summernotes -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

 
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>


<script>
 $(document).ready(function(){
      $('#summernote').summernote({
        placeholder: 'Ketik Disini Dengan Rapi',
        tabsize: 2,
        height: 500,
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                    onMediaDelete : function(target) {
                        deleteImage(target[0].src);
                    }
                }
      });

      function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: "<?php echo site_url('admin/uploadimg_lowongan')?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#summernote').summernote("insertImage", url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            function deleteImage(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "<?php echo site_url('admin/deleteimg_lowongan')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
 });
    </script>

