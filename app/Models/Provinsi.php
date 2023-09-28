<?php

namespace App\Models;

use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = "provinsi";
    protected $primaryKey = "id";
    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }
}
