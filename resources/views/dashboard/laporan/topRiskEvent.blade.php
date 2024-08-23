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
                        <h3 class="my-auto">Top Risk Event</h3>
                        @if (Auth::user()->role === 'officer')
                            <a href="risk/create" class="btn btn-outline-primary ml-auto">Input Risk</a>
                        @endif
                    </div>
                    <div class="table-responsive ">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Risiko</th>
                                    <th scope="col">Tanggal Identifikasi Risiko</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Deskripsi atau Kejadian</th>
                                    <th scope="col">Skor Risiko Inherent (W)</th>
                                    <th scope="col">Status Risiko Inherent</th>
                                    <th scope="col">Pemilik Risiko</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Risk as $a)
                                    <tr>
                                        <td scope="row"> {{ $loop->iteration }}</td>
                                        <th scope="row"> {{ $a->kode_risiko }}</th>
                                        <td scope="row"> {{ $a->created_at }}</td>
                                        <td scope="row"> {{ $a->unitKerja ? $a->unitKerja->unit_kerja : 'N/A' }}
                                        </td>
                                        <td scope="row"> {{ $a->deskripsi_risiko }} </td>
                                        <td scope="row"> {{ $a->skor_risiko }} </td>
                                        <td scope="row"> {{ $a->tingkat_risiko }} </td>
                                        <td scope="row"> {{ $a->pemilik_risiko }} </td>
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
