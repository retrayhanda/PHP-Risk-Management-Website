@extends('layout.main')
@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Detail Risk</h3>
                    <a href="{{ route('risk.show-pdf', ['id' => $Risk->id]) }}"
                        class="btn btn-outline-primary ml-auto mb-3">Export
                        to PDF</a>
                    <p>Status : <span
                            class="fw-bold {{ $Risk->status === 'pengajuan'
                                ? 'text-info'
                                : ($Risk->status === 'diterima'
                                    ? 'text-success'
                                    : ($Risk->status === 'ditolak'
                                        ? 'text-danger'
                                        : ($Risk->status === 'pemantauan'
                                            ? 'text-warning'
                                            : ''))) }}">{{ $Risk->status }}</span>
                    </p>
                    <div class="table-responsive ">
                        <h5>Identifikasi Risiko</h5>
                        <table class="table table-hover mt-3">
                            <tbody>
                                <tr>
                                    <th width="35%">Kode Risiko</th>
                                    <td>: {{ $Risk->kode_risiko }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Status Risiko</th>
                                    <td>
                                        : <span
                                            class="fw-bold {{ $Risk->status_risiko === 'retired' ? 'text-success' : ($Risk->status_risiko === 'active' ? 'text-danger' : '') }}">{{ $Risk->status_risiko }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="35%">Peluang atau Ancaman</th>
                                    <td>
                                        : <span
                                            class="fw-bold {{ $Risk->ancaman === 'opportunity' ? 'text-success' : ($Risk->ancaman === 'threat' ? 'text-danger' : '') }}">{{ $Risk->ancaman }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="35%">Kategori Risiko</th>
                                    <td>: {{ $Risk->kategori_risiko }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Unit Kerja</th>
                                    <td>: {{ $unitKerja->unit_kerja }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Sasaran</th>
                                    <td>: {{ $Risk->sasaran }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Periode identifikasi risiko</th>
                                    <td>: {{ $Risk->periode }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Deskripsi atau Kejadian</th>
                                    <td>: {{ $Risk->deskripsi_risiko }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Akar Penyebab</th>
                                    <td>: {{ $Risk->akar_penyebab }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Indikator Risiko</th>
                                    <td>: {{ $Risk->indikator_risiko }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Faktor Positif / Internal Control Yang Ada Saat Ini</th>
                                    <td>: {{ $Risk->faktor_positif }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Dampak Kualitatif</th>
                                    <td>: {{ $Risk->dampak_kualitatif }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Akar Penyebab</th>
                                    <td>: {{ $Risk->akar_penyebab }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>Risiko Inherent</h5>
                        <table class="table table-hover mt-3">
                            <tbody>
                                <tr>
                                    <th width="35%">Probabilitas</th>
                                    <td>: {{ $Risk->probabilitas }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Dampak</th>
                                    <td>: {{ $Risk->dampak }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Skor Risiko Inherent (W)</th>
                                    <td>: {{ $Risk->skor_risiko }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Tingkat Risiko Inherent</th>
                                    <td>
                                        : <span
                                            class="fw-bold {{ $Risk->tingkat_risiko === 'Low'
                                                ? 'text-success'
                                                : ($Risk->tingkat_risiko === 'Medium'
                                                    ? 'text-warning'
                                                    : ($Risk->tingkat_risiko === 'High'
                                                        ? 'text-danger'
                                                        : ($Risk->tingkat_risiko === 'Extreme'
                                                            ? 'text-extreme-darkred'
                                                            : ''))) }}">{{ $Risk->tingkat_risiko }}
                                            Risk</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="35%">Probabilitas Risiko Inherent Kualitatif (%)</th>
                                    <td>: {{ $Risk->probabilitas_risiko }} %</td>
                                </tr>
                                <tr>
                                    <th width="35%">Dampak Finansial Risiko Inherent
                                        (Rp)</th>
                                    <td>: Rp. {{ $Risk->dampak_financial }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Nilai Bersih Risiko Inherent</th>
                                    <td>: Rp. {{ $Risk->nilai_bersih_risiko }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>Pemilik Risiko</h5>
                        <table class="table table-hover mt-3">
                            <tbody>
                                <tr>
                                    <th width="35%">Pemilik Risiko</th>
                                    <td>: {{ $Risk->pemilik_risiko }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Jabatan Pemilik Risiko</th>
                                    <td>: {{ $Risk->jabatan }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">No.Hp Pemilik Risiko</th>
                                    <td>: {{ $Risk->nomor_hp }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Email Pemilik Risiko</th>
                                    <td>: {{ $Risk->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5> Evaluasi dan Rencana Penanganan Risiko</h5>
                        <table class="table table-hover mt-3">
                            <tbody>
                                <tr>
                                    <th width="35%">Strategi</th>
                                    <td>: {{ $Risk->strategi }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Penanganan Risiko (Risk Treatment)</th>
                                    <td>: {{ $Risk->penanganan }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Biaya Penanganan Risiko (Rp)</th>
                                    <td>: {{ $Risk->biaya_risiko }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Penanganan Yang Telah Dilakukan</th>
                                    <td>: {{ $Risk->penanganan_risiko }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5> Risiko Residual</h5>
                        <table class="table table-hover mt-3">
                            <tbody>
                                <tr>
                                    <th width="35%">Probabilitas Risiko Residual (P')</th>
                                    <td>: {{ $Risk->probabilitas_residual }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Dampak Risiko Residual (I)</th>
                                    <td>: {{ $Risk->dampak_residual }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Skor Risiko Residual (W')</th>
                                    <td>: {{ $Risk->skor_risiko_residual }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Tingkat Risiko Residual</th>
                                    <td>
                                        : <span
                                            class="fw-bold {{ $Risk->tingkat_risiko_residual === 'Low'
                                                ? 'text-success'
                                                : ($Risk->tingkat_risiko_residual === 'Medium'
                                                    ? 'text-warning'
                                                    : ($Risk->tingkat_risiko_residual === 'High'
                                                        ? 'text-danger'
                                                        : ($Risk->tingkat_risiko_residual === 'Extreme'
                                                            ? 'text-extreme-darkred'
                                                            : ''))) }}">{{ $Risk->tingkat_risiko_residual }}
                                            Risk</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="35%">Probabilitas Risiko Residual Kualitatif (%)</th>
                                    <td>: {{ $Risk->probabilitas_risiko_residual }} %</td>
                                </tr>
                                <tr>
                                    <th width="35%">Dampak Finansial Risiko Residual
                                        (Rp)</th>
                                    <td>: Rp. {{ $Risk->dampak_financial_residual }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Nilai Bersih Risiko Residual</th>
                                    <td>: Rp. {{ $Risk->nilai_bersih_risiko_residual }}</td>
                                </tr>
                                <tr>
                                    <th width="35%">Departemen (Unit Kerja) </th>
                                    <td>:{{ $Risk->departemen }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
