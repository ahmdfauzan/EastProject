<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    // use HasFactory;
    protected $table = "realisasi";
    protected $primaryKey = "id";
    protected $fillable = [
        'no_penembusan',
        'nama_produsen',
        'distributor',
        'kode_distributor',
        'kode_so',
        'tgl_order',
        'total_kuantitas',
        'nomor_do',
        'nama_produk',
        'qty',
        'tanggal_do',
        'dibuat_oleh',
        'dibuat_pada',
    ];
}
