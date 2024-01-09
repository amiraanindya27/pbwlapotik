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
      <a href="{{ route('pembeli.create') }}" class="btn btn-success mb-3 float-end">Tambah Baru</a>

      <table class="table table-hover  table-bordered table-success  table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No. HP</th>
            <th scope="col">Alamat</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach($pembelis as $pembeli)
          <tr>
            <th class="text-center">{{ $no++ }}</th>
            <td>{{ $pembeli->nama }}</td>
            <td>{{ $pembeli->jk }}</td>
            <td>{{ $pembeli->no_hp }}</td>
            <td>{{ $pembeli->alamat }}</td>
            <td class="text-center">
              <a class="btn btn-warning btn-sm" href="{{ route('pembeli.edit', $pembeli->id) }}">Edit</a>
            </td>
            <td class="text-center">
              <a class="btn btn-danger btn-sm" href="#" data-id="{{ $pembeli->id }}" onclick="delete_(`{{ route('pembeli.delete', $pembeli->id) }}`)">Delete</a>
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