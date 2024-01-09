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
            <label for="nama" class="form-label">Nama Pembeli*</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $pembeli->nama }}" placeholder="Nama Obat">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="jk" class="form-label">Jenis Kelamin*</label>
            <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk" value="{{ $pembeli->jk }}" placeholder="Jenis Kelamin">
            @error('jk')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="no_hp" class="form-label">No. HP*</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ $pembeli->no_hp }}" placeholder="No HP">
            @error('no_hp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="alamat" class="form-label">Alamat*</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ $pembeli->alamat }}" placeholder="Alamat">
            @error('alamat')
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
