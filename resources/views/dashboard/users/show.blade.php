@extends('layout.main')
@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Detail User</h3>
                    <div class="bg-light rounded h-100 p-4">
                        {{-- <img src="{{ asset('storage/' . $User->foto) }}" alt=""
                            class="d-block mx-auto rounded-circle mb-5" width="200" height="200"> --}}
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tr>
                                    <th scope="col" style="width: 100px;">NIDN</th>
                                    <td>: {{ $User->nidn }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" style="width: 100px;">Nama</th>
                                    <td>: {{ $User->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" style="width: 100px;">Unit Kerja</th>
                                    <td>: {{ $User->unitKerja ? $User->unitKerja->unit_kerja : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" style="width: 100px;">Role</th>
                                    <td>: {{ $User->role }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" style="width: 100px;">Email</th>
                                    <td>: {{ $User->email }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
