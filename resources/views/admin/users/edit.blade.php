@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container py-5">
    <!-- Header Bagian Atas -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}" class="text-decoration-none text-muted">Manajemen Pengguna</a></li>
                    <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Edit Pengguna</li>
                </ol>
            </nav>
            <h2 class="fw-bold text-dark mb-1">Edit Pengguna</h2>
            <p class="text-muted">Perbarui informasi akun dan hak akses pengguna di lingkungan kampus.</p>
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

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}" placeholder="Contoh: Ahmad Karmin" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Email Kampus / Pribadi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control bg-light border-start-0 ps-0 @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}" placeholder="nama@kampus.ac.id" required>
                        </div>
                    </div>

                    <!-- Role Pengguna -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Role Pengguna</label>
                        <select name="role" class="form-select bg-light @error('role') is-invalid @enderror" required>
                            <option value="">-- Pilih Role Akses --</option>
                            @foreach (['admin' => '🛡️ Admin', 'dosen' => '👨‍🏫 Dosen', 'mahasiswa' => '🎓 Mahasiswa'] as $value => $label)
                                <option value="{{ $value }}" {{ old('role', $user->role) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <!-- Password Baru -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Password Baru</label>
                            <input type="password" name="password"
                                   class="form-control bg-light" placeholder="Kosongkan jika tidak diubah" minlength="8">
                            <div class="form-text text-muted small mt-1">Minimal 8 karakter jika ingin diubah.</div>
                        </div>

                        <!-- Konfirmasi Password Baru -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wider">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control bg-light" placeholder="Ulangi password baru" minlength="8">
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex align-items-center gap-2 pt-2 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                            <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
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