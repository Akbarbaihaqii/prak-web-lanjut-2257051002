<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8; /* Warna background yang lembut */
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .profile-container {
            background-color: #ffffff; /* Background putih untuk kotak profil */
            padding: 40px; 
            border-radius: 20px;
            max-width: 450px; /* Atur lebar maksimal */
            width: 100%; 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Shadow lebih halus */
            text-align: center;
        }
        .profile-img {
            width: 150px; /* Ukuran gambar */
            height: 150px; /* Ukuran gambar */
            border-radius: 50%; /* Membuat gambar menjadi lingkaran */
            object-fit: cover; /* Gambar tetap proporsional */
            margin-bottom: 20px; /* Jarak antara gambar dan teks */
            border: 5px solid #007bff; /* Border biru di sekitar gambar */
        }
        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .info {
            text-align: left;
            font-size: 18px;
            margin-bottom: 15px;
        }
        .label {
            font-weight: 500;
            color: #007bff; /* Warna biru untuk label */
        }
        .value {
            color: #333;
            margin-left: 10px;
        }
        .info-box {
            background-color: #f8f9fa; /* Warna background kotak info yang lembut */
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .card-footer {
            margin-top: 20px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="profile-container">
        <img src="{{ asset('storage/uploads/' . $user->foto) }}" class="profile-img" alt="Profile Picture">

    <h1>Profil Pengguna</h1>

    <div class="info-box">
        <div class="info">
            <span class="label">Nama :</span>
            <span class="value">{{ $user->nama }}</span>
        </div>
    </div>

    <div class="info-box">
        <div class="info">
            <span class="label">NPM :</span>
            <span class="value">{{ $user->npm }}</span>
        </div>
    </div>

    <div class="info-box">
        <div class="info">
            <span class="label">Kelas :</span>
            <span class="value">{{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</span>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
