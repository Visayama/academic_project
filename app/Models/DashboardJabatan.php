<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardJabatan extends Model
{
    use HasFactory;

    protected $fillable = ['kode_jabatan', 'nama_jabatan'];

    protected $table = 'jabatanss';

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }


}
