
@extends('layouts.app')

@section('title', $dashboard['title'] . ' | EduSpace Campus')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

        <aside class="col-md-3 col-lg-2 bg-white border-end p-4">
            <a href="{{ route('dashboard') }}"
               class="brand text-decoration-none d-block mb-5">
                EduSpace<span> Campus.</span>
            </a>

            <div class="small text-secondary mb-2">MENU UTAMA</div>

            <a href="{{ route('dashboard') }}"
               class="btn btn-primary w-100 text-start mb-2">
                ▦ &nbsp; Dashboard
            </a>

            @if ($user->role === 'admin')
                <div class="text-secondary small mt-4 mb-2">ADMINISTRASI</div>
                <a href="{{ route('admin.users.index') }}"
                class="btn btn-light w-100 text-start mb-2">
                    👥 &nbsp; Manajemen Pengguna
                </a>
                <div class="p-2">🏛️ &nbsp; Fakultas & Prodi</div>
                <div class="p-2">📚 &nbsp; Mata Kuliah</div>
                <div class="p-2">📊 &nbsp; Laporan Akademik</div>
            @elseif ($user->role === 'dosen')
                <div class="text-secondary small mt-4 mb-2">AKADEMIK</div>
                <div class="p-2">📚 &nbsp; Mata Kuliah Saya</div>
                <div class="p-2">📝 &nbsp; Tugas & Kuis</div>
                <div class="p-2">📈 &nbsp; Penilaian</div>
            @else
                <div class="text-secondary small mt-4 mb-2">PEMBELAJARAN</div>
                <div class="p-2">📚 &nbsp; Mata Kuliah Saya</div>
                <div class="p-2">📄 &nbsp; Materi Belajar</div>
                <div class="p-2">📝 &nbsp; Tugas & Kuis</div>
                <div class="p-2">🏆 &nbsp; Nilai Saya</div>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="mt-5">
                @csrf
                <button class="btn btn-outline-danger w-100" type="submit">
                    ↪ Keluar
                </button>
            </form>
        </aside>

        <main class="col-md-9 col-lg-10 p-4 p-lg-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-5 gap-3">
                <div>
                    <div class="text-secondary small">EDUSPACE CAMPUS / DASHBOARD</div>
                    <h2 class="fw-bold mt-2">{{ $dashboard['title'] }}</h2>
                    <p class="text-secondary mb-0">{{ $dashboard['description'] }}</p>
                </div>

                <div class="bg-white rounded-4 p-3 shadow-sm">
                    <span class="me-2">👤</span>
                    <strong>{{ $user->name }}</strong>
                    <span class="badge bg-primary ms-2">{{ ucfirst($user->role) }}</span>
                </div>
            </div>

            <div class="p-4 p-lg-5 rounded-4 text-white mb-4"
                 style="background: linear-gradient(120deg, #172554, #3157d5);">
                <div class="small text-white-50 mb-2">SELAMAT DATANG DI EDUSPACE</div>
                <h2 class="fw-bold">Halo, {{ $user->name }}! 👋</h2>
                <p class="mb-0 text-white-50">
                    Semua kebutuhan pembelajaranmu dimulai dari sini.
                </p>
            </div>

            <h5 class="fw-bold mb-3">Akses Cepat</h5>

            <div class="row g-3">
                @foreach ($dashboard['features'] as $index => $feature)
                    <div class="col-sm-6 col-xl-3">
                        <div class="card p-4 h-100">
                            <div class="text-primary fs-3 mb-3">
                                {{ ['📚', '📄', '📝', '📊'][$index] }}
                            </div>
                            <h6 class="fw-bold">{{ $feature }}</h6>
                            <p class="text-secondary small mb-0">
                                Fitur {{ strtolower($feature) }}.
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card p-4 mt-4">
                <h5 class="fw-bold">Informasi Akun</h5>
                <div class="row mt-2">
                    <div class="col-sm-4 text-secondary">Nama</div>
                    <div class="col-sm-8 mb-2">{{ $user->name }}</div>

                    <div class="col-sm-4 text-secondary">Email</div>
                    <div class="col-sm-8 mb-2">{{ $user->email }}</div>

                    <div class="col-sm-4 text-secondary">Role</div>
                    <div class="col-sm-8">{{ ucfirst($user->role) }}</div>
                </div>
            </div>
        </main>

    </div>
</div>
@endsection
