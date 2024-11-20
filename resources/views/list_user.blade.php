@extends('layouts.app')

@section('content')
    <style>
        /* Desain minimalis dan modern */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8; /* Background warna soft blue */
            margin: 0;
            padding: 20px;
        }

        .table-container {
            margin: 20px auto;
            max-width: 90%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            background-color: #ffffff; /* Background putih bersih */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Shadow ringan */
            transition: box-shadow 0.3s ease-in-out;
        }

        .table:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Shadow bertambah saat hover */
        }

        .table thead {
            background-color: #007bff; /* Warna biru terang untuk header */
            color: #ffffff;
            font-size: 1.1rem;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            font-size: 1rem;
            border-bottom: 1px solid #f0f0f0; /* Garis pemisah yang halus */
            color: #444444; /* Warna teks yang lebih gelap */
        }

        .table-hover tbody tr:hover {
            background-color: #eef2f7; /* Warna lembut saat di-hover */
            cursor: pointer;
        }

        .btn-add-user {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #28a745; /* Warna hijau untuk tombol */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-add-user:hover {
            background-color: #218838; /* Warna lebih gelap saat hover */
        }

        /* Tombol aksi */
        .btn-action {
            padding: 6px 12px;
            font-size: 0.9rem;
            border-radius: 4px;
            margin-right: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .btn-view {
            background-color: #17a2b8; /* Warna biru untuk tombol Lihat */
            color: white;
        }

        .btn-view:hover {
            background-color: #138496; /* Warna lebih gelap saat hover */
        }

        .profile-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #8EACCD; /* Border untuk foto */
    }

        /* Responsif */
        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 0.85rem;
                padding: 8px;
            }

            .btn-add-user {
                font-size: 0.9rem;
            }

            .btn-action {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }
    </style>


<div class="container">
    <h2>Daftar User</h2>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah User Baru</a>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th> <!-- Adding Kelas column -->
                <th>Jurusan</th>
                <th>Fakultas</th>
                <th>Semester</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->kelas->nama_kelas ?? '-' }}</td> <!-- Displaying Kelas -->
                <td>{{ $user->jurusan }}</td>
                <td>{{ $user->fakultas->nama_fakultas ?? '-' }}</td>
                <td>{{ $user->semester }}</td>
                <td>
                    <img src="{{ asset('storage/uploads/' . $user->foto) }}" class="profile-img" alt="Foto {{ $user->nama }}">
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection