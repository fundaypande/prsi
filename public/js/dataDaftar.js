var page = 1;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

getData('data/atlit', 'select[name="atlit"]');
getData('data/lomba', 'select[name="lomba"]');
getData('data/umur', 'select[name="umur"]');

/* Add new Post table row */
function manage(data, selectId) {
	var	rows = '';
  rows = rows + '<option value="">Pilih Data</option>';
	$.each( data, function( key, value ) {
    rows = rows + '<option value='+value.id+'>'+ value.name +'</option>';
	});
	$("body").find(selectId).append(rows);
}

function getData(url, selectId) {
	$.ajax({
    	dataType: 'json',
    	url: url,
    	data: {page:page}
	}).done(function(data) {
		manage(data, selectId);
	});
}
