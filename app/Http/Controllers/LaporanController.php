<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $pengaduanList = null;

        $user = Auth::user();

        $total = 0;

        if ($request->input('subaction') == 'search') {
            $request->flash();
            $pengaduanList = Laporan::getLaporan($request);
            $total =  count($pengaduanList);
        }
        $data = [
            "pengaduanList" => $pengaduanList,
            "totalData" => $total
        ];

        return view($this->viewLocationBO . "/laporan/index", compact("data"));
    }
}
