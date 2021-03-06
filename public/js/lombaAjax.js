var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

$( document ).ready(function() {
    manageData();
    validateAcara("#show-create", "#create-item");
    validateAcara("#show-edit", "#edit-item");
    $("#create-item").find("input[name='acara']").attr('style', '');
});


$( document ).ajaxError(function( event, request, settings) {
  notif = demo.notifEAjax(request);
  errorCode = request.responseText;
  demo.showNotification('top','right','Gagal melakukan request Ajax - ' + notif, 4);
});

// Menangani No Acara Uniq
function validateAcara(modal, btn){
  $(modal).click(function(){
    $(btn).find("input[name='acara']").val('');
    $(btn).find("input[name='name']").val('');
    $(btn).find("input[name='acara']").attr('style', '');
    var sub = '1';
    $.ajax({
        dataType: 'json',
        url: url + "/latest",
        data: {sub:sub}
    }).done(function(data) {
        var recAcara = data.acara + 1;
        $(btn).find("input[name='acara']").attr('placeholder', 'Rekomendasi no acara : '+ recAcara);
    });
  });

  $(btn).find("input[name='acara']").keyup(function(){
    //do validate
    var sub = $(this).val();
    $.ajax({
        dataType: 'json',
        type:'post',
        url: url + "/findduplicateacara",
        data: {sub:sub}
    }).done(function(data) {
      console.log(data.acara);
      if(data.acara == null) $(btn).find("input[name='acara']").attr('style', '');
      else {
        //set css error
        $(btn).find("input[name='acara']").attr('style', 'border-color: red; border-width: 2px;');
      }
    });

  }).on('keypress', function(e) { //mencegah huruf
     var c = e.keyCode || e.charCode;
     switch (c) {
      case 8: case 9: case 27: case 13: return;
      case 65:
       if (e.ctrlKey === true) return;
     }
     if (c < 48 || c > 57) e.preventDefault();
    });
}

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
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
      rows = rows + '<td>'+ ++key +'</td>';
	  	rows = rows + '<td>'+value.name+'</td>';
      rows = rows + '<td>'+value.acara+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" id="show-edit" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button data-target="#modal-delete" data-toggle="modal" class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});
	$("tbody").html(rows);
}

/* Create new Post */
$(".crud-submit").click(function(e) {
  color = Math.floor((Math.random() * 4) + 1);
  console.log(color);
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var name = $("#create-item").find("input[name='name']").val();
    var acara = $("#create-item").find("input[name='acara']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{
          name:name,
          acara : acara
        }
    }).done(function(dataa){
        getPageData();
        $(".modal").modal('hide');

        demo.showNotification('top','right','Berhasil menambahkan data perlombaan', 1);
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
        demo.showNotification('top','right','Berhasil menghapus data perlombaan', 1);
        getPageData();
    });
});

/* Edit Post */
$("body").on("click",".edit-item",function() {
    var id = $(this).parent("td").data('id');
    var name = $(this).parent("td").prev("td").prev("td").text();
    var acara = $(this).parent("td").prev("td").text();
    $("#edit-item").find("input[name='name']").val(name);
    $("#edit-item").find("input[name='acara']").val(acara);
    $("#edit-item").find("form").attr("action",url + '/' + id);

});

/* Updated new Post */
$(".crud-submit-edit").click(function(e) {
    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var name = $("#edit-item").find("input[name='name']").val();
    var acara = $("#edit-item").find("input[name='acara']").val();
    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{name:name, acara:acara}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        demo.showNotification('top','right','Berhasil mengedit data perlombaan', 1);
    });
});
