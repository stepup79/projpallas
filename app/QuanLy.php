<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class QuanLy extends Model implements AuthenticatableContract
{
    const     CREATED_AT    = 'ql_taoMoi';
    const     UPDATED_AT    = 'ql_capNhat';

    protected $table        = 'quanly';
    protected $fillable     = ['ql_taiKhoan', 'ql_matKhau', 'ql_hoTen', 'ql_gioiTinh', 'ql_email', 'ql_ngaySinh', 'ql_diaChi', 'ql_dienThoai', 'ql_taoMoi', 'ql_capNhat', 'ql_trangThai'];
    protected $guarded      = ['ql_id'];

    protected $primaryKey   = 'ql_id';

    protected $dates        = ['ql_ngaySinh', 'ql_taoMoi', 'ql_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    /**
     * Tên cột 'Ghi nhớ đăng nhập'
     * The column name of the "remember me" token.
     *
     * @var string
     */
    protected $rememberTokenName = 'ql_ghinhodangnhap';
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }
    /**
     * Hàm trả về tên cột dùng để tim `Mật khẩu`
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->ql_matKhau;
    }
    /**
     * Hàm dùng để trả về giá trị của cột "ql_ghinhodangnhap" session.
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }
    /**
     * Hàm dùng để set giá trị cho cột "ql_ghinhodangnhap" session.
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }
    /**
     * Hàm trả về tên cột dùng để chứa REMEMBER TOKEN
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['ql_matKhau'] = $value;
    }
}
