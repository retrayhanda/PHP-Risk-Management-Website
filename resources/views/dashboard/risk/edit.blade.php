@extends('layout.main')
@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-10">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4 text-center">Edit Risk</h3>
                    <form action="{{ route('risk.update', $Risk->id) }}}" method="POST">
                        @method('PUT')
                        @csrf
                        <h5 class="mb-4">Identifikasi Risiko</h5>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('kode_risiko') is-invalid @enderror"
                                id="kode_risiko" name="kode_risiko" autofocus
                                value="{{ old('kode_risiko', $Risk->kode_risiko) }}">
                            <label for="kode_risiko">Kode Risiko</label>
                            @error('kode_risiko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="status_risiko" name="status_risiko"
                                aria-label="Floating label select example">
                                <option selected value="{{ old('status_risiko', $Risk->status_risiko) }}">
                                    {{ old('status_risiko', $Risk->status_risiko) }}</option>
                                <option value="active">Active</option>
                                <option value="retired">Retired</option>
                            </select>
                            <label for="status_risiko">Status Risiko</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="ancaman" name="ancaman"
                                aria-label="Floating label select example">
                                <option selected value="{{ old('ancaman', $Risk->ancaman) }}">
                                    {{ old('ancaman', $Risk->ancaman) }}</option>
                                <option value="threat">Threat</option>
                                <option value="opportunity">Opportunity</option>
                            </select>
                            <label for="ancaman">Peluang atau Ancaman</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="kategori_risiko" name="kategori_risiko"
                                aria-label="Floating label select example">
                                <option selected value="{{ old('kategori_risiko', $Risk->kategori_risiko) }}">
                                    {{ old('kategori_risiko', $Risk->kategori_risiko) }}</option>
                                <option value="operational">Operational / Infrastructure Risk</option>
                                <option value="finance">Finance Risk</option>
                                <option value="strategy&planning">Strategy and Planning Risk</option>
                                <option value="hazard">Hazard Risk</option>
                            </select>
                            <label for="kategori_risiko">Kategori Risiko</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="kode_unit" name="kode_unit"
                                aria-label="Floating label select example">
                                @foreach ($Unit as $item)
                                    @if (old('kode_unit', $Risk->kode_unit) == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->unit_kerja }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->unit_kerja }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="kode_unit">Unit Kerja</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('sasaran') is-invalid @enderror" id="sasaran"
                                name="sasaran" value="{{ old('sasaran', $Risk->sasaran) }}">
                            <label for="sasaran">Sasaran</label>
                            @error('sasaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode"
                                name="periode" value="{{ old('periode', $Risk->periode) }}">
                            <label for="periode">Periode identifikasi risiko</label>
                            @error('periode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('deskripsi_risiko') is-invalid @enderror" placeholder="deskripsi atau kejadian"
                                id="deskripsi_risiko" name="deskripsi_risiko" style="height: 150px;">{{ old('deskripsi_risiko', $Risk->deskripsi_risiko) }}</textarea>
                            <label for="deskripsi_risiko">Deskripsi atau Kejadian</label>
                            @error('deskripsi_risiko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('akar_penyebab') is-invalid @enderror" placeholder="Akar Penyebab"
                                id="akar_penyebab" name="akar_penyebab" style="height: 150px;"
                                value="{{ old('akar_penyebab', $Risk->akar_penyebab) }}">{{ old('akar_penyebab', $Risk->akar_penyebab) }}</textarea>
                            <label for="akar_penyebab">Akar Penyebab</label>
                            @error('akar_penyebab')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('indikator_risiko') is-invalid @enderror" placeholder="indikator risiko"
                                id="indikator_risiko" name="indikator_risiko" style="height: 150px;"
                                value="{{ old('indikator_risiko', $Risk->indikator_risiko) }}">{{ old('indikator_risiko', $Risk->indikator_risiko) }}</textarea>
                            <label for="indikator_risiko">Indikator Risiko</label>
                            @error('indikator_risiko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('faktor_positif') is-invalid @enderror" placeholder="indikator risiko"
                                id="faktor_positif" name="faktor_positif" style="height: 150px;"
                                value="{{ old('faktor_positif', $Risk->indikator_risiko) }}">{{ old('faktor_positif', $Risk->faktor_positif) }}</textarea>
                            <label for="faktor_positif">Faktor Positif / Internal Control Yang Ada Saat Ini </label>
                            @error('faktor_positif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('dampak_kualitatif') is-invalid @enderror" placeholder="Dampak Kualitatif"
                                id="dampak_kualitatif" name="dampak_kualitatif" style="height: 150px;"
                                value="{{ old('dampak_kualitatif', $Risk->dampak_kualitatif) }}">{{ old('dampak_kualitatif', $Risk->dampak_kualitatif) }}</textarea>
                            <label for="dampak_kualitatif">Dampak Kualitatif</label>
                            @error('dampak_kualitatif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <h5 class="mb-4">Risiko Inherent</h5>
                        <div class="d-lg-flex justify-content-beetween">
                            <div class="form-floating mb-3 col-lg-6 col-12 pe-lg-2 pe-0">
                                <select class="form-select" id="probabilitas" name="probabilitas"
                                    aria-label="Floating label select example">
                                    <option selected value="{{ old('probabilitas', $Risk->probabilitas) }}">
                                        {{ old('probabilitas', $Risk->probabilitas) }}</option>
                                    <option value='1'>1 = Sangat Kecil</option>
                                    <option value='2'>2 = Kecil</option>
                                    <option value='3'>3 = Sedang</option>
                                    <option value='4'>4 = Besar</option>
                                    <option value='5'>5= Sangat Besar</option>
                                </select>
                                <label for="probabilitas">Probabilitas</label>
                            </div>
                            <div class="form-floating mb-3 col-lg-6 col-12 ps-lg-2 ps-0">
                                <select class="form-select" id="dampak" name="dampak"
                                    aria-label="Floating label select example">
                                    <option selected value="{{ old('dampak', $Risk->dampak) }}">
                                        {{ old('dampak', $Risk->dampak) }}</option>
                                    <option value='1'>1 = Sangat Kecil</option>
                                    <option value='2'>2 = Kecil</option>
                                    <option value='3'>3 = Sedang</option>
                                    <option value='4'>4 = Besar</option>
                                    <option value='5'>5= Sangat Besar</option>
                                </select>
                                <label for="dampak" class="ms-lg-2">Dampak</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('probabilitas_risiko') is-invalid @enderror"
                                id="probabilitas_risiko" name="probabilitas_risiko"
                                value="{{ old('probabilitas_risiko', $Risk->probabilitas_risiko) }}">
                            <label for="probabilitas_risiko">Probabilitas Risiko Inherent Kualitatif (%)</label>
                            @error('probabilitas_risiko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('dampak_financial') is-invalid @enderror"
                                id="dampak_financial" name="dampak_financial"
                                value="{{ old('dampak_financial', $Risk->dampak_financial) }}">
                            <label for="dampak_financial">Dampak Finansial Risiko Inherent
                                (Rp)</label>
                            @error('dampak_financial')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <h5 class="mb-4">Pemilik Risiko</h5>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('pemilik_risiko') is-invalid @enderror"
                                id="pemilik_risiko" name="pemilik_risiko"
                                value="{{ old('pemilik_risiko', $Risk->pemilik_risiko) }}">
                            <label for="pemilik_risiko">Pemilik Risiko</label>
                            @error('pemilik_risiko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                id="jabatan" name="jabatan" value="{{ old('jabatan', $Risk->jabatan) }}">
                            <label for="jabatan">Jabatan Pemilik Risiko</label>
                            @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror"
                                id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $Risk->nomor_hp) }}">
                            <label for="nomor_hp">no.Hp Pemilik Risiko</label>
                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email', $Risk->email) }}">
                            <label for="email">email Pemilik Risiko</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-floating mb-3">
                            <select class="form-select" id="strategi" name="strategi"
                                aria-label="Floating label select example">
                                <option selected value="{{ old('strategi', $Risk->strategi) }}">
                                    {{ old('strategi', $Risk->strategi) }}</option>
                                <option value="mitigate">mitigate</option>
                                <option value="avoid">avoid</option>
                                <option value="accept">accept</option>
                                <option value="transfer">transfer</option>
                                <option value="share">share</option>
                                <option value="enchance">enchance</option>
                            </select>
                            <label for="strategi">Strategi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('penanganan') is-invalid @enderror" placeholder="indikator risiko"
                                id="penanganan" name="penanganan" style="height: 150px;">{{ old('penanganan', $Risk->penanganan) }}</textarea>
                            <label for="penanganan">Penanganan Risiko (Risk Treatment) </label>
                            @error('penanganan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('biaya_risiko') is-invalid @enderror"
                                id="biaya_risiko" name="biaya_risiko"
                                value="{{ old('biaya_risiko', $Risk->biaya_risiko) }}">
                            <label for="biaya_risiko">Biaya Penanganan Risiko (Rp)</label>
                            @error('biaya_risiko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('penanganan_risiko') is-invalid @enderror" placeholder="indikator risiko"
                                id="penanganan_risiko" name="penanganan_risiko" style="height: 150px;">{{ old('penanganan_risiko', $Risk->penanganan_risiko) }}</textarea>
                            <label for="penanganan_risiko">Penanganan Yang Telah Dilakukan</label>
                            @error('penanganan_risiko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-lg-flex justify-content-beetween">
                            <div class="form-floating mb-3 col-lg-6 col-12 pe-lg-2 pe-0">
                                <select class="form-select" id="probabilitas_residual" name="probabilitas_residual"
                                    aria-label="Floating label select example">
                                    <option selected
                                        value="{{ old('probabilitas_residual', $Risk->probabilitas_residual) }}">
                                        {{ old('probabilitas_residual', $Risk->probabilitas_residual) }}</option>
                                    <option value='1'>1 = Sangat Kecil</option>
                                    <option value='2'>2 = Kecil</option>
                                    <option value='3'>3 = Sedang</option>
                                    <option value='4'>4 = Besar</option>
                                    <option value='5'>5= Sangat Besar</option>
                                </select>
                                <label for="probabilitas_residual"> Probabilitas Risiko Residual (P')</label>
                            </div>
                            <div class="form-floating mb-3 col-lg-6 col-12 ps-lg-2 ps-0">
                                <select class="form-select" id="dampak_residual" name="dampak_residual"
                                    aria-label="Floating label select example">
                                    <option selected value="{{ old('dampak_residual', $Risk->dampak_residual) }}">
                                        {{ old('dampak_residual', $Risk->dampak_residual) }}</option>
                                    <option value='1'>1 = Sangat Kecil</option>
                                    <option value='2'>2 = Kecil</option>
                                    <option value='3'>3 = Sedang</option>
                                    <option value='4'>4 = Besar</option>
                                    <option value='5'>5= Sangat Besar</option>
                                </select>
                                <label for="dampak_residual" class="ms-lg-2">Dampak Risiko Residual
                                    (I')</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                class="form-control @error('probabilitas_risiko_residual') is-invalid @enderror"
                                id="probabilitas_risiko_residual" name="probabilitas_risiko_residual"
                                value="{{ old('probabilitas_risiko_residual', $Risk->probabilitas_risiko_residual) }}">
                            <label for="probabilitas_risiko_residual">Probabilitas Risiko Residual Kualitatif (%)</label>
                            @error('probabilitas_risiko_residual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                class="form-control @error('dampak_financial_residual') is-invalid @enderror"
                                id="dampak_financial_residual" name="dampak_financial_residual"
                                value="{{ old('dampak_financial_residual', $Risk->dampak_financial_residual) }}">
                            <label for="dampak_financial_residual">Dampak Finansial Risiko Residual
                                (Rp)</label>
                            @error('dampak_financial_residual')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('departemen') is-invalid @enderror" placeholder="indikator risiko"
                                id="departemen" name="departemen" style="height: 150px;">{{ old('departemen', $Risk->departemen) }}</textarea>
                            <label for="departemen">Departemen (Unit Kerja) </label>
                            @error('departemen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        {{-- @if (Auth::user()->role === 'superadmin' || Auth::user()->role === 'owner')
                            <div class="form-floating mb-3">
                                <select class="form-select" id="status" name="status"
                                    aria-label="Floating label select example">
                                    <option selected value="{{ old('status', $Risk->status) }}">
                                        {{ old('status', $Risk->status) }}</option>
                                    <option value="pengajuan">pengajuan</option>
                                    <option value="diterima">diterima</option>
                                    <option value="ditolak">ditolak</option>
                                    <option value="pemantauan">pemantauan</option>s
                                </select>
                                <label for="status">Status</label>
                            </div>
                        @endif --}}
                        <div class="my-4 text-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto">Ubah Risk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
