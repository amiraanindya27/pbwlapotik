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
      <form class="mt-4" action="" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group mb-3">
              <label for="email" class="form-label">Email*</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="password" class="form-label">Password*</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama*</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama">
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

            <div class="form-group mb-3">
              <label for="role" class="form-label">Role*</label>
              <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                <option value="">-- Pilih --</option>
                <option value="1">Admin</option>
                <option value="0">User</option>
              </select>
              @error('role')
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
