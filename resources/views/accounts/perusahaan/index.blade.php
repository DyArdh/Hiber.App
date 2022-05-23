@extends('layouts.main-layout')

@section('title', 'Akun Perusahaan')
@section('content')

<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Account Perusahaan</div>
    <div class="row">
        <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
        <h4 class="pt-4 pb-3">Daftar Akun Perusahaan</h4>
        @if (session('success'))
          <div class="modal fade success" id="modal-success" tabindex="-1" aria-labelledby="modal-successLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-successLabel">Informasi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ session('success') }}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        @endif

        <div class="table-responsive w-auto">
          <table class="table table-bordered" id="tableAdmin">
            <thead>
              <th scope="col">Id</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Alamat</th>
              <th scope="col">Email</th>
              <th scope="col">No. HP</th>
              <th scope="col">Role</th>
              @can('updatePerusahaan', \App\Models\User::class)
                <th scope="col">Action</th>
              @endcan
            </thead>
            <tbody class="align-middle">
              @foreach ($data as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td> {{ $row->nama }} </td>
                  <td> {{ $row->alamat }} </td>
                  <td> {{ $row->email }} </td>
                  <td> {{ $row->no_hp }} </td>
                  <td> {{ $row->role }} </td>
                  @can('updatePerusahaan', \App\Models\User::class)
                    <td class="d-flex">
                      <a href="{{ route('perusahaan.edit', $row->id) }}">
                        <button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button>
                      </a>      
                    </td>
                  @endcan
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection

@section('scripts')

<script>
  $(document).ready(function(){
    if ($('.success').length) {
      $('#modal-success').modal('show');
    }
  });
</script>
    
@endsection