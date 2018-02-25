@extends('template.dashboard')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="card">


		    <div class="card-header">
		            <h4 class="card-title">Daftar Umur</h4>
                <p class="card-category">
                    Menampilkan data umur yang terdaftar
                </p>
		        <div class="pull-right">
				          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">Tambah Data Umur</button>
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
        				<th>Nama</th>
                <th>Keterangan</th>
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
    		@include('umur.create')
    		<!-- Edit Item Modal -->
    		@include('umur.edit')
    		@include('umur.delete')
</div>



	<script type="text/javascript">
		var url = "<?php echo route('kus.index')?>";
    $(document).ready(function(){

      $('#create-item').appendTo("body");
      $('#modal-delete').appendTo("body");
      $('#edit-item').appendTo("body");
    });
	</script>
	<script src="{{ asset('js/umurAjax.js') }}"></script>
@endsection
