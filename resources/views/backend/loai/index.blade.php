@extends('backend.layouts.master')

@section('title')
Danh mục Loại sản phẩm
@endsection

@section('content')
<!-- Đây là div hiển thị Kết quả (thành công, thất bại) sau khi thực hiện các chức năng Thêm, Sửa, Xóa.
- Div này chỉ hiển thị khi trong Session có các key `alert-*` từ Controller trả về. 
- Sử dụng các class của Bootstrap "danger", "warning", "success", "info" để hiển thị màu cho đúng với trạng thái kết quả.
-->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<!-- Tạo nút thêm mới -->
<a href="{{ route('admin.loai.create') }}" class="btn btn-primary">Thêm mới</a>

<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tên loại</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataLoai as $loai)
        <tr>
            <td>{{ $loai->l_id }}</td>
            <td>{{ $loai->l_ten }}</td>
            <td>{{ $loai->l_taoMoi }}</td>
            <td>{{ $loai->l_capNhat }}</td>
            <td>
                <a href="{{ route('admin.loai.edit', ['id' => $loai->l_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.loai.destroy', ['id' => $loai->l_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataLoai->links() }}
@endsection