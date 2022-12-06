@extends('backend.layouts.master')

@section('title')
Danh mục Đơn hàng
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
<a href="{{ route('admin.donhang.create') }}" class="btn btn-primary">Thêm mới</a>

<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Ngày giao</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataDonhang as $dh)
        <tr>
            <td>{{ $dh->dh_id }}</td>
            <td>{{ $dh->dh_ma }}</td>
            <td>{{ $dh->dhKhachhang->kh_hoTen }}</td>
            <td>{{ $dh->dh_ngayDatHang }}</td>
            <td>{{ $dh->dh_ngayGiaoHang }}</td>
            <td>{{ $dh->dh_diaChi }}</td>
            <td>{{ $dh->dh_dienThoai }}</td>
            <td>{{ $dh->dh_taoMoi }}</td>
            <td>{{ $dh->dh_capNhat }}</td>
            <td>
                <a href="{{ route('admin.donhang.edit', ['id' => $dh->dh_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.donhang.destroy', ['id' => $dh->dh_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataDonhang->links() }}
@endsection