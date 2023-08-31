<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;

class DatPhongController extends Controller
{
  public function DatPhongTheoDoan(Request $request)
{
    // Lấy dữ liệu đặt phòng từ request
    $dataDichVuDat_Phong_Khach_Hang = $request->all();

    // Lặp qua mảng các phòng và dịch vụ đặt
    foreach ($dataDichVuDat_Phong_Khach_Hang['phong'] as $phongData) {
        if (!empty($phongData['idPhong'])) {
         
            $datphong = new DatPhong();
            $datphong->id_KH = $dataDichVuDat_Phong_Khach_Hang['idKH'];
            $datphong->id_Phong = $phongData['idPhong'];
            $datphong->NgayDat = $dataDichVuDat_Phong_Khach_Hang['NgayDat'];
            $datphong->NgayTra = $dataDichVuDat_Phong_Khach_Hang['NgayTra'];
            $datphong->U_id = $dataDichVuDat_Phong_Khach_Hang['U_id'];
            $datphong->status = $dataDichVuDat_Phong_Khach_Hang['TrangThai'];
            $datphong->Ghichu = $dataDichVuDat_Phong_Khach_Hang['Ghichu'];
            $datphong->TongTien = $dataDichVuDat_Phong_Khach_Hang['tongtien'];
            
            //$datphong->save(); // Lưu thông tin đặt phòng
            
            // Lặp qua các dịch vụ đặt cho phòng này
            foreach ($phongData["dichVuDat"] as $dichVu) {
             
                $datphong->SoLuongSanPham = $dichVu['soLuong'];
                $datphong->id_SP = $dichVu['idsp'];
                $datphong->save(); // Lưu thông tin dịch vụ đặt
            }
        }
    }
    
    return response()->json($request, 200);
}

}
