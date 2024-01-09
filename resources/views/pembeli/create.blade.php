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
            <label for="nama" class="form-label">Nama Pembeli*</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama Pembeli">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jk" class="form-label">Jenis Kelamin*</label>
            <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk" placeholder="Jenis Kelamin">
            @error('jk')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="no_telp" class="form-label">No. HP*</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="No HP">
            @error('no_hp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="alamat" class="form-label">Alamat*</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat">
            @error('alamat')
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
