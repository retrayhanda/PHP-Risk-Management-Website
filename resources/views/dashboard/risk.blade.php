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
                        <h3 class="my-auto">Risk Register</h3>
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
                                    <th scope="col">Status Risiko</th>
                                    <th scope="col">Ancaman</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Tingkat Risiko</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Risk as $a)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <th scope="row">{{ $a->kode_risiko }}</th>
                                        <td scope="row"
                                            class=" fw-bold {{ $a->status_risiko === 'retired' ? 'text-success' : ($a->status_risiko === 'active' ? 'text-danger' : '') }}">
                                            {{ $a->status_risiko }}</td>
                                        <td scope="row"
                                            class=" fw-bold {{ $a->ancaman === 'opportunity' ? 'text-success' : ($a->ancaman === 'threat' ? 'text-danger' : '') }}">
                                            {{ $a->ancaman }}</td>
                                        <td scope="row">{{ $a->kategori_risiko }} risk</td>
                                        <td scope="row"
                                            class="fw-bold {{ $a->tingkat_risiko === 'Low'
                                                ? 'text-success'
                                                : ($a->tingkat_risiko === 'Medium'
                                                    ? 'text-warning'
                                                    : ($a->tingkat_risiko === 'High'
                                                        ? 'text-danger'
                                                        : ($a->tingkat_risiko === 'Extreme'
                                                            ? 'text-darkred'
                                                            : ''))) }}">
                                            {{ $a->tingkat_risiko }} Risk</td>
                                        <td scope="row">{{ $a->periode }}</td>
                                        <td scope="row" class="status-column">
                                            @if (Auth::user()->role === 'superadmin' || Auth::user()->role === 'owner')
                                                <div class="form-floating mb-3">
                                                    <form action="{{ url('/risk/' . $a->id . '/update-status') }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select class="form-select" id="status" name="status"
                                                            aria-label="Floating label select example"
                                                            onchange="this.form.submit()">
                                                            <option selected value="{{ $a->status }}">
                                                                {{ $a->status }}</option>
                                                            <option value="pengajuan">pengajuan</option>
                                                            <option value="diterima">diterima</option>
                                                            <option value="ditolak">ditolak</option>
                                                            <option value="pemantauan">pemantauan</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            @else
                                                {{ $a->status }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="/risk/{{ $a->id }}/edit" class="me-2"><i
                                                        class="fa fa-pen"></i></a>
                                                <a href="/risk/{{ $a->id }}" class="me-2"><i
                                                        class="fa fa-eye"></i></a>
                                                <form action="/risk/{{ $a->id }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-unstyled p-0"
                                                        onclick="return confirm('Apakah anda yakin menghapus risiko ini?')">
                                                        <i class="fa fa-trash text-primary"></i>
                                                    </button>
                                                </form>
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
