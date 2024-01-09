<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiCreateRequest;
use App\Http\Requests\TransaksiUpdateRequest;
use App\Models\Pembeli;
use App\Models\Obat;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;

class TransaksiController extends Controller
{

    public function index()
    {
        $transaksis = Transaksi::with('pembeli', 'obat', 'user')->get();

        return view('transaksi.index', compact('transaksis'))->with('title', 'Transaksi');
    }

    public function create()
    {
        $pembelis = Pembeli::select('id', 'nama')->get(); // Perbaikan: ubah $Pembelis menjadi $pembelis
        $obats = Obat::select('id', 'nama')->get();
        $users = User::select('id', 'nama')->get();
    
        return view('transaksi.create', compact('pembelis', 'obats', 'users'))->with('title', 'Tambah Transaksi');
    }

    public function store(TransaksiCreateRequest $request)
    {
        $data = $request->validated();

        $transaksi = new Transaksi($data);
        $transaksi->save();

        return redirect('transaksi');
    }

    public function edit(string $id)
    {
        $pembelis = Pembeli::select('id', 'nama')->get();
        $obats = Obat::select('id', 'nama')->get();
        $users = User::select('id', 'nama')->get();
        $transaksi = Transaksi::findOrFail($id);

        return view('transaksi.edit', compact('pembelis', 'obats', 'users', 'transaksi'))->with('title', 'Edit Transaksi');
    }

    public function update(TransaksiUpdateRequest $request, string $id)
    {
        $data = $request->validated();

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->updated_at = Carbon::now();
        $transaksi->update($data);

        return redirect('transaksi');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id)->delete();
        if (!$transaksi) {
            return false;
        }

        return true;
    }
}
