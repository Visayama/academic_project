<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardProdi extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama'];

    protected $table = 'prodis';

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }


}
