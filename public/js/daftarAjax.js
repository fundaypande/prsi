var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

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
  	  	rows = rows + '<td data-id="'+value.id+'" data-sekolah="">';
          rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
          rows = rows + '<button data-target="#modal-delete" data-toggle="modal" class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});
	$("tbody").html(rows);
}

/* Create new Post */
$(".crud-submit").click(function(e) {
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var name = $("#create-item").find("input[name='name']").val();
    var jk = $("#create-item").find("select[name='jk']").val();
    var ttl = $("#create-item").find("input[name='ttl']").val();
    var user_id = $("#create-item").find("input[name='user']").val();
    var sekolah_id = $("#create-item").find("select[name='school']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{
          name:name,
          jk : jk,
          ttl : ttl,
          sekolah_id : sekolah_id,
          user_id : user_id
        }
    }).done(function(dataa){
        getPageData();
        $(".modal").modal('hide');

        demo.showNotification('top','right','Berhasil menambahkan data Atlit');
    });
});

/* Search new Post */
$("#cari").keyup(function(event){
  var sub = $(this).val();
  $.ajax({
      dataType: 'json',
      type:'post',
      url: url + "/s",
      data: {sub:sub}
  }).done(function(data) {
      manageRow(data.data);
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
        demo.showNotification('top','right','Berhasil menghapus data perlombaan');
        getPageData();
    });
});

/* Edit Post */
$("body").on("click",".edit-item",function() {
    var id = $(this).parent("td").data('id');
    var sekolah_id = $(this).parent("td").data('sekolah');
    var name = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
    var jk = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
    var ttl = $(this).parent("td").prev("td").prev("td").prev("td").text();
    // var sekolah_id = $(this).parent("td").prev("td").prev("td").text();

    var realJk = 1;
    if(jk == "Perempuan") realJk = 0;

    $("#edit-item").find("input[name='name']").val(name);
    $("#edit-item").find("select[name='jk']").val(realJk).trigger('change');;
    $("#edit-item").find("input[name='ttl']").val(ttl);
    $("#edit-item").find("select[name='school']").val(sekolah_id).trigger('change');;
    $("#edit-item").find("form").attr("action",url + '/' + id);
});

/* Updated new Post */
$(".crud-submit-edit").click(function(e) {
    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var name = $("#edit-item").find("input[name='name']").val();
    var jk = $("#edit-item").find("select[name='jk']").val();
    var ttl = $("#edit-item").find("input[name='ttl']").val();
    var user_id = $("#edit-item").find("input[name='user']").val();
    var sekolah_id = $("#edit-item").find("select[name='school']").val();
    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{
          name:name,
          jk : jk,
          ttl : ttl,
          sekolah_id : sekolah_id,
          user_id : user_id
        }
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        demo.showNotification('top','right','Berhasil mengedit data atlit');
    });
});
