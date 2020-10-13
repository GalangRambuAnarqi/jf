<!-- <script language="javascript">

	function showPass() {
	  var x = document.getElementById("pass");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}

</script> -->
<!-- datatable -->
<script>
    $(document).ready( function () {
		$.fn.dataTable.ext.classes.sPageButton = 'button primary_button';
    	$('#perusahaan').DataTable({
			"lengthChange": false,
   			"bInfo":false,
			"bFilter": false
    	});
    } );
</script>

<script>
   $(document).ready(function (){
    var table = $('#tbcollapse').DataTable({
        'responsive': true,
		dom: 'lBfrtip',
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			]
    });
});
</script>

<script>
    $(document).ready( function () {
		$.fn.dataTable.ext.classes.sPageButton = 'button primary_button';
    	$('#lowongan').DataTable({
			"bInfo" : false
    	});
    } );
</script>


<script>
    $(document).ready( function () {
		$.fn.dataTable.ext.classes.sPageButton = 'button primary_button';
    	$('#listlamaran').DataTable({
			"bInfo" : false,
			dom: 'lBfrtip',
			buttons: [
			'excel', 'pdf', 'print'
			]
    	});
    } );
</script>

<script>
$(document).ready(function (){
    var table = $('#inbox').DataTable({
		"dom": '<lf<t>ip>',
    "aaSorting": [],
		pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Semua']]
    });
});
</script>

<!-- antiklikkanan -->
<script>
$(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
})

document.onkeydown = function(e) {
	if(event.keyCode == 123) {
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
	return false;
	}
}

</script>


<!-- timeout alert -->
<script>
setTimeout(function() {
    var alerts = document.getElementsByClassName("alert-dismissable");
  
    for( var i = 0; i < alerts.length; i++ ) {
        alerts[i].style.display = "none";
    }
}, 2000);
</script>