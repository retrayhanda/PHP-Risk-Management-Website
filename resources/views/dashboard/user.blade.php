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
                        <h3 class="my-auto">Data Users</h3>
                        <a href="users/create" class="btn btn-outline-primary ml-auto">Add Users</a>
                    </div>
                    <div class="table-responsive ">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIDN</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Jabatan</th> --}}
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($User as $a)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $a->nidn }}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>{{ $a->unitKerja ? $a->unitKerja->unit_kerja : 'N/A' }}</td>
                                        <td>{{ $a->email }}</td>
                                        {{-- <td>{{ $a->jabatan }}</td> --}}
                                        <td>{{ $a->role }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="/users/{{ $a->id }}/edit" class="me-2"><i
                                                        class="fa fa-pen"></i></a>
                                                <a href="/users/{{ $a->id }}" class="me-2"><i
                                                        class="fa fa-eye"></i></a>
                                                <form action="/users/{{ $a->id }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-unstyled p-0"
                                                        onclick="return confirm('Apakah anda yakin menghapus akun ini?')">
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
