@extends('layout.main')
@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-10">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Edit Unit Kerja</h3>
                    <form action="/unit/{{ $unitKerja->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('kode_unit_kerja') is-invalid @enderror"
                                id="kode_unit_kerja" name="kode_unit_kerja"
                                value="{{ old('kode_unit_kerja', $unitKerja->kode_unit_kerja) }}">
                            <label for="kode_unit_kerja">Kode Unit Kerja</label>
                            @error('kode_unit_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('unit_kerja') is-invalid @enderror"
                                id="unit_kerja" name="unit_kerja" value="{{ old('unit_kerja', $unitKerja->unit_kerja) }}">
                            <label for="unit_kerja">Unit Kerja</label>
                            @error('unit_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="my-4 text-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto">Update Unit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
