@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="container py-5">
    <!-- Header Bagian Atas -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}" class="text-decoration-none text-muted">Manajemen Pengguna</a></li>
                    <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Tambah Pengguna</li>
                </ol>
            </nav>
            <h2 class="fw-bold text-dark mb-1">Tambah Pengguna Baru</h2>
            <p class="text-muted">Buat akun baru untuk memberikan akses kepada pengguna di lingkungan kampus.</p>
        </div>
    </div>

    <!-- Form Container -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                
                <!-- Notifikasi Error Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-3 mb-4 p-3">
                        <div class="d-flex align-items-center fw-bold mb-2">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> Terjadi kesalahan input:
                        </div>
                        <ul class="mb-0 ps-3 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" placeholder="Contoh: Ahmad Karmin" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Email Kampus / Pribadi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control bg-light border-start-0 ps-0"
                                   value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required>
                        </div>
                    </div>

                    <!-- Role Pengguna -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Role Pengguna</label>
                        <select name="role" class="form-select bg-light" required>
                            <option value="">-- Pilih Role Akses --</option>
                            <option value="admin" @selected(old('role') === 'admin')>🛡️ Admin</option>
                            <option value="dosen" @selected(old('role') === 'dosen')>👨‍🏫 Dosen</option>
                            <option value="mahasiswa" @selected(old('role') === 'mahasiswa')>🎓 Mahasiswa</option>
                        </select>
                    </div>

                    <div class="row">
                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Password</label>
                            <input type="password" name="password"
                                   class="form-control bg-light" placeholder="Minimal 8 karakter" minlength="8" required>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control bg-light" placeholder="Ulangi password" minlength="8" required>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex align-items-center gap-2 pt-2 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                            <i class="bi bi-check-lg me-1"></i> Simpan Pengguna
                        </button>
                        <a href="{{ route('admin.users.index') }}"
                           class="btn btn-light px-4 py-2 rounded-pill fw-semibold text-muted">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection