var page = 1;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ready(function() {
  getData('data/atlit', 'select[name="atlit"]');
  getData('data/lomba', 'select[name="lomba"]');
  getData('data/umur', 'select[name="umur"]');
});



/* Add new Post table row */
function manage(data, selectId) {
	var	rows = '';
  rows = rows + '<option value="">Pilih Data</option>';
	$.each( data, function( key, value ) {
    if(value.keterangan) var ket = ' - '+value.keterangan;
    else ket = '';
    rows = rows + '<option id='+value.ttl+' value='+value.id+'>'+ value.name + '   '+ ket + '</option>';
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

//is valid date format
function calculateAge (dateToCalculate, birthDay) {
    var calculateYear = dateToCalculate.getFullYear();
    var calculateMonth = dateToCalculate.getMonth();
    var calculateDay = dateToCalculate.getDate();

    var tahun = birthDay.split('-');

    var birthYear = tahun[0];
    var birthMonth = tahun[1];
    var birthDay = tahun[2];

    var age = calculateYear - birthYear;
    var ageMonth = calculateMonth - birthMonth;
    var ageDay = calculateDay - birthDay;

    if (ageMonth < 0 || (ageMonth == 0 && ageDay < 0)) {
        age = parseInt(age) - 1;
    }
    return age;
}

$("#atlit").on('change', function() {
      var data = $(".atlit option:selected").attr('id');
      var tanggal = new Date();
      var umur = calculateAge(tanggal, data);

      $("body").find('input[name="umur"]').val(umur + ' Tahun');

})
