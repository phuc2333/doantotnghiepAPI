<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatPhong extends Model
{
    protected $table = 'datphong'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = [       // Các cột có thể gán dữ liệu
        'id_KH',
        'NgayDat',
        'NgayTra',
        'status',
        'Ghichu',
        'U_id',
        'id_Phong',
        'TongTien',
        'id_SP',
        'SoLuongSanPham',
    ];
}
