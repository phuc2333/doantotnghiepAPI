<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;

class DatPhongController extends Controller
{
    public function DatPhongTheoDoan(Request $request)
    {
        // xu ly lay du lieu danh sach dich vu dat
        $dataDichVuDat_Phong_Khach_Hang = $request;
        foreach ($dataDichVuDat_Phong_Khach_Hang["phong"] as $phong) {
            foreach ($phong["dichVuDat"] as $dichVu) {
                $datphong = new DatPhong();
                $datphong->id_KH = $request->idKH;
                $datphong->id_Phong = $phong['idPhong'];
                $datphong->NgayDat = $request->NgayDat;
                $datphong->NgayTra = $request->NgayTra;
                $datphong->U_id = $request->U_id;
                $datphong->status = $request->TrangThai;
                $datphong->Ghichu = $request->Ghichu;
                $datphong->TongTien = $phong['tongtien'];
                $datphong->SoLuongSanPham = $dichVu['soLuong'];
                $datphong->id_SP = $dichVu['idsp'];
                $datphong->save();
            }
        }
        return response()->json($request, 200);
    }
}
