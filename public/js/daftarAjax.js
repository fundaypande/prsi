var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

$( document ).ready(function() {
    manageData();
});

$( document ).ajaxError(function( event, request, settings) {
  notif = demo.notifEAjax(request);
  errorCode = request.responseText;
  demo.showNotification('top','right','Gagal melakukan request Ajax - ' + notif, 4);
});


/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data) {
    	total_page = data.last_page;
    	current_page = data.current_page;
    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });
    	manageRow(data.data);
        is_ajax_fire = 1;
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url,
    	data: {page:page}
	}).done(function(data) {
		manageRow(data.data);
	});
}


/* Add new Post table row */
function manageRow(data) {
	var	rows = '';
  var jk = 'Laki-laki'
	$.each( data, function( key, value ) {
    if(value.jk == 0)
      jk = 'Perempuan';

	  	rows = rows + '<tr>';
        rows = rows + '<td>'+ ++key +'</td>';
  	  	rows = rows + '<td>'+value.atlit.name+'</td>';
        rows = rows + '<td>'+ value.lomba.name +'</td>';
        rows = rows + '<td>'+value.best_time+'</td>';
        rows = rows + '<td>'+value.umur.name+'</td>';
        rows = rows + '<td>'+value.user.name+'</td>';
  	  	rows = rows + '<td data-id="'+value.id+'" data-atlit="'+value.atlit.id+'" data-lomba="'+value.lomba.id+'" data-umur="'+value.umur.id+'">';
          rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
          rows = rows + '<button data-target="#modal-delete" data-toggle="modal" class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});
  $("tbody").empty();
	$("tbody").html(rows);
}

/* Create new Post */
$(".crud-submit").click(function(e) {
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var atlit_id = $("#create-item").find("select[name='atlit']").val();
    var lomba_id = $("#create-item").find("select[name='lomba']").val();
    var best_time = $("#create-item").find("input[name='best_time']").val();
    var umur_id = $("#create-item").find("select[name='umur']").val();
    var user_id = $("#create-item").find("input[name='user']").val();
    console.log(atlit_id+lomba_id+best_time+umur_id+user_id);
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{
          atlit_id : atlit_id,
          lomba_id : lomba_id,
          user_id : user_id,
          best_time : best_time,
          umur_id : umur_id
        }
    }).done(function(dataa){
        getPageData();
        $(".modal").modal('hide');

        demo.showNotification('top','right','Berhasil menambahkan data pendaftaran', 1);
    });
});

/* Search new Post */
$("#cari").keyup(function(event){
  var sub = $(this).val();
  var ragex = new RegExp(sub, 'i');
  var	rows = '';

  $.ajax({
      dataType: 'json',
      type:'post',
      url: url + "/s",
      data: {sub:sub}
  }).done(function(data) {

      $.each( data.data, function( key, value ) {

          if((value.atlit.name.search(ragex) != -1) ||
                (value.lomba.name.search(ragex) != -1) ||
                (value.best_time.search(ragex) != -1) ||
                (value.user.name.search(ragex) != -1) ||
                (value.umur.name.search(ragex) != -1))
          {
          rows = rows + '<tr>';
            rows = rows + '<td>'+ ++key +'</td>';
            rows = rows + '<td>'+value.atlit.name+'</td>';
            rows = rows + '<td>'+ value.lomba.name +'</td>';
            rows = rows + '<td>'+value.best_time+'</td>';
            rows = rows + '<td>'+value.umur.name+'</td>';
            rows = rows + '<td>'+value.user.name+'</td>';
            rows = rows + '<td data-id="'+value.id+'" data-sekolah="">';
              rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
              rows = rows + '<button data-target="#modal-delete" data-toggle="modal" class="btn btn-danger remove-item">Delete</button>';
            rows = rows + '</td>';
          rows = rows + '</tr>';
          }
      });
      $("tbody").empty();
      $("tbody").html(rows);


  });
});

/* Open Remove */
$("body").on("click",".remove-item",function() {
    var id = $(this).parent("td").data('id');
    $("#modal-delete").find("form").attr("action",url + '/' + id);
});

/* Remove Post */
$("#hapus").click(function(e) {
    e.preventDefault();
    var form_action = $("#modal-delete").find("form").attr("action");
    var c_obj = $(this).parents("tr");
    $.ajax({
        dataType: 'json',
        type:'delete',
        url: form_action,
    }).done(function(data) {
        c_obj.remove();
        demo.showNotification('top','right','Berhasil menghapus data pendaftaran', 1);
        getPageData();
    });
});

/* Edit Post */
$("body").on("click",".edit-item",function() {
    var id = $(this).parent("td").data('id');
    var atlit_id = $(this).parent("td").data('atlit');
    var lomba_id = $(this).parent("td").data('lomba');
    var best_time = $(this).parent("td").prev("td").prev("td").prev("td").text();
    var umur_id = $(this).parent("td").data('umur');

    console.log(atlit_id);

    $("#edit-item").find("select[name='atlit']").val(atlit_id).trigger('change');
    $("#edit-item").find("select[name='lomba']").val(lomba_id).trigger('change');
    $("#edit-item").find("input[name='best_time']").val(best_time);
    $("#edit-item").find("select[name='umur']").val(umur_id).trigger('change');
    $("#edit-item").find("form").attr("action",url + '/' + id);
});

/* Updated new Post */
$(".crud-submit-edit").click(function(e) {
    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var atlit_id = $("#edit-item").find("select[name='atlit']").val();
    var lomba_id = $("#edit-item").find("select[name='lomba']").val();
    var best_time = $("#edit-item").find("input[name='best_time']").val();
    var umur_id = $("#edit-item").find("select[name='umur']").val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{
          atlit_id : atlit_id,
          lomba_id : lomba_id,
          best_time : best_time,
          umur_id : umur_id
        }
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        demo.showNotification('top','right','Berhasil mengedit data pendaftaran lomba', 1);
    });
});
