@extends('layout.back.index')
@section('title', 'Master Data Jalan')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
            
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Jalan</h3>
                  <a href="/admin/jalan/create" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nomor Ruas</th>
                      <th>Nama Ruas</th>
                      <th>Panjang & Lebar Ruas</th>
                      <th>Kecamatan</th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)    
                        <tr>
                          <td>
                            <a href="/admin/jalan/{{ $item->id }}" style="text-decoration: underline">
                              {{ $item->nomor_ruas }}
                            </a>
                          </td>
                          <td>{{ $item->nama_ruas }}</td>
                          <td> Panjang {{ $item->panjang_ruas }} Km, Lebar {{ $item->lebar_ruas }} Km</td>
                          <td>{{ $item->kecamatan->nama }}</td>
                          <td>
                            <div class="row justify-content-center">
                              <div class="col-md-2">
                                <a href="/admin/jalan/{{ $item->id }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                              </div>
                              <div class="col-md-2">
                                <a href="/admin/jalan/{{ $item->id }}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              </div>
                              <div class="col-md-2">
                                <form action="/admin/jalan/{{ $item->id }}" method="post">
                                  @csrf
                                  <input type="hidden" name="_method" value="delete">
                                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data?')"><i class="fa fa-trash"></i></button>
                                </form>
                              </div>
                            </div>
                        
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

        </div>
    </div>
@endsection

@section('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="/assets/layout/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('js')
    <!-- DataTables -->
<script src="/assets/layout/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/layout/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#table1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection