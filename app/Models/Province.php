<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = 'provinces'; // Dòng này chỉ tên bảng liên kết
    protected $primaryKey = 'code'; // Dòng này chỉ định cột code làm khóa chính thay thế cho id mặc định của laravel
    public $incrementing = false; // Dòng này chỉ định khóa chính phải tự độn tăng


    /* Liên kết đến bảng districts để lấy thông tin của quận huyện */
    public function districts()
    {
        return $this->hasMany(District::class, 'province_code', 'code'); // bảng liên kết / khoái ngoại của bảng districts / là khóa chính của bảng provinces
    }
}
