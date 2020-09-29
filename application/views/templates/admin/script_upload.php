<script language="javascript">
$(document).ready(function(){
 $(document).on('change', '#foto', function(){
  var name = document.getElementById("foto").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
  {
   alert("File harus JPG/PNG");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("foto").files[0]);
  var f = document.getElementById("foto").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 1048576)
  {
   alert("Ukuran gambar harus kurang dari 1MB");
  }
  else
  {
   form_data.append("foto", document.getElementById('foto').files[0]);
   $.ajax({
    url:"peserta/upload/foto/gambar",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_foto').html("<br><label class='text-success'>Mengunggah Foto...</label>");
    },   
    success:function(data)
    {
    
      setTimeout(
       function() 
        {
         location.reload();
        }, 0001);    
    }
   });
  }
 });
});



$(document).ready(function(){
 $(document).on('change', '#ktp', function(){
  var name = document.getElementById("ktp").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['pdf']) == -1) 
  {
   alert("File harus PDF");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("ktp").files[0]);
  var f = document.getElementById("ktp").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 1048576)
  {
   alert("Ukuran file harus kurang dari 1MB");
  }
  else
  {
   form_data.append("ktp", document.getElementById('ktp').files[0]);
   $.ajax({
    url:"peserta/upload/ktp/pdf",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_ktp').html("<br><label class='text-success'>Mengunggah KTP...</label>");
    },   
    success:function(data)
    {
    //  $('#uploaded_ktp').html(data);
      setTimeout(
       function() 
        {
         location.reload();
        }, 0001);    
    }
   });
  }
 });
});



$(document).ready(function(){
 $(document).on('change', '#cv', function(){
  var name = document.getElementById("cv").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['pdf']) == -1) 
  {
   alert("File harus PDF");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("cv").files[0]);
  var f = document.getElementById("cv").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 1048576)
  {
   alert("Ukuran file harus kurang dari 1MB");
  }
  else
  {
   form_data.append("cv", document.getElementById('cv').files[0]);
   $.ajax({
    url:"peserta/upload/cv/pdf",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_cv').html("<br><label class='text-success'>Mengunggah CV...</label>");
    },   
    success:function(data)
    {
    //  $('#uploaded_file').html(data);  
    setTimeout(
       function() 
        {
         location.reload();
        }, 0001);   
    }
   });
  }
 });
});


$(document).ready(function(){
 $(document).on('change', '#ijazah', function(){
  var name = document.getElementById("ijazah").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['pdf']) == -1) 
  {
   alert("File harus PDF");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("ijazah").files[0]);
  var f = document.getElementById("ijazah").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 1048576)
  {
   alert("Ukuran file harus kurang dari 1MB");
  }
  else
  {
   form_data.append("ijazah", document.getElementById('ijazah').files[0]);
   $.ajax({
    url:"peserta/upload/ijazah/pdf",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_ijazah').html("<br><label class='text-success'>Mengunggah Ijazah...</label>");
    },   
    success:function(data)
    {
    //  $('#uploaded_file').html(data);  
    setTimeout(
       function() 
        {
         location.reload();
        }, 0001);   
    }
   });
  }
 });
});



$(document).ready(function(){
 $(document).on('change', '#transkrip', function(){
  var name = document.getElementById("transkrip").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['pdf']) == -1) 
  {
   alert("File harus PDF");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("transkrip").files[0]);
  var f = document.getElementById("transkrip").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 1048576)
  {
   alert("Ukuran file harus kurang dari 1MB");
  }
  else
  {
   form_data.append("transkrip", document.getElementById('transkrip').files[0]);
   $.ajax({
    url:"peserta/upload/transkrip/pdf",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_transkrip').html("<br><label class='text-success'>Mengunggah Transkrip Nilai...</label>");
    },   
    success:function(data)
    {
    //  $('#uploaded_file').html(data);  
    setTimeout(
       function() 
        {
         location.reload();
        }, 0001);   
    }
   });
  }
 });
});



$(document).ready(function(){
 $(document).on('change', '#pendukung', function(){
  var name = document.getElementById("pendukung").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['pdf','zip','rar']) == -1) 
  {
   alert("File harus PDF/ZIP/RAR");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pendukung").files[0]);
  var f = document.getElementById("pendukung").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 5242880)
  {
   alert("Ukuran file harus kurang dari 5MB");
  }
  else
  {
   form_data.append("pendukung", document.getElementById('pendukung').files[0]);
   $.ajax({
    url:"peserta/upload/pendukung/pdfzip",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_pendukung').html("<br><label class='text-success'>Mengunggah Berkas Pendukung...</label>");
    },   
    success:function(data)
    {
    //  $('#uploaded_file').html(data);  
    setTimeout(
       function() 
        {
         location.reload();
        }, 0001);   
    }
   });
  }
 });
});




$(document).ready(function(){
 $(document).on('change', '#lamaran', function(){
  var name = document.getElementById("lamaran").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['pdf']) == -1) 
  {
   alert("File harus PDF");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("lamaran").files[0]);
  var f = document.getElementById("lamaran").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 1048576)
  {
   alert("Ukuran file harus kurang dari 1MB");
  }
  else
  {
   form_data.append("lamaran", document.getElementById('lamaran').files[0]);
   $.ajax({
    url:"peserta/upload/lamaran/pdf",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_lamaran').html("<br><label class='text-success'>Mengunggah Surat Lamaran...</label>");
    },   
    success:function(data)
    {
    //  $('#uploaded_file').html(data);  
    setTimeout(
       function() 
        {
         location.reload();
        }, 0001);   
    }
   });
  }
 });
});

// end of upload
</script>

