@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
    <style>
        body{
          background-color: #00FF7F;
        }
      </style>
      <h5>{{ $title }}</h5>
      <div class="col-sm-6">
        <form class="row g-3 mt-2" action="" method="POST">
          @csrf

          <div class="form-group">
            <label for="nama" class="form-label">Nama Obat*</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Obat">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="harga" class="form-label">Harga*</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" placeholder="Harga">
            @error('harga')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="stok" class="form-label">Stok Obat*</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok" placeholder="Stok">
            @error('stok')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <button class="btn btn-info float-end" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
