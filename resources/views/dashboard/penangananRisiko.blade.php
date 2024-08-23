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
                        <h3 class="my-auto">Penanganan Risk</h3>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Risiko</th>
                                    <th scope="col">Status Risiko</th>
                                    <th scope="col">Strategi</th>
                                    <th scope="col">Tingkat Risiko</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($risks as $risk)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $risk->kode_risiko }}</td>
                                        <td
                                            class="fw-bold {{ $risk->status_risiko === 'retired' ? 'text-success' : ($risk->status_risiko === 'active' ? 'text-danger' : '') }}">
                                            {{ $risk->status_risiko }}
                                        </td>
                                        <td>{{ $risk->strategi }}</td>
                                        <td scope="row"
                                            class="fw-bold {{ $risk->tingkat_risiko === 'Low'
                                                ? 'text-success'
                                                : ($risk->tingkat_risiko === 'Medium'
                                                    ? 'text-warning'
                                                    : ($risk->tingkat_risiko === 'High'
                                                        ? 'text-danger'
                                                        : ($risk->tingkat_risiko === 'Extreme'
                                                            ? 'text-darkred'
                                                            : ''))) }}">
                                            {{ $risk->tingkat_risiko }} Risk</td>
                                        <td>{{ $risk->status }} </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="/penanganan_risiko/{{ $risk->id }}/edit" class="me-2">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <a href="/penanganan_risiko/{{ $risk->id }}" class="me-2">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
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
