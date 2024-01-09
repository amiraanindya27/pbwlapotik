<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembeliRequest;
use App\Models\Pembeli;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;

class PembeliController extends Controller
{
    
    public function index()
    {
        $pembelis = Pembeli::all();

        return view('pembeli.index', compact('pembelis'))->with('title', 'Pembeli');
    }

    public function create()
    {
        return view('pembeli.create')->with('title', 'Tambah Pembeli');
    }

    public function store(PembeliRequest $request)
    {
        $data = $request->validated();

        $pembeli = new Pembeli($data);
        $pembeli->save();

        return redirect('pembeli');
    }

    public function edit(string $id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'))->with('title', 'Edit Pembeli');
    }

    public function update(PembeliRequest $request, string $id)
    {
        $data = $request->validated();

        $pembeli = Pembeli::findOrFail($id);
        $pembeli->updated_at = Carbon::now();
        $pembeli->update($data);

        return redirect('pembeli');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::where('id_pembeli', $id)->exists();
        if ($transaksi) {
            return false;
        }

        $pembeli = Pembeli::findOrFail($id)->delete();
        if (!$pembeli) {
            return false;
        }

        return true;
    }
}
