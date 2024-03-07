@extends('template')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard')}}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Home</span>
        </a>
    </li>
    <li class="nav-item">
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
    <li class="nav-item active">
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
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="mx-3">
                                    <p class="card-title">Tabel Buku</p>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('dashboard') }}" method="get">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" placeholder="Nama Buku ..."
                                                name="search">
                                            <button class="btn btn-success rounded-0" type="submit"><i
                                                    class="bi bi-search"></i> Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless display expandable-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Kategori</th>
                                            <th>Nama Buku</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Penerbit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dat)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td>{{ $dat->buku.kode }}</td>
                                                <td>{{ $dat->kategori }}</td>
                                                <td>{{ $dat->nama_buku }}</td>
                                                <td class="font-weight-bold">{{ $dat->harga }}</td>
                                                <td class="font-weight-bold">{{ $dat->stok }}</td>
                                                <td>{{ $dat->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                    Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                        template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                    with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                        href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection