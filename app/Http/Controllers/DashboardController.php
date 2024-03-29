<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use App\Models\Penerbit;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->get('search');
        $data = Buku::with('penerbit')
            ->where('nama_buku', 'LIKE', "%$cari%")
            ->Paginate(5);
        $no = 5 * ($data->currentPage() - 1);
        return view('dashboard', compact('data', 'no', 'cari'));
    }

    public function index1(Request $request)
    {
        $cari = $request->get('search');
        $data = Buku::with('penerbit')
            ->orderBy('stok', 'asc')
            ->select('nama_buku', 'penerbit_id')
            ->where('nama_buku', 'LIKE', "%$cari%")
            ->paginate(5);
        $no = 5 * ($data->currentPage() - 1);
        return view('dashboard/pengadaan', compact('data', 'no', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
