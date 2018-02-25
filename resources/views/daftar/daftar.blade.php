@extends('template.dashboard')

@section('content')

      <div class="card">


		    <div class="card-header">
		            <h4 class="card-title">Daftar Atlit</h4>
                <p class="card-category">
                    Menampilkan data alit yang terdaftar
                </p>
		        <div class="pull-right">
				          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">Tambah Daftar Peserta Lomba</button>
		        </div>
		    </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <input class="form-control" id="cari" type="text" name="" value="" placeholder="search">
            </div>
          </div>
          <div style="overflow-x:auto;">
		        <table class="table table-hover">
			           <thead>
    			    <tr>
        				<th>key</th>
        				<th>Nama Atlit</th>
                <th>Perlombaan</th>
                <th>Best Time</th>
                <th>Kelompok Umur</th>
                <th>Pelatih</th>
        				<th width="200px">Action</th>
    			    </tr>
			</thead>
			<tbody>
			</tbody>
		</table>
  </div>

		<ul id="pagination" class="pagination-sm"></ul>
    </div>
    <!-- Create Item Modal -->
    		@include('daftar.create')
    		<!-- Edit Item Modal -->
    		@include('daftar.edit')
    		@include('daftar.delete')
</div>



	<script type="text/javascript">
		var url = "<?php echo route('daftars.index')?>";
    $(document).ready(function(){
      $('.js-example-basic-single').select2();

      $('#create-item').appendTo("body");
      $('#modal-delete').appendTo("body");
      $('#edit-item').appendTo("body");
    });
	</script>
	<script src="{{ asset('js/daftarAjax.js') }}"></script>
  <script src="{{ asset('js/dataDaftar.js') }}"></script>
@endsection
