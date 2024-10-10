<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white; /* Warna background biru lembut */
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .profile-container {
            background-color: #DCDCDC; /* Background putih untuk kotak profil */
            padding: 40px; 
            border-radius: 10px;
            max-width: 400px; /* Atur lebar maksimal */
            width: 100%; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            text-align: center;
        }
        .profile-img {
            width: 150px; /* Ukuran gambar */
            height: 150px; /* Ukuran gambar */
            border-radius: 50%; /* Membuat gambar menjadi lingkaran */
            object-fit: cover; /* Gambar tetap proporsional */
            margin-bottom: 20px; /* Jarak antara gambar dan teks */
        }
        .info-box {
            background-color: white; /* Warna biru untuk kotak info */
            color: black; /* Warna teks putih */
            border-radius: 50px; /* Membuat sudut menjadi lonjong */
            padding: 10px 0; /* Jarak vertikal dalam kotak */
            margin-bottom: 10px; /* Jarak antar kotak */
        }
        .info-box.class-name {
            background-color: white; /* Warna abu-abu untuk kotak kelas */
            color: black; /* Warna teks hitam */
        }
    </style>
</head>

<body>
<div class="profile-container">
    <img class="profile-img" src="{{ asset($user->foto) }}" alt="Foto Profil">
    <div class="info-box">
        {{ $user->nama }}
    </div>
    <div class="info-box class-name">
        {{ $user->nama_kelas }}
    </div>
    <div class="info-box">
        {{ $user->npm }}
    </div>
</div>

</body>
</html>
