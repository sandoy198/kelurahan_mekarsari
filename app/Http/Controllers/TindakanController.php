<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tindakan;
use Illuminate\Support\Facades\Validator;

class TindakanController extends Controller
{

public function index()
{
    return view($this->viewLocationBO .'/tindakan/index');
}

public function approveForm ($id)
{
    $pengaduan = Pengaduan::find($id);
    $divisi = new Divisi();
    $alldivisi = $divisi->getDivisionAttribute();

    $data =[
        'pengaduan' => $pengaduan,
        'divisi' => $alldivisi
    ];


    return view($this->viewLocationBO . "/tindakan/approveForm", compact("data") );
}

public function approve (Request $request)  {
    $validator = Validator::make($request->all(), [
        'detail' => 'required',
    ]);

    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    $pengaduan = Pengaduan::find($request['pengaduan_id']);
    $pengaduan->status = 'Selesai';
    $pengaduan->save();

    $tindakan = Tindakan::where("pengaduan_id",$pengaduan->pengaduan_id)->first();
    $tindakan->detail = $request['detail'];
    $tindakan->save();

    return redirect()
        ->route('pengaduan')
        ->with('success', 'Tindakan telah di Laporkan dan telah selesai ');
}

public function rejectForm (Pengaduan $pengaduan){
    return view($this->viewLocationBO . "/tindakan/rejectForm", $pengaduan );
}

public function reject (Request $request, Pengaduan $pengaduan){

}}
