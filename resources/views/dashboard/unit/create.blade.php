@extends('layout.main')
@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-10">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Input Unit Kerja</h3>
                    <form action="/unit" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control  @error('kode_unit_kerja') is-invalid @enderror""
                                id="kode_unit_kerja" placeholder="DKM-001" name="kode_unit_kerja" autofocus
                                value="{{ old('kode_unit_kerja') }}">
                            <label for="kode_unit_kerja">Kode Unit Kerja</label>
                            @error('kode_unit_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control  @error('unit_kerja') is-invalid @enderror""
                                id="unit_kerja" placeholder="DKM-001" name="unit_kerja" autofocus
                                value="{{ old('unit_kerja') }}">
                            <label for="unit_kerja">Unit Kerja</label>
                            @error('unit_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="my-4 text-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto">Input Unit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
