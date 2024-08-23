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
                                    <th scope="col">Status</th>
                                    <th scope="col">Status Risiko</th>
                                    <th scope="col">Peluang atau Ancaman</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Sasaran</th>
                                    <th scope="col">Periode identifikasi risiko</th>
                                    <th scope="col">Deskripsi atau Kejadian</th>
                                    <th scope="col">Akar Penyebab</th>
                                    <th scope="col">Indikator Penyebab</th>
                                    <th scope="col">Faktor Positif</th>
                                    <th scope="col">Dampak Kualitatif</th>
                                    <th scope="col">Probabilitas</th>
                                    <th scope="col">Dampak</th>
                                    <th scope="col">Skor Risiko Inherent (W)</th>
                                    <th scope="col">Tingkat Risiko Inherent</th>
                                    <th scope="col">Probabilitas Risiko Inherent Kualitatif (%)</th>
                                    <th scope="col">Dampak Finansial Risiko Inherent (Rp)</th>
                                    <th scope="col">Nilai Bersih Risiko Inherent</th>
                                    <th scope="col">Pemilik Risiko</th>
                                    <th scope="col">Jabatan Pemilik Risiko</th>
                                    <th scope="col">No.Hp Pemilik Risiko</th>
                                    <th scope="col">Email Pemilik Risiko</th>
                                    <th scope="col">Strategi</th>
                                    <th scope="col">Penanganan Risiko (Risk Treatment)</th>
                                    <th scope="col">Biaya Penanganan Risiko (Rp)</th>
                                    <th scope="col">Penanganan Yang Telah Dilakukan</th>
                                    <th scope="col">Probabilitas Risiko Residual (P')</th>
                                    <th scope="col">Dampak Risiko Residual (I)</th>
                                    <th scope="col">Skor Risiko Residual (W')</th>
                                    <th scope="col">Tingkat Risiko Residual</th>
                                    <th scope="col">Probabilitas Risiko Residual Kualitatif (%)</th>
                                    <th scope="col">Dampak Finansial Risiko Residual (Rp)</th>
                                    <th scope="col">Nilai Bersih Risiko Residual</th>
                                    <th scope="col">Departemen (Unit Kerja)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Risk as $a)
                                    <tr>
                                        <td scope="row"> {{ $loop->iteration }}</td>
                                        <th scope="row"> {{ $a->kode_risiko }}</th>
                                        <td scope="row"> {{ $a->status }} </td>
                                        <td scope="row"> {{ $a->status_risiko }}</td>
                                        <td scope="row"> {{ $a->ancaman }}</td>
                                        <td scope="row"> {{ $a->unitKerja ? $a->unitKerja->unit_kerja : 'N/A' }}
                                        </td>
                                        <td scope="row"> {{ $a->sasaran }} </td>
                                        <td scope="row"> {{ $a->periode }} </td>
                                        <td scope="row"> {{ $a->deskripsi_risiko }} </td>
                                        <td scope="row"> {{ $a->akar_penyebab }} </td>
                                        <td scope="row"> {{ $a->indikator_risiko }} </td>
                                        <td scope="row"> {{ $a->faktor_positif }} </td>
                                        <td scope="row"> {{ $a->dampak_kualitatif }} </td>
                                        <td scope="row"> {{ $a->probabilitas }} </td>
                                        <td scope="row"> {{ $a->dampak }} </td>
                                        <td scope="row"> {{ $a->skor_risiko }} </td>
                                        <td scope="row"> {{ $a->tingkat_risiko }} Risk</td>
                                        <td scope="row"> {{ $a->probabilitas_risiko }} </td>
                                        <td scope="row"> {{ $a->dampak_financial }} </td>
                                        <td scope="row"> {{ $a->nilai_bersih_risiko }} </td>
                                        <td scope="row"> {{ $a->pemilik_risiko }} </td>
                                        <td scope="row"> {{ $a->jabatan }} </td>
                                        <td scope="row"> {{ $a->nomor_hp }} </td>
                                        <td scope="row"> {{ $a->email }} </td>
                                        <td scope="row"> {{ $a->strategi }} </td>
                                        <td scope="row"> {{ $a->penanganan }} </td>
                                        <td scope="row"> {{ $a->biaya_risiko }} </td>
                                        <td scope="row"> {{ $a->penanganan_risiko }} </td>
                                        <td scope="row"> {{ $a->probabilitas_residual }} </td>
                                        <td scope="row"> {{ $a->dampak_residual }} </td>
                                        <td scope="row"> {{ $a->skor_risiko_residual }} </td>
                                        <td scope="row"> {{ $a->tingkat_risiko_residual }} Risk</td>
                                        <td scope="row"> {{ $a->probabilitas_risiko_residual }} </td>
                                        <td scope="row"> {{ $a->dampak_financial_residual }} </td>
                                        <td scope="row"> {{ $a->nilai_bersih_risiko_residual }} </td>
                                        <td scope="row"> {{ $a->departemen }} </td>
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
