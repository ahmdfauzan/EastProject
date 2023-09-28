<?php

namespace App\Exports;

use App\Models\Realisasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class RealisasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Realisasi::all();
    }
}
