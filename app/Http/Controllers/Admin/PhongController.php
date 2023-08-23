<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhongController extends Controller
{
    public function LayDanhSachPhongTrong()
    {
        // data eloquent
        $DataRoomEmpty = DB::table('phong')
        ->join('loaiphong', 'phong.idLoaiPhong', '=', 'loaiphong.id')
        ->select('phong.id', 'phong.TenPhong as name', 'loaiphong.DonGia as price', 'phong.TrangThai as status')
        ->where('phong.TrangThai', 'like', 'Đang trong')
        ->get();
        return response()->json($DataRoomEmpty);
    }
}
