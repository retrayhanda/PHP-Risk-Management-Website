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
                        <h3 class="my-auto">Profil Risiko Kategori</h3>
                        @if (Auth::user()->role === 'officer')
                            <a href="risk/create" class="btn btn-outline-primary ml-auto">Input Risk</a>
                        @endif
                    </div>
                    <div class="table-responsive ">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Strategi</th>
                                    <th scope="col">Jumlah Risiko</th>
                                    <th scope="col">Extreme Risk</th>
                                    <th scope="col">High Risk</th>
                                    <th scope="col">Medium Risk</th>
                                    <th scope="col">Low Risk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($risks as $risk)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td scope="row">{{ $risk->strategi ?: 'Tidak Ada Strategi' }}</td>
                                        <td scope="row">{{ $risk->jumlah_risiko }}</td>
                                        <td scope="row">{{ $risk->extreme_risk }}</td>
                                        <td scope="row">{{ $risk->high_risk }}</td>
                                        <td scope="row">{{ $risk->medium_risk }}</td>
                                        <td scope="row">{{ $risk->low_risk }}</td>
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
