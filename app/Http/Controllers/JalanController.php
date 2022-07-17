<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class JalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jalan::all();   
        return view('admin.jalan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.jalan.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 
            Validation
        */
        $rules = [
            'username'=>'required',
            'password'=>'required',
        ];

        $messages = [
            'username.required'=>'Username harus diisi',
            'password.required'=>'Password harus diisi',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if( $validator->fails() ) {
            return back()->withErrors($validator)->withInput($request->all());
        }

        Jalan::create($request->all());

        return redirect('/admin/jalan')->with('success', 'Data Jalan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jalan::find($id);
        if( !$data ) return back()->with('error', 'Data jalan tidak ditemukan');
        // dd($data->struktur[0]->panjang);
        return view('admin.jalan.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jalan::find($id);
        if( !$data ) return back()->with('error', 'Data jalan tidak ditemukan');

        $kecamatan = Kecamatan::all();
        
        return view('admin.jalan.edit',compact('data','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* 
            Validation
        */
        $rules = [
            'username'=>'required',
            'password'=>'required',
        ];

        $messages = [
            'username.required'=>'Username harus diisi',
            'password.required'=>'Password harus diisi',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if( $validator->fails() ) {
            return back()->withErrors($validator)->withInput($request->all());
        }

        $data = Jalan::find($id);
        if( !$data ) return back()->with('error', 'Data jalan tidak ditemukan');
        
        $data->update($request->all());

        return redirect('/admin/jalan')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jalan::find($id);
        if( !$data ) return back()->with('error', 'Data jalan tidak ditemukan');

        $data->delete();

        return redirect('/admin/jalan')->with('success', 'Data berhasil dihapus');
    }

    /* 
        Additional function
    */
    // get data jalan by id saat layer diklik
    public function data_jalan($id)
    {
        $data = Jalan::where('id', $id)->first();

        return response()->json($data);
    }
}
