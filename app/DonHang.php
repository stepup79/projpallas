<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    const     CREATED_AT    = 'dh_taoMoi';
    const     UPDATED_AT    = 'dh_capNhat';

    protected $table        = 'donhang';
    protected $fillable     = ['dh_ma', 'kh_id', 'dh_ngayDatHang', 'dh_diaChi', 'dh_dienThoai', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat', 'dh_trangThai'];
    protected $guarded      = ['dh_id'];

    protected $primaryKey   = 'dh_id';

    protected $dates        = ['dh_ngayDatHang', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function dhKhachhang () {
        return $this->belongsTo('App\KhachHang', 'kh_id', 'kh_id');
    }
}
