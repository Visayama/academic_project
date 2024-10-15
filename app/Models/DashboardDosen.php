<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardDosen extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nama', 'no_telp', 'email', 'prodi_id', 'alamat'];

    protected $table = 'dosens';

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }
}
