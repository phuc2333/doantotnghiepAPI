<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;

class DatPhongController extends Controller
{
    public function DatPhongTheoDoan(Request $request)
    {
        $dataDichVuDat_Phong_Khach_Hang = $request->all();
        $dataDatPhongTheoDoan = $dataDichVuDat_Phong_Khach_Hang['_value'];
    
        $id_KH = $dataDatPhongTheoDoan['idKH'];
        $NgayDat = $dataDatPhongTheoDoan['NgayDat'];
        $NgayTra = $dataDatPhongTheoDoan['NgayTra'];
        $status = $dataDatPhongTheoDoan['TrangThai'];
        $Ghichu = $dataDatPhongTheoDoan['Ghichu'];
        $U_id = 2;
        $TongTien = $dataDatPhongTheoDoan['tongtien'];
    
        // Truy cập và lặp qua tất cả các phần tử trong mảng "phong"
    
        foreach ($dataDatPhongTheoDoan['phong'] as $phongItem) {
            // Kiểm tra xem key 'idPhong' có tồn tại trong phần tử hiện tại hay không
            if (array_key_exists('idPhong', $phongItem)) {
                // Tạo một biến mới để tính tổng số lượng sản phẩm cho phòng hiện tại
                $tongsoluongsanpham = 0;
    
                // Kiểm tra xem mảng "dichVuDat" của từng phòng có dữ liệu hay không
                if (isset($phongItem["dichVuDat"]) && !empty($phongItem["dichVuDat"])) {
                    // Lặp qua các dịch vụ đặt cho phòng và lưu thông tin
                    foreach ($phongItem["dichVuDat"] as $dichVu) {
                        $datphong = new DatPhong();
                        $id_Phong = $phongItem['idPhong'];
                        $datphong->id_KH = $id_KH;
                        $datphong->NgayDat = $NgayDat;
                        $datphong->NgayTra = $NgayTra;
                        $datphong->status = $status;
                        $datphong->Ghichu = $Ghichu;
                        $datphong->U_id = $U_id;
                        $datphong->id_Phong = $id_Phong;
                        $datphong->TongTien = $TongTien;
                        $datphong->id_SP = $dichVu['idsp'];
                        $tongsoluongsanpham += $dichVu['soLuong'];
                        $datphong->SoLuongSanPham = $tongsoluongsanpham;
                        $datphong->save();
                    }
                } else {
                    // Xử lý trường hợp không có dịch vụ cho phòng này, chỉ lưu thông tin phòng
                    $datphong = new DatPhong();
                    $datphong->id_KH = $id_KH;
                    $datphong->NgayDat = $NgayDat;
                    $datphong->NgayTra = $NgayTra;
                    $datphong->status = $status;
                    $datphong->Ghichu = $Ghichu;
                    $datphong->U_id = $U_id;
                    $id_Phong = $phongItem['idPhong'];
                    $datphong->id_Phong = $id_Phong;
                    $datphong->TongTien = $TongTien;
                    $datphong->SoLuongSanPham = 0; // Không có dịch vụ, nên số lượng sản phẩm là 0
                    $datphong->save();
                }
            }
        }
    
        return response()->json([
            'message' => 'Dữ liệu đã được lưu thành công cho các lần đặt phòng',
        ], 200);
    }
    
}
