<script type="text/javascript">
// $(document).ready(function () {
//     $('#submitbtn').click(function() {
//       checked = $("input[type=checkbox]:checked").length;

//       if(!checked) {
//         alert("You must check at least one checkbox.");
//         return false;
//       }

//     });
// });


// $("#formfeedback").submit(function(event) {
//   /* stop form from submitting normally */
//   event.preventDefault();

// 	if (! $('#F1').checked){
//        alert('Anda belum mengisi pertanyaan ke 1');
// 	   $('#F1')[0].focus();
//        return false;
//     }

// });


$('#submitbtn').click(function(){
    if($('.F1:checked').length < 1){
      alert('Mohon isi sumber informasi acara jobfair');
	  $('#F1')[0].focus();
	  event.preventDefault();
    }
	if($('.F2:checked').length < 1){
      alert('Mohon isi alasan ikut acara jobfair');
	  $('#F2')[0].focus();
	  event.preventDefault();
    }
	if($('.F3:checked').length < 1){
      alert('Mohon isi apakah jobfair ini membantu anda');
	  $('#F3')[0].focus();
	  event.preventDefault();
    }
	if($('.F5_1:checked').length < 1){
      alert('Mohon isi pendapat tentang ruangan yang kami sediakan');
	  $('#F5_1')[0].focus();
	  event.preventDefault();
    }
	if($('.F5_2:checked').length < 1){
      alert('Mohon isi pendapat tentang fasilitas yang kami sediakan');
	  $('#F5_2')[0].focus();
	  event.preventDefault();
    }
	if($('.F5_3:checked').length < 1){
      alert('Mohon isi pendapat pelayanan panitia kami');
	  $('#F5_3')[0].focus();
	  event.preventDefault();
    }
	if($('.F5_4:checked').length < 1){
      alert('Mohon isi pendapat tentang durasi acara yang kami sediakan');
	  $('#F5_4')[0].focus();
	  event.preventDefault();
    }
	if($('.F5_5:checked').length < 1){
      alert('Mohon isi pendapat tentang jumlah perusahaan peserta');
	  $('#F5_5')[0].focus();
	  event.preventDefault();
    }
});


</script>

