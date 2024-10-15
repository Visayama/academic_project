<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardMataKuliah extends Model
{
    use HasFactory;

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester'];

    protected $table = 'matakuliahs';

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }


}
