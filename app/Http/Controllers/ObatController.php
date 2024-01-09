<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObatRequest;
use App\Models\Obat;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();

        return view('obat.index', compact('obats'))->with('title', 'Obat');
    }

    public function create()
    {
        return view('Obat.create')->with('title', 'Tambah Obat');
    }

    public function store(ObatRequest $request)
    {
        $data = $request->validated();

        $obat = new Obat($data);
        $obat->save();

        return redirect('obat');
    }

    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'))->with('title', 'Edit obat');
    }

    public function update(ObatRequest $request, string $id)
    {
        $data = $request->validated();

        $obat = Obat::findOrFail($id);
        $obat->updated_at = Carbon::now();
        $obat->update($data);

        return redirect('obat');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::where('id_obat', $id)->exists();
        if ($transaksi) {
            return false;
        }

        $obat = Obat::findOrFail($id)->delete();
        if (!$obat) {
            return false;
        }

        return true;
    }
}
