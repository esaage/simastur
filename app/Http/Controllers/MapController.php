<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        // Data lokasi untuk ditampilkan pada layer group untuk pencarian layer dan menampilkan detail layer pada pop up
        $jalan = Jalan::select('id','nama_ujung_ruas')->get();
        // $irigasi = Irigiasi::select('id','nama')->get();
        // $tpss = TPS::select('id','nama')->get();
        return view('map', compact('jalan'));
    }
}
