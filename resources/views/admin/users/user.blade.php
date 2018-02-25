@extends('template.dashboard')

@section('content')

<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="row">

                  <div class="card" style="padding : 20px">
                    <div class="row">
                      <div class="col-md-8">
                        <h4 class="card-title">Data Pengguna</h4>
                        <p class="card-category">
                            Menampilkan Seluruh Data User Yang Telah Terdaftar
                        </p>
                      </div>
                      <div class="col-md-4">
                        <a href="/register" style="margin-top : 10px" class="btn btn-primary" name="button"><i class="pe-7s-add-user"></i>Tambah Pengguna</a>

                      </div>
                    </div>


                    <div class="" style="padding-top: 15px">
                      <form class="" action="" method="post">

                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('msg'))
                    <div class="alert alert-info alert-with-icon" data-notify="container">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                              <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                          <span data-notify="message">{{ session('msg') }}</span>
                      </div>
                    @endif

                    @if(session('msg-warning'))
                    <div class="alert alert-warning alert-with-icon" data-notify="container">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                              <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                          <span data-notify="message">{{ session('msg-warning') }}</span>
                      </div>
                    @endif
                      </form>
                    </div>

                      <div style="overflow-x:auto;">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Username</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Sekolah</th>
                              <th>Telepon</th>
                              <th>Admin</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach ($users as $key => $user)
                            <?php
                              $role = 'Pelatih';
                              if( ($user->role)  == '0')
                                $role = 'Admin';
                              if($user-> school == null)
                                $sekolah = "";
                              else $sekolah = $user-> sekolah -> name;
                             ?>

                              <tr >
                                <td>{{++$key}}</td>
                                <td><a href="/profile/{{ $user -> id }}">{{ $user ->username }}</a></td>
                                <td>{{ $user-> name }}</td>
                                <td>{{ $user-> email }}</td>
                                <td>{{ $sekolah }}</td>
                                <td>{{ $user-> phone }}</td>
                                <td>
                                   <input id="{{ $user -> role }}" type="button" data-id="{{ $user->id }}" class="btn-bot btn-primary-bot modal-role" data-toggle="modal" data-target="#modal-role" name="" value="{{ $role }}">
                                 </td>
                                <td>
                                  <input type="button" class="btn-bot btn-danger-bot modal_delete" data-id="{{ $user->id }}" data-toggle="modal" data-target="#modal_delete" name="" value="Hapus">
                                </td>
                              </tr>

                            @endforeach
                          </tbody>

                        </table>
                      </div>
                      <center>
                      <div id="page">
                        {{ $users->links() }}
                      </div>
                    </center>

                </div>

              </div>





</div>
</div>

<!-- show modal dialog update status -->
@include('admin.users.modal_delete')
@include('modals.warning')
@include('admin.users.modal-role')





<script type="text/javascript">

$(document).ready(function(){

  $('#modal_delete').appendTo("body");
  $('#modal_warning').appendTo("body");
  $('#modal-role').appendTo("body");

  //onClick Hapus untuk menghapus user
  $("body").on("click",".modal_delete",function() {
      var id = $(this).attr('data-id');
      var dana = $(this).attr('dana');
      var name = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
      var role = $(this).parent("td").prev("td").text();
      console.log('ini hasTransfer '+ dana);
      if(role == 'admin'){
        $(this).attr('data-target', '#modal_warning');
        $('#titleModalWarning').text('Tidak Boleh Menghapus Admin');
        $('#pModal').text('Role admin tidak diperkenankan untuk dihapus');
      }

      $("#editP").text("Apakah anda yakin ingin menghapus User "+ name);
      $("#modal_delete").find("form").attr("action","/admin/user/" + id);
  });

  // onClick status centang untuk merubah role
$("body").on("click",".modal-role",function() {
  var id = $(this).attr('data-id');
  var stat = $(this).attr('id');
  console.log('Ini ID nya :'+id);
  $("#modal-role").find("form").attr("action","user/role/" + id+"/"+ stat);
});

//batal click checkbox




}); //document ready



</script>

@endsection
