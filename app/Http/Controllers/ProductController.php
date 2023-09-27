<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {

            $products = Product::all();

            return DataTables::of($products)
                ->make(true);
        }
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.import-excel');
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
        $data = $guzzleClient->request('GET', 'https://gowcm.pupuk-indonesia.com/api/monitoringdo/download?number=&sales_org_name=&customer_name=bumi+rosan&customer_id=&code_so=&order_date=2023-05-01%3B2023-05-31&delivery_qty=&no_doc=&product_name=npk&delivery_date=&created_by=&created_at=', [
            'headers' => [
                'Authorization' => 'Bearer ' . "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2dvd2NtLnB1cHVrLWluZG9uZXNpYS5jb20vYXBpL2xvZ2luIiwiaWF0IjoxNjk1NjI1NDIyLCJleHAiOjE2OTU3MTE4MjIsIm5iZiI6MTY5NTYyNTQyMiwianRpIjoiS0trdEcxUlRhQVR4SzhvZyIsInN1YiI6IkEwNDczQUZBLTcyQ0EtNEVCNC1CRDQyLTQ0RDIwOTZCQzFEMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.C770Z7eszthPW6ILnesOwBRTb3rAZOw8EDrAGdceXuA",
            ],
            // 'verify' => 'https://curl.se/ca/cacert.pem',
            'sink' => storage_path('monitoring_do.xls')
        ]);

        Excel::import(new ProductsImport, storage_path('monitoring_do.xls'));

        return redirect()->route('products.index')->with('success', 'Monitoring DO berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
