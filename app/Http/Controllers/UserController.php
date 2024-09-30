<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    // Menampilkan halaman form create_user
    public function create()
    {
        return view('create_user', [
            'kelas' => Kelas::all(), // Mengambil semua data kelas untuk dropdown
        ]);
    }

    // Proses menyimpan data user dengan validasi dari CreateUserRequest
    public function store(CreateUserRequest $request)
    {
        // Simpan data user ke database
        $user = UserModel::create($request->validated());

        // Memuat relasi kelas untuk mendapatkan nama_kelas
        $user->load('kelas');

        // Setelah berhasil menyimpan, arahkan ke halaman profile dan kirim data user
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }
}