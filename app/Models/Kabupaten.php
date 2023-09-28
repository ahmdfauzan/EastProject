<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = "kabupaten";
    protected $primaryKey = "id";

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }
}
