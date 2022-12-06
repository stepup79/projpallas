<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\Loai;
use App\KhachHang;
use App\DonHang;
use App\ChiTietDonHang;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\ContactMailer;
use App\Mail\OrderMailer;

class FrontendController extends Controller
{
    /**
     * Action hiển thị view Trang chủ
     * GET /
     */
    public function index(Request $request)
    {
        // Query top 3 sản phẩm mới nhất
        $ds_top3_newest_sanpham = DB::table('sanpham')
            ->orderBy('sp_capNhat')->take(3)->get();

        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
            ->whereIn('sp_id', $danhsachsanpham->pluck('sp_id')->toArray())
            ->get();

        // Query danh sách Loại
        $danhsachloai = Loai::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.index')
            ->with('ds_top3_newest_sanpham', $ds_top3_newest_sanpham)
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }
    /**
     * Hàm query danh sách sản phẩm theo nhiều điều kiện
     */
    private function searchSanPham(Request $request)
    {
        $query = DB::table('sanpham')->select('*');
        // Kiểm tra điều kiện `searchByLoaiId`
        $searchByLoaiId = $request->query('searchByLoaiId');
        if ($searchByLoaiId != null) {
        }

        $data = $query->get();
        return $data;
    }

    /**
     * Action hiển thị view Giới thiệu
     * GET /about
     */
    public function about()
    {
        return view('frontend.pages.about');
    }

    /**
     * Action hiển thị view Chính sách
     * GET /policy
     */
    public function policy()
    {
        return view('frontend.pages.policy');
    }

    /**
     * Action hiển thị view Hướng dẫn đặt hoa & thanh toán
     * GET /tutorial
     */
    public function tutorial()
    {
        return view('frontend.pages.tutorial');
    }

    /** * Action hiển thị view Liên hệ * GET /contact */ 
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /** 
     * Action gởi email với các lời nhắn nhận được từ khách hàng 
     * POST /lien-he/gui-loi-nhan 
     */ 
    public function sendMailContactForm(Request $request)
    {
        $input = $request->all();
        Mail::to('thaiduy6995@gmail.com')->send(new ContactMailer($input));
        return $input;
    }

    /**
     * Action hiển thị danh sách Sản phẩm
     */
    public function product(Request $request)
    {
        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->whereIn('sp_id', $danhsachsanpham->pluck('sp_id')->toArray())
                                ->get();
                                
        // Query danh sách Loại
        $danhsachloai = Loai::all();

        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.pages.product')
            ->with('danhsachsanpham', $danhsachsanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }

    /**
     * Action hiển thị chi tiết Sản phẩm
     */
    public function productDetail(Request $request, $id)
    {
        $sanpham = SanPham::find($id);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
                                ->where('sp_id', $id)
                                ->get();

        // Query danh sách Loại
        $danhsachloai = Loai::all();

        return view('frontend.pages.product-detail')
            ->with('sp', $sanpham)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai);
    }

    /**
     * Action hiển thị giỏ hàng
     */
    public function cart(Request $request)
    {
        return view('frontend.pages.shopping-cart');
    }

    /**
     * Action Đặt hàng
     */
    public function order(Request $request)
    {
        // dd($request);
        // Data gởi mail
        $dataMail = [];
        try {
            // Tạo mới khách hàng
            $khachhang = new KhachHang();
            $khachhang->kh_taiKhoan = $request->khachhang['kh_taiKhoan'];
            $khachhang->kh_matKhau = bcrypt('123456');
            $khachhang->kh_hoTen = $request->khachhang['kh_hoTen'];
            $khachhang->kh_gioiTinh = $request->khachhang['kh_gioiTinh'];
            $khachhang->kh_email = $request->khachhang['kh_email'];
            $khachhang->kh_ngaySinh = $request->khachhang['kh_ngaySinh'];
            if(!empty($request->khachhang['kh_diaChi'])) {
                $khachhang->kh_diaChi = $request->khachhang['kh_diaChi'];
            }
            if(!empty($request->khachhang['kh_dienThoai'])) {
                $khachhang->kh_dienThoai = $request->khachhang['kh_dienThoai'];
            }
            $khachhang->kh_trangThai = 2; // Khả dụng
            $khachhang->save();
            $dataMail['khachhang'] = $khachhang->toArray();

            // Tạo mới đơn hàng
            $donhang = new DonHang();
            $donhang->dh_ma = $khachhang->kh_taiKhoan;
            $donhang->kh_id = $khachhang->kh_id;
            $donhang->dh_ngayDatHang = Carbon::now('Asia/Ho_Chi_Minh');
            $donhang->dh_ngayGiaoHang = $request->donhang['dh_ngayGiaoHang'];
            $donhang->dh_diaChi = $request->donhang['dh_diaChi'];
            $donhang->dh_dienThoai = $request->donhang['dh_dienThoai'];
            $donhang->dh_trangThai = 1; //Nhận đơn
            $donhang->save();
            $dataMail['donhang'] = $donhang->toArray();

            // Lưu chi tiết đơn hàng
            foreach($request->giohang['items'] as $sp)
            {
                $chitietdonhang = new ChiTietDonHang();
                $chitietdonhang->dh_id = $donhang->dh_id;
                $chitietdonhang->sp_id = $sp['_id'];
                $chitietdonhang->ctdh_soLuong = $sp['_quantity'];
                $chitietdonhang->ctdh_donGia = $sp['_price'];
                $chitietdonhang->save();
                $dataMail['donhang']['chitiet'][] = $chitietdonhang->toArray();
                $dataMail['donhang']['giohang'][] = $sp;
            }

            // Gởi mail khách hàng
            // dd($dataMail);
            Mail::to($khachhang->kh_email)
                ->send(new OrderMailer($dataMail));
        }
        catch(ValidationException $e) {
            return response()->json(array(
                'code'  => 500,
                'message' => $e,
                'redirectUrl' => route('frontend.home')
            ));
        } 
        catch(Exception $e) {
            throw $e;
        }

        return response()->json(array(
            'code'  => 200,
            'message' => 'Tạo đơn hàng thành công!',
            'redirectUrl' => route('frontend.orderFinish')
        ));
    }

    /**
     * Action Hoàn tất Đặt hàng
     */
    public function orderFinish()
    {
        return view('frontend.pages.order-finish');
    }

    /**
     * Action thống kê
     */
    public function thongke() {
        // Hiển thị view Thống kê
        return view('frontend.pages.thongke');
    }

}
