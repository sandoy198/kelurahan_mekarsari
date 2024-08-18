<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pengaduan;
use App\Models\Tindakan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $pengaduanList = null;

        $user = Auth::user();
        // dd($user);
        if($user['role_id'] == 0){

        }
        $pengaduanList = Pengaduan::paginate(10);

        $data = [
            "pengaduanList" => $pengaduanList
        ];

        return view($this->viewLocationBO . "/pengaduan/index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->viewLocationBO . "/pengaduan/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:16|min:16',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'detail' => 'required|string|max:255',
            'foto' => 'required|mimes:jpg,bmp,png'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        if ($request['foto']) {
            $file = $request['foto'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('images/pengaduan', $filename, 'public');
        }

        $pengaduan = Pengaduan::create([
            'nama' => $request['nama'],
            'no_ktp' => $request['no_ktp'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'detail' => $request['detail'],
            'foto_nama' => $file->getClientOriginalName(),
            'foto_nama_store' =>  $filename,
            'status' => 'Pending'
        ]);

        $nomorPengaduan = $this->generateNomorPengaduan($pengaduan->pengaduan_id);

        $pengaduan->update(['nomor_pengaduan' => $nomorPengaduan]);

        return redirect()
            ->route('indexMasyarakat')
            ->with('success', 'Catat Nomor Pengaduan nya untuk periksa pengaduan, Nomor Pengaduan : ' . $nomorPengaduan . ' ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pengaduan $pengaduan)
    {

        $pengaduan = null;
        if ($request['nomorPengaduan'] != '') {
            $pengaduan = Pengaduan::where('nomor_pengaduan', $request['nomorPengaduan'])->first();
        }

        $data = [
            "pengaduan" => $pengaduan
        ];

        // dd($pengaduan);

        return view($this->viewLocationBO . "/pengaduan/show", compact("data"));
    }

    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    public function approveForm($id,Request $request)
    {
        $pengaduan = Pengaduan::find($id);
        $divisi = new Divisi();
        $alldivisi = $divisi->getDivisionAttribute();

        $data =[
            'pengaduan' => $pengaduan,
            'divisi' => $alldivisi
        ];


        return view($this->viewLocationBO . "/pengaduan/approveForm", compact("data"));
    }

    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pengaduan_id' => 'required',
            'divisi' => 'required',
            'users' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $pengaduan = Pengaduan::find($request['pengaduan_id']);
        $pengaduan->status = 'Proses';
        $pengaduan->save();

        $tindakan = Tindakan::create([
            'pengaduan_id' => $pengaduan->pengaduan_id,
            'user_id' => $request['users']
        ]);

        return redirect()
            ->route('pengaduan')
            ->with('success', 'Pelaporan telah di Approve dan Assign ');
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

        return view($this->viewLocationBO . "/pengaduan/rejectForm", compact("data"));

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
        $pengaduan->status = 'Reject';
        $pengaduan->save();

        $tindakan = Tindakan::create([
            'pengaduan_id' => $pengaduan->pengaduan_id,
            'user_id' => $request['users']
        ]);

        return redirect()
            ->route('pengaduan')
            ->with('success', 'Pelaporan telah di Reject ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }

    public function generateNomorPengaduan($id)
    {
        $date = date('Ymd'); // Mengambil tanggal dalam format YYYYMMDD
        return 'P' . $date . '-' . str_pad($id, 6, '0', STR_PAD_LEFT);
    }

    public function downloadImage($pengaduan_id)
    {
        $pengaduan = Pengaduan::find($pengaduan_id);

        $filePath = 'images/pengaduan/' . $pengaduan['foto_nama_store'];
        if (Storage::disk('public')->exists($filePath)) {
            $path = Storage::disk('public')->path($filePath);
            return response()->download($path, $pengaduan['foto_nama']);
        }

        return redirect()->back()->with('error', 'File not found.');
    }
    /**
     * Display the specified resource.
     */
    public function detail($pengaduan_id)
    {

        $pengaduan = Pengaduan::find($pengaduan_id);
        $tindakan = $pengaduan->tindakan;
        foreach ($tindakan as $t){

            $divisi = new Divisi();
            $divisiName = $divisi->getDivisionAttribute($t->user->divisi);
            $t['divisiName'] = $divisiName;
       }

        $data = [
            "pengaduan" => $pengaduan,
            "tindakan" => $tindakan,
        ];

        return view($this->viewLocationBO . "/pengaduan/detail", compact("data"));
    }
}
