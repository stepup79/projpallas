@extends('backend.layouts.master')

@section('title')
Danh mục tài khoản Quản lý
@endsection

@section('custom-css')
@endsection

@section('content')
<h3 class="text-center">Quản Lý</h3>
<form name="frmCreate" id="frmCreate" method="POST" action="{{ route('admin.quanly.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="ql_taiKhoan">Tên tài khoản</label>
        <input type="text" class="form-control" name="ql_taiKhoan" id="ql_taiKhoan" value="{{ old('ql_taiKhoan') }}">
    </div>
    <div class="form-group">
        <label for="ql_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" name="ql_matKhau" id="ql_matKhau" value="{{ old('ql_matKhau') }}">
    </div>
    <div class="form-group">
        <label for="ql_hoTen">Họ tên</label>
        <input type="text" class="form-control" name="ql_hoTen" id="ql_hoTen" value="{{ old('ql_hoTen') }}">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ql_ngaySinh">Ngày sinh</label>
            <input type="text" class="form-control" name="ql_ngaySinh" id="ql_ngaySinh" value="{{ old('ql_ngaySinh') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="ql_gioiTinh">Giới tính</label>
            <select class="form-control" name="ql_gioiTinh" id="ql_gioiTinh">
                <option value="0" {{ old('ql_gioiTinh') == 0 ?'selected' :'' }}>Nữ</option>
                <option value="1" {{ old('ql_gioiTinh') == 1 ?'selected' :'' }}>Nam</option>
                <option value="2" {{ old('ql_gioiTinh') == 2 ?'selected' :'' }}>Khác</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ql_dienThoai">Số điện thoại</label>
            <input type="text" class="form-control" name="ql_dienThoai" id="ql_dienThoai" value="{{ old('ql_dienThoai') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="ql_email">Email</label>
            <input type="text" class="form-control" name="ql_email" id="ql_email" value="{{ old('ql_email') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="ql_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" name="ql_diaChi" id="ql_diaChi" value="{{ old('ql_diaChi') }}">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ql_trangThai">Trạng thái</label>
            <select class="form-control" name="ql_trangThai" id="ql_trangThai">
                <option value="1" {{ old('ql_trangThai') == 1 ?'selected' :'' }}>Khóa</option>
                <option value="2" {{ old('ql_trangThai') == 2 ?'selected' :'' }}>Khả dụng</option>
            </select>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <button type="submit" class="btn btn-success col-md-1">Lưu</button>
        <a href="{{ route('admin.quanly.index') }}" class="btn btn-warning col-md-1">Quay về</a>
    </div>
</form>
@endsection

@section('custom-scripts')
<script>
$(function() {
  $('input[name="ql_ngaySinh"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale: {
          format: 'YYYY-MM-DD'
      }
  })
});
</script>
@endsection