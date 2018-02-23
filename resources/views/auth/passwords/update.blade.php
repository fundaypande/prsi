@extends('template.dashboard')

@section('content')
  <div class="card">


                <div class="card-header">
                  <p>Reset Password</p>
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

                    <form class="form-horizontal" method="POST" action="{{ URL('profile/pass/reset')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('oldpass') ? ' has-error' : '' }}">
                            <label for="oldpass" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="njp" type="password" class="form-control" name="oldpass" value="{{ old('oldpass') }}" required autofocus>

                                @if ($errors->has('oldpass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldpass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
