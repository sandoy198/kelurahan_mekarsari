<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = null;
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    public static function getLaporan(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $status = $request->input('status');

        $pengaduanList = Pengaduan::selectRaw('pengaduan.pengaduan_id,pengaduan.nomor_pengaduan,pengaduan.status,pengaduan.detail, pengaduan.nama, pengaduan.created_at');

        // Filter pengaduan berdasarkan tanggal
        ($startDate != NULL && $startDate != '') ? $pengaduanList->where('pengaduan.created_at', '>=', $startDate) : "";
        ($endDate != NULL && $endDate != '') ? $pengaduanList->where('pengaduan.created_at', '<=', $endDate) : "";
        ($status != NULL && $status != '') ? $pengaduanList->whereRaw('LOWER(pengaduan.status) LIKE ?', ["%{$status}%"]) : "";

        // Urutkan pengaduan berdasarkan tanggal
        $pengaduanList = $pengaduanList
            ->orderBy('pengaduan.created_at', 'asc');


        return $pengaduanList->get();
    }
}
