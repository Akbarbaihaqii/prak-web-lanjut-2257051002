<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            text-align: left;
            color: #333;
        }

        input[type="text"], select, input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-container input[type="text"]::placeholder {
            color: #999;
        }

        .text-danger {
            color: red;
            font-size: 12px;
            text-align: left;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="form-container">
        <h2>Masukan Data Anda</h2>

        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
            </div>

            <label for="kelas">Kelas :</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select><br>

            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <select name="jurusan" id="jurusan" required>
                    <option value="" disabled selected>Pilih Jurusan</option>
                    <option value="fisika">Fisika</option>
                    <option value="kimia">Kimia</option>
                    <option value="biologi">Biologi</option>
                    <option value="matematika">Matematika</option>
                    <option value="ilmu komputer">Ilmu Komputer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fakultas_id">Fakultas:</label>
                <select name="fakultas_id" id="fakultas_id" required>
                    <option value="" disabled selected>Pilih Fakultas</option>
                    @foreach ($fakultas as $fakultasItem)
                        <option value="{{ $fakultasItem->id }}">{{ $fakultasItem->nama_fakultas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="number" id="semester" name="semester" min="1" max="14" placeholder="Masukkan Semester (1-14)" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto Profil:</label>
                <input type="file" id="foto" name="foto" accept="image/*">
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection
</body>
</html>
