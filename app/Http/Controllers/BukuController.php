<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public $buku;
    public function __construct()
    {
        $this->buku = new Buku();
    }
    public function index()
    {
        $data = Buku::with('penerbit')->get();
        return view('dashboard/buku/index', compact('data'));
    }

    public function create()
    {
        $data = Penerbit::all();
        return view('dashboard/buku/create', compact('data'));
    }

    public function store(Request $request)
    {
        
        $this->buku->kode = $request->kode;
        $this->buku->kategori = $request->kategori;
        $this->buku->nama_buku = $request->nama_buku;
        $this->buku->harga = $request->harga;
        $this->buku->stok = $request->stok;
        $this->buku->penerbit_id = $request->penerbit_id;

        $this->buku->save();

        return redirect()->route('buku');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        return view('dashboard/buku/edit', compact('buku', 'penerbit'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->kode = $request->kode;
        $buku->kategori = $request->kategori;
        $buku->nama_buku = $request->nama_buku;
        $buku->harga = $request->harga;
        $buku->stok = $request->stok;
        $buku->penerbit_id = $request->penerbit_id;
        if ($buku->isDirty()) {
            $buku->save();
            return redirect()->route('buku');
        } else {
            return redirect()->route('buku');
        }
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return back();
    }
}
