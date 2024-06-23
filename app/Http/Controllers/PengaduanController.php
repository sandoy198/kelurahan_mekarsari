<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $viewLocation = "content/bo";

    public function index()
    {
        return view( $this->viewLocation . "/pengaduan/index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->viewLocation . "/pengaduan/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        //
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

    public function approveForm (Pengaduan $pengaduan)
    {
        return view($this->viewLocation . "/pengaduan/approveForm", $pengaduan );
    }

    public function approve (Request $request, Pengaduan $pengaduan)  {
        //
    }

    public function rejectForm (Pengaduan $pengaduan){
        return view($this->viewLocation . "/pengaduan/rejectForm", $pengaduan );
    }

    public function reject (Request $request, Pengaduan $pengaduan){

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
