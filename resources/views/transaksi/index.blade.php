@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">

    <style>
      body {
      
      background-color:#00FF7F;
    }
    </style>

      <h5>Transaksi</h5>
      <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3 float-end">Tambah Baru</a>      
      <table class="table table-hover table-striped table-bordered table-success">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col">Pembeli</th>
            <th scope="col">Obat</th>
            <th scope="col">Tanggal</th>
            <th scope="col">User</th>
            <th scope="col">Keterangan</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
        
          @php $no = 1; @endphp
          @foreach($transaksis as $transaksi)
          <tr>
            <th class="text-center">{{ $no++ }}</th>
            <td>{{ $transaksi->pembeli->nama }}</td>
            <td>{{ $transaksi->obat->nama }}</td>
            <td>{{ $transaksi->tanggal }}</td>
            <td>{{ $transaksi->user->nama }}</td>
            <td>{{ $transaksi->keterangan }}</td>
            <td class="text-center">
              <a class="btn btn-warning btn-sm" href="{{ route('transaksi.edit', $transaksi->id) }}">Edit</a></td>
              <td class="text-center">
              <a class="btn btn-danger btn-sm" href="#" data-id="{{ $transaksi->id }}" onclick="delete_(`{{ route('transaksi.delete', $transaksi->id) }}`)">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
@push('js')
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
  function delete_(url) {
    if (confirm('Are you sure?')) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': `{{ csrf_token() }}`
        }
      });
      $.ajax({
        type: "DELETE",
        url: url,
        success: function(result) {
          if (!result) {
            alert('Gagal menghapus data')
          }
          
          location.reload()
        }
      })
    }
  }
</script>

@endpush
