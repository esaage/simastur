@extends('layout.back.index')
@section('title', 'Tambah Jalan')
    
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Data Jalan</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="/admin/jalan" method="POST">
        @csrf
      <div class="box-body">
        <div class="form-group">
          <label>Nomor Urut</label>
          <input type="number" class="form-control" placeholder="Masukkan Nomor Urut" required name="nomor_urut">
        </div>
        <div class="form-group">
          <label>Nomor Ruas</label>
          <input type="number" class="form-control" placeholder="Masukkan Nomor Ruas" required name="nomor_ruas">
        </div>
        <div class="form-group">
          <label>Nama Pangkal Ruas</label>
          <input type="text" class="form-control" placeholder="Masukkan Nama Pangkal Ruas" required name="nama_pangkal_ruas">
        </div>
        <div class="form-group">
          <label>Nama Ujung Ruas</label>
          <input type="text" class="form-control" placeholder="Masukkan Nama Ujung Ruas" required name="nama_ujung_ruas">
        </div>
        <div class="form-group">
          <label>Titik Pengenal Pangkal</label>
          <input type="text" class="form-control" placeholder="Masukkan Titik Pengenal Pangkal" required name="titik_pengenal_pangkal">
        </div>
        <div class="form-group">
          <label>Titik Pengenal Ujung</label>
          <input type="text" class="form-control" placeholder="Masukkan Titik Pengenal Ujung" required name="titik_pengenal_ujung">
        </div>
        <div class="form-group">
          <label>Panjang Ruas</label>
          <input type="number" class="form-control" placeholder="Masukkan Titik Pengenal Ujung" required name="panjang_ruas">
        </div>
        <div class="form-group">
          <label>Klasifikasi Ruas</label>
          <input type="number" class="form-control" placeholder="Masukkan Klasifikasi Ruas" required name="klasifikasi_ruas">
        </div>
        <div class="form-group">
          <label>Kode Status Adm</label>
          <input type="number" class="form-control" placeholder="Masukkan Kode Status Adm" required name="kode_status_adm">
        </div>
        <div class="form-group">
          <label>Panjang KM Awal</label>
          <input type="number" class="form-control" placeholder="Masukkan Panjang KM Awal" required name="panjang_km_awal">
        </div>
        <div class="form-group">
          <label>Panjang KM Akhir</label>
          <input type="number" class="form-control" placeholder="Masukkan Panjang KM Akhir" required name="panjang_km_akhir">
        </div>
        <div class="form-group">
          <label>Kecamatan</label>
          <select required name="kecamatan" class="form-control">
              <option disabled selected>-- Pilih Kecamatan --</option>
              @foreach ($kecamatan as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
            <label>Panjang Kerusakan</label>
            <input type="number" class="form-control" placeholder="Masukkan Panjang Kerusakan" required name="panjang_kerusakan">
          </div>
        <div class="form-group">
          <label >Foto Pangkal Jalan</label>
          <input type="file">
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
@endsection