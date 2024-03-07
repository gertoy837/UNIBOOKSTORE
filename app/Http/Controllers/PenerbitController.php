<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public $penerbit;
    public function __construct()
    {
        $this->penerbit = new Penerbit();
    }
    public function index()
    {
        $data = Penerbit::all();
        return view('dashboard/penerbit/index', compact('data'));
    }

    public function create()
    {
        return view('dashboard/penerbit/create');
    }

    public function store(Request $request)
    {
        
        $this->penerbit->kode = $request->kode;
        $this->penerbit->nama = $request->nama;
        $this->penerbit->alamat = $request->alamat;
        $this->penerbit->kota = $request->kota;
        $this->penerbit->telepon = $request->telepon;

        $this->penerbit->save();

        return redirect()->route('penerbit.index');
    }

    public function edit($penerbit)
    {
        $penerbit1 = Penerbit::findOrFail($penerbit);
        
        return view('dashboard/penerbit/edit', compact('penerbit1'));
    }

    public function update(Request $request, $penerbit)
    {
        $penerbit1 = Penerbit::findOrFail($penerbit);
        $penerbit1->kode = $request->kode;
        $penerbit1->nama = $request->nama;
        $penerbit1->alamat = $request->alamat;
        $penerbit1->kota = $request->kota;
        $penerbit1->telepon = $request->telepon;
        if ($penerbit1->isDirty()) {
            $penerbit1->save();
            return redirect()->route('penerbit.index');
        } else {
            return redirect()->route('penerbit.index');
        }
    }

    public function destroy($penerbit)
    {
        $penerbit1 = Penerbit::find($penerbit);
        $penerbit1->delete();
        return back();
    }
}
