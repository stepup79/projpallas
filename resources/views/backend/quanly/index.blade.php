@extends('backend.layouts.master')

@section('title')
Chức năng CRUD
@endsection

@section('content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<!-- Tạo nút thêm mới -->
<a href="{{ route('admin.quanly.create') }}" class="btn btn-primary">Thêm mới</a>

<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Mã admin</th>
            <th>Tên tài khoản</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataQuanly as $ql)
        <tr>
            <td>{{ $ql->ql_id }}</td>
            <td>{{ $ql->ql_ma }}</td>
            <td>{{ $ql->ql_taiKhoan }}</td>
            <td>{{ $ql->ql_hoTen }}</td>
            <td>{{ $ql->ql_gioiTinh == 0 ?'Nữ' :'Nam' }}</td>
            <td>{{ $ql->ql_dienThoai }}</td>
            <td>{{ $ql->ql_email }}</td>
            <td>{{ $ql->ql_ngaySinh }}</td>
            <td>{{ $ql->ql_diaChi }}</td>
            <td>{{ $ql->ql_taoMoi }}</td>
            <td>{{ $ql->ql_capNhat }}</td>
            <td>
                <a href="{{ route('admin.quanly.edit', ['id' => $ql->ql_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.quanly.destroy', ['id' => $ql->ql_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataQuanly->links() }}
@endsection