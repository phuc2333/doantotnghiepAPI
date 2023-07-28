<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMucCongTy;
use Illuminate\Http\Request;

class DanhMucCongTyController extends Controller
{
    public function index()
    {
        $DanhMucCongTys = DanhMucCongTy::all();
        return response()->json($DanhMucCongTys);
    }

    public function show($id)
    {
        $DanhMucCongTy = DanhMucCongTy::find($id);
        if($DanhMucCongTy == null) {
            return response()->json(['message' => 'DanhMucCongTy not found'], 404);
        }
        return response()->json($DanhMucCongTy);
    }

    public function store(Request $request)
    {
        $DanhMucCongTy = new DanhMucCongTy();
        $DanhMucCongTy->tenCty = $request->input('name');
        $DanhMucCongTy->dienthoai = $request->input('phone');
        $DanhMucCongTy->fax = $request->input('fax');
        $DanhMucCongTy->diachi = $request->input('address');
        $DanhMucCongTy->email = $request->input('email');
        $DanhMucCongTy->save();
        return response()->json($DanhMucCongTy, 201);
    }

    public function update(Request $request, $id)
    {
        $DanhMucCongTy = DanhMucCongTy::find($id);
        if($DanhMucCongTy == null) {
            return response()->json(['message' => 'DanhMucCongTy not found'], 404);
        }
        $DanhMucCongTy->tenCty = $request->input('name');
        $DanhMucCongTy->dienthoai = $request->input('phone');
        $DanhMucCongTy->fax = $request->input('fax');
        $DanhMucCongTy->diachi = $request->input('address');
        $DanhMucCongTy->email = $request->input('email');
        $DanhMucCongTy->save();
        return response()->json($DanhMucCongTy);
    }

    public function destroy($id)
    {
        $DanhMucCongTy = DanhMucCongTy::find($id);
        if($DanhMucCongTy == null) {
            return response()->json(['message' => 'DanhMucCongTy not found'], 404);
        }
        $DanhMucCongTy->delete();
        return response()->json(['message' => 'DanhMucCongTy deleted']);
    }
}
