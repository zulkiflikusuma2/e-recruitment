<div class="nk-sidebar ">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            @can('adminNsuper')
                <li class="nav-label">Dashboard</li>
                <li>
                    <a href="/dashboard" aria-expanded="false">
                        <i class="fa fa-home"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-label">Lowongan</li> --}}
                {{-- <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-folder-plus"></i><span class="nav-text">Pengajuan Lowongan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/submissions">Pengajuan Lowongan</a></li>
                    <li><a href="/submissionsapproval">Persetujuan Lowongan</a></li>
                </ul>
            </li> --}}
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-folder"></i> <span class="nav-text">Lowongan</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('admin')
                            <li><a href="/submissions">Pengajuan Lowongan</a></li>
                        @endcan
                        @can('superadmin')
                            <li><a href="/submissionsapproval">Pengajuan Lowongan</a></li>
                        @endcan
                        <li><a href="/activevacancies">Lowongan Aktif</a></li>
                        <li><a href="/inactivevacancies">Lowongan Tidak Aktif</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-label">Lamaran masuk</li> --}}
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-users"></i><span class="nav-text">Lamaran Masuk</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/applicants">Data Lamaran</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-label">Seleksi</li> --}}
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-calendar-alt"></i><span class="nav-text">Agenda Seleksi</span>
                    </a>
                    <ul aria-expanded="false">
                        @can('admin')
                            <li><a href="/schedules">Agenda Seleksi</a></li>
                        @endcan
                        @can('superadmin')
                            <li><a href="/scheduleapproval">Pengajuan Agenda Seleksi</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-graph menu-icon"></i> <span class="nav-text">Seleksi</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/administration">Tahap Seleksi</a></li>
                        <li><a href="/selectionresults">Hasil Seleksi</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-label">Pesan</li> --}}
                {{-- <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-envelope"></i><span class="nav-text">Pesan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/dashboard">Pesan</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-folder-plus"></i><span class="nav-text">Pengajuan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/submissions">Lowongan</a></li>
                    <li><a href="/schedules">Jadwal Seleksi</a></li>
                    <li><a href="/submissionsapproval">Ajuan Lowongan</a></li>
                    <li><a href="/scheduleapproval">Ajuan Jadwal Seleksi</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow {{ Request::is('/activevacancies*' || '/inactivevacancies*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-folder"></i> <span class="nav-text">Lowongan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ Request::is('/activevacancies*') ? 'active' : '' }}" href="/activevacancies">Lowongan Aktif</a></li>
                    <li><a class="{{ Request::is('/inactivevacancies*') ? 'active' : '' }}" href="/inactivevacancies">Lowongan Tidak Aktif</a></li>
                </ul>
            </li>
            <li>
                <a href="/applicants" aria-expanded="false">
                    <i class="fa fa-users"></i><span class="nav-text">Data Pelamar</span>
                </a>
            </li>
            <li>
                <a class="has-arrow {{ Request::is('administration*' || 'accepted*' || 'rejected*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="icon-graph menu-icon"></i> <span class="nav-text">Seleksi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ Request::is('administration*') ? 'active' : '' }}" href="/administration">Tahap Seleksi</a></li>
                    <li><a class="{{ Request::is('selectionresults*') ? 'active' : '' }}" href="/selectionresults">Hasil Seleksi</a></li>
                </ul>
            </li> --}}
                {{-- <li class="nav-label">laporan</li> --}}
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-download"></i> <span class="nav-text">Laporan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="/jobsreport">Laporan Lowongan</a></li>
                        <li><a href="/applicantsreport">Laporan Pelamar</a></li>
                        <li><a href="/schedulesreport">Laporan Agenda Seleksi</a></li>
                        <li><a href="/writtenattend">Laporan Kehadiran</a></li>
                        <li><a href="/resultsreport">Laporan Hasil Seleksi</a></li>
                    </ul>
                </li>
            @endcan
            @can('applicant')
                <li class="nav-label">Pelamar</li>
                <li>
                    <a href="/dashboard" aria-expanded="false">
                        <i class="fa fa-home"></i> <span class="nav-text">Informasi Lowongan</span>
                    </a>
                </li>
                <li>
                    <a href="/history" aria-expanded="false">
                        <i class="fa fa-paper-plane"></i> <span class="nav-text">Riwayat Pendaftaran</span>
                    </a>
                </li>
                {{-- <li class="nav-label">Pelamar</li>                    
            <li>
                <a href="{{ route('profile.edit') }}" aria-expanded="false">
                    <i class="fa fa-user"></i></i> <span class="nav-text">Informasi Pribadi</span>
                </a>
            </li> --}}
            @endcan
        </ul>
    </div>
</div>
