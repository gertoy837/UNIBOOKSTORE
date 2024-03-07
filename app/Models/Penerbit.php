<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;


class Penerbit extends Model
{
    protected $table = 'penerbit';

    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'kota',
        'telepon',
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'penerbit_id', 'id');
    }

    use HasFactory;
}
