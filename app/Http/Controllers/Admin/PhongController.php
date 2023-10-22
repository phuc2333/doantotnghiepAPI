<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function LayDanhSachDichVu()
    {
        $DataDichVu = DB::table('sanpham')->select('sanpham.id as id','sanpham.TenSanPham as name','sanpham.DonGia as price')->get();
        return response()->json($DataDichVu);
    }

    public function RoomAll()
    {
        $data = [];
        $newData = [];
        $data = DB::table('Tang')->select('TenTang', 'tenphong','TrangThai')
        ->join('phong', 'Tang.id', '=', 'phong.idTang')
        ->get();
        foreach ($data as $item) {
            $tangName = $item->TenTang;
            $phongName = $item->tenphong;
            $trangThai = $item->TrangThai;
        
            // Kiểm tra xem đã có tầng này trong mảng $newData chưa
            $tangExists = false;
            foreach ($newData as &$newItem) {
                if ($newItem['name'] === $tangName) {
                    $tangExists = true;
                    $newItem['phongs'][] = [
                        'name' => $phongName,
                        'price' => '12000', // Bạn có thể thay đổi giá theo logic của bạn
                        'status' => $trangThai,
                    ];
                    break;
                }
            }
        
            // Nếu tầng chưa tồn tại, thêm nó vào mảng $newData
            if (!$tangExists) {
                $newData[] = [
                    'name' => $tangName,
                    'phongs' => [
                        [
                            'name' => $phongName,
                            'price' => '12000', // Bạn có thể thay đổi giá theo logic của bạn
                            'status' => $trangThai,
                        ],
                    ],
                ];
            }
        }
        return response()->json($newData);
    }
}
