@extends('frontend.layouts.master')

@section('custom-css')
<style>
.main-login {
    margin-top: 80px;
}
</style>
@endsection

@section('main-content')
<div class="container mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card main-login">
                <div class="card-header">Đăng nhập</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ql_taiKhoan') ? ' has-error' : '' }}">
                            <label for="ql_taiKhoan" class="col-md-4 control-label">Tên tài khoản</label>

                            <div class="col-md-6">
                                <input id="ql_taiKhoan" type="text" class="form-control" name="ql_taiKhoan" value="{{ old('ql_taiKhoan') }}" required autofocus>

                                @if ($errors->has('ql_taiKhoan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ql_taiKhoan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ql_matKhau') ? ' has-error' : '' }}">
                            <label for="ql_matKhau" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="ql_matKhau" type="password" class="form-control" name="ql_matKhau" required>

                                @if ($errors->has('ql_matKhau'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ql_matKhau') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="ql_ghinhodangnhap" {{ old('ql_ghinhodangnhap') ? 'checked' : '' }}/> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng nhập
                                </button>

                                <a class="btn btn-link" href="#">
                                    Quên mật khẩu?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection