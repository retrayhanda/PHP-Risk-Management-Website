<div class="sidebar pe-4 pb-3 bg-dark">
    <nav class="navbar bg-dark navbar-light">
        <div class="mx-4 mb-3">
            <h5 class="text-light ">Manajemen Risiko Universitas Andalas</h5>
        </div>

        <div class="d-flex align-items-center ms-4 mb-4">

            <div class="position-relative">
                {{-- <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->foto) }}" alt=""
                    style="width: 40px; height: 40px;"> --}}
            </div>
            <div class="ms-3">
                @auth
                    <h6 class="mb-0 text-light">{{ auth()->user()->nama }}</h6>
                    <span class="mb-0 text-light">{{ auth()->user()->role }}</span>
                @endauth
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard*') ? 'active' : '' }}"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <div
                class="nav-item dropdown {{ (Request::is('risk') || Request::is('risk/*')) && !Request::is('risk_register') && !Request::is('risk_appetite_report') ? 'active' : '' }}">
                <a href="#"
                    class="nav-link dropdown-toggle {{ (Request::is('risk') || Request::is('risk/*')) && !Request::is('risk_register') && !Request::is('risk_appetite_report') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">
                    <i class="fa fa-pen me-2"></i>Risk
                </a>
                <div class="dropdown-menu bg-transparent border-0 ms-3">
                    <a href="/risk"
                        class="nav-item nav-link {{ (Request::is('risk') || Request::is('risk/*')) && !Request::is('risk_register') && !Request::is('risk_appetite_report') ? 'active' : '' }}">Risk
                        Register</a>
                    <a href="/penanganan_risiko"
                        class="nav-item nav-link {{ Request::is('penanganan_risiko*') ? 'active' : '' }}">Penanganan
                        Risk</a>
                </div>
            </div>

            @if (Auth::user()->role === 'superadmin')
                <!-- Navigasi Laporan -->
                <div
                    class="nav-item dropdown {{ Request::is('risk_register*') || Request::is('rekap_risiko*') || Request::is('top_risk_event*') || Request::is('risk_appetite_report*') || Request::is('profil_risk_kategori*') || Request::is('deskripsi_penanganan*') || Request::is('risk_appetite*') ? 'active' : '' }}">
                    <a href="#"
                        class="nav-link dropdown-toggle {{ Request::is('risk_register*') || Request::is('rekap_risiko*') || Request::is('top_risk_event*') || Request::is('risk_appetite_report*') || Request::is('profil_risk_kategori*') || Request::is('deskripsi_penanganan*') || Request::is('risk_appetite*') ? 'active' : '' }}"
                        data-bs-toggle="dropdown"><i class="fa fa-file me-2"></i>Laporan</a>
                    <div class="dropdown-menu bg-transparent border-0 ms-3">
                        <a href="/risk_register"
                            class="nav-item nav-link {{ Request::is('risk_register*') ? 'active' : '' }}">Risk
                            Register</a>
                        <a href="/rekap_risiko"
                            class="nav-item nav-link {{ Request::is('rekap_risiko*') ? 'active' : '' }}">Rekap
                            Resiko</a>
                        <a href="/top_risk_event"
                            class="nav-item nav-link {{ Request::is('top_risk_event*') ? 'active' : '' }}">Top Risk
                            Event</a>
                        <a href="/risk_appetite_report"
                            class="nav-item nav-link {{ Request::is('risk_appetite_report*') ? 'active' : '' }}">Risk
                            Appetite Report</a>
                        <a href="/profil_risk_kategori"
                            class="nav-item nav-link {{ Request::is('profil_risk_kategori*') ? 'active' : '' }}">Profil
                            Risk Kategori</a>
                        <a href="/deskripsi_penanganan"
                            class="nav-item nav-link {{ Request::is('deskripsi_penanganan*') ? 'active' : '' }}">Deskripsi
                            & Penanganan</a>
                    </div>
                </div>
                <a href="/users" class="nav-item nav-link {{ Request::is('users*') ? 'active' : '' }}"><i
                        class="fa fa-user me-2"></i>Users</a>
                <a href="/unit" class="nav-item nav-link {{ Request::is('unit*') ? 'active' : '' }}"><i
                        class="fa fa-home me-2"></i>Unit Kerja</a>
            @endif



        </div>
    </nav>
</div>
