$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ajaxError(function( event, request, settings) {
  notif = demo.notifEAjax(request);
  errorCode = request.responseText;
  demo.showNotification('top','right','Gagal melakukan request Ajax - ' + notif, 4);
});

function getPageData(idSch) {
  var base_url = window.location.origin;
  console.log(idSch);
	$.ajax({
    	dataType: 'json',
      type:'post',
    	url: base_url+'laporan/starting/indexAjax',
    	data: {idSch:idSch}
	}).done(function(data) {
		manageRow(data.data);
    console.log(data);
	});
}

function manageRow(data) {
	var	rows = '';
  var jk = 'Laki-laki';

	$.each( data, function( key, value ) {
    if(value.jk == 0)
      jk = 'Perempuan';

	  	rows = rows + '<tr>';
        rows = rows + '<td>'+ ++key +'</td>';
  	  	rows = rows + '<td>'+value.id+'</td>';
        rows = rows + '<td>'+ jk +'</td>';
        rows = rows + '<td>'+value.ttl+'</td>';
        rows = rows + '<td>'+value.sekolah.name+'</td>';
        rows = rows + '<td>'+value.user.name+'</td>';
	  	rows = rows + '</tr>';
	});
	$("tbody").html(rows);
}
