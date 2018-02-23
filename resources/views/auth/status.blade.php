@extends('template.dashboard')

@section('content')


            <div class="card card-default">
                <div class="card-header">
                  <p>Verifikasi Registrasi User</p>
                  </div>

                <div class="card-body">
                  @if(session('msg-warning'))
                    <div class="alert alert-warning">
                      <p> {{ session('msg-warning') }}</p>
                    </div>
                  @endif
                  @if(session('msg'))
                    <div class="alert alert-success">
                      <p> {{ session('msg') }}</p>
                    </div>
                  @endif
                  <h4>User Baru Telah Berhasil Ditambahkan</h4>
                  <div class="alert alert-success">
                    <p>Email registrasi telah berhasil dikirimkan ke email user</p>
                    <p>Anda juga dapat memberikan <strong>Private Link</strong> di bawah ini kepada user bersangkutan secara langsung</p>
                    <p>Pastikan bahwa <strong>Private Link</strong> tersebut dikirimkan ke orang yang tepat</p>

                  </div>
                  <input class="form-control" type="text" value="{{url('/')}}/verify/{{$user->token}}/{{$user->id}}" id="myInput"><br>
                  <button class="btn btn-primary" onclick="myFunction()" onmouseout="outFunc()">Copy to clipboard</button>

                  </div>

                </div>
            </div>
        </div>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
}
</script>

@endsection
