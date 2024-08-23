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
                        <h3 class="my-auto">Risk Appetite Report</h3>
                        @if (Auth::user()->role === 'officer')
                            <a href="risk/create" class="btn btn-outline-primary ml-auto">Input Risk</a>
                        @endif
                    </div>
                    <style>
                        .fokus {
                            background-color: #B8CCE4 !important;
                        }
                    </style>
                    <div class="table-responsive ">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Risiko</th>
                                    <th scope="col">Deskripsi atau Kejadian</th>
                                    <th scope="col">Status Risiko Inherent</th>
                                    <th scope="col">Status Risiko Residual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Risk as $a)
                                    @php
                                        $fokus = false;
                                        if (isset($_GET['id_fokus']) && $_GET['id_fokus'] == $a->id) {
                                            $fokus = true;
                                        }
                                    @endphp
                                    <tr>
                                        <td scope="row" class="{{($fokus) ? 'fokus' : ''}}"> {{ $loop->iteration }}</td>
                                        <th scope="row" class="{{($fokus) ? 'fokus' : ''}}"> {{ $a->kode_risiko }}</th>
                                        <td scope="row" class="{{($fokus) ? 'fokus' : ''}}"> {{ $a->deskripsi_risiko }} </td>
                                        <td scope="row"
                                            class="fw-bold {{($fokus) ? 'fokus' : ''}} {{ $a->tingkat_risiko === 'Low'
                                                ? 'text-success'
                                                : ($a->tingkat_risiko === 'Medium'
                                                    ? 'text-warning'
                                                    : ($a->tingkat_risiko === 'High'
                                                        ? 'text-danger'
                                                        : ($a->tingkat_risiko === 'Extreme'
                                                            ? 'text-darkred'
                                                            : ''))) }}">
                                            {{ $a->tingkat_risiko }} Risk</td>
                                        <td scope="row"
                                            class="fw-bold {{($fokus) ? 'fokus' : ''}} {{ $a->tingkat_risiko_residual === 'Low'
                                                ? 'text-success'
                                                : ($a->tingkat_risiko_residual === 'Medium'
                                                    ? 'text-warning'
                                                    : ($a->tingkat_risiko_residual === 'High'
                                                        ? 'text-danger'
                                                        : ($a->tingkat_risiko_residual === 'Extreme'
                                                            ? 'text-darkred'
                                                            : ''))) }}">
                                            {{ $a->tingkat_risiko_residual ?: 'Tidak ada data' }} Risk</td>
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
