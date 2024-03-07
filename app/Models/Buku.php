<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penerbit;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'kode',
        'kategori',
        'nama_buku',
        'harga',
        'stok',
        'penerbit_id',
    ];

    protected $escapeWhenCastingToString = false; 
    public function penerbit() {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }

    use HasFactory;
}
