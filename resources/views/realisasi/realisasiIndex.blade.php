@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="{{ route('realisasi.store') }}" class="btn btn-danger float-right">Import Excel</a> --}}
                        <form action="{{ route('realisasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <button class="btn btn-primary float-right" type="submit">Import</button>
                        </form>
                        <form action="{{ route('realisasi.create') }}" method="GET" enctype="multipart/form-data">
                            @csrf

                            <button class="btn btn-success float-right" type="submit"
                                style="margin-right: 20px">Export</button>
                        </form>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped realisasi_table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No Penembusan</th>
                                    <th scope="col">Nama Produsen</th>
                                    <th scope="col">Distributor</th>
                                    <th scope="col">Kode Distributor</th>
                                    <th scope="col">Kode SO</th>
                                    <th scope="col">Tgl Order</th>
                                    <th scope="col">Total Kuantitas</th>
                                    <th scope="col">Nomor DO</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Tanggal DO</th>
                                    <th scope="col">Dibuat Oleh</th>
                                    <th scope="col">Dibuat Pada</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.realisasi_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('realisasi.index') }}",
                responsive: true,
                columns: [{
                        data: 'no_penembusan',
                        name: 'no_penembusan'
                    },
                    {
                        data: 'nama_produsen',
                        name: 'nama_produsen'
                    },
                    {
                        data: 'distributor',
                        name: 'distributor',
                        searchable: false
                    },
                    {
                        data: 'kode_distributor',
                        name: 'kode_distributor',
                        searchable: false
                    },
                    {
                        data: 'kode_so',
                        name: 'kode_so'
                    },
                    {
                        data: 'tgl_order',
                        name: 'tgl_order'
                    },
                    {
                        data: 'total_kuantitas',
                        name: 'total_kuantitas'
                    },
                    {
                        data: 'nomor_do',
                        name: 'nomor_do'
                    },
                    {
                        data: 'nama_produk',
                        name: 'nama_produk'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'tanggal_do',
                        name: 'tanggal_do'
                    },
                    {
                        data: 'dibuat_oleh',
                        name: 'dibuat_oleh'
                    },
                    {
                        data: 'dibuat_pada',
                        name: 'dibuat_pada'
                    }
                ]
            })
        })
    </script>
@endsection
