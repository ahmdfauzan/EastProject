<?php

namespace App\Http\Controllers;

use App\Exports\RealisasiExport;
use App\Imports\RealisasiImport;
use App\Models\Realisasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class RealisasiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {

            $realisasi = Realisasi::all();

            return DataTables::of($realisasi)
                ->make(true);
        }
        // return view('realisasi.realisasiIndex');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Excel::download(new RealisasiExport, 'realisasi.xls');
    }

    public function realisasiExport()
    {
        return Excel::download(new RealisasiExport, 'realisasi.xls');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
        $data = $guzzleClient->request('GET', 'https://gowcm.pupuk-indonesia.com/api/monitoringdo/download?number=&sales_org_name=&customer_name=bumi+rosan&customer_id=&code_so=&order_date=2023-05-01%3B2023-05-31&delivery_qty=&no_doc=&realisasi_name=npk&delivery_date=&created_by=&created_at=', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('GET_TOKEN'),
            ],
            // 'verify' => 'https://curl.se/ca/cacert.pem',
            'sink' => storage_path('realisasi.xls')
        ]);

        Excel::import(new RealisasiImport, storage_path('realisasi.xls'));
        return view('realisasi.realisasiIndex')->with('success', 'Monitoring DO berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Realisasi $realisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Realisasi $realisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Realisasi $realisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realisasi $realisasi)
    {
        //
    }
}
