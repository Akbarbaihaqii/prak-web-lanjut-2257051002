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
            background-color: #f2f2f2; /* Warna latar belakang abu-abu lembut */
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #ffffff; /* Latar belakang putih */
            padding: 30px;
            border-radius: 10px; /* Radius sudut */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek kedalaman */
            width: 350px; /* Lebar form */
            text-align: center;
        }

        h2 {
            color: #333; /* Warna teks lebih gelap */
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

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px; /* Radius kecil untuk input */
            border: 1px solid #ccc; /* Border abu-abu */
            font-size: 14px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1); /* Bayangan dalam untuk input */
        }

        input[type="submit"] {
            background-color: #007bff; /* Warna tombol biru */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px; /* Sedikit radius */
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Warna lebih gelap saat hover */
        }

        .form-container input[type="text"]::placeholder {
            color: #999; /* Placeholder abu-abu */
        }

        .text-danger {
            color: red;
            font-size: 12px;
            text-align: left;
        }
    </style>
</head>

<body>

<div class="form-container">
    <h2>Masukan data anda</h2>
    
    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}">
        @if ($errors->has('nama'))
            <div class="text-danger">{{ $errors->first('nama') }}</div>
        @endif

        <label for="npm">NPM :</label>
        <input type="text" id="npm" name="npm" placeholder="Masukkan NPM Anda" value="{{ old('npm') }}">
        @if ($errors->has('npm'))
            <div class="text-danger">{{ $errors->first('npm') }}</div>
        @endif

        <label for="foto">foto</label><br>
        <input type="file" id="foto" name="foto"><br><br>

        <label for="kelas">Kelas :</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelas as $kelasItem)
            <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                {{ $kelasItem->nama_kelas }}
            </option>
            @endforeach
        </select>
        @if ($errors->has('kelas_id'))
            <div class="text-danger">{{ $errors->first('kelas_id') }}</div>
        @endif
        <a href="{{ route('user.list') }}" class="btn-list-user">List User</a>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
</body>

</html>
