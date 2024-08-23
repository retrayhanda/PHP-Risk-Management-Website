@extends('layout.main')
@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-10">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Edit User</h3>
                    <form action="/users/{{ $User->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                name="nidn" autofocus value="{{ old('nidn', $User->nidn) }}">
                            <label for="nidn">NIDN</label>
                            @error('nidn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" autofocus value="{{ old('nama', $User->nama) }}">
                            <label for="nama">Nama Lengkap</label>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                name="jabatan" value="{{ old('jabatan', $User->jabatan) }}">
                            <label for="jabatan">Jabatan</label>
                            @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-floating mb-3">
                            <select class="form-select" id="unitkerja" name="unit_id"
                                aria-label="Floating label select example">
                                @foreach ($Unit as $item)
                                    @if (old('unit_id', $User->unit_id) == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->unit_kerja }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->unit_kerja }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="unit_id">Unit Kerja</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="role" name="role"
                                aria-label="Floating label select example">
                                <option selected value="{{ $User->role }}">{{ $User->role }}</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="riskowner">Risk Owner</option>
                                <option value="riskofficer">Risk Officer</option>
                            </select>
                            <label for="role">Role</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" autofocus value="{{ old('email', $User->email) }}">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" value="{{ old('password', $User->password) }}">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class=" mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div> --}}
                        <div class="my-4 text-end">
                            {{-- <input type="submit" class="btn btn-outline-primary ml-auto" value="Tambah"> --}}
                            <button type="submit" class="btn btn-outline-primary ml-auto">Update Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
