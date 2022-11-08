<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliah;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';

    protected $fillable = [
        'kd_matkul', 'nim'
    ];

    public function mata_kuliah()
    {
        return $this->hasOne(MataKuliah::class, 'kd_matkul', 'kd_matkul');
    }
}
