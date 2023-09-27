<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow
{
    private $categories;

    // public function __construct()
    // {
    //     $this->categories = Category::pluck('id', 'name');
    // }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'no_penembusan' => $row['no_penembusan'],
            'nama_produsen' => $row['nama_produsen'],
            'distributor' => $row['distributor'],
            'kode_distributor' => $row['kode_distributor'],
            'kode_so' => $row['kode_so'],
            'tgl_order' => $row['tgl_order'],
            'total_kuantitas' => $row['total_kuantitas'],
            'nomor_do' => $row['nomor_do'],
            'nama_produk' => $row['nama_produk'],
            'qty' => $row['qty'],
            'tanggal_do' => $row['tanggal_do'],
            'dibuat_oleh' => $row['dibuat_oleh'],
            'dibuat_pada' => $row['dibuat_pada'],
        ]);
    }
}
