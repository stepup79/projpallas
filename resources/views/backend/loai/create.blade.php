@extends('backend.layouts.master')

@section('title')
Danh mục Loại sản phẩm
@endsection

@section('content')

<form name="frmCreate" id="frmCreate" method="POST" action="{{ route('admin.loai.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Tên loại</label>
        <input type="text" class="form-control" name="l_ten" id="l_ten" value="{{ old('l_ten') }}">
    </div>
    <div class="form-group">
        <label for="l_trangThai">Trạng thái</label>
        <select class="form-control" name="l_trangThai" id="l_trangThai">
            <option value="1" {{ old('l_trangThai') == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('l_trangThai') == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.loai.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection