<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // short info untuk tampil di dashboard atas
        $jumlah_jalan = Jalan::count();
        // $jumlah_irigasi = Irigasi::count();
        // $jumlah_tps = TPS::count();

        return view('admin.dashboard',compact('jumlah_jalan'));
    }
}
