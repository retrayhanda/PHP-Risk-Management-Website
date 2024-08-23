@extends('layout.main')
@section('container')
    <div class="container pt-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-pen fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">Risk Register</p>
                        <h6 class="mb-0">{{ $totalRisk }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-check fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">Penanganan Risk</p>
                        <h6 class="mb-0">{{ $totalAcceptedRisks }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-home fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">Total Unit</p>
                        <h6 class="mb-0">{{ $totalUnits }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-user fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">Data Pengguna</p>
                        <h6 class="mb-0">{{ $totalUsers }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center align-items-center mt-3">
            <div class="col-sm-12 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    {!! $chart->container() !!}
                </div>
            </div>
            <div class="col-sm-12 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    {!! $chart2->container() !!}
                </div>
            </div>
            <div class="col-sm-12 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    {!! $chart3->container() !!}
                </div>
            </div>

        </div>
        <div class="row g-4 justify-content-center align-items-center mt-3">
            <h3>Risk Profile</h3>
            <table class="table">
                <tr>
                    <td rowspan="5"
                        style="text-align: center; writing-mode: vertical-rl; transform: rotate(180deg); background: #92CDDC">
                        Probabilitas</td>
                    <td>Sangat Besar [5]</td>
                    <td style="background: #FFFF00">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[5][1] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFC000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[5][2] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #C00000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[5][3] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #C00000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[5][4] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #C00000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[5][5] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Besar [4]</td>
                    <td style="background: #FFFF00">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[4][1] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFC000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[4][2] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFC000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[4][3] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #C00000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[4][4] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #C00000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[4][5] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Sedang [3]</td>
                    <td style="background: #33CC33">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[3][1] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFFF00">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[3][2] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFC000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[3][3] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFC000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[3][4] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #C00000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[3][5] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Kecil [2]</td>
                    <td style="background: #33CC33">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[2][1] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFFF00">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[2][2] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFFF00">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[2][3] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFC000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[2][4] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFC000">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[2][5] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Sangat Kecil [1]</td>
                    <td style="background: #33CC33">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[1][1] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #33CC33">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[1][2] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #33CC33">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[1][3] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #33CC33">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[1][4] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                    <td style="background: #FFFF00">
                        <div class="d-flex flex-wrap">
                            @foreach ($riskProfile[1][5] as $item)
                                <a href="{{ url('profil_risk_kategori?id_fokus=' . $item->id) }}"
                                    class="btn btn-sm btn-light rounded-pill m-1">{{ $item->id }}</a>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td>Sangat Kecil [1]</td>
                    <td>Kecil [2]</td>
                    <td>Sedang [3]</td>
                    <td>Besar [4]</td>
                    <td>Sangat Besar [5]</td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td colspan="5" style="text-align: center; background: #92CDDC">Dampak</td>
                </tr>
            </table>
        </div>
        <style>
            .extreme-high>td {
                background: #C00000
            }

            .high-risk>td {
                background: #FFC000
            }

            .medium-risk>td {
                background: #FFFF00
            }

            .low-risk>td {
                background: #00B050
            }

            .table-border td {
                border: 1px solid #fff;
                text-align: center
            }
        </style>
        <div class="row g-4 justify-content-center align-items-center mt-3">
            <h3>Risk Appetite</h3>
            <div class="table-responsive">
                <table class="table table-border">
                    <tr class="extreme-high">
                        <td>EXTREME HIGH</td>
                        @foreach ($risk as $item)
                            <td>
                                <a href="{{ url('risk_appetite_report?id_fokus=' . $item->id) }}">
                                    @if (in_array($item->probabilitas . $item->dampak, ['53', '54', '55', '44', '45', '35']))
                                        <i class="fa fa-circle" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                    @if (in_array($item->probabilitas . $item->dampak_residual, ['53', '54', '55', '44', '45', '35']))
                                        <i class="fa fa-star" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                </a>
                            </td>
                        @endforeach
                    </tr>
                    <tr class="high-risk">
                        <td>HIGH RISK</td>
                        @foreach ($risk as $item)
                            <td>
                                <a href="{{ url('risk_appetite_report?id_fokus=' . $item->id) }}">
                                    @if (in_array($item->probabilitas . $item->dampak, ['52', '43', '42', '33', '34', '24', '25']))
                                        <i class="fa fa-circle" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                    @if (in_array($item->probabilitas . $item->dampak_residual, ['52', '42', '43', '33', '34', '24', '25']))
                                        <i class="fa fa-star" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                </a>
                            </td>
                        @endforeach
                    </tr>
                    <tr class="medium-risk">
                        <td>MEDIUM RISK</td>
                        @foreach ($risk as $item)
                            <td>
                                <a href="{{ url('risk_appetite_report?id_fokus=' . $item->id) }}">
                                    @if (in_array($item->probabilitas . $item->dampak, ['51', '41', '32', '22', '23', '15']))
                                        <i class="fa fa-circle" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                    @if (in_array($item->probabilitas . $item->dampak_residual, ['51', '41', '32', '22', '23', '14', '15']))
                                        <i class="fa fa-star" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                </a>
                            </td>
                        @endforeach
                    </tr>
                    <tr class="low-risk">
                        <td>LOW RISK</td>
                        @foreach ($risk as $item)
                            <td>
                                <a href="{{ url('risk_appetite_report?id_fokus=' . $item->id) }}">
                                    @if (in_array($item->probabilitas . $item->dampak, ['31', '21', '11', '12', '13', '14']))
                                        <i class="fa fa-circle" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                    @if (in_array($item->probabilitas . $item->dampak_residual, ['31', '21', '11', '12', '13']))
                                        <i class="fa fa-star" style="color: #92CDDC; font-size: 2em;"></i>
                                    @endif
                                </a>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>RISK ID</td>
                        @foreach ($risk as $item)
                            <td>{{ $item->id }}</td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    <script src="{{ $chart2->cdn() }}"></script>
    <script src="{{ $chart3->cdn() }}"></script>



    {{ $chart->script() }}
    {{ $chart2->script() }}
    {{ $chart3->script() }}
@endsection
