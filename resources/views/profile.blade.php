<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .profile-card {
            max-width: 500px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            background-color: #fff;
            text-align: center;
        }
        .profile-card h2 {
            margin-bottom: 20px;
        }
        .profile-card img {
            width: 350px;
            height: 350px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .profile-info {
            list-style: none;
            padding: 0;
        }
        .profile-info li {
            margin-bottom: 15px;
            font-size: 1.1em;
            display: flex;
            justify-content: center;
        }
        .profile-info li span:first-child {
            font-weight: bold;
            width: 80px;
            text-align: left;
        }
        .profile-info li span:last-child {
            flex-grow: 1;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <!-- Gambar Profil -->
        <img src="{{ asset('images/profile1.jpg') }}" alt="Foto Profil">
        
        <h2>Profil Saya</h2>
        <ul class="profile-info">
            <li><span>Nama:</span> <span>{{ $nama }}</span></li>
            <li><span>Kelas:</span> <span>{{ $kelas }}</span></li>
            <li><span>NPM:</span> <span>{{ $npm }}</span></li>
        </ul>
    </div>

    <!-- Bootstrap JS (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
