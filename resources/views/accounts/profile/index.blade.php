@extends('layouts.main-layout')

@section('title', 'Profile')
@section('content')

<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Profile
</div>

<div class="row mt-4 mx-1 d-flex justify-content-center">
    <div class="account-view col-12 bg-white">
        <div class="row mt-4 mx-3  fw-bold">
            <div class="col-3 col-sm-3">Nama</div>
            <div class="col-9 col-sm-2">:</div>
            <div class="col-12 col-sm-7 text-start text-sm-end">{{ $user->nama }}</div>
        </div>

        <div class="row mt-4 mx-3  fw-bold">
            <div class="col-3 col-sm-3">Alamat</div>
            <div class="col-9 col-sm-2">:</div>
            <div class="col-12 col-sm-7 text-start text-sm-end">{{ $user->alamat }}</div>
        </div>

        <div class="row mt-4 mx-3  fw-bold">
            <div class="col-3 col-sm-3">Email</div>
            <div class="col-9 col-sm-2">:</div>
            <div class="col-12 col-sm-7 text-start text-sm-end">{{ $user->email }}</div>
        </div>

        <div class="row mt-4 mx-3  fw-bold">
            <div class="col-3 col-sm-3">No. HP</div>
            <div class="col-9 col-sm-2">:</div>
            <div class="col-12 col-sm-7 text-start text-sm-end">{{ $user->no_hp }}</div>
        </div>

        <div class="row my-4 mx-3  fw-bold">
            <div class="col-3 col-sm-3">Role</div>
            <div class="col-9 col-sm-2">:</div>
            <div class="col-12 col-sm-7 text-start text-sm-end">{{ $user->role }}</div>
        </div>
    </div>
</div>

@endsection