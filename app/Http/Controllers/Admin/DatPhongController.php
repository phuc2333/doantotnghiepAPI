<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;

class DatPhongController extends Controller
{
    public function DatPhongTheoDoan(Request $request)
    {
        $datphong = new DatPhong();
        $datphong->id_KH = $request->idKH;
        $datphong->id_Phong = $request->idPhong;
        $datphong->NgayDat = $request->NgayDat;
        $datphong->NgayTra = $request->NgayTra;
        $datphong->U_id = $request->U_id;
        $datphong->id_SP = $request->idsp;
        $datphong->status = $request->input('email');
        $datphong->TongTien = $request->input('email');
        $datphong->SoLuongSanPham = $request->input('email');
       // $datphong->save();
        return response()->json($request->dichVuDat, 200);
    }
}
