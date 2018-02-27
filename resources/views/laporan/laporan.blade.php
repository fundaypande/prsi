@extends('template.dashboard')

@section('content')

      <div class="card">


		    <div class="card-header">
		            <h4 class="card-title">Laporan</h4>
                <p class="card-category">
                    Pilih data laporan yang ingin ditampilkan
                </p>
		    </div>

    <div class="card-body">
          <div class="row">
            <a href="/laporan/starting">
            <div class="col-md-12">
                  <div class="card">
                	<div class="card-header">
                		  <h5 class="card-title">Laporan Starting List</h5>
                      <p class="card-category">
                          Menampilkan seluruh data peserta yang mengikuti lomba per-sekolah
                      </p>
                		    </div>

                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          Laporan Starting List
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="/laporan/list">
            <div class="col-md-12">
                  <div class="card">
                	<div class="card-header">
                		  <h5 class="card-title">Laporan Daftar Acara</h5>
                      <p class="card-category">
                          Menampilkan seluruh data peserta yang mengikuti lomba per-acara
                      </p>
                		    </div>

                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                          Laporan Daftar Acara
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          </a>
          </div>
    </div>
</div>




@endsection
