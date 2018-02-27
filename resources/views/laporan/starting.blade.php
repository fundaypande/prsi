@extends('template.dashboard')

@section('content')

<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="row">

                  <div class="card" style="padding : 20px">
                    <div class="row">
                      <div class="col-md-8">
                        <h4 class="card-title">Laporan Starting List</h4>
                        <p class="card-category">
                            Menampilkan Seluruh Data User Yang Telah Terdaftar
                        </p>
                      </div>
                    </div>


                    <div class="card-body" style="padding-top: 15px">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="school" class="col-md-4 control-label">Pilih Sekolah</label><br>
                                  <select name="school" data-sch="funday" style="width:100%"  class="js-example-basic-single">
                                  </select>
                          </div>
                        </div>
                      </div>
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
                              <th>Nama Peserta</th>
                              <th>Kelompok umur</th>
                              <th>Pa/Pi</th>
                              <th>No Acara</th>
                              <th>Nomor Lomba</th>
                              <th>Best Time</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>

                        </table>
                      </div>
                      <center>
                    </center>

                </div>

              </div>





</div>
</div>





<script src="{{ asset('js/registerAjax.js') }}"></script>
<script src="{{ asset('js/laporanAjax.js') }}"></script>
	<script type="text/javascript">
    $(document).ready(function(){
      $('.js-example-basic-single').select2();

      $('.js-example-basic-single').on('select2:select', function (e) {
      var data = e.params.data;
      idSch = data.id;
      getPageData(idSch);
});
    });
	</script>



@endsection
