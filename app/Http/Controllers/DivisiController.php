<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userList = User::where('divisi', $request['divisi'])->get();
        return response()->json($userList);
    }
}
