
@extends('layouts.app')

@section('title', 'Login | EduSpace Campus')

@section('content')
<div class="container-fluid min-vh-100">
    <div class="row min-vh-100">

        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center p-5 text-white"
             style="background: linear-gradient(140deg, #172554, #3157d5);">
            <div class="mx-auto" style="max-width: 500px;">
                <div class="mb-5" style="font-size: 48px;">🎓</div>
                <h1 class="fw-bold display-5 mb-4">
                    Belajar Lebih Mudah,<br>
                    Raih Masa Depan.
                </h1>
                <p class="text-white-50 fs-5">
                    Satu ruang digital untuk materi kuliah, tugas,
                    ujian, dan perjalanan akademikmu.
                </p>
                <div class="mt-5 p-4 rounded-4"
                     style="background: rgba(255,255,255,.10);">
                    <div class="fw-semibold">EduSpace Campus</div>
                    <small class="text-white-50">
                        Platform pembelajaran digital kampus
                    </small>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center justify-content-center p-4 p-md-5">
            <div style="width: 100%; max-width: 420px;">
                <div class="brand mb-5">EduSpace<span> Campus.</span></div>

                <h2 class="fw-bold mb-2">Selamat Datang!</h2>
                <p class="text-secondary mb-4">
                    Silakan masuk ke akun pembelajaranmu.
                </p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="card p-4 p-md-4">
                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email"
                                   class="form-control"
                                   placeholder="nama@email.com"
                                   value="{{ old('email') }}"
                                   required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password"
                                   class="form-control"
                                   placeholder="Masukkan password"
                                   required>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox"
                                   name="remember" value="1" id="remember">
                            <label class="form-check-label text-secondary"
                                   for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-semibold">
                            Masuk ke Akun &rarr;
                        </button>
                    </form>
                </div>

                <p class="text-secondary text-center small mt-4">
                    &copy; {{ date('Y') }} EduSpace Campus.
                    Semua hak dilindungi.
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
