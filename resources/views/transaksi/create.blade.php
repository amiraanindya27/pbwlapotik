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
      <h5>Edit Transaksi</h5>
      <form class="mt-4" action="" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group mb-3">
              <label for="id_pembeli" class="form-label">Pembeli*</label>
              <select class="form-control @error('id_pembeli') is-invalid @enderror" name="id_pembeli" id="id_pembeli">
                <option value="">-- Pilih --</option>
                @foreach($pembelis as $pembeli)
                <option value="{{ $pembeli->id }}">{{ $pembeli->nama }}</option>
                @endforeach
              </select>
              @error('id_pembeli')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="id_obat" class="form-label">Obat*</label>
              <select class="form-control @error('id_obat') is-invalid @enderror" name="id_obat" id="id_obat">
                <option value="">-- Pilih --</option>
                @foreach($obats as $obat)
                <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                @endforeach
              </select>
              @error('id_obat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="tanggal" class="form-label">Tanggal*</label>
              <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="Tanggal" placeholder="Tanggal">
              @error('tanggal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="id_user" class="form-label">User*</label>
              <select class="form-control @error('id_user') is-invalid @enderror" name="id_user" id="id_user">
                <option value="">-- Pilih --</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                @endforeach
              </select>
              @error('id_user')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="keterangan" class="form-label">Keterangan*</label>
              <textarea class="form-control @error('ketereangan') is-invalid @enderror" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
              @error('keterangan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <button class="btn btn-info float-end" type="submit">Simpan</button>
            </div>
            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
