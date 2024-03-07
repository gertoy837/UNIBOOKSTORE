@extends('template')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard')}}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Home</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Admin</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('buku') }}">Data Buku</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('penerbit.index') }}">Data Penerbit</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengadaan') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Pengadaan</span>
        </a>
    </li>
@endsection
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Tambah Data Buku</h4>
                                        <form class="form-sample" action="{{ route('store') }}" method="post">
                                            @csrf
                                            {{-- <p class="card-description">
                                                Personal info
                                            </p> --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Kode</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="kode" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Kategori</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="kategori" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nama Buku</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nama_buku" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Harga</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="harga" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Stok</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="stok" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Penerbit</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="penerbit_id">
                                                                <option hidden></option>
                                                                @foreach ($data as $da)
                                                                    <option value="{{ $da->id }}">{{ $da->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="justify-content-between">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary mr-2 float-right">Submit</button>
                                        </div>
                                        <div class="">
                                            <button class="btn btn-light">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
