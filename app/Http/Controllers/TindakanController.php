<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tindakan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TindakanController extends Controller
{

    public function index()
    {
        return view($this->viewLocationBO . '/tindakan/index');
    }

    public function approveForm($id)
    {
        $pengaduan = Pengaduan::find($id);
        $divisi = new Divisi();
        $alldivisi = $divisi->getDivisionAttribute();

        $data = [
            'pengaduan' => $pengaduan,
            'divisi' => $alldivisi
        ];


        return view($this->viewLocationBO . "/tindakan/approveForm", compact("data"));
    }

    public function approve(Request $request)
    {
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

        $tindakan = Tindakan::where("pengaduan_id", $pengaduan->pengaduan_id)->first();
        $tindakan->detail = $request['detail'];
        $tindakan->save();

        return redirect()
            ->route('pengaduan')
            ->with('success', 'Tindakan telah di Laporkan dan telah selesai ');
    }

    public function rejectForm($id,Pengaduan $pengaduan)
    {
        $pengaduan = Pengaduan::find($id);
        $divisi = new Divisi();
        $alldivisi = $divisi->getDivisionAttribute();

        $data =[
            'pengaduan' => $pengaduan,
            'divisi' => $alldivisi
        ];

        return view($this->viewLocationBO . "/tindakan/rejectForm", compact("data"));
    }

    public function reject(Request $request, Pengaduan $pengaduan)
    {
        $validator = Validator::make($request->all(), [
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $pengaduan = Pengaduan::find($request['pengaduan_id']);
        $pengaduan->status = 'Reject Tindakan';
        $pengaduan->save();
        $user = Auth::user();

        $tindakan = Tindakan::create([
            'pengaduan_id' => $pengaduan->pengaduan_id,
            'user_id' => $user['id'],
            'detail' => $request['detail']
        ]);

        return redirect()
            ->route('pengaduan')
            ->with('success', 'Pelaporan telah di Reject Tindakan ');
    }
}
