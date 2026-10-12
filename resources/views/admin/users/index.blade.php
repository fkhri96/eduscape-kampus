@extends('layouts.app')

@section('title', 'Manajemen Pengguna')

@section('content')

<style>
    .users-page {
        --primary: #5145e5;
        --dark: #1e293b;
        --muted: #64748b;
        --border: #edf0f5;
        color: var(--dark);
        padding-top: 36px;
        padding-bottom: 45px;
    }

    .users-page .page-title {
        font-size: 29px;
        font-weight: 800;
        letter-spacing: -0.8px;
    }

    .users-page .page-description {
        color: var(--muted);
        font-size: 13px;
        line-height: 1.7;
    }

    /* Tombol header */
    .users-page .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .users-page .btn-dashboard,
    .users-page .btn-add-user {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 12px 17px;
        border-radius: 11px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: all .2s ease;
    }

    .users-page .btn-dashboard {
        background: #fff;
        color: #475569;
        border: 1px solid #e2e8f0;
    }

    .users-page .btn-dashboard:hover {
        background: #f8fafc;
        color: var(--primary);
        border-color: #c7d2fe;
        transform: translateY(-1px);
    }

    .users-page .btn-add-user {
        background: linear-gradient(135deg, #635bfa, #4938ca);
        color: #fff;
        border: 1px solid transparent;
        box-shadow: 0 5px 14px #5145e52b;
    }

    .users-page .btn-add-user:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px #5145e538;
    }

    /* Kartu statistik */
    .users-page .stat-card {
        height: 100%;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 21px;
        box-shadow: 0 5px 22px #1e293b08;
        transition: transform .2s, box-shadow .2s;
    }

    .users-page .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 26px #1e293b10;
    }

    .users-page .stat-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: var(--soft);
        color: var(--accent);
        font-size: 17px;
    }

    .users-page .stat-label {
        margin-top: 17px;
        margin-bottom: 5px;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
    }

    .users-page .stat-number {
        font-size: 29px;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .users-page .stat-note {
        color: #94a3b8;
        font-size: 11px;
        margin-top: 5px;
    }

    /* Kartu filter & tabel */
    .users-page .users-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 17px;
        overflow: hidden;
        box-shadow: 0 7px 28px #1e293b08;
    }

    .users-page .card-heading {
        padding: 22px 24px;
        border-bottom: 1px solid var(--border);
    }

    .users-page .card-heading h5 {
        font-size: 16px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .users-page .card-heading p {
        color: var(--muted);
        font-size: 12px;
        margin-bottom: 0;
    }

    /* Filter Toolbar */
    .users-page .filter-toolbar {
        background: #f8fafc;
        border-bottom: 1px solid var(--border);
        padding: 16px 24px;
    }

    /* Tabel */
    .users-page .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .users-page .users-table {
        min-width: 700px;
        margin-bottom: 0;
        white-space: nowrap;
    }

    .users-page .users-table thead th {
        background: #f8fafc;
        color: #64748b;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .8px;
        text-transform: uppercase;
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
    }

    .users-page .users-table tbody td {
        padding: 16px 20px;
        font-size: 12px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }

    .users-page .users-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .users-page .users-table tbody tr:hover {
        background: #fafaff;
    }

    .users-page .user-profile {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .users-page .user-avatar {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eeedff;
        color: #5145e5;
        border-radius: 12px;
        font-weight: 800;
        font-size: 14px;
    }

    .users-page .user-name {
        color: #26334b;
        font-weight: 750;
        margin-bottom: 4px;
    }

    .users-page .user-id {
        color: #94a3b8;
        font-size: 10px;
    }

    .users-page .user-email {
        color: #64748b;
    }

    .users-page .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 750;
    }

    .users-page .role-admin {
        background: #f3e8ff;
        color: #7e22ce;
    }

    .users-page .role-dosen {
        background: #dcfce7;
        color: #047857;
    }

    .users-page .role-mahasiswa {
        background: #e0f2fe;
        color: #0369a1;
    }

    .users-page .role-other {
        background: #f1f5f9;
        color: #475569;
    }

    /* Tombol aksi tabel */
    .users-page .btn-edit,
    .users-page .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s;
    }

    .users-page .btn-edit {
        background: #fffbeb;
        color: #a16207;
        border: 1px solid #fde68a;
    }

    .users-page .btn-edit:hover {
        background: #fef3c7;
        color: #854d0e;
    }

    .users-page .btn-delete {
        background: #fff;
        color: #dc2626;
        border: 1px solid #fecaca;
    }

    .users-page .btn-delete:hover {
        background: #fef2f2;
        color: #b91c1c;
    }

    .users-page .card-footer-custom {
        padding: 18px 24px;
        border-top: 1px solid var(--border);
    }

    .users-page .pagination {
        margin-bottom: 0;
        flex-wrap: wrap;
        gap: 4px;
    }

    .users-page .pagination .page-link {
        border-radius: 8px;
        color: #475569;
        border-color: #e2e8f0;
        font-size: 12px;
    }

    .users-page .pagination .active .page-link {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    .users-page .empty-state {
        padding: 48px 20px;
        text-align: center;
        color: #94a3b8;
    }

    .users-page .empty-state i {
        font-size: 36px;
        color: #a5b4fc;
        margin-bottom: 15px;
    }

    /* Responsif HP */
    @media (max-width: 575.98px) {
        .users-page .header-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            gap: 8px;
        }
    }
</style>

<div class="container-fluid users-page">

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <span class="badge rounded-pill text-bg-primary px-3 py-2 mb-2">
                <i class="fas fa-layer-group me-1"></i> Admin Panel
            </span>
            <h2 class="page-title mb-2">Manajemen Pengguna</h2>
            <p class="page-description mb-0">
                Kelola akun Admin, Dosen, dan Mahasiswa dengan mudah dan terpusat.
            </p>
        </div>

        <div class="header-actions">
            <a href="{{ route('dashboard') }}" class="btn-dashboard">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>
            <a href="{{ route('admin.users.create') }}" class="btn-add-user">
                <i class="fas fa-user-plus"></i> Tambah Pengguna
            </a>
        </div>
    </div>

    {{-- Notifikasi sukses / error --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="stat-card" style="--soft:#eeedff;--accent:#5145e5">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-label">Total Pengguna</div>
                <div class="stat-number">{{ $users->total() }}</div>
                <div class="stat-note">Semua akun terdaftar</div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card" style="--soft:#f3e8ff;--accent:#9333ea">
                <div class="stat-icon"><i class="fas fa-shield-alt"></i></div>
                <div class="stat-label">Administrator</div>
                <div class="stat-number">{{ \App\Models\User::where('role', 'admin')->count() }}</div>
                <div class="stat-note">Pengelola sistem</div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card" style="--soft:#dcfce7;--accent:#059669">
                <div class="stat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <div class="stat-label">Dosen</div>
                <div class="stat-number">{{ \App\Models\User::where('role', 'dosen')->count() }}</div>
                <div class="stat-note">Tenaga pengajar</div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card" style="--soft:#e0f2fe;--accent:#0284c7">
                <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                <div class="stat-label">Mahasiswa</div>
                <div class="stat-number">{{ \App\Models\User::where('role', 'mahasiswa')->count() }}</div>
                <div class="stat-note">Mahasiswa terdaftar</div>
            </div>
        </div>
    </div>

    {{-- Tabel pengguna dengan Search & Filter Toolbar --}}
    <div class="users-card">
        <div class="card-heading">
            <h5>
                <i class="fas fa-users me-2" style="color:#5145e5"></i> Daftar Pengguna
            </h5>
            <p>Data akun yang terdaftar dalam sistem EduSpace Campus.</p>
        </div>

        {{-- Form Pencarian & Filter --}}
        <div class="Filter-toolbar">
            <form action="{{ route('admin.users.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-7">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted" style="border-radius: 9px 0 0 9px;"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0 shadow-none" placeholder="Cari berdasarkan nama atau email..." value="{{ request('search') }}" style="border-radius: 0 9px 9px 0; font-size: 12px;">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="role" class="form-select shadow-none" style="border-radius: 9px; font-size: 12px;">
                        <option value="">Semua Role</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                        <option value="dosen" {{ request('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="mahasiswa" {{ request('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm" style="background: var(--primary); border: none; border-radius: 9px; font-size: 12px;">Cari</button>
                    @if(request('search') || request('role'))
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light border px-3" style="border-radius: 9px;" title="Reset Filter"><i class="fas fa-redo text-muted"></i></a>
                    @endif
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle users-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-secondary fw-semibold">
                                {{ $users->firstItem() + $loop->index }}
                            </td>
                            <td>
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        {{ strtoupper(substr($user->name ?? '?', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-id">ID Pengguna #{{ $user->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="user-email">
                                {{ $user->email }}
                            </td>
                            <td>
                                @php
                                    $roleClass = match (strtolower($user->role)) {
                                        'admin' => 'role-admin',
                                        'dosen' => 'role-dosen',
                                        'mahasiswa' => 'role-mahasiswa',
                                        default => 'role-other',
                                    };
                                    $roleIcon = match (strtolower($user->role)) {
                                        'admin' => 'fa-shield-alt',
                                        'dosen' => 'fa-chalkboard-teacher',
                                        'mahasiswa' => 'fa-user-graduate',
                                        default => 'fa-user',
                                    };
                                @endphp

                                <span class="role-badge {{ $roleClass }}">
                                    <i class="fas {{ $roleIcon }}"></i> {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2 align-items-center">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-edit">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>

                                    @if ($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-secondary small fst-italic px-2">Akun Anda</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="fas fa-folder-open d-block"></i>
                                    <h6 class="fw-bold text-dark mb-1">Tidak ada data pengguna ditemukan</h6>
                                    <p class="small mb-3">Coba ubah kata kunci pencarian atau tambahkan pengguna baru.</p>
                                    <a href="{{ route('admin.users.create') }}" class="btn-add-user">
                                        <i class="fas fa-user-plus"></i> Tambah Pengguna
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer dan pagination --}}
        <div class="card-footer-custom d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="small text-secondary">
                Menampilkan <strong>{{ $users->count() }}</strong> dari <strong>{{ $users->total() }}</strong> pengguna
            </div>
            <div>
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="text-center mt-4 small text-secondary">
        <i class="fas fa-graduation-cap me-1"></i> EduSpace Campus &copy; {{ date('Y') }}
    </div>

</div>
@endsection