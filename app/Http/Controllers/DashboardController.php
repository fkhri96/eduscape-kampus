<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $dashboard = match ($user->role) {
            'admin' => [
                'title' => 'Dashboard Admin',
                'description' => 'Kelola pengguna dan sistem akademik kampus.',
                'features' => [
                    'Manajemen pengguna',
                    'Fakultas dan program studi',
                    'Mata kuliah dan kelas',
                    'Laporan pembelajaran',
                ],
            ],

            'dosen' => [
                'title' => 'Dashboard Dosen',
                'description' => 'Kelola materi dan kegiatan perkuliahan.',
                'features' => [
                    'Mata kuliah yang diampu',
                    'Materi pembelajaran',
                    'Tugas dan kuis',
                    'Penilaian mahasiswa',
                ],
            ],

            'mahasiswa' => [
                'title' => 'Dashboard Mahasiswa',
                'description' => 'Akses materi dan pantau kegiatan belajarmu.',
                'features' => [
                    'Mata kuliah saya',
                    'Materi belajar',
                    'Tugas dan kuis',
                    'Nilai dan progres belajar',
                ],
            ],

            default => abort(403, 'Role tidak dikenali.'),
        };

        return view('dashboard.index', compact('user', 'dashboard'));
    }
}
