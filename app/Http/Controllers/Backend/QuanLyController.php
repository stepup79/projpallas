<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuanLy;
use Carbon\Carbon;
use Storage;
use Session;

class QuanLyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataQuanly = QuanLy::paginate(5);
            return view('backend.quanly.index')
                ->with('dataQuanly', $dataQuanly);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quanly.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quanly = new QuanLy();
        $quanly->ql_taiKhoan = $request->ql_taiKhoan;
        $quanly->ql_matKhau = $request->ql_matKhau;
        $quanly->ql_hoTen = $request->ql_hoTen;
        $quanly->ql_ngaySinh = $request->ql_ngaySinh;
        $quanly->ql_gioiTinh = $request->ql_gioiTinh;
        $quanly->ql_dienThoai = $request->ql_dienThoai;
        $quanly->ql_email = $request->ql_email;
        $quanly->ql_diaChi = $request->ql_diaChi;
        $quanly->ql_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $quanly->ql_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $quanly->ql_trangThai = $request->ql_trangThai;
        $quanly->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect()->route('admin.quanly.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quanly = QuanLy::find($id);

        return view('backend.quanly.edit')
            ->with('quanly', $quanly);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quanly = QuanLy::find($id);
        $quanly->ql_taiKhoan = $request->ql_taiKhoan;
        $quanly->ql_matKhau = $request->ql_matKhau;
        $quanly->ql_hoTen = $request->ql_hoTen;
        $quanly->ql_ngaySinh = $request->ql_ngaySinh;
        $quanly->ql_gioiTinh = $request->ql_gioiTinh;
        $quanly->ql_dienThoai = $request->ql_dienThoai;
        $quanly->ql_email = $request->ql_email;
        $quanly->ql_diaChi = $request->ql_diaChi;
        $quanly->ql_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $quanly->ql_trangThai = $request->ql_trangThai;
        $quanly->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.quanly.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quanly = QuanLy::find($id);

        $quanly->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.quanly.index');
    }
}
