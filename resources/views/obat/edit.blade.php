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
        <form class="row g-3 mt-4" action="" method="POST">
          @method('PUT')
          @csrf

          <div class="form-group">
            <label for="nama" class="form-label">Nama Obat*</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $obat->nama }}" placeholder="Nama Obat">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="harga" class="form-label">Harga*</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ $obat->harga }}" placeholder="Harga">
            @error('harga')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="stok" class="form-label">Stok Obat*</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok" value="{{ $obat->obat }}" placeholder="Stok Obat">
            @error('stok')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <button class="btn btn-info float-end" type="submit">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
