
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    if(isset($this->session->userdata['adm_role'])&&$this->session->userdata['adm_role']=='perusahaan'){
    echo "<title>Perusahaan JF UDINUS</title>";    
    }else{
    echo "<title>Internal JF UDINUS</title>";   
    }
    ?>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

    <!-- jQuery custom content scroller -->
    <link href="<?php echo base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') ?>" rel="stylesheet">

    <!-- dataTables -->
    <link href="<?php echo base_url('assets/vendors/datatables.net/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

    <!-- iCheck -->
    <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url('assets/vendors/google-code-prettify/bin/prettify.min.css') ?>" rel="stylesheet">

    <!-- Select2 -->
    <link href="<?php echo base_url('assets/vendors/select2/dist/css/select2.min.css') ?>" rel="stylesheet">

    <!-- Switchery -->
    <link href="<?php echo base_url('assets/vendors/switchery/dist/switchery.min.css') ?>" rel="stylesheet">

    <!-- starrr -->
    <link href="<?php echo base_url('assets/vendors/starrr/dist/starrr.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/custom/upload.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/custom/customized.css') ?>" rel="stylesheet">

    <!-- webcam -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

 <!-- graph -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <!-- graph -->

<!-- select picker -->

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
<!-- end -->


<!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
<!-- summernote -->

<style>
.table-responsive::-webkit-scrollbar {
    -webkit-appearance: none;
}

.table-responsive::-webkit-scrollbar:vertical {
    width: 12px;
}

.table-responsive::-webkit-scrollbar:horizontal {
    height: 12px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, .5);
    border-radius: 10px;
    border: 2px solid #ffffff;
}

.table-responsive::-webkit-scrollbar-track {
    border-radius: 10px;  
    background-color: #ffffff; 
}

.modal {
  overflow-y:auto;
}
</style>


  </head>