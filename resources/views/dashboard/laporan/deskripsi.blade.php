@extends('layout.main')
@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible justify-content-end" role="alert">
                        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="my-auto">Deskripsi & Penanganan</h3>
                        @if (Auth::user()->role === 'officer')
                            <a href="risk/create" class="btn btn-outline-primary ml-auto">Input Risk</a>
                        @endif
                    </div>
                    <div class="table-responsive ">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Deskripsi Kejadian Risiko</th>
                                    <th scope="col">Kode Risiko</th>
                                    <th scope="col">Tindakan Penanganan Risiko</th>
                                    <th scope="col">Rencana Biaya Penanganan Risiko (Rp.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($risks as $risk)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td scope="row">{{ $risk->deskripsi_risiko }}</td>
                                        <td scope="row">{{ $risk->kode_risiko }}</td>
                                        <td scope="row">{{ $risk->penanganan_risiko ?: 'Tidak Ada Penanganan Risiko' }}
                                        </td>
                                        <td scope="row">{{ $risk->biaya_risiko ?: 'Tidak Ada Penanganan Risiko' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
