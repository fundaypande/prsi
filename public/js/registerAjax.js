var page = 1;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

getData();

$("#save").click(function(){
  $("select").empty();
  getData();
  console.log("terlihaaat");
});

/* Add new Post table row */
function manage(data) {
	var	rows = '';
  rows = rows + '<option value="">Pilih Sekolah</option>';
	$.each( data, function( key, value ) {
    rows = rows + '<option value='+value.id+'>'+ value.name +'</option>';
	});
	$("body").find('select[data-sch="funday"]').append(rows);
}

function getData() {
	$.ajax({
    	dataType: 'json',
    	url: 'register/school',
    	data: {page:page}
	}).done(function(data) {
		manage(data);
	});
}
