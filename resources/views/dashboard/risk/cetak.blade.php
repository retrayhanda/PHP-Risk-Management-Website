<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Risk</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Detail Risk</h1>
        <h3>Identifikasi Risiko</h3>
        <table class="table">
            <tbody>
                <tr>
                    <th width="35%">Kode Risiko</th>
                    <td>{{ $Risk->kode_risiko }}</td>
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
        <h3>Risiko Inherent</h3>
        <table class="table">
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
        <h3>Pemilik Risiko</h3>
        <table class="table">
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
        <h3>Evaluasi dan Rencana Penanganan Risiko</h3>
        <table class="table">
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
        <h3>Risiko Residual</h3>
        <table class="table">
            <tbody>
                <tr>
                    <th width="35%">Probabilitas Risiko Residual (P')</th>
                    <td>: {{ $Risk->probabilitas_residual }}</td>
                </tr>
                <tr>
                    <th width="35%">>Dampak Risiko Residual (I)</th>
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
</body>

</html>
