<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardUser extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    protected $table = 'users';

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }
}
