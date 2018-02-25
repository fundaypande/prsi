@extends('template.dashboard')

@section('content')

      <div class="card">


		    <div class="card-header">
		            <h4 class="card-title">Daftar Perlombaan</h4>
                <p class="card-category">
                    Menampilkan data perlombaan yang terdaftar
                </p>
		        <div class="pull-right">
				          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">Tambah Data Perlombaan</button>
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
        				<th>Nama Perlombaan</th>
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
    		@include('lomba.create')
    		<!-- Edit Item Modal -->
    		@include('lomba.edit')
    		@include('lomba.delete')
</div>



	<script type="text/javascript">
		var url = "<?php echo route('lombas.index')?>";
    $(document).ready(function(){

      $('#create-item').appendTo("body");
      $('#modal-delete').appendTo("body");
      $('#edit-item').appendTo("body");
    });
	</script>
	<script src="{{ asset('js/lombaAjax.js') }}"></script>
@endsection
