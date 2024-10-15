<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashoboardMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nim', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'email', 'prodi_id', 'alamat'];

    protected $table = 'mahasiwas';

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }
}
