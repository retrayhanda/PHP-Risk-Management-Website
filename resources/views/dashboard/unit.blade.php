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
                        <h3 class="my-auto">Data Unit</h3>
                        <a href="unit/create" class="btn btn-outline-primary ml-auto">Add Unit</a>
                    </div>

                    <div class="table-responsive ">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Unit Kerja</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Unit as $a)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $a->kode_unit_kerja }}</td>
                                        <td>{{ $a->unit_kerja }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="/unit/{{ $a->id }}/edit" class="me-2"><i
                                                        class="fa fa-pen"></i></a>
                                                <form action="/unit/{{ $a->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-unstyled p-0"
                                                        onclick="return confirm('Apakah anda yakin menghapus unit ini?')">
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
